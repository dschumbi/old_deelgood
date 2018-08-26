<?php

namespace App\Repositories;

use App\Auction;
use App\Category;
use App\Property;
use Geocoder\Geocoder;
use App\Mail\NotifyTradersForNewAuction;

class Properties
{
    public function findByNameAndCategory($name, $category_id)
    {
        #$traders = Category::find($auction->category_id)->users()->orderBy('name')->get();
        $property = Property::where([
            ['name', '=', $name],
            ['category_id', '=', $category_id],
        ])->first();

        if (!is_object($property)) {
            $property = new Property();
            $property->name = $name;
            $property->category_id = $category_id;
            $property->count = 1;
        } else {
            $property->count = $property->count + 1;
        }

        $property->save();
        return $property;
    }
}