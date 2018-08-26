@extends('layouts.cover') @section('content')
<p>Vielen Dank für Ihre Anfrage.</p>
<p>Wir haben die Anfrage an {{ $traders }} Händler gesendet.</p>
<p>Sie haben nun {{ $number }} Anfragen ohne Registrierung gestellt.</p>
<p>Sie können Ihre Anfrage auch noch weiter verfeinern.
    <br />
    <br />
    <a class="btn btn-info" href="/auctions/modify/{{ $auction->auctionToken}}" role="button">Anfrage verfeinern</a>
</p> @endsection @section('footer')
<script src="/js/file.js"></script>
@endsection