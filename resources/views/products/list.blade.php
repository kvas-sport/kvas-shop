@extends('layouts.main')
@section('content')
    <section class="catalog">
        <h1>{{ $title }}</h1>

        @if(count($products) > 0)
            <div class="wrapper__catalog">
                <div class="search-container_catalog">
                    <img src="{{ asset('assets/loupe 1.svg') }}" alt="Лупа" class="search-icon">
                    <input type="text" placeholder="Поиск" class="search-input_catalog">
                </div>
            </div>
            <div class="product-cards">
                @foreach($products as $product)
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
                            <a href="{{ route('products.show', [$product->category_id, $product->id]) }}" class="more-info">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="add-to-cart open-more">
                Открыть еще
            </button>
        @else
            <span>Продуктов нет</span>
        @endif
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/cart.js') }}"></script>
@endsection
