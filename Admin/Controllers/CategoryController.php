<?php 
/**
 * 
 */
class CategoryController extends BaseController
{

	private $productModel;
	private $categoryModel;
	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel=new ProductModel;
		$this->loadModel('CategoryModel');
		$this->categoryModel=new CategoryModel;

	}
	
	function index(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$categories = $this->categoryModel->getAll();
			if (isset($_POST['keysearch'])) {
				$keysearch=$_POST['keysearch'];
				$categories = $this->categoryModel->getSearch($keysearch);
			}
			return $this->view('frontend.categories.index',
				[
					'categories'=> $categories,
				]
			);	
		}else{
			header('location:?controller=admin&action=login');
		}
	}

	function updatestatus(){
		$id = $_GET['id'];
		$status = $_GET['status'];
		$this->categoryModel->updateStatusCat($id,$status);
		$categories = $this->categoryModel->getAll();
		return $this->view('frontend.categories.index',
			[
				'categories'=> $categories,
			]
		);	
	}


	function insert(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			if (isset($_POST['name'])) {
				return $this->categoryModel->insertCat($_POST,$_FILES);	
			}
			$categories = $this->categoryModel->getAll();
			$this->view('frontend.categories.insert',
				[
					'categories'=> $categories,
				]
			);
		}else{
			header('location:?controller=admin&action=login');
		}	
	}


	function update(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			$id = $_GET['id'];
			$result = $this->categoryModel->inforCatById($id);
			$categories = $this->categoryModel->getAll();
			if (isset($_POST['name'])) {
				return $this->categoryModel->updateCat($_POST,$id);	
			}
			$this->view('frontend.categories.update',
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
			$this->categoryModel->deleteCat($id);
		}else{
			header('location:?controller=admin&action=login');
		}
	}




	function show(){
		if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==1) {
			return $this->view('frontend.categories.show');	
		}else{
			header('location:?controller=admin&action=login');
		}
	}

}

?>