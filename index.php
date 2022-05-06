<?php 
session_start();
require_once "./Core/Database.php";
require_once "./Models/BaseModel.php";
require_once "./Controllers/BaseController.php"; //Import BaseController

if (empty($_REQUEST['controller']) && empty($_REQUEST['action'])) {
    $ControllerName = 'ProductController';
    $actionName = 'index';
}else{
$ControllerName = ucfirst(strtolower($_REQUEST['controller']).'Controller'); 
$actionName = strtolower($_REQUEST['action']); 
}
require_once "./Controllers/${ControllerName}.php"; 

$ControllerObj = new $ControllerName; 
$ControllerObj->$actionName(); 

 ?>

