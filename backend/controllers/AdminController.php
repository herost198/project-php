<?php

require_once 'controllers/Controller.php';
require_once 'models/Admin.php';

class AdminController extends Controller
{
    function login()
    {
        // trường hợp đã đăng nhập thì tự động chuyển hướng sang Danh Sách Home
        if (isset($_SESSION['admin'])) {
            header('Location: index.php?controller=home&actin=index');
            exit();
        }

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Username hoặc password không được để trống';
                return;
            }
            $admin = [
                'username' => $username,
                'password' => $password,
            ];
            
            $adminModel = new Admin();
            $adminLogin = $adminModel->getAdminLogin($admin);

            if (!empty($adminLogin)) {
                $_SESSION['success'] = 'Đăng nhập thành công';
                $_SESSION['admin'] = $adminLogin;
                header('Location: index.php?controller=home&action=index');
                exit();
            } else {
                $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
                require_once 'views/login.php';
            }
        }
        require_once 'views/login.php';
    }

    public function logout(){
        unset($_SESSION['admin']);
        $_SESSION['success'] = 'Logout thành công';
        header('Location: index.php?controller=admin&action=login');
        exit();
    }
}
