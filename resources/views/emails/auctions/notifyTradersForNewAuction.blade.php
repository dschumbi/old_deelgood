@component('mail::message')
# Neue Anfrage

Es ist eine neue Anfrage eingegangen, die Sie interessieren könnte.

@component('mail::button', ['url' => config('app.url').'/offers/new/'.$auction->auctionToken])
Anfrage ansehen und Gebot abgeben
@endcomponent

Vielen Dank,<br>
Ihr {{ config('app.name') }} Team
@endcomponent
