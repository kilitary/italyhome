<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ДОСТАВКА ИЗ РЕСТОРАНОВ ITALY GROUP</title>
    <link href="/assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css?1">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
		(function(m, e, t, r, i, k, a) {
			m[i] = m[i] || function() {
				(m[i].a = m[i].a || []).push(arguments);
			};
			m[i].l = 1 * new Date();
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a);
		})
		(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

		ym(62026936, 'init', {
			clickmap: true,
			trackLinks: true,
			accurateTrackBounce: true
		});
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/62026936" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WV2742T');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV2742T"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
    <header class="header">
        <a href="/" class="header__logo"><img src="/assets/img/logo.svg" alt="logo"></a>
        <div class="header__info">
            <div class="header__item mobile-none"><img src="/assets/img/sum.svg" alt="sum">Доставка от 900₽</div>
            <div class="header__item mobile-none"><img src="/assets/img/time.svg" alt="time">ПН-ВС: 10:00-22:30</div>
            <a href="tel:+78129002333" class="header__item phone-goal"><img src="/assets/img/phone.svg" alt="phone"><span><?php if($city === 'spb') echo '+7 (812) 900-23-33'; else echo '+7 (800) 550-79-31'?></span></a>
        </div>
    </header>
    <main>
        <section class="section-main">
            <h2 class="section-main__title">ДОСТАВКА ИЗ РЕСТОРАНОВ ITALY GROUP</h2>
            <h2 class="section-main__title">Проверьте возможность <br> доставки по вашему адресу</h2>
            <!--
            Кнопки переключения города  -->
            <div class="section-main__choice">
                <button class="section-main__city-item <?php if($city === 'spb') echo 'active' ?>" data-id="spb">Санкт-Петербург</button>
                |
                <button class="section-main__city-item <?php if($city === 'msk') echo 'active' ?>" data-id="msk">Москва</button>
            </div>
            <form class="section-main__search">
                <input type="text" id="addr" class="section-main__input search-input" placeholder="Введите адрес доставки ">
                <button type="submit" class="section-main__button search-button" onclick="searchButton()">Проверить адрес
                </button>
            </form>
        </section>
        <section class="section-zone">
            <div class="section-zone__text-block">
                <h2 class="section-zone__title">Зоны доставки из ресторанов ITALY GROUP.</h2>
                <div class="section-zone__text">
                    Доставка еды из ресторанов в Санкт-Петербурге. Традиционная итальянская пицца Italy, грузинская кухня Чеми, стейки и бургеры от HITCH,
                    бельгийская классика BRUXX - так же вкусно как в ресторане, только дома!
                </div>
            </div>
            <div class="section-zone__image mobile-none">
                <img src="/assets/img/1stpet.jpg" alt="map">
                <div id="map" style="width:0px;height:0px"></div>
            </div>
        </section>
        <section class="section-cooking mobile-none">
            <video class="section-cooking__video" loop autoplay muted>
                <source src="/assets/img/italy-cooking.mp4" type="video/mp4">
            </video>
            <div class="section-cooking__container">
                <h2 class="section-cooking__title">Ресторан итальянской кухни Italy</h2>
                <div class="section-cooking__text">
                    ITALY GROUP - это вкусоцентричные заведения, где страсть к еде - главное правило, забота о гостях - основа сервиса,
                    а кухня занимает центральное место в каждой концепции.
                </div>
            </div>
        </section>
        <section class="section-chiefs">
            <div class="section-chiefs__container">
                <h2 class="section-chiefs__title">Повара ресторанов</h2>
                <div class="section-chiefs__slider-controls-top mobile-none">
                    <button class="slider__prev">
                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17L1 9L9 1" stroke="#F21200"/>
                        </svg>
                    </button>
                    <button class="slider__next">
                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L9 9L1 17" stroke="#F21200"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="section-chiefs__slider slider">
                <div class="slider__item">
                    <div class="slider__container">
                        <div class="slider__img">
                            <img src="/assets/img/chiefs/chief1.png" alt="chief"/>
                        </div>
                        <div class="slider__title">Бренд-шеф ресторанов Italy</div>
                        <div class="slider__name">Евгений Энгельке</div>
                        <div class="slider__text mobile-none">
                            Евгений Энгельке — человек, который отвечает за качество и вкус во всей
                            сети ресторанов Italy. Наш бренд-шеф. Благодаря ему мы каждый день кормим сотни довольных гостей
                            и доставляем вам домой блюда,
                            приготовленные по классическим итальянским рецептам.
                        </div>
                    </div>
                </div>
                <div class="slider__item">
                    <div class="slider__container">
                        <div class="slider__img">
                            <img src="/assets/img/chiefs/chief2.png" alt="chief"/>
                        </div>
                        <div class="slider__title">Шеф Italy на Б. Грузинской</div>
                        <div class="slider__name">Андрей Полещук</div>
                        <div class="slider__text mobile-none">
                            Андрей Полещук много лет жил в Неаполе,
                            где познал тонкости приготовления традиционных для региона блюд.
                            Отношение итальянцев к еде и гастрономии покорило его.
                            А теперь сам Андрей покоряет Москву своим отношением к кухне и гостям
                            ресторана Italy на Большой Грузинской.
                        </div>
                    </div>
                </div>
                <div class="slider__item">
                    <div class="slider__container">
                        <div class="slider__img">
                            <img src="/assets/img/chiefs/chief3.png" alt="chief"/>
                        </div>
                        <div class="slider__title">Шеф Italy на Большом</div>
                        <div class="slider__name">Денис Соколов</div>
                        <div class="slider__text mobile-none">
                            Денис Соколов — один из тех, кому можно доверять.
                            Летом он открывал первый ресторан Italy в Москве,
                            теперь заведует кухней в облюбленном жителями Петроградки Italy на Большом.
                            Благодаря ему, порадовать себя вкусом и изобилием итальянской кухни можно и дома.
                        </div>
                    </div>
                </div>
                <div class="slider__item">
                    <div class="slider__container">
                        <div class="slider__img">
                            <img src="/assets/img/chiefs/chief4.png" alt="chief"/>
                        </div>
                        <div class="slider__title">Шеф Italy на Энгельса</div>
                        <div class="slider__name">Евгений Бахронов</div>
                        <div class="slider__text mobile-none">
                            Для Евгения Бахронова приготовление еды не просто работа,
                            а любимое занятие с самого детства. Будучи потомственным поваром,
                            Женя и команда Italy на Энгельса смогли сделать ресторан местом для встреч по разным,
                            но всегда радостным поводам. Благодаря ему, север города приобрел средиземноморский колорит,
                            и его жители могут насладиться истинным вкусом Италии в ресторане или у себя дома.
                        </div>
                    </div>
                </div>
                <div class="slider__item">
                    <div class="slider__container">
                        <div class="slider__img">
                            <img src="/assets/img/chiefs/chief5.png" alt="chief"/>
                        </div>
                        <div class="slider__title">Шеф Italy на Большой Морской</div>
                        <div class="slider__name">Дмитрий Андреенко</div>
                        <div class="slider__text mobile-none">
                            Работает в команде Italy более 5 лет.
                            Сначала был поваром в ресторане на Петроградской стороне,
                            потом стал су-шефом, сейчас работает шеф-поваром самого «центрального» ресторана
                            Italy на Большой Морской. Дмитрий — настоящий фанат пасты,
                            его любимая — арабьята, с томатным и острым соусом и чесноком.
                        </div>
                    </div>
                </div>
                <div class="slider__item">
                    <div class="slider__container">
                        <div class="slider__img">
                            <img src="/assets/img/chiefs/chief6.png" alt="chief"/>
                        </div>
                        <div class="slider__title">Шеф Italy на Виленском</div>
                        <div class="slider__name">Сергей Терехов</div>
                        <div class="slider__text mobile-none">
                            Сергей Терехов — настоящий знаток итальянской кухни.
                            Еще до того, как прийти в команду Italy,
                            работал в ведущих итальянских ресторанах города.
                            В 2019 году назначен шеф-поваром нового Italу в Виленском переулке
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-chiefs__slider-controls-bottom">
                <button class="slider__prev">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17L1 9L9 1" stroke="#F21200"/>
                    </svg>
                </button>
                <button class="slider__next">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L1 17" stroke="#F21200"/>
                    </svg>
                </button>
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
    <div class="popup-rests">
        <div class="popup-rests__title">По Вашему адресу доступна доставка из ресторанов:</div>
        <div class="popup-rests__btn-close"><img src="/assets/img/close-btn.svg" alt="close"></div>
        <div class="popup-rests__container">
            <a href="#" class="popup-rests__item">
                <div class="popup-rests__logo"><img src="/assets/img/logos/hitch.svg" alt="logo"></div>
                <div class="popup-rests__delivery-text">Бесплатная доставка от 900 ₽</div>
                <button type="button" class="popup-rests__btn">Посмотреть меню</button>
            </a>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=7cedbefe-b532-46c0-bd05-3abdf86c0948&lang=ru_RU"
        type="text/javascript">
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	var city = '<?php echo $city?>';
</script>
<script src="assets/js/app.js"></script>
</body>
</html>