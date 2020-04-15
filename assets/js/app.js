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
            // Reverse coordinates
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
    document.location.href = restaurantUrl;
}

function doSearch(value) {
    val = value;
    var myGeocoder = ymaps.geocode(val);
    myGeocoder.then(function(res) {
        var coords = res.geoObjects.properties._data.metaDataProperty.GeocoderResponseMetaData.Point.coordinates;
        myMap.geoObjects.add(res.geoObjects.get(0));

        $.get('/?action=calc&lat=' + coords[0] + '&lng=' + coords[1], function(data) {
            //`console.log('DATA', data);
            data = JSON.parse(data);

            $('#msg').html(data.msg);

            $('#href-rest').attr('href', data.url);

            if(data.msg.indexOf('550') !== -1) {

                restaurantUrl = '';
                $('#href-rest').remove();
                $('#dialog-confirm').show();
            } else {
                $('#a_div').append('<a href="#" class="popup__link-btn" id="href-rest" onclick="gotoRestaurant()">Посмотреть меню</a>');
                $('#dialog-confirm').show();
                restaurantUrl = data.url;

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
        minLength: 2,
        select: function(event, ui) {
            doSearch(ui.item.value);
        },
        source: function(request, response) {

            val = 'Россия,г Санкт-петербург, ' + $('#addr').val();
            $.ajax({
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
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
});