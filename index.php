<?php
require('restaurants.php');
require('geo.php');
require('vendor/autoload.php');

// TODO: turn on this code before deploy
//use GeoIp2\Database\Reader;
//
//$reader = new Reader('/usr/share/GeoIP/GeoLite2-City.mmdb');
//$record = $reader->city($_SERVER['REMOTE_ADDR']);
//$city = $record->city->name === 'St Petersburg' ? 'spb' : 'msk';
if(isset($_GET['city'])) {
    $city = $_GET['city'];
} else {
    $city = 'spb';
}
$rests = [];
switch(@$_GET['action']) {
    case 'maps':
        echo json_encode($restaurants);
        break;
    case 'calc':
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];
        $city = $_GET['city'];
        $index = 0;

        foreach($restaurants as $c) {
            $index++;
            if(Geo::pointInPolygon([$lat, $lng], $c['coords'])) {
                if($city !== $c['city']) {
                    continue;
                }
                $data = [];
                $data['cost'] = $c['cost'];
                $data['url'] = $c['url'];
                $data['name'] = $c['name'];
                $data['id'] = $index;
                if(empty($c['logo'])) {
                    $data['logo'] = 'def.svg';
                } else {
                    $data['logo'] = $c['logo'];
                }

                if(isset($c['name'])) {
//                    $msg = 'Ваш заказ будет доставлен из ресторана Italy на ' . $c['name'];
                    $msg = '<b>' . $c['name'] . '</b><br/><br/>';
                } else {
                    $msg = '';
                }

                if($c['cost'] > 0) {
                    $msg .= ' Доставка ' . $c['cost'] . ' руб';
                } elseif($c['cost'] == 0) {
                    $msg .= ' Доставка бесплатная';
                }

                if(isset($c['working_hours'])) {
                    $msg .= ' Время работы ' . $c['working_hours'];
                }

                if(isset($c['delivery_time'])) {
                    $msg .= ' Время доставки ' . $c['delivery_time'] . ' мин.';
                }

                if($c['min_sum'] > 0) {
                    $msg .= '<br/> Минимальная сумма заказа ' . $c['min_sum'] . ' руб';
                }

                if(isset($c['tel'])) {
                    $msg .= ' <br/>Заказ можете сделать по телефону <br/><div></div><a style="color:red" href="tel:' . $c['tel'] . '">' . $c['tel'] . '</a>';
                }

                if(isset($c['menu'])) {
                    $data['menu'] = $c['menu'];
                }
                $data['msg'] = $msg . '<br/><br/>';
                $rests[] = $data;
            }
        }

        if(!count($rests)) {
            $data = [];
            $data['msg'] = "<div style='text-align: center'>Данный адрес не входит в зону Доставки.<br/> Пожалуйста, свяжитесь с нами по телефону " .
                "<br/>";
            if($city == 'spb')
                $data['msg'] .= "<a  style='color:red' href='tel:8-812-900-23-33'>8 (812) 900-23-33</a></div>";
            else
                $data['msg'] .= "<a  style='color:red' href='tel:8-800-550-79-31'>8 (800) 550-79-31</a></div>";
            $data['error'] = true;
            echo json_encode($data);
        } else {
            echo json_encode($rests);
        }
        break;
    case 'zones':
        $rests = [];

        foreach($restaurants as $r) {
            if(isset($r['skip_on_main']) && $r['skip_on_main']) {
                continue;
            }
            $rests[$r['key']][] = [
                'name' => $r['globalname'],
                'logo' => isset($r['logo']) ? $r['logo'] : 'def.png',
                'coords' => $r['coords'],
                'cost' => isset($r['cost']) ? $r['cost'] : 0,
                'min_sum' => isset($r['min_sum']) ? $r['min_sum'] : 0,
                'delivery_time' => isset($r['delivery_time']) ? $r['delivery_time'] : 0,
                'city' => $r['city']
            ];
        }
        $zones = $rests[$_GET['name']];
        echo json_encode($zones);
        break;
    default:
        $rests = [];
        $restaurants = collect($restaurants)->sortBy('sort')->toArray();
        //dd($restaurants);
        foreach($restaurants as $r) {
            if(isset($r['skip_on_main']) && $r['skip_on_main']) {
                continue;
            }
            $rests[$r['key']] = [
                'key' => $r['key'],
                'name' => $r['globalname'],
                'logo' => isset($r['logo']) ? $r['logo'] : 'def.png',
                'city' => $r['city']
            ];
        }
        include('views/home.php');
        break;
}