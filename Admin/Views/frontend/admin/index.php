<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4chan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/detailsproduct.css">
    <script type="text/javascript" src="public/js/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="public/js/main.js"></script>
    <link rel="stylesheet" href="../public/css/Cart.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
    rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" src="../public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>
<body>
    <div class="app__container">
       <div class="grid">
          <div class="grid__row app__content">
            <?php if (isset($data)): ?>
             <div class="" style="width: 100%;">
              <p class="headercart" style="font-size: 30px;margin: auto;
              text-align: center;">Thông tin ADMIN</p>
              <div style="width: auto; margin: 23px 0 0 170px;display: flex;flex-direction: row;align-items: baseline;justify-content: space-around;" class="containercart">
               <div>
                <h3>THÔNG TIN</h3>
                <table style="border-spacing: 11px;width: inherit;">
                   <tbody style="font-size: 14px;">
                     <tr style="border-bottom: 1px solid black;margin: 10px 0 0 0;">
                      <td style="width: 100px;">HỌ TÊN:</span></td>
                      <td style="font-weight:700">
                       <?=$data['fullname']?>
                   </td>
               </tr>
               <tr>
                  <td style="width: 100px;">EMAIL:</span></td>
                  <td style="font-weight:700">
                   <?=$data['email']?>
               </td>
           </tr>
           <tr>
              <td style="width: 100px;" >SDT:</span></td>
              <td style="font-weight:700">
               <?=$data['phone']?>
           </td>
           <tr>
              <td style="width: 100px;" >VAI TRÒ:</span></td>
              <td style="font-weight:700">
               ADMIN
           </td>
           </tr>
       <?php if (!empty($alert)): ?>
           <tr>
              <td style="width: 100px;" ><?php echo $alert ?></span></td>
           </tr>
   <?php endif ?>
</tbody>
</table>

<div class="buttonhead" style="margin: 50px 0 0 0;"><a  style="text-decoration: none; color: white; font-size: medium;" href="?controller=product&action=home">Trở lại</a>
</div>
</div>

<div class="formOrder" style="margin: 10px 0 0 55px;" >
   <form style="flex-direction: column;" action="?controller=admin&action=update" method="POST" enctype="multipart/form-data">
    <h3>ĐỔI MẬT KHẨU</h3>
    <label class="inputorder">Chọn ảnh đại diện</label>
    <input  class="inputorder" type="file" name="img" value=""></br>
    <label class="inputorder">Tên</label>
    <input  class="inputorder" type="text" name="fullname" value="<?=$data['fullname']?>"></br>
    <label class="inputorder">Điện thoại</label>
    <input  class="inputorder" type="text" name="phone" value="<?=$data['phone']?>"></br>
    <label>&nbsp;</label>
    <input class="buttonhead" type="submit" style="outline: none;
    border: none;font-size: 16px;float: right;margin:30px 88px 0 0;width: 205px;" value="Update">
</form>
</div>

<div class="formOrder" style="margin: 10px 0 0 55px;" >
   <form style="flex-direction: column;" action="?controller=admin&action=update" method="POST" enctype="multipart/form-data">
    <h3>ĐỔI MẬT KHẨU</h3>
    <label class="inputorder">Mật khẩu hiện tại</label>
    <input  required class="inputorder" type="password" name="password" value="<?=$data['password']?>"></br>
    <label class="inputorder">Mật khẩu mới</label>
    <input required class="inputorder" type="password" name="passwordNew" value=""></br>
    <label class="inputorder">Nhập lại mật khẩu mới</label>
    <input required class="inputorder" type="password" name="password" value=""></br>
    <label>&nbsp;</label>
    <input class="buttonhead" type="submit" style="outline: none;
    border: none;font-size: 16px;float: right;margin:30px 88px 0 0;width: 205px;" value="Update">
</form>
</div>

</div>
<?php endif ?>
</div>
</div>
</div>
</div>
</body>
</html>