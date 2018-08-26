<?php

namespace App;

class Auction extends Model
{
    protected $dates = ['auction_start', 'auction_end'];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->belongsToMany('App\Property', 'auction_property', 'auction_id', 'property_id');
    }

    public function addOffer($article, $link_to_article, $price, $description, $manufacturer)
    {
        $this->offers()->create(compact('article', 'link_to_article', 'price', 'description', 'manufacturer'));
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }

    public function scopeOfToken($query, $token)
    {
        return $query->where('auctionToken', $token);
    }
}
