<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'dateOfBirth', 'trader', 'street', 'zip', 'city', 'country', 'longitude', 'latitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function traders()
    {
        return $this->hasMany(Trader::class);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_user', 'user_id', 'category_id')
                    ->orderBy('name');
    }

    public function publishAuction(Auction $auction)
    {
        $auction->auction_start = Carbon::now();
        $auction->auction_end = Carbon::now()->addDays(5);

        $this->auctions()->save($auction);
    }

    public function publishOffer(Offer $offer, Auction $auction, $request)
    {
        $offer->auction_id = $auction->id;
        $this->offers()->save($offer);
        $offer->properties()->sync($request->properties);
    }

    public function publishTrader(Trader $trader)
    {
        $this->traders()->save($trader);
    }
}