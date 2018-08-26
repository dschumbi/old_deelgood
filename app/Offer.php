<?php

namespace App;

class Offer extends Model
{
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function properties()
    {
        return $this->belongsToMany('App\Property', 'offer_property', 'offer_id', 'property_id');
    }
}