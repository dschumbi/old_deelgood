@extends('layouts.page')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1>Ihre Angebote</h1>
@foreach($offers as $offer)
<div class="offer row"
    data-category="{{ $offer->auction->category->name }}"
    data-manufacturer="{{ $offer->manufacturer }}"
    data-pick-up-in-store="{{ $offer->auction->pickUpInStore }}"
    >
    <div class="col-3"></div>
    <div class="card w-75">
      <div class="card-header">
        <div class="row">
          <div class="col-2">
            <h5>Anfrage seit</h5>
            {{ $offer->auction->created_at->toFormattedDateString() }}
          </div>
          <div class="col-6">
            <h5>Kategorie</h5>
            {{ $offer->auction->category->name }}
          </div>

          <div class="col-2">
            <h5>Lieferung</h5>
            @if($offer->auction->pickUpInStore == 1)
              Abholung im Laden vor Ort
            @else
              Lieferung nach Hause
            @endif
          </div>
          <div class="col-2">
            <h5>Ort</h5>
            {{ $offer->auction->user->city }}
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <h4 class="auctionMaxPriceHead">Maximaler Preis</h4>
            @if($offer->auction->maxPrice)
              <h5 class="auctionMaxPrice">
                @money($offer->auction->maxPrice, 'EUR')
              </h5>
            @else
              <h5 class="auctionMaxPrice noLimit">
                kein Limit angegeben
              </h5>
            @endif
            <hr>
            <h3 class="card-title">{{ $offer->auction->name }}<h3>
            @if(sizeof($offer->auction->properties) > 0)
              <hr>
              <h5 class="auctionPropertiesHead">Gewünschte Eigenschaften</h5>
              <ul>
                @foreach (array_slice($offer->auction->properties->toArray(), 0, 3) as $property)
                <li>{{ $property['name'] }}
                @endforeach
              </ul>
            @endif
            <hr>
          </div>
          <div class="col-5">
            <h4 class="auctionMaxPriceHead">Ihr Preis</h4>
            <h5 class="offerPrice">
              @money($offer->price, 'EUR') (@money($offer->price - $offer->auction->maxPrice, 'EUR'))
            </h5>
            <hr>
            <h5 class="offerManufacturerName">{{ $offer->manufacturer }}</h5>
            <h3 class="offerArticle">{{ $offer->article }}</h3>
            @if(sizeof($offer->properties) > 0)
              <hr>
              <ul>
                @foreach (array_slice($offer->properties->toArray(), 0, 5) as $property)
                  <li>{{ $property['name'] }}
                @endforeach
              </ul>
            @endif
          </div>
          <div class="col-2 offerLinks">
            <a href="/offers/show/{{ $offer->auction->auctionToken }}" class="btn btn-primary">Details</a><br>
            <a href="/offers/edit/{{ $offer->auction->auctionToken }}" class="btn btn-secondary">Bearbeiten</a><br>
            <a href="/offers/new/{{ $offer->auction->auctionToken }}" class="btn btn-danger">Neues Angebot</a>
          </div>
        </div>

      </div>
    </div>

</div>
@endforeach

@endsection
