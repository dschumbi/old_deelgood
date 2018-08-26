@component('mail::message')
# Übersicht Ihrer Anfragen

Übersicht über Ihre Anfragen bla bla bla

@component('mail::button', ['url' => config('app.url').'/auctions/buyer/'.$auction->hash])
Alle Anfragen ansehen
@endcomponent

Vielen Dank,<br>
Ihr {{ config('app.name') }} Team
@endcomponent
