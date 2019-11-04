<?php
class Controller
{
    // public $pageTitle = "Title của trang";

    public function __construct()
    {
        if (!isset($_SESSION['admin']) && $_GET['action'] != 'login') {
            $_SESSION['message'] = "Bạn cần đăng nhập để sử dụng hệ thống";
            header("Location: index.php?controller=admin&action=login");
            exit();
        }
    }

    public function generateId()
    {
        return substr(rand(), 0, 4);
    }
    
    public function validate($param, $message)
    {
        if (empty($param)) {
            return $message;
        }
        return '';
    }
}
