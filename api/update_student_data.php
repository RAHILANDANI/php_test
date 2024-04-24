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
        $course = $_PATCH['course'];

        $res = $api->updateStudentData($name,$age,$course,$id);

        if($res) {
            $status['status'] = "Student Record Updated Successfully...";

            echo json_encode($status);
        } else {
            $status['status'] = "Student Record Updation Failed...";

            echo json_encode($status);
        }

    } else {
        $status['status'] = "Only PATCH or PUT method is allowed.";

        echo json_encode($status);
    }
?>