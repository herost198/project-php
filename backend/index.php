<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerClass = $controller . 'Controller';

$pathController = 'controllers/' . $controllerClass . ".php";

if (!file_exists($pathController)) {
    die("Trang không tồn tại");
}

require_once $pathController;
$object = new $controllerClass;

if (!method_exists($object, $action)) {
    die("phương thức $action của controller $controllerClass không tồn tại");
}
$object->$action();
