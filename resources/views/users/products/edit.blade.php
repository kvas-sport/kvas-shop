@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Изменить продукт id: {{ $product->id }}</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
              class="registerForm admin-from">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Название:</label>
                <input id="name" type="text" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group admin-opt">
                <label for="description">Описание:</label>
                <textarea id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="amount">Количество:</label>
                <input id="amount" type="number" name="amount" value="{{ $product->amount }}">
            </div>
            <div class="form-group">
                <label for="cost">Цена:</label>
                <input id="cost" type="number" name="cost" value="{{ $product->cost }}">
            </div>
            <div class="form-group admin-select-form-opt">
                <label for="category_id">Категория:</label>
                <select id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option
                            value={{ $category->id }} @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                </divv>
                <button type="submit">Сохранить</button>
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
            @endforeach
            @endif
        </form>
        <h2>Изображения:</h2>
        <div class="images-edit">
            @foreach($product->images as $image)
                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="hidden-button"><img src="{{ asset($image->image_url) }}"
                                                                     alt="{{ $image->id }}"></button>
                </form>
            @endforeach
            @if(count($product->images) < 4)
                <form id="fileForm" action="{{ route('images.store', $product) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="fileInput" name="files[]" style="display: none;" multiple>
                    <button type="button" class="image-add-button">+</button>
                </form>
            @endif
        </div>

        <h2>Характеристики:</h2>
        <form action="{{ route('characteristics.store', $product) }}" method="POST">
            @csrf
            @method('POST')
            <h4>Добавить характеристику</h4>
            <div class="form-group">
                <label for="amount">Название:</label>
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label for="amount">Количество:</label>
                <input type="number" name="amount">
            </div>
            <button type="submit">Добавить</button>
        </form>
        @if(count($product->characteristics) > 0)
            <form action="{{ route('characteristics.update', $product) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="characteristic">
                    @foreach($product->characteristics as $characteristic)
                        <div class="item">
                            <input type="checkbox" id="{{ $characteristic->id }}" value="{{ $characteristic->id }}"
                                   name="characteristics[]" checked>
                            <label for="{{ $characteristic->id }}">{{ $characteristic->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit">Сохранить</button>
                </div>
            </form>
        @endif
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/add-image.js') }}"></script>
@endsection
