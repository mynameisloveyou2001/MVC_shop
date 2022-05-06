<?php 
/**
 * 
 */
class CouponController extends BaseController
{
	
private $productModel;

    public function __construct(){
      $this->loadModel('ProductModel');
      $this->productModel=new ProductModel;
  }

  public function getCoupon(){
  	$product= $this->productModel->getProduct();
  	return $this->view('frontend.coupon.index',['product'=>$product]);
  }
}
 ?>