<?php

require_once 'models/Model.php';

class Admin extends Model
{
    // using  username and password in Model
    function getAdminLogin($admin = [])
    {
        $conn = $this->db_connect();
        $username = $this->escapeParam($conn, $admin['username']);
        $password = md5($this->escapeParam($conn, $admin['password']));
        $conn = $this->db_connect();
        $querySelect = "SELECT * from admins where `username` = '{$username}' AND  `password` = '{$password}' LIMIT 1";
        $results = mysqli_query($conn, $querySelect);
        $adminArr = [];
        if (mysqli_num_rows($results) == 1) {
            $adminArr = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $adminArr = $adminArr[0];
        }
        $this->db_close($conn);
        return $adminArr;
    }

  
}
