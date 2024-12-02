@extends('layouts.main')
@section('content')

    <div class="product-info">
        <div class="slider">
            <div class="image-wrapper__product-image">
                <img class="active-photo" src="{{asset($product->image_url)}}" alt="Продукт">
            </div>
            <ul class="preview-list">
                <li>
                    <a class="slider-image">
                        <img src="{{asset('assets/image-6.jpg')}}" alt="Продукт">
                    </a>
                </li>
                <li>
                    <a class="slider-image">
                        <img src="{{asset('assets/image-7.jpg')}}" alt="Продукт">
                    </a>
                </li>
                <li>
                    <a class="slider-image">
                        <img src="{{asset($product->image_url)}}" alt="Продукт">
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
                    <form action="{{ route('favorites.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <button type="submit" class="favorite-button"><img src="{{ asset('assets/heart.svg') }}" alt="heart"></button>
                    </form>
                </div>
            </div>


            <div class="size-group">
                <p>Выберите размер RUS EUR US Таблица размеров</p>
                <form action="{{ route('carts.store') }}" method="POST" class="size-form">
                    @csrf
                    @method('POST')
                    <div class="size-buttons">
                        <button type="button" class="size-button" data-size="40">40-42</button>
                        <button type="button" class="size-button" data-size="44">44</button>
                        <button type="button" class="size-button" data-size="46">46</button>
                        <button type="button" class="size-button" data-size="48">48</button>
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
                        <img src="{{asset($product->image_url)}}" alt="Продукт">
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

@section('scripts')
    <script src="{{ asset('scripts/show-cart.js') }}"></script>
@endsection
