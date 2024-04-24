<?php

class API {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "ticket";
    public $conection = false;

    public function __construct()
    {
        $this->conection = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
    }

    public function addBooking($name,$age,$foo,$too) {

        $sql = "INSERT INTO railwayy (name,age,from,to) VALUES('$name',$age,'$foo','$too')";

        $res = mysqli_query($this->conection, $sql);

        return $res;
    }

    public function fetchAllBooking() {

        $sql = "SELECT * FROM railway";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }
    
    public function updateBooking($name,$age,$foo,$too,$id) {

        $sql = "UPDATE railwayy SET name='$name',age=$age,from='$foo',to='$too' WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);
        
        return $res;
    }

    public function deleteBooking($id) {
        
        $sql = "DELETE FROM railwayy WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>