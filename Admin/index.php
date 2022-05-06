<?php 
session_start();
require_once "../Core/Database.php";
require_once "../Models/BaseModel.php";
require_once "./Controllers/BaseController.php"; //Import BaseController

if (empty($_REQUEST['controller']) && empty($_REQUEST['action'])) {
    $ControllerName = 'ProductController';
    $actionName = 'home';
}else{
$ControllerName = ucfirst(strtolower($_REQUEST['controller']).'Controller'); //Lấy tên của Controller truyền vào rồi chuyển về chữu thường rồi viết hoa chữ đầu gắn thêm Controller vd(ProductController), mặc định controller truyền vào là product
$actionName = strtolower($_REQUEST['action']); // Tên function trong các lớp Controller
}
require_once "./Controllers/${ControllerName}.php"; //import các Controller đã tạo vào khi được gọi trên url

$ControllerObj = new $ControllerName; // khởi tạo đối tượng Controller 
$ControllerObj->$actionName(); // gọi tới function() trong Controller đó
 ?>

