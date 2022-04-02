<?php 
/**
 * 
 */
class OrderController extends BaseController
{

	private $orderModel;
	private $productModel;
	private $categoriesModel;
	private $customerModel;
	private $cartModel;
	
	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel=new ProductModel;
		$this->loadModel('CategoryModel');
		$this->categoryModel=new CategoryModel;
		$this->loadModel('CustomerModel');
		$this->customerModel=new CustomerModel;
		$this->loadModel('OrderModel');
		$this->orderModel=new OrderModel;
	}

	public function orderDetails() {
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$result=$this->orderModel->getAllInforOrdersById($_GET['id']);
			return $this->view('frontend.orders.orderDetails',
				[
					'productCart'=>$result,
				]);
		}else{
			header('location:?controller=admin&action=login');
		}

	}

	public function index(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$order=$this->orderModel->getAllInforOrders();
			return $this->view('frontend.orders.index',
				[
					'orders'=>$order,
				]);
		}else{
			header('location:?controller=admin&action=login');
		}
	}


	public function update(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$data=[];
			$data['status']=1;
			$this->orderModel->updateOrder($_GET['id'],$data);
			header('location:?controller=order&action=index');
		}else{
			header('location:?controller=admin&action=login');
		}
	}


	public function delete(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$this->orderModel->deleteOrder($_GET['id']);
			header('location:?controller=order&action=index');
		}else{
			header('location:?controller=admin&action=login');
		}
	}







}


?>