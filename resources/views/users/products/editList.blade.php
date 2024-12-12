@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Изменить продукт</h2>
        <div class="table">
            <div class="thead">
                <div class="table-row">
                    <span>id</span>
                    <span>Название</span>
                    <span>Описание</span>
                    <span>Количество</span>
                    <span>Цена</span>
                    <span>Категория</span>
                    <span>Изображения</span>
                    <span>Изменить</span>
                    <span>Удалить</span>
                </div>
            </div>
            <div class="t-body">
                @foreach($products as $product)
                    <div class="table-row preview-row">
                        <div class='td'>{{ $product->id }}</div>
                        <div class='td'>{{ $product->name }}</div>
                        <div class="td table-description__admin"><p>{{ $product->description }}</p></div>
                        <div class='td'>{{ $product->amount }}</div>
                        <div class='td'>{{ $product->cost }}</div>
                        <div class='td'>{{ $product->category->name }}</div>
                        <div class='td'>
                            @foreach($product->images as $image)
                                <img src="{{ asset($image->image_url) }}" width="25"/>
                            @endforeach
                        </div>
                        <div class='td'>
                            <a href="{{ route('products.edit', $product->id) }}" type="button" class="update-button">Изменить</a>
                        </div>
                        <div class='td'>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </section>
@endsection

