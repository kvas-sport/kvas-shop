@extends('layouts.main')
@section('content')
    <section class="admin">
        @if (session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif
        <h2>Создать новый продукт</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
        class="registerForm admin-from">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Название:</label>
                <input id="name" type="text" name="name">
            </div>
            <div class="form-group admin-opt">
                <label for="description">Описание:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Количество:</label>
                <input id="amount" type="number" name="amount">
            </div>
            <div class="form-group">
                <label for="cost">Цена:</label>
                <input id="cost" type="number" name="cost">
            </div>
            <div class="form-group">
                <label for="image_url">Картинка:</label>
                <input id="image_url" type="file" name="images[]" multiple>
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
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/table-row-switcher.js') }}"></script>
@endsection
