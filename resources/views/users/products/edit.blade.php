@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Изменить продукт id: {{ $product->id }}</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
              class="registerForm admin-from">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Название:</label>
                <input id="name" type="text" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group admin-opt">
                <label for="description">Описание:</label>
                <textarea id="description" name="description">{{ $product->name }}</textarea>
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
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                </divv>
                <button type="submit">Добавить</button>
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
            @endforeach
            @endif
        </form>
            @foreach($product->images as $image)
            <form action="">
                <img src="{{ asset($image->image_url) }}" alt="{{ $image->id }}">
            </form>
            @endforeach
    </section>
@endsection

