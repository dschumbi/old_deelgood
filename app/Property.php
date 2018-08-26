<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function auctions()
    {
        return $this->belongsToMany('App\Auction', 'auction_property', 'property_id', 'auction_id')
                    ->orderBy('name');
    }

    public function offers()
    {
        return $this->belongsToMany('App\Offer', 'offer_property', 'property_id', 'offer_id')
                    ->orderBy('name');
    }
}