<?php

    include 'api_config.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $api = new API_user();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        

        $res = $api->adduser($name,$age);

        if($res) {

            http_response_code(201);

            $status['status'] = "Student Record Inserted Successfully...";

            echo json_encode($status);
        } else {
            $status['status'] = "Student Record Insertion Failed...";

            echo json_encode($status);
        }

    } else {
        $status['status'] = "Only POST method is allowed.";

        echo json_encode($status);
    }
?>