@extends ('layouts.cover')

@section ('content')
@foreach ($auctions as $auction)
<div class="row">
    <div class="col-10">

            <div class="d-flex justify-content-between">
              <h5 class="mb-1">{{ $auction->name }}</h5>
                <small class="text-muted">
                    {{ $auction->created_at->diffForHumans() }}
                </small>
            </div>
            <div class="row">
                <div class="col">
                    Anzahl der Angebote: {{ count($auction->offers) }}
                </div>
                @if($auction->user)
                    <div class="col">
                        Name des Kunden: {{ $auction->user->name }}
                    </div>
                @endif
                @if($auction->category)
                    <div class="col">
                        Produktkategorie: {{ $auction->category->name }}
                    </div>
                @endif
                <div class="col alert alert-warning" role="alert">
                    Hier Infos über Kategorie, Enddatum etc.
                </div>
            </div>
        </a>
    </div>
    <div class="col-2">
        <a href="/auctions/show/{{ $auction->auctionToken }}" class="btn btn-primary">Ansehen</a>
        <a href="/auctions/modify/{{ $auction->auctionToken }}" class="btn btn-secondary">Bearbeiten</a>
    </div>
</div>
@endforeach
@endsection
