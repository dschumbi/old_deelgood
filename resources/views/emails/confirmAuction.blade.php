@component('mail::message')
# Bitte bestätigen Sie Ihre Anfrage

Vielen Dank für Ihre Anfrage __{{ $auction->name }}__

@component('mail::button', ['url' => config('app.url').'/auctions/confirmAuction/'.$auction->auctionToken])
Anfrage bestätigen
@endcomponent

Vielen Dank,<br>
{{ config('app.name') }}
@endcomponent
