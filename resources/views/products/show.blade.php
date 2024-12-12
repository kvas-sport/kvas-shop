@extends('layouts.main')
@section('content')

    <div class="product-info">
        <div class="slider">
            <div class="image-wrapper__product-image">
                <img
                    src="{{ $product->images->isNotEmpty() ? asset($product->images[0]->image_url) : asset('/assets/image-placeholder.jpg') }}"
                    alt="Продукт">
            </div>
            <ul class="preview-list">
                @foreach($product->images->skip(1) as $image)
                    <li>
                        <a class="slider-image">
                            <img src="{{ asset($image->image_url) }}" alt="Продукт">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="product-info-wrapper">
            <div class="product-info show-product-info">
                <div>
                    <h3 class="name_card">{{ $product->name }}</h3>
                    <span class="cost">{{ $product->cost }} ₽</span>
                    <p class="show-text">{{ $product->description }}</p>
                </div>
                <div>
                    <form class="heart" action="{{ route('favorites.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <button type="submit" class="hidden-button"><img src="{{ asset('assets/heart.svg') }}"
                                                                         alt="heart" class="heart-icon"></button>
                    </form>
                </div>
            </div>
            <div class="size-group">
                <form action="{{ route('carts.store') }}" method="POST" class="size-form">
                    @csrf
                    @method('POST')
                    @if(count($product->characteristics) > 0)
                        <p>Выберите размер RUS EUR US Таблица размеров</p>
                        <p>Количество на складе: <span
                                id="quantity-display">{{ $product->characteristics[0]->amount }}</span></p>
                        <div class="size-radios">
                            @foreach($product->characteristics as $characteristic)
                                @if($characteristic->amount > 0)
                                    <div class="form_radio_btn">
                                        <input id="radio-{{ $characteristic->id }}" type="radio" name="characteristic_id"
                                               value="{{ $characteristic->id }}"
                                               data-amount="{{ $characteristic->amount }}" checked>
                                        <label for="radio-{{ $characteristic->id }}">{{ $characteristic->name }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <button type="submit" class="add-to-cart add-show" value="1">В корзину</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/amount.js') }}"></script>
@endsection
