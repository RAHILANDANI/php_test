<?php

    include 'api_config.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $api = new API_user();

    if($_SERVER['REQUEST_METHOD'] == "PATCH" || $_SERVER['REQUEST_METHOD'] == "PUT") {

        parse_str(file_get_contents('php://input'),$_PATCH);

        $id = $_PATCH['id'];
        $name = $_PATCH['name'];
        $age = $_PATCH['age'];
       

        $res = $api->updateuser($name,$age,$id);

        if($res) {
            $status['status'] = "User updated Successfully...";

            echo json_encode($status);
        } else {
            $status['status'] = "User Updation Failed...";

            echo json_encode($status);
        }

    } else {
        $status['status'] = "Only PATCH or PUT method is allowed.";

        echo json_encode($status);
    }
?>