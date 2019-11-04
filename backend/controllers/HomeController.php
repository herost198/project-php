<?php

require_once 'controllers/Controller.php';
require_once __DIR__ . '/../models/Category.php';
class HomeController extends Controller
{
    function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        require_once 'views/categories/index.php';
    }
    public function create()
    {
        //xử lý khi người dùng submit form
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];

            if (empty($name)) {
                $_SESSION['error'] = 'Name không được để trống';
                require_once 'views/categories/create.php';
                return;
            }

            $category = [
                // 'Id' =>  substr(rand(), 0, 4),
                'Id' =>  $this->generateId(),
                'Name' => $name,
            ];

            $categoryModel = new Category();
            $isInsert = $categoryModel->insert($category);
            if ($isInsert) {
                $_SESSION['success'] = 'Insert thành công';
            } else {
                $_SESSION['error'] = 'Insert thất bại';
            }
            header("Location: index.php?controller=home&action=index");
            exit();
        }
        require_once 'views/categories/create.php';
    }

    public function update()
    {
        //xử lý validate cho trường hợp
        //ko truyền id hoặc id không phải là số thì báo lỗi
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header("Location: index.php?controller=home");
            exit();
        }

        $id = $_GET['id'];

        $categoryModel = new Category();
        $category = $categoryModel->getById($id);
    
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            
            if (empty($name)) {
                $_SESSION['error'] = 'Name không được để trống';
                require_once 'views/categories/update.php';
                return;
            }

            $category = [
                'Id' => $id,
                'Name' => $name,
                'Status'=>$status
            ];
            
            $categoryModel = new Category();
            $isUpdate = $categoryModel->update($category);
            if ($isUpdate) {
                $_SESSION['success'] = 'Update thành công';
            } else {
                $_SESSION['error'] = 'Update thất bại';
            }
            header("Location: index.php?controller=home&action=index");
            exit();


            //            echo '<pre>';
            //            print_r($_POST);

        }
        require_once 'views/categories/update.php';
    }
}
