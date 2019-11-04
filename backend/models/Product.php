<?php

require_once 'models/Model.php';
class Product extends Model
{
    function getAllProduct()
    {
        $conn = $this->db_connect();
        $querySelect = "SELECT products.*, categories.name as Category_name from products inner join categories on categories.id = products.CategoryId";
        $results = mysqli_query($conn, $querySelect);
        $products = [];
        if (mysqli_num_rows($results) > 0) {
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->db_close($conn);
        return $products;
    }
}
