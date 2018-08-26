@extends('layouts.page') @section('content')
<div class="jumbotron">
    {{ HTML::image('img/logo_rgb.jpg', 'Deelgood', array('class' => 'img-responsive2 logo', 'style' => 'max-width:400px')) }}
    <!-- <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p> -->
    <form method="POST" action="/auctions" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-10">
                <h4>Ihre Anfrage: {{ session('auction')->name }}</h4>
                <br>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="form-group">
                    <select class="form-control @if($errors->has('category')) is-invalid @endif" id="category" name="category" aria-describedby="categoryHelp" placeholder="Link zu einem Online-Shop" data-toggle="tooltip" title="Hooray!">
                        <option>Bitte wählen Sie eine Kategorie aus:</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                    <small id="categoryHelp" class="invalid-feedback">Welcher Produktkategorie kann man das Produkt zuweisen?</small> @else
                    <small id="categoryHelp" class="form-text text-muted">Welcher Produktkategorie kann man das Produkt zuweisen?</small> @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <input type="text" class="form-control @if($errors->has('zip')) is-invalid @endif " id="zip" name="zip" aria-describedby="nameHelp" placeholder="Ihre PLZ"> @if($errors->has('zip'))
                    <small id="zipHelp" class="invalid-feedback">Bitte geben Sie hier Ihre Postleitzahl ein.</small> @else
                    <small id="zipHelp" class="form-text text-muted">Bitte geben Sie hier Ihre Postleitzahl ein.</small> @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="link" name="link" aria-describedby="linkHelp" placeholder="Link zu einem Online-Shop" data-toggle="tooltip">
                    <small id="linkHelp" class="form-text text-muted">Haben Sie den Artikel in einem Online-Shop gesehen?</small>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">Anfrage jetzt absenden!</button>
                </div>
            </div>
        </div>
    </form>
</div>
@include('auctions.infotext') @endsection
@section('footer')
<script src="/js/file.js"></script>
@endsection
