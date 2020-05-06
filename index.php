<?php
require('coordinates.php');
require('geo.php');
require('vendor/autoload.php');

use GeoIp2\Database\Reader;

$reader = new Reader('/usr/share/GeoIP/GeoLite2-City.mmdb');
$record = $reader->city($_SERVER['REMOTE_ADDR']);
$city = $record->city->name === 'St Petersburg' ? 'spb' : 'msk';

switch(@$_GET['action']) {
    case 'maps':
        echo json_encode($coordinates);
        break;
    case 'calc':
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];
        $city = $_GET['city'];
        foreach($coordinates as $c) {

            if(Geo::pointInPolygon([$lat, $lng], $c['coords'])) {
                if($city !== $c['city']) {
                    continue;
                }
                $data = [];
                $data['cost'] = $c['cost'];
                $data['url'] = $c['url'];

                if(isset($c['name'])) {
                    $msg = 'Ваш заказ будет доставлен из ресторана Italy на ' . $c['name'];
                } else {
                    $msg = '';
                }

                if($c['cost'] > 0) {
                    $msg .= '. Доставка ' . $c['cost'] . ' руб';
                } elseif($c['cost'] == 0) {
                    $msg .= '. Доставка бесплатная';
                }

                if(isset($c['working_hours'])) {
                    $msg .= '. Время работы ' . $c['working_hours'];
                }

                if($c['min_sum'] > 0) {
                    $msg .= '.<br/> Минимальная сумма заказа ' . $c['min_sum'] . ' руб';
                }

                if(isset($c['tel'])) {
                    $msg .= '. <br/>Заказ можете сделать по телефону <br/><a style="color:red" href="tel:' . $c['tel'] . '">' . $c['tel'] . '</a>';
                }

                if(isset($c['menu'])) {
                    $data['menu'] = $c['menu'];
                }
                $data['msg'] = $msg . '<br/><br/>';

                echo json_encode($data);
                exit;
            }
        }

        $data = [];
        $data['msg'] = "Данный адрес не входит в зону Доставки.<br/> Пожалуйста, свяжитесь с нами по телефону " .
            "<br/><a  style='color:red' href='tel:8-812-900-23-33'>8 (812) 900-23-33</a><br/><br/><br/>";
        echo json_encode($data);
        exit;
        break;
    default:
        include('views/home.php');
        break;
}