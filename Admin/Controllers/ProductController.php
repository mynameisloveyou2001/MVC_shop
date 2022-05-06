<?php 
/**
 * 
 */
class ProductController extends BaseController
{

	private $productModel;
    private $categoryModel;
    private $customerModel;
    private $orderModel;
    public function __construct(){
      $this->loadModel('ProductModel');
      $this->productModel= new ProductModel;
      $this->loadModel('CategoryModel');
      $this->categoryModel= new CategoryModel;
      $this->loadModel('CustomerModel');
      $this->customerModel= new CustomerModel;
      $this->loadModel('OrderModel');
      $this->orderModel= new OrderModel;

  }

  function home(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $y=getdate();
        $year=$y['year'];
        $totalMotnh=0;
        for ($i=1; $i <= 12 ; $i++) { 
            $result = $this->getOrderByMonth($year,$i)?$this->getOrderByMonth($year,$i):[$i=>0];
            foreach ($result as $value) {
                if (!empty($value)) {
                    $totalMotnh+=$value['product_price']*$value['product_qty'];
                }
            }

        }
        if(isset($_SESSION['emailAdmin'])) {
            $inforAdmin= $this->customerModel->getInforAdminCheck($_SESSION['emailAdmin']);
        }

        $orders=$this->orderModel->getAllInforOrders();
        $numberOrders = count($orders);
        $contacts = $this->productModel->getAllComments();
        $numberContact=count($contacts);
        $products= $this->productModel->getAll();
        $numberProduct=count($products);
        return $this->view('frontend.products.home',
            ['numberPro'=>$numberProduct,
            'numberContact'=>$numberContact,
            'numberOrders'=>$numberOrders,
            'TotalMoney'=>$totalMotnh,
            'data'=>$inforAdmin,
        ]
    );
    }else{
        header('location:?controller=admin&action=login');
    }
}

public function responeComment(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        if (isset($_POST['responeCmt'])) {
            $idComment = $_POST['idCmt'];
            $data['reply'] = $_POST['reply'];
            $data['status'] = 2;
            unset($_POST);
            $this->productModel->updateComment($data,$idComment);
            header('location:?controller=product&action=getComment');
        }
    }else{
        header('location:?controller=admin&action=login');
    }
}

public function getOrderByMonth($year=[], $month=[]){
    return $this->orderModel->getInforOrderByMonth($year,$month);
}

public function deleteComment(){
    $id=$_GET['id'];
    $this->productModel->deleteCmt($id);
    header('location:?controller=product&action=getComment');
}

public function getComment(){
 $comments = $this->productModel->getAllComments();
 $customers=$this->customerModel->getAll();
 $products=$this->productModel->getAll();

 return $this->view('frontend.comments.index',[
    'comments'=>$comments,
    'customers'=>$customers,
    'products'=>$products,
]
);
}

public function confirmComment(){
    $id=$_GET['id'];
    $data['status']= 1;
    $this->productModel->updateComment($data,$id);
    header('location:?controller=product&action=getComment');
}




function index(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $productsByCat=[];
        $page=1;
        $sortdec='desc';
        $productAll=$this->productModel->getAll();
    $pageNumber= ceil((count($productAll)/4)); // số trang sẽ phân
    if (isset($_GET['id'])) {
        $productsByCat=$this->productModel->getAllProByCatId($_GET['id']);
    }
    $categories = $this->categoryModel->getAll();
    $products = $this->productModel->getAllwithCat();
    $keysearch='';
    if (isset($_POST['keysearch'])) {
        $keysearch=$_POST['keysearch'];
        $products = $this->productModel->getSearch($keysearch);
        // $pageNumber= ceil((count($products)/4));
    } // nếu có keysearch
    if (isset($_GET['sort'])) {
      // $pageNumber= ceil((count($productAll)/4));
      $sortdec=$_GET['sort'];
      $products = $this->productModel->getAllwithCat($sortdec);
  }

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $products= $this->productModel->getAllwithCat($sortdec,$page);
}


return $this->view('frontend.products.index',[
    'products' => $products,
    'keysearch'=>$keysearch,
    'categories'=>$categories,
    'productsByCat' => $productsByCat,
    'pageNumber'=> $pageNumber,
    'page'=>$page
]); 
}else{
    header('location:?controller=admin&action=login');
}
}

function details(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $id = $_GET['id'];
        $products = $this->productModel->getProById($id);
        return $this->view('frontend.products.productDetails',[
            'products' => $products,
        ]); 
    }else{
        header('location:?controller=admin&action=login');
    }
}

function insert(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $categories=$this->categoryModel->getAll();
        if (isset($_POST['name'])) {
            $this->productModel->insertPro($_POST,$_FILES); ;
        }
        $this->view('frontend.products.insert',
            [
                'categories'=>$categories,
            ]);
    }else{
        header('location:?controller=admin&action=login');
    } 
}

public function update(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $id = $_GET['id'];
        $result = $this->productModel->inforProById($id);
        $imagePro = $this->productModel->getImages($id);
        $categories = $this->categoryModel->getAll();
        if (isset($_POST['name'])) {
           $this->productModel->updatePro($_POST,$_FILES,$id);  
           header('location:?controller=product&action=index');
       }
       $this->view('frontend.products.update',
        [
            'categories'=> $categories,
            'result'=> $result,
            'id'=> $id,
            'imagePro'=> $imagePro,
        ]
    );
   }else{
    header('location:?controller=admin&action=login');
} 
}


public function import(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $id = $_GET['id'];
        $result = $this->productModel->inforProById($id);
        $categories = $this->categoryModel->getAll();
        if (isset($_POST['numberadd'])) {
            return $this->productModel->updatePro($_POST,$_FILES,$id);  
        }
        $this->view('frontend.products.import',
            [
                'categories'=> $categories,
                'result'=> $result,
                'id'=> $id,
            ]
        );
    }else{
        header('location:?controller=admin&action=login');
    } 
}


function delete(){
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
        $id = $_GET['id'];
        $this->productModel->deletePro($id);
    }else{
        header('location:?controller=admin&action=login');
    } 
}




function show(){
    $this->productModel->getAll();
    return $this->view('frontend.products.show');   
}
}



?>