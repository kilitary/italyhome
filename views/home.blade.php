<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Italydomoy</title>
    <link rel="stylesheet" href="assets/css/main.css">

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=7cedbefe-b532-46c0-bd05-3abdf86c0948&lang=ru_RU"
            type="text/javascript">
    </script>
    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
    <LINK href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
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
                <input type="text" id="addr" class="section-main__input search-input"
                       placeholder="Введите адрес доставки ">
                <button type="submit" class="section-main__button search-button" onclick="doSearch('Россия, Санкт-Петербург '+$('#addr').val())">Проверить адрес</button>
            </form>
        </section>
        <section class="section-zone">
            <div class="section-zone__text-block">
                <h2 class="section-zone__title">Зоны доставки из ресторанов Italy</h2>
                <div class="section-zone__text">
                    Italy домой - доставка еды из ресторанов Italy в Санкт-Петербурге и Москве.
                    Традиционная итальянская пицца, домашняя паста, свежие салаты, ароматные супы и разнообразие горячих
                    блюд.
                    Так же вкусно как в Italy, только дома.
                </div>
            </div>
            <div id="map" style="width:50%;height:90%"></div>
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
        <div class="footer-upper">
            <div class="footer__logos"></div>
            <div class="footer__addresses">
                <!--                <h4 class="footer__heading">Адреса ресторанов</h4>-->
            </div>
        </div>
    </footer>
    <div class="popup" id="dialog-confirm" style="display: flex;display: none">
        <button class="popup__close-btn" id="popup__close-btn">
            <img src="./assets/img//close-btn.svg" alt="close">
        </button>
        <div class="popup__text">

            <a href="#" class="popup__link">Italy на Энгельса</a>
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