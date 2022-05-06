<?php 
/**
 * 
 */
class CartController extends BaseController
{
	
	private $productModel;
	private $categoryModel;	
	private $customerModel;	
	private $cartModel;	
	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel=new ProductModel;
		$this->loadModel('CategoryModel');
		$this->categoryModel=new CategoryModel;
		$this->loadModel('CustomerModel');
		$this->customerModel=new CustomerModel;
		$this->loadModel('CartModel');
		$this->cartModel=new CartModel;
	}

	public function index(){
		$alert ='';
		if (empty($_SESSION['login']) || $_SESSION['login'] == false) {
			return $this->view('frontend.customer.login',[
			]);		}
			$productCart = [];
			if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $id => $value) {
				if (isset($_SESSION['cart']) && $_SESSION['cart'][$id]['idUser']==$_SESSION['id']) {
					array_push($productCart, $_SESSION['cart'][$id]);
				}
			}
			}else{
				$alert='<span style="font-size:20px;color:Red;text-align:center">Chưa có sản phẩm nào trong giỏ<span>';
			}
			return $this->view('frontend.cart.index',[
				'productCart'=>$productCart,
				'alert'=>$alert,
			]);
		}


		public function insert(){
			$id ='';
			if (isset($_POST['idPro'])) {
				$id = $_POST['idPro'];
				$qty = $_POST['qty'];
			}

		// 	if (isset($_POST['muangay'])) {
		// 		$alert='';
		// 		$products = $this->productModel->inforProById($id);

		// 		$productCart = $products;
		// 		$productCart['qty1']=$qty;

		// 		$productCart['idUser']=$_SESSION['id'];

		// 		$customer = [];
		// 		$customer=$this->customerModel->getInforCus($_SESSION['email']);

		// 		return $this->view('frontend.orders.index',[
		// 		'productCart'=>$productCart,
		// 		'alert'=>$alert,
		// 		'customer'=>$customer,
		// ]);
		// 	}


			$products = $this->productModel->inforProById($id);
			if (empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart'])) {
				$products['qty']=$qty;
				$products['idUser']=$_SESSION['id'];
				$_SESSION['cart'][$id] = $products;

			}else{
				$products['idUser']=$_SESSION['id'];
				$products['qty'] = $_SESSION['cart'][$id]['qty'] + $qty;
				$_SESSION['cart'][$id] = $products;
			}
			header('location:?controller=cart&action=index');
		}


		public function update(){
			foreach ($_POST['qty'] as $id => $qty) {
				if ($qty < 0 || !is_numeric($qty)) {
					continue;
				}
				if ($qty == 0){
					unset($_SESSION['cart'][$id]);
				}else{

					$_SESSION['cart'][$id]['qty'] = $qty;
				}
			}
			header('location:?controller=cart&action=index');
		}

		public function delete(){
			$id = $_GET['idDel']??null;
			if (!empty($id)) {
				unset($_SESSION['cart'][$id]);
				header('location:?controller=cart&action=index');
			}
		}

		public function deleteCartIndex(){
			$id = $_GET['idDel']??null;
			if (!empty($id)) {
				unset($_SESSION['cart'][$id]);
				header('location:?controller=cart&action=index');
			}
		}

		public function destroy(){
			unset($_SESSION['cart']);
			header('location:?controller=cart&action=index');
		}
	}
?>