<?php

namespace App\Repositories;

use App\Auction;
use App\Category;
use Geocoder\Geocoder;
use App\Mail\NotifyTradersForNewAuction;

class Auctions
{
    public function sendMailToTraders($auction)
    {
        $traders = Category::find($auction->category_id)->users()->orderBy('name')->get();

        foreach ($traders as $trader) {
            \Mail::send(new NotifyTradersForNewAuction($trader, $auction));
        }
        return count($traders);
    }
}