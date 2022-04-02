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

		$categories = $this->categoryModel->findAllOnline();
		if (isset($_POST['keysearch'])) {
			$keysearch=$_POST['keysearch'];
			$categories = $this->categoryModel->getSearch($keysearch);
		}
		return $this->view('frontend.categories.index',
			[
				'categories'=> $categories,
			]
		);	
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
		if (isset($_POST['name'])) {
			return $this->categoryModel->insertCat($_POST);	
		}
		$categories = $this->categoryModel->getAll();
		$this->view('frontend.categories.insert',
			[
				'categories'=> $categories,
			]
		);	
	}


	function update(){
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

	}


	function delete(){
		$id = $_GET['id'];
		$this->categoryModel->deleteCat($id);
	}




	function show(){
		return $this->view('frontend.categories.show');	
	}
}

?>