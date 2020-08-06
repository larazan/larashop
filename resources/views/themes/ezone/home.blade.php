@extends('themes.ezone.layout')

@section('content')
    @include('themes.ezone.partials.slider')
    @include('themes.ezone.partials.special_offer')
    @include('themes.ezone.partials.all_products')
    @include('themes.ezone.partials.brands')
    @include('themes.ezone.partials.categories')
    @include('themes.ezone.partials.collection')

    @include('themes.ezone.partials.insta')
@endsection
