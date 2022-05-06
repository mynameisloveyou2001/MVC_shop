<?php 
/**
 * 
 */
class ordercontroller extends basecontroller
{

	private $orderModel;
	private $productModel;
	private $categoriesModel;
	private $customerModel;
	private $cartModel;
	
	public function __construct(){
		$this->loadmodel('productModel');
		$this->productModel=new productModel;
		$this->loadmodel('categorymodel');
		$this->categorymodel=new categorymodel;
		$this->loadmodel('customerModel');
		$this->customerModel=new customerModel;
		$this->loadmodel('orderModel');
		$this->orderModel=new orderModel;
	}

	public function getInforOrderByCus(){

		if (empty($_SESSION['login'])|| $_SESSION['login'] == false) {
			return $this->view('frontend.customer.login',
				[
				]);
		}else{
			if (!empty($_SESSION['email'])) {
				$orderbycus=$this->orderModel->getAllInforOrdersByCus($_SESSION['email']);
			}
			return $this->view('frontend.orders.show',
				[
					'orders'=>$orderbycus,
				]);
		}
	}


	public function orderDetails() {
		$result=$this->orderModel->getAllInforOrdersById($_GET['id']);
		if (empty($_SESSION['login'])|| $_SESSION['login'] == false) {
			return $this->view('frontend.customer.login',
				[
				]);
		}
		return $this->view('frontend.orders.orderDetails',
			[
				'productCart'=>$result,
			]);

	}


	public function index(){
		$alert ='';
		if (empty($_SESSION['login']) || $_SESSION['login'] == false) {
			return $this->view('frontend.customer.login',[
			]);		
		}
		$productcart = [];
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $id => $value) {
				if (isset($_SESSION['cart']) && $_SESSION['cart'][$id]['idUser']==$_SESSION['id']) {
					array_push($productcart, $_SESSION['cart'][$id]);
					// print_r($_SESSION['cart'][$id]);
				}
			}
			// print_r(gettype($productcart));
			// die;
		}else{
			$alert='<span style="font-size:20px;color:red;text-align:center">chưa có sản phẩm nào trong giỏ<span>';
		}
		$customer = [];
		$customer=$this->customerModel->getInforCus($_SESSION['email']);
		return $this->view('frontend.orders.index',[
			'productCart'=>$productcart,
			'alert'=>$alert,
			'customer'=>$customer,
		]);

	}




	public function insert(){
		if (!empty($_SESSION['cart'])) {
			$sumqty=0;
			foreach ($_SESSION['cart'] as $value) {
				$sumqty+= $value['qty'];
			}
			$newdata['fullname']=$_POST['customer_name'];
			$newdata['email']=$_POST['customer_email'];
			$newdata['phone']=$_POST['customer_phone'];
			$newdata['district']=$_POST['district'];
			$newdata['province']=$_POST['province'];
			$newdata['address']=$_POST['address'];
			$this->customerModel->updateCus($newdata,$_FILES,$_SESSION['id']);
			unset($_POST['district']);
			unset($_POST['province']);
			unset($_POST['address']);
			$order=$this->orderModel->insertOrder($_POST);


			foreach ($_SESSION['cart'] as $product) {
				$this->orderModel->insertOrderDetails([
					'order_id'=> $order['id'],
					'product_id'=>$product['id'],
					'product_name'=>$product['name'],
					'product_price'=>$product['price_sale'],
					'product_qty'=>$product['qty'],
					'product_desc'=>$product['product_desc'],
					'image'=>$product['image'],
					// 'status'=>$product['status'],
				]);
			}
			$orderInfor= $_SESSION['cart'];
			unset($_SESSION['cart']);
			$customer = [];
			$customer=$this->customerModel->getinforcus($_SESSION['email']);
			return $this->view('frontend.orders.orderSuccess',[
				'productCart'=>$orderInfor,
				'customer'=>$customer,
			]);
			// unset($_SESSION['cart']);
			// header('location:?controller=order&action=orderSuccess');
		}else{
			$alert='<span style="font-size:20px;color:Red;text-align:center">Chưa có sản phẩm nào trong giỏ<span>';
			return $this->view('frontend.cart.index',[
				'alert'=>$alert,
			]);
		}

	}

	public function orderSuccess(){

	}


	public function getInforOrderById($id=''){
		return $this->orderModel->getInforOrdersById($id);
	}

	public function updateconfirm(){
		$data=[];
		$data['status']  =  2;
		$result=$this->orderModel->getAllInforOrdersById($_GET['id']);
		$qty = $result['product_qty'];

		$idOrder=$result['order_id'];
		$resultOrderById= $this->getInforOrderById($idOrder);
		$emailCusInOrder= $resultOrderById['customer_email'];
		$resultCustomerByEmail= $this->customerModel->getInforCus($emailCusInOrder);

		$idPro=$result['product_id'];
		$newData=[];
		$newData['product_saled']= $qty;
		$resultCustomerByEmail['saled'] += $newData['product_saled'];
		$dataCus=[];
		$dataCus['saled'] = $resultCustomerByEmail['saled'];
		$this->customerModel->updateCus($dataCus,$file=[],$resultCustomerByEmail['id']);
		$resultPro= $this->productModel->getProById($idPro);
		foreach ($resultPro as $key => $value) {
			$newData['number']= $value['number'];
			$newData['id']= $value['id'];

		}

		$newData['number']= $newData['number']-$qty;
		$idPro=$newData['id'];
		unset($newData['id']);
		$this->productModel->updatePro($newData,$file=[],$idPro);
		$this->orderModel->updateOrder($_GET['id'],$data);
		header('location:?controller=order&action=getinfororderbycus');
	}


	public function updateDestroy(){
		$data=[];
		$data['status']= 3;
		$this->orderModel->updateOrder($_GET['id'],$data);
		header('location:?controller=order&action=getinfororderbycus');
	}

}


?>