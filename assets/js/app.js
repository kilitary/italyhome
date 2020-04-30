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

function gotoRestaurant() {
	$('#dialog-confirm').hide();
	if(restaurantUrl) {
		const goal = restaurantUrl.match(/https?:\/\/(.+)$/)[1];
		ym(62026936, 'reachGoal', goal);
		gtag('event', goal);
		document.location.href = restaurantUrl;
	}
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
						htmlCode += '<a href="#" class="popup-rests__item" id="href-rest" data-url="' + restaurantUrl + '" onclick="gotoRestaurant()">';
					} else {
						htmlCode += '<a href="' + restourant.menu + '" class="popup-rests__item" id="href-rest" target="_blank">';
					}

					$('.overlay').show();

				}
				htmlCode += '<div class="popup-rests__logo"><img src="/assets/img/logos/hitch.svg" alt="logo"></div>' +
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

$(function() {
	ymaps.ready(init);

	$('#popup__close-btn').click(function(e) {
		$('#dialog-confirm').hide();
	});

	$('.popup-rests__btn-close').click(function() {
		$('.overlay').hide();
		$('.popup-rests').fadeOut('slow');
	});

	var $addr = $('#addr');
	var val = $addr.val();

	$addr.autocomplete({
		appendTo: '.section-main__search',
		minLength: 2,
		select: function(event, ui) {
			doSearch(ui.item.value);
		},
		source: function(request, response) {
			var cty = city === 'spb' ? 'Санкт-Петербург' : 'Москва';
			val = 'Россия,г ' + cty + ', ' + $addr.val();
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
						query: val,
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