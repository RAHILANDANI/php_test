<?php

    include 'api_config.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $api = new API();

    if($_SERVER['REQUEST_METHOD'] == "PATCH" || $_SERVER['REQUEST_METHOD'] == "PUT") {

        parse_str(file_get_contents('php://input'),$_PATCH);

        $id = $_PATCH['id'];
        $name = $_PATCH['name'];
        $age = $_PATCH['age'];
        $foo = $_PATCH['from'];
        $too = $_PATCH['to'];

        $res = $api->updateBooking($name,$age,$foo,$too,$id);

        if($res) {
            $status['status'] = "Ticket updated Successfully...";

            echo json_encode($status);
        } else {
            $status['status'] = "Ticket Updation Failed...";

            echo json_encode($status);
        }

    } else {
        $status['status'] = "Only PATCH or PUT method is allowed.";

        echo json_encode($status);
    }
?>