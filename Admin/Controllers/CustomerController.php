<?php 
/**
 * 
 */
class CustomerController extends BaseController
{

	private $productModel;
	private $categoryModel;	
	private $customerModel;	
	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel=new ProductModel;
		$this->loadModel('CategoryModel');
		$this->categoryModel=new CategoryModel;
		$this->loadModel('CustomerModel');
		$this->customerModel=new CustomerModel;
	}

	public function getCusById($id=''){
		return $this->customerModel->getInforCusById($id);
	}

	public function index(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$customers= $this->customerModel->getAll();
			return $this->view('frontend.customer.index',['customer'=>$customers]);
		}else{
			header('location:?controller=admin&action=login');
		}
	}


	public function delete(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$this->customerModel->deleteCus($_GET['id']);
			header('localhost:?controller=customer&action=index');
		}else{
			header('location:?controller=admin&action=login');
		}

	}


	public function register(){
		return $this->view('frontend.customer.register');
	}
}
?>