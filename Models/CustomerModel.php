<?php 
class CustomerModel extends BaseModel
{
 const tableCustomer= 'customer';
 const tableCategory= 'category';
 const tableAdmin= 'useradmin';
 public function getAll(){
    return $this->findAll(self::tableCustomer);
 }

 public function CusRegister($data=[],$file=[]){
   $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
   unset($data['confirmpassword']);
   $result=$this->insert(self::tableCustomer,$data,$file);
   if ($result==1) {
      $alert='Đăng ký thành công';
   }else{
      $alert='Đăng ký thất bại';
   }
   return $alert;
}


public function AdRegister($data=[],$file=[]){
   $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
   unset($data['confirmpassword']);
   $result=$this->insert(self::tableAdmin,$data,$file);
   if ($result==1) {
      $alert='Đăng ký thành công';
   }else{
      $alert='Đăng ký thất bại';
   }
   return $alert;
}

public function getInforCusCheckUser($email=''){
   return $this->GetInforCustomerByEmail(self::tableCustomer,$email);
}

public function getInforAdminCheck($email=''){
   return $this->GetInforCustomerByEmail(self::tableAdmin,$email);
}

public function getInforCus($email=''){
   return $this->GetInforCustomerByEmail(self::tableCustomer,$email);
}

public function getInforCusById($id=''){
   return $this->getInforCustomerById(self::tableCustomer,$id);
}


public function updateCus($data=[],$file=[],$id){
  $permited = array('jpg','jpeg','png','gif') ?? [];
  $file_name = $file['img']['name'] ?? [];
  $file_size = $file['img']['size'] ?? [];
  $file_temp = $file['img']['tmp_name'] ?? [];
  if (!empty($file_name)) {
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $unique_image =substr(md5(time()),0,10).'.'.$file_ext;
    $uploaded_image = "Admin/Uploads/".$unique_image ;
    $data['phone'] = trim($data['phone']);
    $data += ['img'=>$unique_image];
    move_uploaded_file($file_temp, $uploaded_image);

 }
 $this->update(self::tableCustomer,$data,$file,$id);

}

public function updateAdmin($data=[],$file=[],$id){
  $permited = array('jpg','jpeg','png','gif') ?? [];
  $file_name = $file['img']['name'] ?? [];
  $file_size = $file['img']['size'] ?? [];
  $file_temp = $file['img']['tmp_name'] ?? [];
  if (!empty($file_name)) {
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $unique_image =substr(md5(time()),0,10).'.'.$file_ext;
    $uploaded_image = "../Admin/Uploads/".$unique_image ;
    $data['phone'] = trim($data['phone']);
    $data += ['img'=>$unique_image];
    move_uploaded_file($file_temp, $uploaded_image);

 }
 $this->update(self::tableAdmin,$data,$file,$id);

}

public function deleteCus($id=''){
  $this->delete(self::tableCustomer,$id);
}

}
?>