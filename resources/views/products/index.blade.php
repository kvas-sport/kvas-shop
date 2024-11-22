@extends('layouts.main')
@section('content')
    <section class="catalog">
        <h1>Мужская спортивная одежда</h1>
        <div class="wrapper__catalog">
            <div class="search-container_catalog">
                <img src="{{ asset('assets/loupe 1.svg') }}" alt="Лупа" class="search-icon">
                <input type="text" placeholder="Поиск" class="search-input_catalog">
            </div>
            <div class="availability-filter">
                <label class="filt-opt">
                    <input type="checkbox" name="availability" value="available"> В наличии
                </label>
            </div>
        </div>

        <div class="group_image">
            <img src="{{asset('assets/image-2.jpg')}}" alt="Худи" class="image_part">
        </div>
        <h2>Подборка</h2>
        <div class="product-cards">
            <div class="product-card">
                <div class="product-image">
                        <img src="{{asset('assets/image 34.jpg')}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">Metha 10, 10mg/caps, 100caps</h3>
                        <span class="cost">100.000 ₽</span>
                    </div>
                    <div class="product-buttons">
                        <button class="add-to-cart">В корзину</button>
                        <button class="more-info">Подробнее</button>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                        <img src="{{asset('assets/image 34.jpg')}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">Metha 10, 10mg/caps, 100caps</h3>
                        <span class="cost">100.000 ₽</span>
                    </div>
                    <div class="product-buttons">
                        <button class="add-to-cart">В корзину</button>
                        <button class="more-info">Подробнее</button>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                        <img src="{{asset('assets/image 34.jpg')}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">Metha 10, 10mg/caps, 100caps</h3>
                        <span class="cost">100.000 ₽</span>
                    </div>
                    <div class="product-buttons">
                        <button class="add-to-cart">В корзину</button>
                        <button class="more-info">Подробнее</button>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                        <img src="{{asset('assets/image 34.jpg')}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">Metha 10, 10mg/caps, 100caps</h3>
                        <span class="cost">100.000 ₽</span>
                    </div>
                    <div class="product-buttons">
                        <button class="add-to-cart">В корзину</button>
                        <button class="more-info">Подробнее</button>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                        <img src="{{asset('assets/image 34.jpg')}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">Metha 10, 10mg/caps, 100caps</h3>
                        <span class="cost">100.000 ₽</span>
                    </div>
                    <div class="product-buttons">
                        <button class="add-to-cart">В корзину</button>
                        <button class="more-info">Подробнее</button>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                        <img src="{{asset('assets/image 34.jpg')}}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">Metha 10, 10mg/caps, 100caps</h3>
                        <span class="cost">100.000 ₽</span>
                    </div>
                    <div class="product-buttons">
                        <button class="add-to-cart">В корзину</button>
                        <button class="more-info">Подробнее</button>
                </div>
            </div>
        </div>
        <button class="add-to-cart open-more">
                Открыть еще
            </button>
        <!-- КАРТОЧКИ БЕЗ БЭКА -->


        <!-- @foreach($products as $product)
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
        @endforeach -->
    </section>
@endsection
