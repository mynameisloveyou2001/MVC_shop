<?php 
/**
 * 
 */
class ProductController extends BaseController
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

    function home(){
        return $this->view('frontend.products.home');
    }


    function index(){
        $primaryColor='';
        $otherColor='';
        $otherColor1='btn--primary';

        $productsByCat=[];
        $sum=0;
        $sum = $this->productModel->sumPro();
        $page=1;
        $sortdec='desc';
        $productAll=$this->productModel->getAll();
        $pageNumber= ceil((count($productAll)/10)); 
        if (isset($_GET['id'])) {
            $productsByCat=$this->productModel->getAllProByCatId($_GET['id']);
        }
        $categories = $this->categoryModel->getAllOnline();
        $products = $this->productModel->getAllwithCatUser();
        if (isset($_GET['color'])) {
            $primaryColor='';
            $otherColor='';
            $otherColor1='btn--primary';
        }
        for ($i=0; $i < count($products); $i++) { 
            // $products[$i]['price']= $this->productModel->formatMoney($products[$i]['price']);
            // $products[$i]['price_sale']= $this->productModel->formatMoney($products[$i]['price_sale']);
        }

        if (isset($_GET['banchay'])) {
           $products = $this->productModel->searchProBanChay();
           $otherColor='btn--primary';
           $otherColor1='';
           $primaryColor='';
       }
       if (isset($_GET['moinhat'])) {
           $products = $this->productModel->searchProMoiNhat();
           $otherColor='';
           $otherColor1='';
           $primaryColor='btn--primary';
       }

       $keysearch='';
       if (isset($_POST['keysearch'])) {
        $keysearch=$_POST['keysearch'];
        $products = $this->productModel->getSearch($keysearch);
    }
    if (isset($_GET['sort'])) {
        $sortdec=$_GET['sort'];
        $products = $this->productModel->getAllwithCatUser($sortdec);
    }
    $productCart = null;
    if (isset($_SESSION['cart'])) {
        $productCart = $_SESSION['cart'];
    }

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $products= $this->productModel->getAllwithCatUser($sortdec,$page);
    }

    $customer = [];
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $customer=$this->customerModel->getInforCus($_SESSION['email']);
    }

    $productCart = null;
    if (isset($_SESSION['cart'])) {
        $productCart = $_SESSION['cart'];
    }


    return $this->view('frontend.products.index',[
        'products' => $products,
        'keysearch'=>$keysearch,
        'categories'=>$categories,
        'productsByCat' => $productsByCat,
        'sumOrder'=>$sum,
        'pageNumber'=> $pageNumber,
        'page'=>$page,
        'customer'=>$customer,
        'productsCart' => $productCart,
        'primaryColor' => $primaryColor,
        'otherColor' => $otherColor,
        'otherColor1' => $otherColor1,
    ]); 
}
public function getComment($id=''){
   return $this->productModel->getAllComment($id);
}



function details(){
    $id = $_GET['id'];
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        $alert='';
    }else{
        $alert='<span>Bạn cần đăng nhập để bình luận</span>';
    }
    if (!empty($_SESSION['id'])) {
        $idCus=$_SESSION['id'];
    }
    if (isset($_POST['submit'])) {
        $content=$_POST['content'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date= date('Y-m-d H:i:s');
        $this->productModel->insertComment($idCus,$id,$date,$content);
        unset($_POST);
    }
    $sumCmt = 0;
    $getComment=$this->getComment($id);
    if ($getComment) {
        $sumCmt=count($getComment);
    }
    $sum=0;
    $sum = $this->productModel->sumPro();
    $productCart = null;
    $images=$this->productModel->getImages($id);
    $customer = [];
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $customer=$this->customerModel->getInforCus($_SESSION['email']);
    }
    $customersComment=$this->customerModel->getAll();

    if (isset($_SESSION['cart'])) {
        $productCart = $_SESSION['cart'];
    }
    $products = $this->productModel->getProById($id);
    $productsByCat=$this->productModel->getAllProByCatId($products[0]['category_id'],$id);

    $banchayDetails = $this->productModel->searchProBanChayDetails();
    return $this->view('frontend.products.productDetails',[
        'products' => $products,
        'productsByCat' => $productsByCat,
        'sumOrder'=>$sum,
        'id'=>$id,
        'comment'=>$getComment,
        'customer'=>$customer,
        'productsCart'=>$productCart,
        'imagePro'=>$images,
        'customerComment'=>$customersComment,
        'alert'=>$alert,
        'sumCmt'=>$sumCmt,
        'banchayDetails'=>$banchayDetails
    ]); 
}

function insert(){
    $categories=$this->categoryModel->getAll();
    if (isset($_POST['name'])) {
        $this->productModel->insertPro($_POST,$_FILES); ;
    }
    $this->view('frontend.products.insert',
        [
            'categories'=>$categories,
        ]); 
}

public function update(){
    $id = $_GET['id'];
    $result = $this->productModel->inforProById($id);
    $categories = $this->categoryModel->getAll();
    if (isset($_POST['name'])) {
        return $this->productModel->updatePro($_POST,$_FILES,$id);  
    }
    $this->view('frontend.products.update',
        [
            'categories'=> $categories,
            'result'=> $result,
            'id'=> $id,
        ]
    );
}


public function import(){
    $id = $_GET['id'];
    $result = $this->productModel->inforProById($id);
    $categories = $this->categoryModel->getAll();
    if (isset($_POST['numberadd'])) {
        return $this->productModel->updatePro($_POST,$_FILES,$id);  
    }
    return $this->view('frontend.products.import',
        [
            'categories'=> $categories,
            'result'=> $result,
            'id'=> $id,
        ]
    );
}




function delete(){
    $id = $_GET['id'];
    $this->productModel->deletePro($id);
}




function show(){
    $this->productModel->getAll();
    return $this->view('frontend.products.show');   
}
}

?>