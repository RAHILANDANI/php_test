<?php

class API_booked {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "student";
    public $conection = false;

    public function __construct()
    {
        $this->conection = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
    }



    public function fetchticket() {

        $sql = "SELECT * FROM booked_ticket";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }
    

    public function deleteticket($id) {
        
        $sql = "DELETE FROM booked_ticket WHERE id=$id";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>