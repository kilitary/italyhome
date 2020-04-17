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
                    $msg = 'Ваш заказ будет доставлен из ресторана Italy на ' . $c['name'];
                } else {
                    $msg = '';
                }

                if($c['cost'] > 0) {
                    $msg .= '. Доставка ' . $c['cost'] . '₽';
                } elseif($c['cost'] == 0) {
                    $msg .= '. Доставка бесплатная ';
                }

                if(isset($c['working_hours'])) {
                    $msg .= '. Время работы ' . $c['working_hours'];
                }

                if($c['min_sum'] > 0) {
                    $msg .= '.<br/> Минимальная сумма заказа ' . $c['min_sum'] . '₽';
                }

                if(isset($c['tel'])) {
                    $msg .= '. <br/>Заказ можете сделать по телефону <a style="color:red" href="tel:' . $c['tel'] . '">' . $c['tel'] . '</a>';
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
        $data['msg'] = "Введенный адрес находится за пределами зоны доставки, мы можем доставить и по этому адресу. " .
            "<br/> Данный заказ необходимо сделать по телефону <a  style='color:red' href='tel:8-800-550-79-31'>8-800-550-79-31</a>";
        echo json_encode($data);
        exit;
        break;
    default:
        echo file_get_contents('views/home.php');
        break;
}