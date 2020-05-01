var myMap;
var restaurantUrl;

function init() {
	// Создание карты.
	myMap = new ymaps.Map('map', {
		center: [59.939095, 30.315868],
		zoom: 10
	});
	$.get('/?action=maps', function(zones) {
		zones = JSON.parse(zones);
		var regionsNumber = 0;
		$.each(zones, $.proxy(function(i, el) {
			$.each(el.coords, $.proxy(function(j, region) {
				var r = region[0];
				region[0] = region[1];
				region[1] = r;

				regionsNumber++;

				el.coords[j] = region;
			}, this));

			var myPolygon = new ymaps.Polygon(
				[el.coords],
				{
					hintContent: 'Зона доставки на ' + el.name + ' за ' + el.cost + ' рублей.' + ' Минимальная сумма: ' + el.min_sum + ' Время доставки: ' + el.delivery_time
				},
				{
					fillColor: el.color,
					fillOpacity: 0.6,
					strokeColor: el.color,
					strokeWidth: 0,
					strokeOpacity: 1
				}
			);
			myMap.geoObjects.add(myPolygon);
		}));
	});
}

function gotoRestaurant(obj) {
	$('#dialog-confirm').hide();
	let url = $(obj).data('url');
	const goal = restaurantUrl.match(/https?:\/\/(.+)$/)[1];
	ym(62026936, 'reachGoal', goal);
	gtag('event', goal);
	document.location.href = url;
}

function searchButton(e) {
	var e = window.event;
	e.preventDefault();
	doSearch('Санкт-петербург, ' + $('#addr').val());
}

function doSearch(value) {
	ymaps.geocode(value).then(function(result) {
		var coords = result.geoObjects.properties._data.metaDataProperty.GeocoderResponseMetaData.Point.coordinates;
		myMap.geoObjects.add(result.geoObjects.get(0));
		city = $('.active').data('id');
		let htmlCode = '';
		$.get('/?action=calc&city=' + city + '&lat=' + coords[0] + '&lng=' + coords[1], function(res) {
			res = JSON.parse(res);

			if(!res.length) {
				htmlCode = res.msg;
			} else {
				cookie('addr', value);
			}

			for(var i = 0; i < res.length; i++) {
				var restourant = res[i];
				console.log('rest', restourant);

				let msg = restourant.msg;

				if(restourant.msg.indexOf('900') !== -1) {
					restaurantUrl = '';

					if(typeof restourant.menu != 'undefined') {
						htmlCode += '<a href="' + restourant.menu + '" class="popup-rests__item" id="href-rest" target="_blank">';
					} else {
						$('#href-rest').remove();
					}

					$('.overlay').show();
				} else {
					restaurantUrl = restourant.url;
					if(typeof restourant.menu === 'undefined') {
						htmlCode += '<a href="#" class="popup-rests__item" id="href-rest" data-url="' + restaurantUrl + '" onclick="gotoRestaurant(this)">';
					} else {
						htmlCode += '<a href="' + restourant.menu + '" class="popup-rests__item" id="href-rest" target="_blank">';
					}

					$('.overlay').show();

				}
				htmlCode += '<div class="popup-rests__logo"><img src="/assets/img/logos/' + restourant.logo + '" alt="logo"></div>' +
					'              <div class="popup-rests__delivery-text">' + msg + '</div>' +
					'              <button type="button" class="popup-rests__btn">Посмотреть меню</button>' +
					'            </a>';
			}
			console.log('html', htmlCode);

			$('.popup-rests__container').html(htmlCode);
			$('.popup-rests').fadeIn('slow');
		});

	});
}

function accessCookie(cookieName) {
	var name = cookieName + '=';
	var allCookieArray = document.cookie.split(';');
	for(var i = 0; i < allCookieArray.length; i++) {
		var temp = allCookieArray[i].trim();
		if(temp.indexOf(name) == 0)
			return temp.substring(name.length, temp.length);
	}
	return '';
}

function cookie(cookieName, cookieValue) {
	if(typeof cookieValue === 'undefined') {
		return accessCookie(cookieName);
	}

	daysToExpire = 7;
	var date = new Date();
	date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
	document.cookie = cookieName + '=' + cookieValue + '; expires=' + date.toGMTString();
}

$(function() {
	ymaps.ready(init);

	var $addr = $('#addr');
	var cityValue = $addr.val();

	if(cityValue.length > 0) {
		$('#addr').val(cityValue);
	}

	$('#popup__close-btn').click(function(e) {
		$('#dialog-confirm').hide();
	});

	$('.popup-rests__btn-close').click(function() {
		$('.overlay').hide();
		$('.popup-rests').fadeOut('slow');
	});

	$addr.autocomplete({
		appendTo: '.section-main__search',
		minLength: 2,
		select: function(event, ui) {
			doSearch(ui.item.value);
		},
		source: function(request, response) {
			var cty = city === 'spb' ? 'Санкт-Петербург' : 'Москва';
			cityValue = 'Россия,г ' + cty + ', ' + $addr.val();
			$.ajax({
				method: 'POST',
				url: 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json',
					'Authorization': 'Token c09bee2729e6b180d922bfdb9e396d66baac6148'
				},
				dataType: 'json',
				data:
					JSON.stringify({
						query: cityValue,
						count: 5
					})
				,
				success: function(data) {
					response(data.suggestions);
				}
			});
		}
	});

	// Metrika и gtag
	$('.search-button').click(() => {
		ym(62026936, 'reachGoal', 'check_address');
		gtag('event', 'check_address');
	});
	$('.phone-goal').click(() => {
		ym(62026936, 'reachGoal', 'header_phone');
		gtag('event', 'header_phone');
	});

	//slick slider
	$('.slider').slick({
		infinite: true,
		speed: 500,
		touchMove: true,
		arrows: true,
		centerMode: true,
		centerPadding: '190px',
		slidesToShow: 1,
		prevArrow: $('.slider__prev'),
		nextArrow: $('.slider__next'),
		responsive: [
			{
				breakpoint: 1550,
				settings: {
					centerPadding: '150px'
				}
			},
			{
				breakpoint: 1450,
				settings: {
					centerPadding: '100px'
				}
			},
			{
				breakpoint: 1320,
				settings: {
					centerPadding: '50px'
				}
			},
			{
				breakpoint: 756,
				settings: {
					centerPadding: '0'
				}
			}
		]
	});

	//switch city
	$('.section-main__city-item').on('click', function() {
		$('.section-main__city-item').removeClass('active');
		$(this).addClass('active');
		city = $(this).data('id');
	});

});