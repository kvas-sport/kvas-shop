@extends('layouts.main')
@section('content')
    <div class="registration">
        <form
        action="{{route('login') }}"
        method="post"
        class="loginForm" id="loginForm"
        novalidate
        >
            @csrf
            <h3 class="text-center">Вход в аккаунт</h3>
            <div class="switcher">
                <span>Нет аккаунта?</span>
                <a href="{{route('register')}}"class="btn btn-secondary switch-form" data-switch="register">Регистрация</a>
            </div>
            <div class="form-group">
                <input class="form-control item" value="{{ old("email")}}"  autofocus type="email" name="email" id="loginEmail" placeholder="Email" required>
                @if($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control item" type="password" name="password" id="loginPassword" placeholder="Пароль" required>
                @if($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block login-btn" type="submit">Войти</button>
            </div>
        </form>
    </div>
@endsection
