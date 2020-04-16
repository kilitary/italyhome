<?php
require('coordinates.php');
require('geo.php');

switch(@$_GET['action']) {
    case 'maps':
        echo json_encode($coordinates);
        break;
    case 'calc':
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];
        foreach($coordinates as $c) {

            if(Geo::pointInPolygon([$lat, $lng], $c['coords'])) {
                $data = [];
                $data['cost'] = $c['cost'];
                $data['url'] = $c['url'];

                if(isset($c['name'])) {
                    $msg = 'Ваш заказ будет доставлен из ресторана на ' . $c['name'];
                } else {
                    $msg = '';
                }

                if($c['cost'] > 0) {
                    $msg .= '.Доставка ' . $c['cost'];
                } elseif($c['cost'] == 0) {
                    $msg .= '.Доставка бесплатная';
                }
                
                if($c['min_sum'] > 0) {
                    $msg .= '.Минимальная сумма заказа ' . $c['min_sum'];
                }

                if($c['tel']) {
                    $msg .= 'Заказ можете сделать по телефону ' . $c['tel'];
                }

                $data['msg'] = $msg . '<br/><br/>';

                echo json_encode($data);
                exit;
            }
        }

        $data = [];
        $data['msg'] = "Введенный адрес находится за пределами зоны доставки, мы можем доставить и по этому адресу. Данный заказ необходимо сделать по телефону 8-800-550-79-31";
        echo json_encode($data);
        exit;
        break;
    default:
        echo file_get_contents('views/home.php');
        break;
}