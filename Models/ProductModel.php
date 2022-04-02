<?php 
/**
 * 
 */
class ProductModel extends BaseModel
{
    const tableProduct= 'product';
    const tableCategory= 'category';
    const tableImage= 'product_images';
    const tableComment= 'comment';
    public function getAll(){
     return $this->findAll(self::tableProduct);
 }


// GetImage
 public function getImages($id=''){
    $sql = "select * from `webltm`.`product_images` where id_product = '$id'";

    return $this->getByQuery($sql);
}

//Get Product ban chay
public function searchProBanChay(){
    $sql = "select * from `webltm`.`product` order by product_saled desc";
    return $this->getByQuery($sql);
}

//
public function searchProBanChayDetails(){
    $sql = "select * from `webltm`.`product` order by product_saled desc limit 4";
    return $this->getByQuery($sql);
}



//Commment
public function insertComment($idCus='',$id='',$date='',$content=''){
    $sql="insert into `webltm`.`comment` (member_id,product_id,date,content) value('$idCus','$id','$date','$content')";
    $this->_query($sql);
}

public function getAllComment($id){
    $sql = "select * from `webltm`.`comment` where status='1' or status='2' and product_id ='$id' order by id desc";
    return $this->getByQuery($sql);
}

public function getAllComments(){
    $sql = "select * from `webltm`.`comment` order by id desc";
    return $this->getByQuery($sql);
}

public function deleteCmt($id=''){
    $this->delete(self::tableComment,$id);
}

public function updateComment($data,$id){
    return $this->update(self::tableComment,$data,$file=[],$id);
}


public function searchProMoiNhat(){
    $sql = "select * from `webltm`.`product` order by created_at desc";
    return $this->getByQuery($sql);
}

public function getAllwithCat($sortdec='desc',$page=1){
    $startIndex=($page-1)*4;
    $sql = "select product.*, category.name as categoryName from product inner join category on 
    product.category_id =category.id order by product.price $sortdec limit $startIndex,4";
    return $this->getByQuery($sql);
}

public function getAllwithCatUser($sortdec='desc',$page=1){
    $startIndex=($page-1)*10;
    $sql = "select product.*, category.name as categoryName from product inner join category on 
    product.category_id =category.id order by product.price $sortdec limit $startIndex,10";
    return $this->getByQuery($sql);
}

public function formatMoney($n=0){
    return $this->Money($n);
}

public function inforProById($id){
    return $this->inforCatByIdCat(self::tableProduct,$id);
}


public function insertPro($data=[],$file=[]){

    $this->insert(self::tableProduct,$data,$file);
    header('location:http://localhost:8000/MVC/NewMVC/Admin/index.php?controller=product&action=index');
}



public function updatePro($data=[],$file=[],$id=''){
    $permited = array('jpg','jpeg','png','gif') ?? [];
    $file_name = $file['image']['name'] ?? [];
    $file_size = $file['image']['size'] ?? [];
    $file_temp = $file['image']['tmp_name'] ?? [];
    if (!empty($file_name)) {
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image =substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "Uploads/".$unique_image ;
        $data += ['image'=>$unique_image];
        move_uploaded_file($file_temp, $uploaded_image);
    }

    if (!empty($data['product_desc'])) {
        $data['product_desc']= trim($data['product_desc']);
    }
    if (isset($data['numberadd'])) {
        $data['number'] += $data['numberadd'];
        unset($data['numberadd']);
    }
    $this->update(self::tableProduct,$data,$file,$id);
    header('location:http://localhost:8000/MVC/NewMVC/Admin/index.php?controller=product&action=index');
}

public function getSearch($keysearch){
    $sql="select product.*, category.name as categoryName from product inner join category on 
    product.category_id = category.id where product.name like '%$keysearch%'";
    return $this->getByQuery($sql);
}


public function getAllProByCatId($idCat,$idPro=null){
    $sql = "select * from product where category_id = '$idCat'";
    if (isset($idPro)) {
        $sql = "select * from product where category_id = '$idCat' and id !='$idPro'";
    }

    return $this->getByQuery($sql);
}

public function deletePro($id){
    $this->delete(self::tableProduct,$id);
    header('location:http://localhost:8000/MVC/NewMVC/Admin/index.php?controller=product&action=index');
}

public function getProById($id){
    $sql = "select * from product where id = '$id' limit 1";
    return $this->getByQuery($sql);
}


public function sumPro(){
    return $this->sumOrder();
}

public function getProduct(){
    $sql = 'SELECT * FROM `webltm`.`customer` order by `webltm`.`customer`.`saled` desc limit 1';
    $product = $this->_query($sql);
    $result = mysqli_fetch_assoc($product);
    return $result;
}

}

?>