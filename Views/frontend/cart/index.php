<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4chan</title>
    <link rel="stylesheet" href="public/css/Cart.css">
    <link rel="stylesheet" href="public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link 
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
    rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" src="public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<?php 
include_once './Helper/Format.php';
$fm = new Format();
?>
<body>
    <h2 class="text-center">Giỏ hàng</h2>
    <div class="container">
        <form action="?controller=cart&action=update" method="post">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <!-- <th style="width:50%">Image</th> -->
                        <th style="width:50%;text-align: center;">Tên sản phẩm</th>
                        <th style="width:10%">Giá</th>
                        <th style="width:8%">Số lượng</th>
                        <th style="width:12%" class="text-center">Thành tiền</th>
                        <th style="width:10%"> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalMoney=0; if (isset($productCart)): $stt=1; ?>
                        <?php foreach ($productCart as $value): ?>   
                            <tr>
                                <td id="deleteIdd" data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs">
                                            <img
                                            src="Admin/Uploads/<?=$value['image']?>"
                                            alt="Sản phẩm 1" class="img-responsive" width="100">
                                        </div>
                                        <div style="text-align: center;" class="col-sm-10">
                                            <h4 class="nomargin"><?=$value['name']?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price"><?php echo $fm->Money($value['price_sale'])?>VND</td>
                                <td data-th="Quantity"><input min="0" class="form-control text-center" name="qty[<?=$value['id']?>]" value="<?=$value['qty']?>" type="number">
                                </td>
                                <?php $totalMoney+=($value['qty'])*($value['price_sale']);   ?> 
                                <td data-th="Subtotal" class="text-center"><?php echo $fm->Money(($value['qty'])*($value['price_sale']))?>đ</td>
                                <td>
                                  <a id="deleteId" onclick="return confirm('Are you sure delete This?')" href="?controller=cart&action=delete&idDel=<?=$value['id']?>"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                      <?php endforeach ?>
                  <?php endif ?>
              </tbody>
              <tfoot>
                  <?php if (!empty($alert)): ?>
                    <tr>
                        <td style="padding: 30px 0;"><?php echo $alert; ?></td>
                    </tr>
                <?php endif ?>
<!--                 <tr class="visible-xs">
                    <td class="text-center"><strong>Tổng 200.000 đ</strong>
                    </td>
                </tr>
 -->                <tr>
                    <td style="display: flex;
                    justify-content: space-between;"><a style="width: 25%;" href="?controller=product&action=index" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp
                    tục mua hàng</a>
                    <button style="width: 25%;" type="submit" class="btn btn-warning">Cập nhật</button>
                    <a style="width: 25%;" href="?controller=cart&action=destroy" class="btn btn-warning">Xóa tất cả</a>
                </td>
                <td colspan="2" class="hidden-xs"> </td>
                <td class="hidden-xs text-center"><strong>Tổng tiền <?php echo $fm->Money($totalMoney); ?> đ</strong>
                </td>
                <td><a href="?controller=order&action=index" class="btn btn-success btn-block">Thanh toán <i
                    class="fa fa-angle-right"></i></a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
</div>
<script type="text/javascript">
</script>
</body>

</html>