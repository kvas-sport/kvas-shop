@extends('layouts.main')
@section('content')
    <h3>Профиль</h3>
    <a href="{{ route('logout') }}">Выйти</a>
    <form action="">
        <label for="name">Имя:</label>
        <input id="name" type="text" value="{{ $user->name }}">
        <label for="email">Эл. почта:</label>
        <input id="email" type="text" value="{{ $user->email }}">
        <label for="email">Номер телефона:</label>
        <input id="email" type="text">

        <button type="submit">Сохранить</button>
    </form>
    <a href="">Изменить пароль</a>
@endsection
