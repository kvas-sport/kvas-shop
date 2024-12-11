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
                @include('partials.product_cards', ['products' => $products])
            </div>
            <button class="add-to-cart open-more" data-url="{{ route('products.loadMore') }}">
                Открыть еще
            </button>
        @else
            <span>Продуктов нет</span>
        @endif
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/cart.js') }}"></script>
    <script src="{{ asset('scripts/pagination.js') }}"></script>
@endsection
