<?php

// require_once __DIR__ . '/../models/Model.php';
require_once 'Model.php';
class Category extends Model
{
    
    function getAllCategory()
    {
        $conn = $this->db_connect();
        $querySelect = "SELECT * from categories";

        $results = $this->db_query($conn, $querySelect);
        $categories = [];
        if (mysqli_num_rows($results) > 0) {
            $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->db_close($conn);
        return $categories;
    }
    function insert($category = [])
    {
        $conn = $this->db_connect();
        $queryInsert = "INSERT into categories (`id`,`name`,`status`)
            VALUES(
                '{$category['id']}', 
            '{$category['name']}',
            '{$category['status']}'
            
            )";
        $isInsert = mysqli_query($conn, $queryInsert);
        $this->db_close($conn);


        return $isInsert;
    }

    function getById($id)
    {
        $conn = $this->db_connect();
        $id = $this->escapeParam($conn, $id);
        $querySelect = "SELECT * from  categories where id = '$id' ";
        $result = mysqli_query($conn, $querySelect);
        $category = [];
        if (mysqli_num_rows($result) == 1) {
            $categories = mysqli_fetch_all(
                $result,
                MYSQLI_ASSOC
            );
            $category = $categories[0];
        }

        return $category;
    }

    public function update($category = [])
    {
        $conn = $this->db_connect();
        $id  = $this->escapeParam($conn,$category['id']);
        $name  = $this->escapeParam($conn,$category['name']);
        $status  = $this->escapeParam($conn,$category['status']);
        
        $queryUpdate = "UPDATE categories 
          SET `Name` = '$name',`Status`='$status'
          WHERE `Id` = '$id' ";
        $isUpdate = mysqli_query($conn, $queryUpdate);
        $this->db_close($conn);
       
        return $isUpdate;
    }
    

}
