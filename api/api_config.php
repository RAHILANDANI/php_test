<?php

class API {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "student";
    public $conection = false;

    public function __construct()
    {
        $this->conection = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
    }

    public function addStudentData($name,$age,$course) {

        $sql = "INSERT INTO detail_of_student (name,age,course) VALUES('$name',$age,'$course')";

        $res = mysqli_query($this->conection, $sql);

        return $res;
    }

    public function fetchAllStudentData() {

        $sql = "SELECT * FROM detail_of_student";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }
    
    public function updateStudentData($name,$age,$course,$id) {

        $sql = "UPDATE detail_of_student SET name='$name',age=$age,course='$course' WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);
        
        return $res;
    }

    public function deleteStudentRecord($id) {
        
        $sql = "DELETE FROM detail_of_student WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>