<?php 
include_once '../Helper/Format.php';
$fm = new Format();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4chan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/css/base.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/detailsproduct.css">
    <script type="text/javascript" src="public/js/main.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="public/js/main.js"></script>
    <link rel="stylesheet" href="../../public/css/Cart.css">
    <link 
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
    rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" src="public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
<div style="border: 1px solid black;"><h1 style="text-align: center; color: red;">THÔNG TIN ĐƠN HÀNG</h1></div>
<?php if (isset($productCart)): $totalMoney=0; ?>
    <div class="app__container">
        <div class="grid">
         <div class="grid__row app__content">
           <div class="grid__column-4">
            <p class="headercart">Thông tin Hình Ảnh</p>
            <div class="containercart" style="text-align:center;">
                <img style="max-width: 400px;" src="../Admin/Uploads/<?=$productCart['image']?>" alt="<?=$productCart['product_name']?>">
            </div>
        </div>
        <div class="grid__column-7" style="display: flex;
    flex-direction: column;
    align-items: center;">
            <p class="headercart">Thông tin đơn hàng</p>
            <table style="border-spacing: 24px; font-size: 15px; margin: 0 0 90px;" style="color: #333">
                <tbody>
                    <tr class="">
                        <td style="width: 150px;"><h4>Sản phẩm</h4></td>
                        <td class="text-center"><h4>Số lượng</h4></td>
                        <td class="text-center"><h4>Giá</h4></td>
                        <td class="text-center"><h4>Tổng</h4></td>
                    </tr>
                    <tr>
                        <td style="min-width: 202px;"><?=$productCart['product_name']?></td>
                        <td class="text-center"><?=$productCart['product_qty']?></td>
                        <td><?php echo $fm->Money($productCart['product_price']) ?>VNĐ</td>
                        <?php $totalMoney=($productCart['product_qty'])*($productCart['product_price']);   ?> 
                        <td style=""><?php echo $fm->Money($totalMoney) ?> VNĐ</td>
                    </tr>
                <?php endif ?>
                <tr>
                    <td colspan="3">Tổng cộng :</td>
                    <td style="min-width: 113px;"><?php echo $fm->Money($totalMoney) ?> VNĐ</td>
                </tr>
            </td>
            <tr>
                <td colspan="3">Phí giao hàng</td>
                <td style="float: right;min-width: 113px;">30,000 VNĐ </td>
            </tr>

            <tr>
                <td colspan="3">
                    <p style="color: red; font-weight: 700;">Thành tiền</p>
                    <span style="font-weight: 100; font-style: italic;">(Tổng số tiền thanh toán)</span>
                </td>


                <td style="color: red; font-weight: 700;"><?php $totalMoney+=30000;
                echo $fm->Money($totalMoney) ?> VNĐ</td>
            </tr>
            <tr>
                <td>
                    <div onclick="printerOrder()" class="buttonhead buttonhead1">In đơn hàng</div>
                </td>
            </tr>
            <tr>
                <td>
                   <button style="" onclick="window.history.back()" class="btn btn-success">Trở lại</button>
               </td>
           </tr>
       </tbody>
   </table>

</div> 
</div> 
</div>
<script>
    function printerOrder()
    {
        return print();
    }
</script>
</div>    


<style>
    .headercart{
        display: block;
        width: 100%;
        height: 40px;
        margin: 0;
        line-height: 39px;
        text-align: center;
        font-size: 18px;
        color: #333;
        font-weight: 600;
        border-bottom: 10px solid #dcdcdc;
    }
</style>
</body>
</html>