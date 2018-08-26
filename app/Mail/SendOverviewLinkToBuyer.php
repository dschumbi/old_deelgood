<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOverviewLinkToBuyer extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $auction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $auction)
    {
        $this->user = $user;
        $this->auction = $auction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('heiko.sudar@applico.de', 'Deelgood')
            ->to($this->user->email)
            ->subject('Ihre Anfragenübersicht')
            ->markdown('emails.auctions.sendOverviewLinkToBuyer');
    }
}