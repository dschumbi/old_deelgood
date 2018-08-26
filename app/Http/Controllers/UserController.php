<?php

namespace App\Http\Controllers;

use Validator;
use App\Auction;
use App\Category;
use App\User;
use App\Mail\ConfirmAuction;
use App\Repositories\Auctions;
use App\Http\Requests\AuctionRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit()
    {
        $user = Auth::user();
        $checkedResource = $user->categories->pluck('id')->all();
        #dd($checkedResource);
        $categories = Category::orderBy('name')->get();
        return view('auth.edit', compact('user', 'categories', 'checkedResource'));
    }

    public function update(Request $request)
    {
        $geocodes =app('geocoder')->geocode($request->get('street').', '.$request->get('zip').' '.$request->get('city'))->get();
        #$geocodes =app('geocoder')->geocode('Pirmasens')->get();
        #dump($request->get('categories'));
        #dd($geocodes[0]->getCountry()->getCode());


        $user = Auth::user();
        $user->name =       $request->get('name');
        $user->email =      $request->get('email');
        $user->firstname =  $request->get('firstname');
        #$user->dateOfBirth = $request->get('dateOfBirth');
        $user->trader =     $request->get('trader');
        $user->street =     $request->get('street');
        $user->zip =        $request->get('zip');
        $user->city =       $request->get('city');
        $user->country =    $geocodes[0]->getCountry()->getCode();
        $user->longitude =  $geocodes[0]->getCoordinates()->getLongitude();
        $user->latitude =   $geocodes[0]->getCoordinates()->getLatitude();
        $user->save();
        $user->categories()->sync($request->get('categories'));
        return redirect()->route('edit')->with('message', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}