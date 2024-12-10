@extends('layouts.main')
@section('content')
    <h3 class="cartds-head-text">Корзина</h3>
    <section class="carts">
        <div>
            @foreach($products as $product)
            <table class="carts-option-card">
                <thead>
                    <tr>
                        <th></th>
                        <th class="th-opt">Товар</th>
                        <th class="th-opt">Цена</th>
                        <th class="th-opt">Количество</th>
                        <th class="th-opt">Общая сумма</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="order">
                        <td>
                            <form action="{{ route('carts.destroy', $product->id) }}" method="POST" class="delete-from-carts">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><img src="{{asset('assets/close (4) 2.svg')}}" alt="Продукт"></button>
                            </form>
                        </td>
                        <td class="product-image">
                            <img src="{{asset($product->product->images[0]->image_url)}}" alt="Продукт">
                            <h3 class="name_card">{{ $product->product->name }}</h3>
                        </td>
                        <td class="product-info-price">
                            <span class="cost">{{ $product->product->cost }} ₽</span>
                        </td>
                        <td class="count">
                            <table>
                                <tr>
                                    <td class="count-options">
                                        <div class="trangl minus-btn">
                                            <img src="{{asset('assets/minus-sign (1) 1.svg')}}" alt="Меньше">
                                        </div>
                                        <div class="trangl count-info">
                                            1
                                        </div>
                                        <div class="trangl plus-btn">
                                            <img src="{{asset('assets/plus 1.svg')}}" alt="Больше">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="total">
                            <span class="cost">{{ $product->product->cost }} ₽</span>
                        </td>
                    </tr>
                </tbody>
            </table>



                @endforeach
        </div>
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

    </section>
@endsection
@section('scripts')
    <script src="{{ asset('scripts/count-catrs.js') }}"></script>
@endsection
