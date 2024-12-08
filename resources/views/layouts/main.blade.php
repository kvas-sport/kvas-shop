<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Gothic+A1&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header-content">
            <h1><a href="/">Интернет-магазин CASUMI</a></h1>
            <div class="wrapper__header">
                <div class="wrapper__search-input"><input class="search-input" type="text" placeholder="Поиск"></div>
            </div>
            <div class="social-logoes">
                <a href=""><img class="social-logo" src="{{ asset('assets/email.svg') }}" alt="email"></a>
                <a href=""><img class="social-logo" src={{ asset("assets/telegram.svg") }} alt="telegram"></a>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container">
            <div class="nav-items">
                <div class="wrapper__nav-items">
                    <a href="{{ route('products.index') }}" class="nav-item catalog-button">Каталог</a>
                    <a href="{{ route('products.index') }}" class="nav-item">Спортивная одежда</a>
                    <a href="{{ route('products.categoryList', 4) }}" class="nav-item">Инвентарь</a>
                    <a href="{{ route('products.categoryList', 5) }}" class="nav-item">Питание</a>
                </div>
                <div class="nav-buttons">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                            <a href="/admin" class="wrapper__button-logo"><img class="button-logo" src={{ asset("assets/settings.png") }}
                                                                     alt="profile"></a>
                        @endif
                        <a href="{{ route('users.profile') }}" class="wrapper__button-logo"><img class="button-logo" src={{ asset("assets/profile.svg") }}
                                                                     alt="profile"></a>
                        <a href="{{ route('favorites.index') }}" class="wrapper__button-logo"><img class="button-logo" src={{ asset("assets/favorities.svg") }}
                                                                     alt="profile"></a>
                        <a href="/cart" class="wrapper__button-logo"><img class="button-logo" src={{ asset("assets/cart.svg") }}
                                                                     alt="profile"></a>
                    @else
                    <a href="/login" class="wrapper__button-logo"><img class="button-logo" src={{ asset("assets/entries.png") }}
                                                                 alt="profile"></a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
<footer>
    <div class="subscribe-block">
        <div class="wrapper__subscribe-block">
            <img class="footer-image" src={{ asset("assets/footer-bg.png") }} alt="footer-bg-image">
            <div class="footer-input-block">
                <div>
                    <h2>Подпишись на нашу рассылку</h2>
                    <input type="email" placeholder="Email">
                </div>
                <div>
                    <p>Подписывайся на рассылку и получай уведомления на акции</p>
                    <button>Подписаться</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-nav">
            <div class="footer-nav-items">
                <div class="footer-nav-item footer-nav-logo-block">
                    <h3>Интернет-магазин CASUMI</h3>
                    <ul>
                        <li>Магазин спортивной одежды, инвентаря, питания с доставкой по всей стране</li>
                    </ul>
                </div>
                <div class="footer-nav-item">
                    <h4>Категории</h4>
                    <ul>
                        <li><a href="">Спортивная одежда</a></li>
                        <li><a href="">Питание</a></li>
                        <li><a href="{{ route('products.categoryList', 4) }}">Инвентарь</a></li>
                    </ul>
                </div>
                <div class="footer-nav-item">
                    <h4>Как оформить заказ</h4>
                    <ul>
                        <li><a href="">Оплата</a></li>
                        <li><a href="">Доставка</a></li>
                        <li><a href="">Возврат</a></li>
                        <li><a href="">Отзывы</a></li>
                        <li><a href="">Скидки</a></li>
                    </ul>
                </div>
                <div class="footer-nav-item footer-nav-contact-block">
                    <h4>Контакты</h4>
                    <ul>
                        <li><a href="">7 (567) 439-82-34</a></li>
                        <li><a href="">E-mail: rumassa13@gmail.com</a></li>
                        <li><a href="">Telegram: @consultant_rumassa (составление курсов и т.д.)</a></li>
                        <li><a href="">Telegram: @Rumassa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="wrapper__footer-bottom">
                <span>ⓒ copywriting 2022</span>
                <span>Политика конфиденциальности</span>
            </div>
        </div>
    </div>
    @yield('scripts')
</footer>
</body>
</html>
