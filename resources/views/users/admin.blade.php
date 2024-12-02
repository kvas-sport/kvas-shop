@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Админская панель</h2>
        <div>
            <h4>Продукты</h4>
            <a href="{{ route('users.products.create') }}">Добавить</a>
            <a href="{{ route('users.products.edit') }}">Изменить/Удалить</a>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/table-row-switcher.js') }}"></script>
@endsection
