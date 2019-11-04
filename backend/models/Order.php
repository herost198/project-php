<?php
require_once 'models/Model.php';

class Order extends Model
{ 
    public function getAllOrder(){
        $conn = $this->db_connect();
    }

}
