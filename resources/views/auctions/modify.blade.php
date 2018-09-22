@extends('layouts.page')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="/auctions/modify/{{ $auction->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
<div class="row">
    <div class="col">
        <div class="form-row">
            <label class="col-12 col-form-label" for="name">Ihre Anfrage</label>
            <div class="col-12">
                <input type="hidden" name="name" value="{{ $auction->name }}">
                <h6>{{ $auction->name }}</h6>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col">
              <label for="maxPrice">Preisobergrenze</label>
              <div class="input-group">
                  <span class="input-group-addon">&euro;</span>
                  <input type="text" name="maxPrice" value="{{ $auction->maxPrice }}" class="form-control">
              </div>
            </div>
            <div class="form-group col">
              <label for="deliveryDate">Kaufdatum</label>
              <input type="text" name="deliveryDate" value="{{ $auction->deliveryDate }}" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
              <label for="zip">PLZ</label>
              <input type="text" name="zip" value="{{ $auction->zip }}" class="form-control" readonly>
            </div>
            <div class="form-group col">
              <label for="radius">Umkreis</label>
              <div class="input-group">
                  <select name="radius" value="{{ $auction->radius }}" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                  </select>
                  <span class="input-group-addon">km</span>
              </div>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <label for="url">URL:</label>
            <input type="text" name="url" value="{{ $auction->url }}" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">

                <label>Abholung vor Ort (z.B. im Laden des Händlers)?</label>
                <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="pickUpInStore" id="pickUpInStore1" value="1" checked>
                  Ja, im Laden abholen!
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="pickUpInStore" id="pickUpInStore2" value="0">
                  Bitte liefern!
                </label>
              </div>
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i>Anfrage aktualisieren
                </button>
                <a href="/auctions/buyer/{{ $auction->hash }}" class="btn btn-link">Zur Übersicht</a>
            </div>

        </div>
    </div>
    <div class="col">
        <div class="form-row">
            <label class="col-12 col-form-label" for="category">Kategorie</label>
            <div class="col-12">
                <input type="hidden" name="category_id" value="{{ $auction->category->id }}">
              <h6>{{ $auction->category->name }}</h6>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="name">Welche Eigenschaften soll das Produkt haben?</label>
                <div class="input-group">
                  <input type="text" id="productName" name="productName" placeholder="Produkteigenschaft" aria-label="Product name" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-success" id="btn-add" type="button">+</button>
                  </span>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12" id="property-list">
                <label for="name">Gewünschte Produkteigenschaften</label>
                @foreach($auction->properties as $property)

                  <div class="input-group mb-2" id="property-{{ $loop->iteration }}">
                  <input type="text" name="productProperty[]" value="{{ $property->name }}" aria-label="Product name" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-danger delete-property" value="{{ $loop->iteration }}" type="button">-</button>
                  </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</form>


@endsection

@section('specialscripts')
<script>
    var count = {{ count($auction->properties)+1 }};
</script>
<script src="/js/productproperties.js"></script>
@endsection
