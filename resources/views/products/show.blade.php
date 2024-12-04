@extends('layouts.main')
@section('content')

    <div class="product-info">
        <div class="slider">
            <div class="image-wrapper__product-image">
                <img class="active-photo" src="{{ asset($product->images[0]->image_url) }}" alt="Продукт">
            </div>
            <ul class="preview-list">
                <li>
                    <a class="slider-image">
                        <img src="{{ asset($product->images[1]->image_url) }}" alt="Продукт">
                    </a>
                </li>
                <li>
                    <a class="slider-image">
                        <img src="{{ asset($product->images[2]->image_url) }}" alt="Продукт">
                    </a>
                </li>
                <li>
                    <a class="slider-image">
                        <img src="{{ asset($product->images[3]->image_url) }}" alt="Продукт">
                    </a>
                </li>
            </ul>
        </div>

        <div class="product-info-wrapper">
            <div class="product-info show-product-info">
                <div>
                    <h3 class="name_card">{{ $product->name }}</h3>
                    <span class="cost">{{ $product->cost }} ₽</span>
                    <p class="show-text">
                        Комбинезон для бега от Demix — идеальный вариант для тех, кто не хочет подбирать спортивную
                        экипировку, а хочет получить сразу стильную и функциональную форму.
                    </p>
                </div>
                <div>
                    <form class="heart" action="{{ route('favorites.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <button type="submit" class="favorite-button"><img src="{{ asset('assets/heart.svg') }}" alt="heart" class="heart-icon"></button>
                    </form>
                </div>
            </div>
            <div class="size-group">
                <p>Выберите размер RUS EUR US Таблица размеров</p>
                <form action="{{ route('carts.store') }}" method="POST" class="size-form">
                    @csrf
                    @method('POST')
                    <div class="size-radios">
                        <div class="form_radio_btn">
                            <input id="radio-1" type="radio" name="radio" value="1" checked>
                            <label for="radio-1">40-42</label>
                        </div>

                        <div class="form_radio_btn">
                            <input id="radio-2" type="radio" name="radio" value="2">
                            <label for="radio-2">44</label>
                        </div>

                        <div class="form_radio_btn">
                            <input id="radio-3" type="radio" name="radio" value="3">
                            <label for="radio-3">46</label>
                        </div>

                        <div class="form_radio_btn">
                            <input id="radio-4" type="radio" name="radio" value="4">
                            <label for="radio-4">48</label>
                        </div>
                    </div>
                    <input type="hidden" name="selected_size" id="selected_size">
                    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <button type="submit" class="add-to-cart add-show" value="1">В корзину</button>
                </form>
            </div>
        </div>
    </div>

    <div class="populars">
        <h2>Популярные</h2>
        <div class="product-cards">
            @foreach($populars as $product)
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{asset($product->images[0]->image_url)}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">{{ $product->name }}</h3>
                        <span class="cost">{{ $product->cost }} ₽</span>
                    </div>
                    <div class="product-buttons">
                        <form action="{{ route('carts.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <button type="submit" class="add-to-cart" value="1">В корзину</button>
                        </form>
                        <a href="{{ route('products.show', $product->id) }}" class="more-info">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


