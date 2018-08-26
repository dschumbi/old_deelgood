@extends('layouts.cover')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include('auth.loginform')
        </div>
        <div class="col-md-6">
            @include('auctions.provideMailAddress')
        </div>
    </div>
</div>
@endsection
