  <?php
  require_once "./inc/header.php";
  // require_once "./inc/menu.php";
  ?>
  <div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-4">
                <p class="headercart">Thông tin quý khách</p>
                <div class="containercart">
                    <?php  $code = rand(10,100000); if (isset($customer)):?>
                        <form action="?controller=order&action=insert" method="post">              
                            <table style="border-spacing: 15px;">
                                <tbody>
                                    <input type="hidden" name="code" value="<?=$code?>">
                                    <tr style="border-bottom: 1px solid black;margin: 10px 0 0 0;">
                                        <td class="labelcart">Khách hàng <span class="star"> </span></td>
                                        <td>
                                            <input  class="inputcart" name="customer_name" required type="text" placeholder="Họ và tên" value="<?=$customer['fullname']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="labelcart">Email  <span class="star"> </span></td>
                                        <td>
                                            <input readonly name="customer_email"  class="inputcart" required type="text" placeholder="Email" value="<?=$customer['email']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  class="labelcart">Số điện thoại <span class="star"> </span></td>
                                        <td>
                                            <input name="customer_phone" class="inputcart" required type="text" placeholder="phone" value="<?=$customer['phone']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="labelcart">Tỉnh/Thành phố <span class="star"> </span></td>
                                        <td>
                                            <input style="overflow: auto;" class="inputcart" required name="province" id="province" value="<?=$customer['province']?>"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="labelcart">Quận huyện <span class="star"> </span></td>
                                        <td>
                                            <input type="text" name="district" style="overflow:auto;" class="inputcart" required id="district" value="<?=$customer['district']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="labelcart">Địa chỉ giao hàng <span class="star"> </span></td>
                                        <td>
                                            <textarea name="address" class="inputcart" required  class="form-control" rows="4"  style="height: auto !important;" placeholder="Địa chỉ giao hàng" value="<?=$customer['address']?>"><?=$customer['address']?></textarea>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td class="labelcart">Mã Giảm giá <span class="star"> </span></td>
                                        <td>
                                            <input disabled name="discount" class="inputcart" required type="text" placeholder="mã giảm giá(nếu có)" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button style="float: right;border: none;" class="buttonhead buttonhead1" type="submit">ĐẶT HÀNG</button>
                        </form>   
                    <?php endif ?>
                </div>
            </div>
            <div class="grid__column-7">
                <p class="headercart">Thông tin đơn hàng</p>
                <table style="border-spacing: 24px; font-size: 15px; margin: 0 0 90px;" style="color: #333">
                    <tbody>
                        <tr class="">
                            <td style="width: 150px;"><h4>Sản phẩm</h4></td>
                            <td class="text-center"><h4>Số lượng</h4></td>
                            <td class="text-center"><h4>Giá</h4></td>
                            <td class="text-center"><h4>Tổng</h4></td>
                        </tr>
                        <?php if (isset($productCart)): $totalMoney=0; ?>
                            <?php foreach ($productCart as $value): ?>

                                <tr>
                                    <td style="min-width: 202px;"><?=$value['name']?></td>
                                    <td class="text-center"><?=$value['qty']?></td>
                                    <td><?=$value['price_sale']?></td>
                                    <?php $totalMoney+=($value['qty'])*($value['price_sale']);   ?> 
                                    <td style=""><?php echo ($value['qty']*$value['price_sale']) ?> VNĐ</td>
                                </tr>
                            <?php endforeach ?>
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
<!--                     <tr>
                        <td>
                            <div class="buttonhead buttonhead1"><a style="text-decoration: none; color: white;" href="OrderSuccess.html">ĐẶT HÀNG</a></div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div> 
</div> 
</div>    

<?php 
require_once "./inc/footer.php";


?>

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