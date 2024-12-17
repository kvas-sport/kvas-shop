
@extends('layouts.main')

@section('content')
    <h3 class="favorite-text">Избранные</h3>

    <div class="product-cards">
        @if(count($favorites) > 0)
            @foreach($favorites as $favorite)
                <div class="product-card">
                    <div class="favorite-opt-btn">
                        <form class="heart" action="{{ route('favorites.store') }}" method="POST" onsubmit="changeHeart(event, this)">
                            @csrf
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $favorite->product->id }}" name="product_id">
                            <button type="submit" class="hidden-button">
                                <img src="{{ asset('assets/heart1.svg') }}" alt="heart" class="heart-icon"> <!-- Показать heart1.svg сразу -->
                            </button>
                        </form>
                    </div>
                    <div class="product-image">
                        <img src="{{ asset($favorite->product->images[0]->image_url) }}" alt="Продукт">
                    </div>
                    <div class="product-info">
                        <h3 class="name_card">{{ $favorite->product->name }}</h3>
                        <span class="cost">{{ $favorite->product->cost }} ₽</span>
                    </div>
                    <div class="product-buttons">
                        <form action="{{ route('carts.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $favorite->product->id }}" name="product_id">
                            <button type="submit" class="add-to-cart">В корзину</button>
                        </form>
                        <a href="{{ route('products.show', [$favorite->product->category_id, $favorite->product->id]) }}" class="more-info">Подробнее</a>
                    </div>
                </div>
            @endforeach
        @else
            <span>Избранных товаров нет</span>
        @endif
    </div>
@endsection 

<script>
function changeHeart(event, form) {
    event.preventDefault();
    let heartIcon = form.querySelector('.heart-icon');
    
    // Меняем изображение на heart1.svg
    heartIcon.src = "{{ asset('assets/heart1.svg') }}";

    // Отправляем форму
    form.submit();
}
</script>