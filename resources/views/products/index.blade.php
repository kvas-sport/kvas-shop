@extends('layouts.main')
@section('content')
    <section>
        <h1>Каталог</h1>
        @foreach($products as $product)
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
        @endforeach
    </section>
@endsection
