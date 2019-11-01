<?php
class Controller
{
    public $pageTitle = "Title của trang";

    public function __construct()
    {
        if (!isset($_SESSION['admin']) && $_GET['action'] != 'login') {
            $_SESSION['message'] = "Bạn cần đăng nhập để sử dụng hệ thống";
            header("Location: index.php?controller=admin&action=login");
            exit();
        }
    }
}
