@extends('layouts.main')
@section('content')
    <h3 class="favorite-text">Избранные</h3>

    <div class="product-cards">
        @foreach($favorites as $favorite)
                <div class="product-card">
                    <div class="favorite-opt-btn">
                        <form class="heart" action="{{ route('favorites.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $favorite->product->id }}" name="product_id">
                            <button type="submit" class="favorite-button"><img src="{{ asset('assets/heart.svg') }}" alt="heart" class="heart-icon"></button>
                        </form>
                    </div>
                    <div class="product-image">
                        <img src="{{asset($favorite->product->image_url)}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">{{ $favorite->product->name }}</h3>
                        <span class="cost">{{ $favorite->product->cost }} ₽</span>
                    </div>
                    <div class="product-buttons">
                        <form action="{{ route('carts.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $favorite->product->id }}" name="product_id">
                            <button type="submit" class="add-to-cart" value="1">В корзину</button>
                        </form>
                        <a href="{{ route('products.show', $favorite->product->id) }}" class="more-info">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
