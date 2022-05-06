
<?php 
class BaseModel extends Database{
	private $connect;
	public function __construct(){
		$this->connect = $this->connect();
	}


	public function findAll($table){
		$sql = "select * from ${table} order by id DESC";
		$result = $this->_query($sql);
		$data = [];
		if ($result) {
			while($rows = mysqli_fetch_assoc($result)) {
				array_push($data, $rows);
			}
		}
		return $data;
	}


	public function findOnline($table){
		$sql = "select * from ${table} where status = 1 order by id DESC";
		$result = $this->_query($sql);
		$data = [];
		if ($result) {
			while($rows = mysqli_fetch_assoc($result)) {
				array_push($data, $rows);
			}
		}
		return $data;
	}

	
public function getInforCustomerById($table,$id){
	$sql = "select * from ${table} where id = '$id' order by id DESC";
	return $this->getByQuery($sql);
}


	public function findById(){
		
	}

	public function insert($table,$data=[],$file=[]){
		if (!empty($file) && !empty($data['product_desc'])) {
			$data['product_desc']= trim($data['product_desc']);
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_temp = $file['image']['tmp_name'];
			$div = explode('.',$file_name);
			$file_ext = strtolower(end($div));
			$unique_image =substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image = "Uploads/".$unique_image;
			move_uploaded_file($file_temp, $uploaded_image);
			$data += ['image'=>$unique_image];
		}
		$created_at=$updated_at=date('Y-m-d H:i:s');
		$data += ['created_at'=>$created_at];
		$data += ['updated_at'=>$updated_at];
		if (!empty($data['email'])) {
			unset($data['updated_at']);
		}
		if (!empty($data['order_id'])|| !empty($data['content'])) {
			unset($data['updated_at']);
			unset($data['created_at']);
		}

		$arrKey = array_keys($data);
		$arrKey = implode(',', $arrKey);
		
		$arrValue = array_map(function($value){
			return "'".$value."'";
		},  array_values($data));
		$arrValue = implode(',',$arrValue);
		$sql = "insert into `webltm`.`${table}`(${arrKey}) value (${arrValue})";
		// echo $sql;
		// die;
		$this->_query($sql);
		$id_pro=mysqli_insert_id($this->connect);
		if (!empty($file['images'])) {
			$files=$file['images'];
			$files_name = $files['name'];
			foreach ($files_name as $key => $value) {
				move_uploaded_file($files['tmp_name'][$key],"Uploads/".$value);
			}

			foreach ($files_name as $key => $value) {
				$sql = "insert into `webltm`.`product_images`(id_product,images) value ('$id_pro','$value')";
				$this->_query($sql);
			}
		}
		return $this->getFirstByQuery("select * from ${table} order by id DESC limit 1");

	}


	public function getFirstByQuery($sql){
		$result= $this->_query($sql);
		if ($result) {
			$row = mysqli_fetch_assoc($result);
		}
		return $row;
	}


	public function updateStatusCategory($table,$id,$status){
		if ($status==1) {
			$sql="update ${table} set status=0 where id='$id'";
		}else{
			$sql="update ${table} set status=1 where id='$id'";
		}

		$this->_query($sql);
	}

	public function delete($table,$id){
		$sql = "delete from ${table} where id = '$id' limit 1";
		$this->_query($sql);
	}


	public function sortPopular(){
		$sql = "select * from ${table} order by ";
	}


	public function inforCatByIdCat($table,$id){
		$sql = "select * from ${table} where id = '$id' limit 1";
		$result = $this->_query($sql);
		if ($result) {
			$rows = mysqli_fetch_assoc($result);
		}
		return $rows;
	}


	public function update($table,$data=[],$file=[],$id){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$created_at=$updated_at= date('Y-m-d H:i:s');
		$data += ['updated_at'=>$updated_at];
		$newData=[];
		if (!empty($data['fullname']) || !empty($data['password']) || !empty($data['status']) || !empty($data['saled'])) {
			unset($data['updated_at']);
		}
		foreach ($data as $key => $value) {
			array_push($newData, "${key}= '" .$value. "'");
		}
		$newData = implode(',', $newData);
		if (isset($file['images'])) {
			$files=$file['images'];
			$files_name = $files['name'];
			if (!empty($files_name[0])) {
			$sql = "delete from `webltm`.`product_images` where id_product = '$id'";
			$this->_query($sql);
			foreach ($files_name as $key => $value) {
				move_uploaded_file($files['tmp_name'][$key],"Uploads/".$value);
			}
			foreach ($files_name as $key => $value) {
				$sql = "insert into `webltm`.`product_images`(id_product,images) value ('$id','$value')";
				$this->_query($sql);
			}
			}
		}
		$sql="update webltm.${table} set ${newData} where id ='$id'";
		$this->_query($sql);
	}


	public function search($table,$keysearch){

		$sql="select * from webltm.${table} where name like '%$keysearch%'";
		$result = $this->_query($sql);
		$data = [];
		if ($result) {
			while($rows = mysqli_fetch_assoc($result)) {
				array_push($data, $rows);
			}
		}
		return $data;
	}


	public function GetInforCustomerByEmailCheck($table,$email){
		$email=$_SESSION['email'] ?? '' ;
		$sql = "select * from ${table} where email = '$email'";
		$result = $this->_query($sql);
		if ($result) {
			$row=mysqli_fetch_assoc($result);
		}
		return $row;
	}


	public function GetInforCustomerByEmail($table,$email){
		$sql = "select * from ${table} where email = '$email'";
		$result = $this->_query($sql);
		if ($result) {
			$row=mysqli_fetch_assoc($result);
		}
		return $row;
	}


	public function sumOrder(){
		$products=[];
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $id => $value) {
			// $_SESSION['cart'][$id]['idUser']= '';
				if (isset($_SESSION['cart']) && $_SESSION['cart'][$id]['idUser']==$_SESSION['id']) {
					array_push($products, $_SESSION['cart'][$id]);
				}
			}
		}

		$data = [];
		foreach ($products as $key => $value) {
			array_push($data, "${key}") ;
		}
		$sum = 0;
		for ($i=0; $i <count($products) ; $i++) { 
			$sum +=$products[$data[$i]]['qty'];
		}
		return $sum;
	}


	public function getByQuery($sql){
		$result = $this->_query($sql);
		$data =[];
		while ($rows = mysqli_fetch_assoc($result)) {
			array_push($data, $rows);
		}
		return $data;
	}



	public function _query($sql){
		return mysqli_query($this->connect,$sql);
	}

}

?>