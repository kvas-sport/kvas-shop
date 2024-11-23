@extends('layouts.main')
@section('content')
    <h3>Корзина</h3>
    @foreach($products as $product)
        <div>
            {{ $product->product->name }}
        </div>
    @endforeach
@endsection
