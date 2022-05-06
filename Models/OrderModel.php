<?php 
/**
 * 
 */
class OrderModel extends BaseModel
{
    const orderTable= 'orders';
    const orderDetailsTable= 'order_details';


    public function insertOrder($input=[]){
        return $this->insert(self::orderTable,$input,$file=[]);
    }


    public function insertOrderDetails($input=[]){
        return $this->insert(self::orderDetailsTable,$input,$file=[]);
    }


    public function getInforOrderByMonth($year,$month){
    $sql= "select webltm.orders.*, webltm.order_details.* from webltm.orders inner join webltm.order_details on orders.id=order_details.order_id and year(webltm.orders.created_at)=$year and month(webltm.orders.created_at)=$month where webltm.order_details.status ='1' or webltm.order_details.status='2'";
        $result=$this->getByQuery($sql);
     if ($result) {
        return $result;
    }
}

public function getInforOrdersById($id){
    $sql="select * from orders where id = '$id' limit 1";
    return $this->getFirstByQuery($sql);
}


public function getAllInforOrders(){
    $sql= "select webltm.orders.*, webltm.order_details.* from webltm.orders inner join webltm.order_details on orders.id=order_details.order_id";
    $result=$this->getByQuery($sql);
    if ($result) {
        return $result;
    }
}


public function getAllInforOrdersByCus($email=''){
    $sql= "select webltm.orders.*, webltm.order_details.* from webltm.orders inner join webltm.order_details on orders.id=order_details.order_id where customer_email='$email'";
    $result=$this->getByQuery($sql);
    if ($result) {
        return $result;
    }
}



public function getAllInforOrdersById($id=''){
    $sql= "select * from webltm.order_details where id='$id'";
    $result=$this->getFirstByQuery($sql);
    if ($result) {
        return $result;
    }
}

public function updateOrder($id,$data){
    //     if (!empty($file_name)) {
    //     $div = explode('.',$file_name);
    //     $file_ext = strtolower(end($div));
    //     $unique_image =substr(md5(time()),0,10).'.'.$file_ext;
    //     $uploaded_image = "Uploads/".$unique_image ;
    //     $data += ['image'=>$unique_image];
    //     move_uploaded_file($file_temp, $uploaded_image);
    // }
    return $this->update(self::orderDetailsTable,$data,$file=[],$id);
}

public function getAllWithPage($page=1, $search = ''){
    $startIndex=($page-1)*4;
    $sql = "select webltm.orders.*, webltm.order_details.* from webltm.orders inner join webltm.order_details on orders.id=order_details.order_id where orders.customer_name like '%$search%' or orders.customer_phone like '%$search%' or orders.customer_email like '%$search%' or orders.created_at like '%$search%'  limit $startIndex,4";
     return $this->getByQuery($sql);
}


public function deleteOrder($id){
 return $this->delete(self::orderDetailsTable,$id);
}
}

?>