<?php 

class AdminController extends BaseController
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
	public function register(){
		if (isset($_POST['email'])) {
			$resultAdmin=$this->getInforAdminToCheck($_POST);
			if ($resultAdmin) {
				if ($resultAdmin['email'] == $_POST['email']) {
					$alert='Email này đã đăng ký';
					return $this->view('frontend.admin.register',
						['alert'=>$alert]);
				}
			}
			if ($_POST['password'] !== $_POST['confirmpassword']) {
				$alert='Mật khẩu nhập lại chưa chính xác!';
				return $this->view('frontend.admin.register',
					['alert'=>$alert]);
			}else{
				$result=$this->customerModel->AdRegister($_POST,$_FILES);
				if (!empty($result)) {
					return $this->view('frontend.admin.login',[
						'alert'=>$result
					]);
				}
			}
		}
		return $this->view('frontend.admin.register');
	}

	public function getInforAdminToCheck($data=[]){
			$admin = [];
			if (isset($data['email'])) {
				$admin=$this->customerModel->getInforAdminCheck($data['email']);
			}
			return $admin;
	}

	public function index(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$inforAdmin=[];
			if(isset($_SESSION['emailAdmin'])) {
				$inforAdmin= $this->customerModel->getInforAdminCheck($_SESSION['emailAdmin']);
			}
			return $this->view('frontend.admin.index',[
				'data'=>$inforAdmin
			]);
		}else{
			header('location:?controller=admin&action=login');
		}
	}


	public function logout(){
		unset($_SESSION['loginAdmin']);
		unset($_SESSION['idAdmin']);
		unset($_SESSION['emailAdmin']);
		unset($_SESSION['fullnameAdmin']);
		header('location:?controller=admin&action=login');
	}

	public function login(){
		if (isset($_POST)){
			$result=$this->getInforAdminToCheck($_POST);
			if ($result) {
				$_SESSION['loginAdmin']= false;
				$kq = password_verify($_POST['password'], $result['password']);
				if($kq == 1){
					$_SESSION['fullnameAdmin'] = $result['fullname'];
					$_SESSION['loginAdmin'] = true;
					$_SESSION['emailAdmin'] = $result['email'];
					$_SESSION['idAdmin'] = $result['id'];
					header('location:?controller=product&action=home');
				}else{ 
					$alert='Mật khẩu chưa chính xác!';
					return $this->view('frontend.admin.login',[
						'alert'=>$alert
					]);
				}
			}else{
				$alert='Email không hợp lệ!';
				return $this->view('frontend.admin.login',[
					'alert'=>$alert
				]);
			}
		}
	}


	public function update(){
		$alert='Cập nhật thành công!';
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			// code...
			if (isset($_POST['password'])) {
				if ($_POST['password']==$_POST['passwordNew']) {
				$_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
				unset($_POST['passwordNew']);
				$alert='Cập nhật thành công!';
			}else{
				$alert='Nhập lại mật khẩu chwua chính xác!!';
			}
			}

			$this->customerModel->updateAdmin($_POST,$_FILES,$_SESSION['idAdmin']);
			$inforAdmin= $this->customerModel->getInforAdminCheck($_SESSION['emailAdmin']);
			return $this->view('frontend.admin.index',[
				'data'=>$inforAdmin,
				'alert'=>$alert
			]);
		}else{
			header('location:?controller=admin&action=login');
		}

	}

}

?>