@extends('layouts.page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h6>Produktkategorie: {{ $auction->category->name }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>{{ $auction->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="label label-default">
                Start der Anfrage:
                </span>
                <p>
                    {{ $auction->auction_start->formatLocalized('%d. %B %Y') }}
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Ende der Anfrage:
                </span>
                <p>
                    {{ $auction->auction_end->formatLocalized('%d. %B %Y') }}
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Kaufdatum:
                </span>
                <p>
                    {{ $auction->deliveryDate }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="label label-default">
                Maximaler Preis:
                </span>
                <p>
                    {{ $auction->maxPrice }} &euro;
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Link zu einem Online-Shop:
                </span>
                <p>
                    <a href="{{ $auction->link }}" target="_blank">
                        {{ $auction->link }}
                    </a>
                </p>
            </div>
            <div class="col">
                <span class="label label-default">
                Abholung oder Lieferung:
                </span>
                <p>
                    @if($auction->pickUpInStore)
                        Abholung
                    @else
                        Lieferung nach Hause
                    @endif
                </p>
            </div>
        </div>
        <hr>
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Artikelname</th>
              <th scope="col">Preis</th>
              <th scope="col">Deelgood-Score</th>
            </tr>
          </thead>
          <tbody>

        @foreach($auction->offers as $offer)
            <tr>
                <td></td>
                <td>{{ $offer->article }}</td>
                <td>{{ $offer->price }}</td>
                <td>82,4%</td>

            </tr>
        @endforeach
          </tbody>
        </table>

    </div>
@endsection
