<?php

    include 'category.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $category = new AdhaarCard();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $name = $_POST['name'];
        $image = $_FILES['image'];

        $category_name = $image['name'];
        $categoryPath = $image['tmp_name'];

        $path = 'uploads/' . $category_name;

        if(move_uploaded_file($categoryPath,$path)) {

            $res = $category->addUserPersonalDetail($name,$category_name);

            if($res) {
                $message['msg'] = "Person Detail Inserted successfully...";
            } else {
                $message['msg'] = "Person Detail Insertion failed...";
            }

            echo json_encode($message);
        }

    } else {
        $status['status'] = "Only POST method is allowed.";

        echo json_encode($status);
    }
?>