@extends('layouts.main')
@section('content')
    <h3 class="head-text-profile">Личный кабинет</h3>
    <div class="profile-opt-groups">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        <div class="block-form">
            <form action="{{ route('users.update', \Illuminate\Support\Facades\Auth::user()->id) }}" method="POST"
            class="profile-from"
            >
                @csrf
                @method('PATCH')
                <div class="form-group profile-group-form">
                    <label for="name">Имя:</label>
                    <input id="name" type="text" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group profile-group-form">
                    <label for="email">Эл. почта:</label>
                    <input id="email" type="text" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group profile-group-form">
                    <label for="phone">Номер телефона:</label>
                    <input id="phone" type="text" name="phone" value="{{ $user->phone }}">
                </div>
                <button class="add-to-cart profile-btn" type="submit">Сохранить</button>
            </form>
            <div class="sub-button">
                <a href="">Изменить пароль</a>
                <a class="profile-leave" href="{{ route('logout') }}">Выход</a>
            </div>
        </div>
        <div class="block-order-inf">
            <h4>Информация о заказе</h4>
        </div>  
    </div>
@endsection
