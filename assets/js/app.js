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
					hintContent: 'Зона доставки на ' + el.name + ' за ' + el.cost + ' рублей.' + ' Минимальная сумма: ' + el.min_sum
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
		ym(62026936,'reachGoal', goal)
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

		$.get('/?action=calc&lat=' + coords[0] + '&lng=' + coords[1], function(data) {
			data = JSON.parse(data);

			$('#msg').html(data.msg);

			if(data.msg.indexOf('900') !== -1) {
				restaurantUrl = '';

				if(typeof data.menu != 'undefined') {
					$('#a_div').html('<a href="' + data.menu + '" class="popup__link-btn" id="href-rest" target="_blank">Посмотреть меню</a>');
				} else {
					$('#href-rest').remove();
				}
				$('#dialog-confirm').css('display', 'flex');
			} else {
				restaurantUrl = data.url;
				if(typeof $('#href-rest').html() == 'undefined') {
					if(typeof data.menu === 'undefined') {
						$('#a_div').html('<a href="#" class="popup__link-btn" id="href-rest" onclick="gotoRestaurant()">Посмотреть меню</a>');
					} else {
						$('#a_div').html('<a href="' + data.menu + '" class="popup__link-btn" id="href-rest" target="_blank">Посмотреть меню</a>');
					}
				}
				$('#dialog-confirm').css('display', 'flex');

			}

		});

	});
}

$(function() {
	ymaps.ready(init);

	$('#popup__close-btn').click(function(e) {
		$('#dialog-confirm').hide();
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
			val = 'Россия,г Санкт-петербург, ' + $addr.val();
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


	// Metrika
	$('.search-button').click(() => ym(62026936,'reachGoal','check_address'));
	$('.phone-goal').click(() => ym(62026936,'reachGoal','header_phone'));
	
});