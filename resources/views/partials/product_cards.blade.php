@foreach($products as $product)
    <div class="product-card">
        <div class="product-image">
            <img src="{{ $product->images->isNotEmpty() ? asset($product->images[0]->image_url) : asset('/assets/image-placeholder.jpg') }}" alt="Продукт">
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
