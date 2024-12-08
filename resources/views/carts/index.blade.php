@extends('layouts.main')
@section('content')
    <section class="carts">
        <h3>Корзина</h3>
        @foreach($products as $product)
            <div class="carts-option-card">
                <div class="order">
                    <form action="{{ route('carts.destroy', $product->id) }}" method="POST" class="delete-from-carts">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="{{asset('assets/close (4) 2.svg')}}" alt="Продукт"></button>
                    </form>

                    <div class="product-image">
                        <img src="{{asset($product->product->images[0]->image_url)}}" alt="Продукт">
                    </div>

                    <div class="product-info-name">
                        <h3 class="name_card">{{ $product->product->name }}</h3>
                    </div>

                    <div class="product-info">
                        <span class="cost">{{ $product->product->cost }} ₽</span>
                    </div>

                    <div class="count">
                        <div class="count-options">
                            <div class="trangl minus-btn">
                                <img src="{{asset('assets/minus-sign (1) 1.svg')}}" alt="Плюс">
                            </div>
                            <div class="trangl count-info">
                                1
                            </div>

                            <div class="trangl plus-btn">
                                <img src="{{asset('assets/plus 1.svg')}}" alt="Плюс">
                            </div>
                        </div>
                    </div>

                    <div class="sum-order">
                        <span class="cost">{{ $product->product->cost }} ₽</span>
                    </div>
                </div>
                @endforeach
                <div class="order-info-fin">
                    <h3>Сумма заказов</h3>
                    <div class="cart-bcg">
                        <div class="orders-information-delail">
                            <div class="order-text-top">
                                <h4>Товар</h4>
                                <h4>Подытог</h4>
                            </div>

                            <div class="price-one">
                                <p>Цена за товар</p>
                                <span class="cost">{{ $product->product->cost }} ₽</span>
                            </div>

                            <div class="delivery-opt">
                                <p>Доставка</p>
                                <span class="cost">Доставка почтой из РФ: 960₽</span>
                            </div>

                            <div class="price-total-fin">
                                <h4>Итог</h4>
                                <span class="cost">{{ $product->product->cost }} ₽</span>
                            </div>
                        </div>

                        <div class="product-buttons">
                            <form>
                                @csrf
                                @method('POST')
                                <input type="hidden" value="{{'#'}}" name="user_id">
                                <input type="hidden" value="{{'#'}}" name="product_id">
                                <button type="submit" class="add-to-cart" value="1">Оформить заказ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('scripts/count-catrs.js') }}"></script>
@endsection
