@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Создать новый продукт</h2>
        <form action="{{ route('products.store') }}">
            <div>
                <label for="name">Название:</label>
                <input id="name" type="text" name="name">
            </div>
            <div>
                <label for="description">Описание:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div>
                <label for="amount">Количество:</label>
                <input id="amount" type="number" name="amount">
            </div>
            <div>
                <label for="cost">Цена:</label>
                <input id="cost" type="number" name="cost">
            </div>
            <div>
                <label for="image_url">Картинка:</label>
                <input id="image_url" type="file" name="image_url" multiple>
            </div>
            <div>
                <label for="category_id">Категория:</label>
                <select id="category_id" name="category_id">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                    <option value="">6</option>
                </select>
            </div>
            <button type="submit">Добавить</button>
        </form>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/table-row-switcher.js') }}"></script>
@endsection
