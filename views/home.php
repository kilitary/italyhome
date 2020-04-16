<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Italydomoy</title>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=7cedbefe-b532-46c0-bd05-3abdf86c0948&lang=ru_RU"
            type="text/javascript">
    </script>
    <script        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
    <LINK href="/assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/app.js"></script>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <a href="/" class="header__logo"><img src="./assets/img/logo.svg" alt="logo"></a>
        <div class="header__info">
            <div class="header__item"><img src="./assets/img/sum.svg" alt="sum">Доставка от 1000 Р</div>
            <div class="header__item"><img src="./assets/img/time.svg" alt="time">ПН-ВС: 12:00-23:30</div>
            <div class="header__item"><img src="./assets/img/phone.svg" alt="phone">8-800-550-79-31</div>
        </div>
    </header>
    <main>
        <section class="section-main">
            <h2 class="section-main__title">Проверьте возможность <br> доставки по вашему адресу</h2>
            <form class="section-main__search">
                <input type="text" id="addr" class="section-main__input search-input" placeholder="Введите адрес доставки ">
                <button type="submit" class="section-main__button search-button" onclick="doSearch('Россия, Санкт-Петербург '+$('#addr').val())">Проверить адрес
                </button>
            </form>
        </section>
        <section class="section-zone">
            <div class="section-zone__text-block">
                <h2 class="section-zone__title">Зоны доставки из ресторанов Italy</h2>
                <div class="section-zone__text">
                    Italy домой - доставка еды из ресторанов Italy в Санкт-Петербурге.
                    Традиционная итальянская пицца, домашняя паста, свежие салаты, ароматные супы и разнообразие горячих
                    блюд.
                    Так же вкусно как в Italy, только дома.
                </div>
            </div>
            <div class="section-zone__image">
                <img src="/assets/img/1stpet.jpg" alt="map">
                <div id="map" style="width:0px;height:0px"></div>
            </div>
        </section>
        <section class="section-cooking">
            <div class="section-cooking__container">
                <h2 class="section-cooking__title">Ресторан итальянской кухни Italy</h2>
                <div class="section-cooking__text">
                    ITALY GROUP - это вкусоцентричные заведения, где страсть к еде - главное правило, забота о гостях -
                    основа сервиса,
                    а кухня занимает центральное место в каждой концепции.
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__upper">
            <div class="footer__logos">
                <img src="/assets/img/italydomoy-logo.svg" alt="italydomoy">
                <img src="/assets/img/italy-logo.svg" alt="italy">
            </div>
            <div class="footer__addresses mobile-none">
                <h4 class="footer__heading">Адреса ресторанов</h4>
                <ul>
                    <li>СПб, пл. Чернышевского, 11</li>
                    <li>СПб, Большая Морская ул., 14</li>
                    <li>СПб, пр. Энгельса, 27</li>
                    <li>СПб, Виленский пер., 15</li>
                </ul>
            </div>
            <div class="footer__social">
                <h4 class="footer__heading mobile-none">Следите за нами</h4>
                <div class="footer__social-items">
                    <a href="https://www.facebook.com/italy.restaurants/" class="footer__social-item">
                        <svg width="9" height="20" viewBox="0 0 9 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.881 19.048H5.836V9.53H8.506L8.852 6.168H5.836V4.191C5.836 3.45 6.329 3.276 6.675 3.276H8.803V0.012L5.873 0C2.62 0 1.881 2.434 1.881 3.992V6.169H0V9.531H1.881V19.048Z"
                                fill="#FAF7F5"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/italy.restaurants" class="footer__social-item">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.042 0H5.958C2.673 0 0 2.708 0 6.038V14.231C0 17.561 2.673 20.27 5.958 20.27H14.042C17.327 20.27 20 17.56 20 14.231V6.038C20 2.708 17.327 0 14.042 0ZM17.988 14.231C17.988 16.44 16.221 18.231 14.042 18.231H5.958C3.778 18.231 2.012 16.44 2.012 14.231V6.038C2.012 3.829 3.779 2.038 5.958 2.038H14.042C16.222 2.038 17.988 3.829 17.988 6.038V14.231Z"
                                fill="#FAF7F5"/>
                            <path
                                d="M9.9999 4.89205C7.1479 4.89205 4.8269 7.24405 4.8269 10.135C4.8269 13.025 7.1469 15.378 9.9999 15.378C12.8519 15.378 15.1729 13.026 15.1729 10.135C15.1729 7.24405 12.8529 4.89205 9.9999 4.89205ZM9.9999 13.339C8.2539 13.339 6.8399 11.904 6.8399 10.135C6.8399 8.36505 8.2539 6.93105 9.9999 6.93105C11.7449 6.93105 13.1599 8.36605 13.1599 10.135C13.1599 11.905 11.7449 13.339 9.9999 13.339ZM15.1829 6.18805C15.8669 6.18805 16.4229 5.62505 16.4229 4.93205C16.4229 4.23805 15.8669 3.67505 15.1829 3.67505C14.4979 3.67505 13.9429 4.23805 13.9429 4.93205C13.9429 5.62505 14.4979 6.18805 15.1829 6.18805Z"
                                fill="#FAF7F5"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer__down mobile-none">
            <img src="/assets/img/cards.png" alt="visa mastercard">
        </div>
    </footer>
    <div class="popup" id="dialog-confirm" style="display: none;">
        <button class="popup__close-btn" id="popup__close-btn">
            <img src="/assets/img/close-btn.svg" alt="close">
        </button>
        <div class="popup__text">
        </div>
        <span id="msg">Мы доставим Ваш заказ из ресторана</span>
        <div id="a_div">
            <a href="#" class="popup__link-btn" id="href-rest" onclick="gotoRestaurant()">Посмотреть меню</a>
        </div>
    </div>
    <div class="overlay"></div>
</div>
</body>
</html>