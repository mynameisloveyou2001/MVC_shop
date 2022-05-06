<?php 
class CategoryModel extends BaseModel{

	const tableCategory = 'category';

	public function getAll(){
		return $this->findAll(self::tableCategory);
	}


	public function getAllOnline(){
		return $this->findOnline(self::tableCategory);
	}

	public function updateStatusCat($id='',$status=''){
		return $this->updateStatusCategory(self::tableCategory,$id,$status);
	}

	public function insertCat($data = [],$file=[]){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$created_at = $updated_at = date('Y-m-d  H:i:s');
		$data += ['created_at'=>$created_at];
		$data += ['updated_at'=>$updated_at];
		$this->insert(self::tableCategory,$data,$file=[]);
		header('location:http://localhost:8000/MVC/NewMVC/Admin/index.php?controller=category&action=index');
	}

	public function getAllwithPro(){
		$sql = "select category.name as categoryName , product.*  from product inner join category on 
		product.category_id =category.id";
		return $this->getByQuery($sql);
	}


	public function deleteCat($id){
		$this->delete(self::tableCategory,$id);
		header('location:http://localhost:8000/MVC/NewMVC/Admin/index.php?controller=category&action=index');
	}


	public function inforCatById($id){
		return $this->inforCatByIdCat(self::tableCategory,$id);
	}


	public function updateCat($data=[],$id){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$created_at = $updated_at = date('Y-m-d  H:i:s');
		$data += ['updated_at'=>$updated_at];
		$this->update(self::tableCategory,$data,$file=[],$id);
		header('location:http://localhost:8000/MVC/NewMVC/Admin/index.php?controller=category&action=index');
	}

	public function getSearch($keysearch){
		return $this->search(self::tableCategory,$keysearch);
	}

}

?>