<?php

    include 'category.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $category = new AdhaarCard();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $id = $_POST['id'];

        $result = $category->fetchSingleData($id);

        $record = mysqli_fetch_array($result);

        $path = 'uploads/' . $record['image'];

        if(unlink($path)) {

            $res = $category->deleteRecord($id);

            if($res) {
                $message['msg'] = "Category Deleted successfully...";
            } else {
                $message['msg'] = "Category Deleted failed...";
            }

            echo json_encode($message);
        }

    } else {
        $status['status'] = "Only POST method is allowed.";

        echo json_encode($status);
    }
?>