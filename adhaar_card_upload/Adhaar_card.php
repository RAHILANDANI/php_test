<?php

class AdhaarCard {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "student";
    public $conection = false;

    public function __construct()
    {
        $this->conection = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
    }

    public function addUserPersonalDetail($name,$image) {

        $sql = "INSERT INTO user_detail (name,image) VALUES('$name','$image')";

        $res = mysqli_query($this->conection, $sql);

        return $res;
    }

    public function fetchSingleData($id) {

        $sql = "SELECT * FROM user_detail WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }
    
    

    public function deleteRecord($id) {
        
        $sql = "DELETE FROM user_detail WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>