@extends('layouts.cover') @section('content')
<div class="jumbotron">
    {{ HTML::image('img/logo_rgb.jpg', 'Deelgood', array('class' => 'img-responsive2 logo', 'style' => 'max-width:400px')) }}
    <!-- <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p> -->
    <form method="POST" action="/auctions/finish" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <input type="hidden" name="auctionToken" id="auctionToken" value="{{$token}}" />
                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif " id="name" name="name" aria-describedby="nameHelp" placeholder="z.B. ... Waschmaschine für 4 Personen Haushalt"> @if($errors->has('name'))
                    <small id="nameHelp" class="invalid-feedback">Was für ein Produkt möchten Sie kaufen?</small> @else
                    <small id="nameHelp" class="form-text text-muted">Was für ein Produkt möchten Sie kaufen?</small> @endif
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">Jetzt anfragen!</button>
                </div>
            </div>
        </div>
    </form>
</div>
@include('auctions.infotext') @endsection @section('footer')
<script src="/js/file.js"></script>
@endsection
