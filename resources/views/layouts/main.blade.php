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
            <h1>Интернет-магазин CASUMI</h1>
            <div class="wrapper__header">
                <input class="search-input" type="search" placeholder="Поиск">
            </div>
            <div class="social-logoes">
                <a href=""><img class="social-logo" src="./assets/email.svg" alt="email"></a>
                <a href=""><img class="social-logo" src="./assets/telegram.svg" alt="telegram"></a>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container">
            <div class="nav-items">
                <div class="wrapper__nav-items">
                    <a href="" class="nav-item catalog-button">Каталог</a>
                    <a href="" class="nav-item">Спортивная одежда</a>
                    <a href="" class="nav-item">Инвентарь</a>
                    <a href="" class="nav-item">Питание</a>
                </div>
                <div class="nav-buttons">
                    <a href="" class="wrapper__button-logo"><img class="button-logo" src="./assets/profile.svg"
                                                                 alt="profile"></a>
                    <a href="" class="wrapper__button-logo"><img class="button-logo" src="./assets/favorities.svg"
                                                                 alt="profile"></a>
                    <a href="" class="wrapper__button-logo"><img class="button-logo" src="./assets/cart.svg"
                                                                 alt="profile"></a>
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
        <img class="footer-image" src="./assets/footer-bg.png" alt="footer-bg-image">
        <div class="container">
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
</footer>
</body>
</html>
