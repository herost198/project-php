<?php
require_once 'configs/conf.php';

class Model
{
    function db_connect()
    {
        global $conf;
        $conn = mysqli_connect($conf["host"], $conf["user"], $conf["password"], $conf["db"]) or die("Cannot connect to db: " . mysqli_connect_error());
        mysqli_set_charset($conn, "utf8");

        return $conn;
    }
    
    function db_close($conn)
    {
        mysqli_close($conn);
    }

    function db_query($conn, $query)
    {
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error execute query: " . mysqli_error($conn));
        }

        return $result;
    }

    function escapeParam($conn, $key)
    {
        return mysqli_real_escape_string($conn,$key);
    }

   
}
