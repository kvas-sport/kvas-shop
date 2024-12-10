@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Изменить продукт</h2>
        <input type="search" placeholder="Поиск">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Изображения</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="preview-row">
                    <th>{{ $product->id }}</th>
                    <th>{{ $product->name }}</th>
                    <th class="table-description__admin"><p>{{ $product->description }}</p></th>
                    <th>{{ $product->amount }}</th>
                    <th>{{ $product->cost }}</th>
                    <th>{{ $product->category->name }}</th>
                    <th>
                        @foreach($product->images as $image)
                            <img src="{{ asset($image->image_url) }}" width="25"/>
                        @endforeach
                    </th>
                    <th>
                        <button class="update-button">Изменить</button>
                    </th>
                    <th>
                        <button>Удалить</button>
                    </th>
                </tr>
                <tr class="change-row hidden-row">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <th>{{ $product->id }}</th>
                        <th><input type="text" name="name" value="{{ $product->name }}"></th>
                        <th class="table-description__admin">
                            <textarea name="description">{{ $product->description }}</textarea>
                        </th>
                        <th><input type="number" name="amount" value="{{ $product->amount }}"></th>
                        <th><input type="number" name="cost" value="{{ $product->cost }}"></th>
                        <th><input type="text" name="category" value="{{ $product->category->name }}"></th>
                        <th>
                            <div class="image-row">
                                @foreach($product->images as $image)
                                    <form action="{{ route('users.products.update', [$product->id, $image->id]) }}"
                                          method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <img src="{{ asset($image->image_url) }}" width="25"/>
                                    </form>
                                @endforeach
                            </div>
                            <input id="image_url" type="file" name="images[]" multiple>
                        </th>
                        <th>
                            <button class="cancel-button" type="button">Отмена</button>
                        </th>
                        <th>
                            <button type="submit">Сохранить</button>
                        </th>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/table-row-switcher.js') }}"></script>
@endsection
