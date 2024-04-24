<?php

class Category {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "student";
    public $conection = false;

    public function __construct()
    {
        $this->conection = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
    }

    public function addNewCategory($name,$image) {

        $sql = "INSERT INTO category (name,image) VALUES('$name','$image')";

        $res = mysqli_query($this->conection, $sql);

        return $res;
    }

    public function fetchSingleData($id) {

        $sql = "SELECT * FROM category WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }
    
    // public function updateStudentData($name,$age,$course,$id) {

    //     $sql = "UPDATE detail_of_student SET name='$name',age=$age,course='$course' WHERE id=$id";

    //     $res = mysqli_query($this->conection,$sql);
        
    //     return $res;
    // }

    public function deleteRecord($id) {
        
        $sql = "DELETE FROM category WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>