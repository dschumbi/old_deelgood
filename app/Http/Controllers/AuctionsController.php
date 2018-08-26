<?php

namespace App\Http\Controllers;

use Validator;
use App\Auction;
use App\Category;
use App\User;
use App\Property;
use App\Mail\ConfirmAuction;
use App\Mail\SendOverviewLinkToBuyer;
use App\Repositories\Auctions;
use App\Repositories\Properties;
use App\Http\Requests\AuctionRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionsController extends Controller
{
    protected $categories;

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);

        return view('auctions.index', compact('token'));
    }

    public function showAllBuyer($token = 0)
    {
        #dd($token);

        if (Auth::check()) {
            $auctions = Auction::latest()->where('user_id', '=', auth()->user()->id)->get();
        } else {
            $auctions = Auction::latest()->where('hash', '=', $token)->get();
        }
        #dump($auctions);
        #dd($auctions[0]->category);

        return view('auctions.showAllBuyer', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function finish(Request $request)
    {
        $auction = new Auction(request(['name', 'auctionToken']));
        $categories = Category::categories();
        session(['auction' => $auction]);
        return view('auctions.edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Auctions $auctions)
    {
        $auction = session('auction');
        $auction->category_id = $request->category;
        $auction->zip = $request->zip;

        if ($user = auth()->user()) {
            auth()->user()->publishAuction(
                $auction
            );
            $traders = $auctions->sendMailToTraders($auction);
            return redirect('/');
        } else {
            //Store auctiondata in session
            session(['auction' => $auction]);

            //Redirect to a page, where user can login or provide mail-address
            return redirect('/auctions/finish/determineAuctionUser');
        }
    }

    public function determineAuctionUser()
    {
        return view('auctions.determineAuctionUser');
    }

    public function startAuction(Request $request)
    {
        //In DB nachschauen, ob schon drei Auktionen mit der Mail-Adresse vorhanden sind

        if ($request->auctionToken === session('auction')->auctionToken) {
            //Auktion ohne BenutzerID, confirmed = 0 und Mail-Adresse abspeichern
            //Mail-Adress per encrypt und hash in einen Hash umwandeln und per Mail an den Kunden senden
            $auction = session('auction');
            $auction->confirmed = false;
            $auction->hash = hash('md5', $request->email);
            $auction->email = $request->email;
            $auction->save();

            $user = new User;
            $user->email = $request->email;

            //Mail an Mail-Adresse senden
            \Mail::send(new ConfirmAuction($user, $auction));




            //Auf Info-Seite weiterleiten
            return view('auctions.infoUserAboutEmail', compact('auction', 'value'));
        }
    }

    public function confirmAuction($auctionToken = 0, Auctions $auctions)
    {

        //Nachschauen, ob Auktion mit Token existiert
        $auction = Auction::where('auctionToken', '=', $auctionToken)->first();

        //Anzahl der Auktionen mit dieser Mail-Adresse abfragen
        $number = Auction::where('email', '=', $auction->email)->count();
        //Fehlende Daten der Auktion setzen
        $auction->auction_start = \Carbon::now();
        $auction->auction_end = \Carbon::now()->addDays(7);
        $auction->confirmed = 1;

        //Auktion abspeichern
        $auction->save();

        //Mail mit Übersicht an Benutzer senden
        $user = new User;
        $user->email = $auction->email;
        \Mail::send(new SendOverviewLinkToBuyer($user, $auction));

        //E-Mail an Händler
        $traders = $auctions->sendMailToTraders($auction);

        //Info an User über Start der Auktion
        return view('auctions.confirmStartOfAuction', compact('auction', 'traders', 'number'));
    }

    public function modify($token)
    {
        $auction = Auction::ofToken($token)->first();
        $categories = Category::all();
        #dump($auction->properties());

        return view('auctions.modify', compact('auction', 'categories'));
    }

    public function show($token)
    {
        $auction = Auction::ofToken($token)->first();
        setlocale(LC_TIME, 'German');
        return view('auctions.show', compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Auction $auction, Request $request, Properties $properties)
    {
        $auctionProperties = array();

        if (count($request->productProperty) > 0) {
            foreach ($request->productProperty as $property) {
                //feststellen, ob die property in der kategorie schon mal verwendet wurde
                //wenn nein, dann neu anlegen, wenn ja, dann zähler hochzählen
                //ids der properties holen und in eine collection schreiben
                $currentProperty = $properties->findByNameAndCategory($property, $auction->category->id);
                $auctionProperties[] = $currentProperty->id;
            }
        }

        //properties mit der auktion synchronisieren
        $auction->properties()->sync($auctionProperties);
        $auction->maxPrice = $request->maxPrice;
        $auction->deliveryDate = $request->deliveryDate;
        $auction->radius = $request->radius;
        $auction->pickUpInStore = 1;
        #$auction->pickUpInStore = $request->pickUpInStore;
        $auction->save();
        //mail an händler senden und über update informieren

        return redirect('/auctions/modify/'.$auction->auctionToken)->with('status', 'Ihre Anfrage wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}