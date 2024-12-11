@extends('layouts.main')
@section('content')
    <section class="admin">
        <h2>Админская панель</h2>
        <div class="admin-select">
            <div class="admin-select-actions">
                <h4>Действие с продуктами</h4>
                <div class="actiont-btn-admin">
                    <a class="button-details admin-details" href="{{ route('users.products.create') }}">Добавить</a>
                    <a class="button-details admin-details" href="{{ route('users.products.editList') }}">Изменить/Удалить</a>
                </div>
            </div>
            <div>
                <h4>Действие с пользователями</h4>
{{--                <div class="actiont-btn-admin">--}}
{{--                    <a class="button-details admin-details" href="{{ route('users.category.create') }}">Добавить</a>--}}
{{--                    <a class="button-details admin-details" href="{{ route('users.category.edit') }}">Изменить/Удалить</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/table-row-switcher.js') }}"></script>
@endsection
