<div class="registration-cssave">
    <ul>
        @foreach ($errors->all() as $massage)
            <li>
                {{$massage}}
            </li>
        @endforeach
    </ul>
    <form
    action="{{route('register') }}"
    method="post"
    novalidate>
    @csrf
        <h3 class="text-center">Регистрация</h3>
        <div class="form-group">
            <input class="form-control item" type="text" name="name" maxlength="15" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="username" placeholder="Имя пользователя" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password" minlength="6" id="password" placeholder="Пароль" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password_confirmation" minlength="6" id="password_confirmation" placeholder="Подтвердите пароль" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block create-account" type="submit">Зарегистрироваться</button>
        </div>
    </form>
</div>
