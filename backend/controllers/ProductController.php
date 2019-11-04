<?php

require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
class ProductController extends Controller
{
    public function index()
    {

        $productModel = new Product();
        $products = $productModel->getAllProduct();

        require_once 'views/products/index.php';
    }

   

    public function create()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $category_id = $_POST['category_id'];
            $stock = $_POST['stock'];
            $imageArr = $_FILES['image'];


            // if(empty($price)){
            //     echo "oke";
            //     die();
            // }
            // if(empty($name)){
            //     $_SESSION['error'] = 'Tên sản phẩm không được để trống';
            //     require_once 'views/products/create.php';
            //     return;
            // }
            // $_SESSION['errors'][] = $this->validate($name,"Tên sản phẩm không được để trống");
            $_SESSION['errors'][] = $this->validate($price,"Giá sản phẩm phải sản phẩm không được để trống",'number');
            // $_SESSION['errors'][] = $this->validate($name,"Tên sản phẩm không được để trống");

    
            $product =
            [
                'Id'=>$this->generateId(),
                'Name'=>$name,
                'CategoryId'=>$category_id,
                'Price'=>$price,
                'Status'=>$status,
                'Stock'=>$stock,
            ];
            $productModel = new Product();
            $isInsert = $productModel->insert($product);
            if($isInsert){
                $_SESSION['success'] ='Insert thành công';
            }else{
                $_SESSION['error'] = 'Insert Thất bại';
            }
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        require_once 'views/products/create.php';

    }

    public function update(){
        if(!isset($_GET['id']) ){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        $productModel = new Product();
        $product = $productModel->getById($_GET['id']);

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $avatarArr = $_FILES['avatar'];
        }

        if(empty($name)){
            $_SESSION['error'] = 'Name không được để trống';
            require_once 'views/product/update.php';
            return;
        }
    }
}
