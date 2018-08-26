<hr>
    <h2>Alle Angebote für diese Auktion:</h2>
    <div class="list-group">
        @foreach($auction->offers as $offer)
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex justify-content-between">
                  <h3 class="mb-1">{{ $offer->article }}</h3>
                    <small class="text-muted">
                        {{ $offer->price }} &euro;
                    </small>
                </div>
                <p class="mb-1">
                    {{ $offer->description }}
                </p>
            </div>
        @endforeach
    </div>
