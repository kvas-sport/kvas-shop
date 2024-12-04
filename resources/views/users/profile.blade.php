@extends('layouts.main')
@section('content')
    <h3>Профиль</h3>
    <a href="{{ route('logout') }}">Выйти</a>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('users.update', \Illuminate\Support\Facades\Auth::user()->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Имя:</label>
        <input id="name" type="text" name="name" value="{{ $user->name }}">
        <label for="email">Эл. почта:</label>
        <input id="email" type="text" name="email" value="{{ $user->email }}">
        <label for="phone">Номер телефона:</label>
        <input id="phone" type="text" name="phone" value="{{ $user->phone }}">

        <button type="submit">Сохранить</button>
    </form>
    <a href="">Изменить пароль</a>
@endsection
