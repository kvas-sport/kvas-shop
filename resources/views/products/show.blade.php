@extends('layouts.main')
@section('content')
    <h3>Товар</h3>
    {{ $product->name }}
    <form action="{{ route('favorites.store') }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
        <input type="hidden" value="{{ $product->id }}" name="product_id">
        <button type="submit" class=""><img src="{{ asset('assets/heart.svg') }}" alt="heart"></button>
    </form>
@endsection
