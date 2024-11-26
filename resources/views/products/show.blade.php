@extends('layouts.main')
@section('content')


    <div class="slider">
      <img class="active-photo" src="{{asset($product->image_url)}}" width="872" height="1163" alt="Продукт">
      <ul class="preview-list">
        <li>
          <a>
            <img src="{{asset('assets/image-6.jpg')}}" width="250" height="333" alt="Продукт">
          </a>
        </li>
        <li>
          <a>
            <img src="{{asset('assets/image-7.jpg')}}"  width="250" height="333" alt="Продукт">
          </a>
        </li>
        <li>
          <a>
            <img src="{{asset($product->image_url)}}"  width="250" height="333" alt="Продукт">
          </a>
        </li>
      </ul>
    </div>

    <div class="product-info show-product-info">
        <div>
            <h3 class="name_card">{{ $product->name }}</h3>
            <span class="cost">{{ $product->cost }} ₽</span>
        </div>
        <div>
            <form action="{{ route('favorites.store') }}" method="POST">
                    @csrf
                @method('POST')
                <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <button type="submit" class=""><img src="{{ asset('assets/heart.svg') }}" alt="heart"></button>
        </form> 
        </div>
    </div>


    <div class="size-group">
    <p>Выберите размер  RUS EUR US  Таблица размеров</p>
        <form class="size-form">
            @csrf
            <div class="size-buttons">
                <button type="button" class="size-button" data-size="40">40-42</button>
                <button type="button" class="size-button" data-size="44">44</button>
                <button type="button" class="size-button" data-size="46">46</button>
                <button type="button" class="size-button" data-size="48">48</button>
            </div>
            <input type="hidden" name="selected_size" id="selected_size">
            <button type="submit" class="add-to-cart add-show" value="1">В корзину</button>
        </form>
    </div>

    <h5 class="show-text">Комбинезон для бега от Demix — идеальный вариант для тех, кто не хочет подбирать спортивную экипировку, а хочет получить сразу стильную и функциональную форму.</h5>
    <h2>Популярные</h2>
    <p>кинь пж сюда адекватный foreach, у меня не вышло это адекватоно сделать</p>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/show-cart.js') }}"></script>
@endsection
