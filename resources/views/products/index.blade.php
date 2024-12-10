@extends('layouts.main')
@section('content')
    <section class="categories">
        <h1>Каталог</h1>
        <ul class="categories__wrapper">
            @foreach($categories as $category)
                <a href="{{ route('products.list', ['category_id' => $category->id]) }}">
                    <li class="categories__item">
                        <img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}">
                        <span>{{ $category->name }}</span>
                    </li>
                </a>
            @endforeach
        </ul>
    </section>
@endsection
