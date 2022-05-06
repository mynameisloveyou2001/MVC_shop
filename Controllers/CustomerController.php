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

		$sum = $this->productModel->sumPro();
		if (isset($_SESSION['id'])) {
			$productsByCat=$this->productModel->getAllProByCatId($_SESSION['id']);
		}
		$categories = $this->categoryModel->getAll();
		$products = $this->productModel->getAllwithCat();
		for ($i=0; $i < count($products); $i++) { 
	            // $products[$i]['price']= $this->productModel->formatMoney($products[$i]['price']);
	            // $products[$i]['price_sale']= $this->productModel->formatMoney($products[$i]['price_sale']);
		}
		$keysearch='';
		if (isset($_POST['keysearch'])) {
			$keysearch=$_POST['keysearch'];
			$products = $this->productModel->getSearch($keysearch);
		}
		if (isset($_GET['sort'])) {
			$sortdec=$_GET['sort'];
			$products = $this->productModel->getAllwithCat($sortdec);
		}

		$productCart = null;
		if (isset($_SESSION['cart'])) {
			$productCart = $_SESSION['cart'];
		}
		$customer = [];
		if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
			$customer=$this->customerModel->getInforCus($_SESSION['email']);
		}

		if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
			return $this->view('frontend.customer.loginsuccess',[
				'products' => $products,
				'keysearch'=>$keysearch,
				'categories'=>$categories,
				'productsByCat' => $productsByCat,
				'sumOrder' => $sum,
				'productsCart' => $productCart,
				'customer' => $customer,
			]); 
		}else{
			return $this->view('frontend.customer.login');
		}
	}



	public function register(){
		$alert='';
		if (isset($_POST['email'])) {
			$resultUser = $this->getInforCusCheck($_POST);
			if ($resultUser) {
				if ($resultUser['email']==$_POST['email']) {
					return $this->view('frontend.customer.register',
						['alert'=>'Email này đã đăng ký!']);
				}
			}
			if ($_POST['password'] !== $_POST['confirmpassword']) {
				return $this->view('frontend.customer.register',
					['alert'=>'Mật khẩu nhập lại chưa chính xác!']);
			}else{
				$result=$this->customerModel->CusRegister($_POST,$_FILES);
				if ($result == 1) {
					$alert='<span style="font-size: 14px;margin-right: 44px;Color:green;">Đăng Ký thành công<span>';
				}else{
					$alert='<span style="color: red; font-size: 14px;margin-right: 44px;">Đăng Ký thất bại<span>';
				}
			return $this->view('frontend.customer.login',[
						'alert'=>$alert,
					]);
			}
		}
		return $this->view('frontend.customer.register');
	}

	public function login(){
			$page=1;
			$sortdec='desc';
			$keysearch ='';
		if (isset($_POST)){
			$result=$this->getInforCusCheck($_POST);
			if (!empty($result)) {
				$kq = password_verify($_POST['password'], $result['password']);
				if($kq == true){
					$_SESSION['fullname'] = $result['fullname'];
					$_SESSION['login'] = true;
					$_SESSION['email'] = $result['email'];
					$_SESSION['id'] = $result['id'];
					$productsByCat=[];
					if (isset($_GET['id'])) {
						$productsByCat=$this->productModel->getAllProByCatId($_GET['id']);
					}
					$categories = $this->categoryModel->getAll();
					$products = $this->productModel->getAllwithCatUser($sortdec, $page, $keysearch);
					for ($i=0; $i < count($products); $i++) { 
	            // $products[$i]['price']= $this->productModel->formatMoney($products[$i]['price']);
	            // $products[$i]['price_sale']= $this->productModel->formatMoney($products[$i]['price_sale']);
					}

					$productAll=$this->productModel->getAll();
					$keysearch='';
					$pageNumber= ceil((count($productAll)/4));
					if (isset($_POST['keysearch'])) {
						$keysearch=$_POST['keysearch'];
						$products = $this->productModel->getSearch($keysearch);
					}
					if (isset($_GET['sort'])) {
						$sortdec=$_GET['sort'];
						$products = $this->productModel->getAllwithCatUser($sortdec, $page, $keysearch);
					}
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
						$products= $this->productModel->getAllwithCatUser($sortdec,$page, $keysearch);
					}
					return $this->view('frontend.products.index',[
						'products' => $products,
						'keysearch'=>$keysearch,
						'categories'=>$categories,
						'productsByCat' => $productsByCat,
						'pageNumber'=> $pageNumber,
						'page'=>$page,
						'refresh'=>"<meta http-equiv='refresh' content='0;URL=?controller=product&action=index'>"
					]); 
				}else{ 
					$alert='Mật khẩu chưa chính xác!';
					return $this->view('frontend.customer.login',[
						'alert1'=>$alert
					]);
				}
			}else{
				$alert='Email không hợp lệ!';
				return $this->view('frontend.customer.login',[
					'alert1'=>$alert
				]);
			}
		}
	}

	public function update(){
		if (isset($_POST['password'])) {
			$alert = "";
			$passcustomer="";
			$customer = $this->getCusById($_SESSION['id']);
			$passcustomer = $customer['password'];
			$pass = $_POST['password'];
			// if (password_verify($pass, $passcustomer) == false) {
			// 		$alert='Not correct password!!';
			// }else{
				if ($_POST['passwordConfirm']==$_POST['passwordNew']) {
				$_POST['passwordConfirm'] = password_hash($_POST['passwordConfirm'],PASSWORD_DEFAULT);
				unset($_POST['passwordNew']);
				$alert='Update success!';
				}else{
				$alert='New password and password not compatible!!';
				}
			unset($_POST['password']);	
		}
		$this->customerModel->updateCus($_POST,$_FILES,$_SESSION['id']);
		// header('location:?controller=customer&action=getInforCusCurr');
			$customer=$this->customerModel->getInforCus($_SESSION['email']);
			return $this->view('frontend.customer.index',[
				'customer'=>$customer,
				'alert'=>$alert,
			]);

	}


	public function getInforCusCheck($data=[]){
		$customer = [];
		if (isset($data['email'])) {
			$customer=$this->customerModel->getInforCusCheckUser($data['email']);
		}
		return $customer;
	}




	public function getInforCus(){
		$customer = [];
		if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
			$customer=$this->customerModel->getInforCus($_SESSION['email']);
			return $this->view('frontend.orders.index',[
				'customer'=>$customer
			]);
		}else{
			return $this->view('frontend.customer.login',[
			]);
		}
	}

	public function getInforCusCurr(){

		$customer = [];
		if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
			$customer=$this->customerModel->getInforCus($_SESSION['email']);
			return $this->view('frontend.customer.index',[
				'customer'=>$customer
			]);
		}else{
			return $this->view('frontend.customer.login',[
			]);
		}
	}

	public function logout(){
		if (isset($_GET['idCus'])) {
			$id = $_GET['idCus'];
			unset($_SESSION['login']);
		}
		return $this->view('frontend.customer.login');
	}
}
?>