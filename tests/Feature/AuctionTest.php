<?php

namespace Tests\Feature;

use \App\Auction;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuctionTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_create_auction()
    {
        $auction = factory(Auction::class)->make();

        /*$this->post('/auctions', $auction->toArray());

        $this->assertEquals(1, Auction::count());*/
    }
}
