@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Админская панель</h2>
        <input type="search" placeholder="Поиск">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Кол-во</th>
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
                        <th>{{ $product->id }}</th>
                        <th>{{ $product->id }}</th>
                        <th><button class="update-button">Изменить</button></th>
                        <th><button>Удалить</button></th>
                    </tr>
                    <tr class="change-row hidden-row">
                        <form action="{{ route('products.update', $product->id) }}">
                            <th>{{ $product->id }}</th>
                            <th><input type="text" value="{{ $product->name }}"></th>
                            <th class="table-description__admin"><textarea name="description">{{ $product->description }}</textarea></th>
                            <th><input type="number" value="{{ $product->amount }}" name="amount"></th>
                            <th><input type="number" value="{{ $product->cost }}" name="cost"></th>
                            <th><input type=""></th>
                            <th>{{ $product->id }}</th>
                            <th><button class="cancel-button">Отмена</button></th>
                            <th><button type="submit">Сохранить</button></th>
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
