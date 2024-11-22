@extends('layouts.main')
@section('content')
    <div class="registration">
        <div class="switcher">
            <a href="{{route('login')}}" class="btn btn-primary switch-form" data-switch="login">Вход</a>
        </div>

        <form
            action="{{route('register') }}"
            method="post"
            class="registerForm" id="registerForm"
        >
            @csrf
            <h3 class="text-center">Регистрация</h3>
            <div class="form-group">
                <input class="form-control item" value="{{ old("name")}}" type="text" name="name" maxlength="15"
                       minlength="4" autofocus pattern="^[a-zA-Z0-9_.-]*$" id="username" placeholder="Имя пользователя"
                       required>
                @error('name')
                <span class="error">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control item" value="{{ old("email")}}" type="email" name="email" id="email"
                       placeholder="Email" required
                @error('email')
                <span class="error">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control item" type="password" name="password" minlength="8" id="password"
                       placeholder="Пароль" required>
                @error('password')
                <span class="error">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control item" type="password" name="password_confirmation" minlength="8"
                       id="password_confirmation" placeholder="Подтвердите пароль" required>
                @error('password_confirmation')
                <span class="error">
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block create-account" type="submit">Зарегистрироваться</button>
            </div>
        </form>

        <form id="loginForm" style="display: none;">
            @csrf
            <h3 class="text-center">Вход в аккаунт</h3>
            <div class="form-group">
                <input class="form-control item" type="email" name="email" id="loginEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input class="form-control item" type="password" name="password" id="loginPassword" placeholder="Пароль"
                       required>
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
