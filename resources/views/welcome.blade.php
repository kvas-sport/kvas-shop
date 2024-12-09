@extends('layouts.main')
@section('content')
    <section class="head-cintent">
        <div class="head-content-text">
            <h1>Спортивный интернет - магазин</h1>
            <p>Качественная спортивная одежда и инвентарь, которые помогут вам достичь новых высот в тренировках.</p>
        </div>

        <div class="head-content-image">
            <img src="{{asset('assets/glav-image.jpg')}}" alt="Спортивный магазин">
        </div>

    </section>
    <section id="catalog">
        <h2>Каталог</h2>
        <div class="catalog-slider">
            <div class="slider-track">
                <div class="slider-item">
                    <div class="card">
                        <figure>
                            <img src="{{ asset('assets/одежда.jpg') }}" alt="Спортивная одежда" style="max-width:100%; max-height:360px;">
                            <figcaption><h3>Одежда</h3></figcaption>
                        </figure>
                        <button class="button-details">Подробнее</button>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="card">
                        <figure>
                            <img src="{{ asset('assets/обувь.jpg') }}" alt="Спортивная обувь" style="max-width:100%; max-height:360px;">
                            <figcaption><h3>Обувь</h3></figcaption>
                        </figure>
                        <button class="button-details">Подробнее</button>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="card">
                        <figure>
                            <img src="{{ asset('assets/инвентарь.jpg') }}" alt="Спортивный инвентарь" style="max-width:100%; max-height:360px;">
                            <figcaption><h3>Инвентарь</h3></figcaption>
                        </figure>
                        <button class="button-details">Подробнее</button>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="card">
                        <figure>
                            <img src="{{ asset('assets/питание.jpg') }}" alt="Спортивное питание" style="max-width:100%; max-height:360px;">
                            <figcaption><h3>Питание</h3></figcaption>
                        </figure>
                        <button class="button-details">Подробнее</button>
                    </div>
                </div>
            </div>
            <div class="slider-pagination"></div>
        </div>
    </section>

    <section id="clothing-categories">
        <h2>Одежда</h2>
        <div class="category-grid">
            <div class="category-item">
                <img src="{{ asset('assets/Мужская.jpg') }}" alt="Категория 1" width="429" height="572.52">
                <h3>Мужская</h3>
                <button class="button-details">Подробнее</button>
            </div>
            <div class="category-item">
                <img src="{{ asset('assets/Женская.jpg') }}" alt="Категория 2" width="429" height="572.52">
                <h3>Женская</h3>
                <button class="button-details">Подробнее</button>
            </div>
            <div class="category-item">
                <img src="{{ asset('assets/Детская.jpg') }}" alt="Категория 3" width="429" height="572.52">
                <h3>Детская</h3>
                <button class="button-details">Подробнее</button>
            </div>
        </div>
    </section>

    <section id="reviews">
        <h2>Отзывы</h2>
        <div class="review-grid">
            <div class="review-item">
                <img src="{{ asset('assets/1.jpg') }}" alt="Отзыв 1" class="review-image">
                <div class="review-text">
                    <h3>Имя Фамилия</h3>
                    <p>Заказывал 8 мая, сегодня забрал с почты посылку 20 мая. Всё в наличии, всё целое. Спасибо за работу.
                        Александр .С. 40 лет.</p>
                </div>
                <a href="#" class="read-more">Читать ещё</a>
            </div>
            <div class="review-item">
                <img src="{{ asset('assets/2.jpg') }}" alt="Отзыв 2" class="review-image">
                <div class="review-text">
                    <h3>Имя Фамилия</h3>
                    <p>Заказывал 8 мая, сегодня забрал с почты посылку 20 мая. Всё в наличии, всё целое. Спасибо за работу.
                        Александр .С. 40 лет.</p>
                </div>
                <a href="#" class="read-more">Читать ещё</a>
            </div>
            <div class="review-item">
                <img src="{{ asset('assets/3.jpg') }}" alt="Отзыв 3" class="review-image">
                <div class="review-text">
                    <h3>Имя Фамилия</h3>
                    <p>Заказывал 8 мая, сегодня забрал с почты посылку 20 мая. Всё в наличии, всё целое. Спасибо за работу.
                        Александр .С. 40 лет.</p>
                </div>
                <a href="#" class="read-more">Читать ещё</a>
            </div>
        </div>
    </section>


    <section id="actions">
        <h2>Акции</h2>
        <div class="actions-slider">
            <div class="slider-track">
                <div class="action-item">
                    <div class="action-card">
                        <img src="{{ asset('assets/Коврик для йоги.jpg') }}" alt="Товар 1" width="330" height="360">
                        <h3>Коврик для йоги</h3>
                        <button class="action-details">Подробнее</button>
                    </div>
                </div>
                <div class="action-item">
                    <div class="action-card">
                        <img src="{{ asset('assets/orange.jpg') }}" alt="Товар 2" width="330" height="360">
                        <h3>Коврик для йоги</h3>
                        <button class="action-details">Подробнее</button>
                    </div>
                </div>
                <div class="action-item">
                    <div class="action-card">
                        <img src="{{ asset('assets/кроссовок.jpg') }}" alt="Товар 3" width="330" height="360">
                        <h3>Коврик для йоги</h3>
                        <button class="action-details">Подробнее</button>
                    </div>
                </div>
                <div class="action-item">
                    <div class="action-card">
                        <img src="{{ asset('assets/колесо.jpg') }}" alt="Товар 4" width="330" height="360">
                        <h3>Коврик для йоги</h3>
                        <button class="action-details">Подробнее</button>
                    </div>
                </div>
            </div>
            <div class="actions-pagination"></div>
        </div>
    </section>
@endsection
