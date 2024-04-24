<?php

class API_user {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "student";
    public $conection = false;

    public function __construct()
    {
        $this->conection = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
    }

    public function adduser($name,$age) {

        $sql = "INSERT INTO user (name,age) VALUES('$name',$age)";

        $res = mysqli_query($this->conection, $sql);

        return $res;
    }

    public function fetchAllUser() {

        $sql = "SELECT * FROM user";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }
    
    public function updateuser($name,$age,$id) {

        $sql = "UPDATE user SET name='$name',age=$age, WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);
        
        return $res;
    }

    public function deleteuser($id) {
        
        $sql = "DELETE FROM user WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>