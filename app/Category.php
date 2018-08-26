<?php

namespace App;

class Category extends Model
{
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'category_user', 'category_id', 'user_id');
    }

    public static function categories()
    {
        return static::orderBy('name')->get();
    }
}
