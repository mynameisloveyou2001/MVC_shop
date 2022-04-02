<?php   require_once "./inc/header.php"; ?>



<div class="app__container">
	<div class="grid">
		<div class="grid__row app__content">
                    <!-- <div style="border: 1px solid black;"><h1 style="text-align: center; color: red;">CẢM ƠN BẠN ĐÃ THAM GIA SHOP CHÚNG TÔI</h1>  
                    </div> -->
                    <?php if (isset($customer)): ?>
                    	<div class="" style="width: 100%;">
                    		<p class="headercart" style="font-size: 30px;margin: auto;
                    		text-align: center;">Thông tin quý khách</p>
                    		<div style="width: auto; margin: 23px 0 0 170px;display: flex;flex-direction: row;align-items: baseline;" class="containercart">
                    			<div>
                    				<h3>THÔNG TIN</h3>
                                    <?php if (!empty($alert)): ?>
                                        <span><?php echo $alert; ?></span>
                                    <?php endif ?>
                    				<table style="border-spacing: 11px;width: inherit;">
                    					<tbody style="font-size: 14px;">

<!--                     					<tr style="border-bottom: 1px solid black;margin: 10px 0 0 0;">
                    						<td style="width: 100px;">Tài khoản:  </span></td>
                    						<td>
                    							phanduc
                    						</td>
                    					</tr> -->
                    					<tr style="border-bottom: 1px solid black;margin: 10px 0 0 0;">
                    						<td style="width: 100px;">Khách hàng:  </span></td>
                    						<td>
                    							<?=$customer['fullname']?>
                    						</td>
                    					</tr>
                    					<tr>
                    						<td style="width: 100px;">Email:   </span></td>
                    						<td>
                    							<?=$customer['email']?>
                    						</td>
                    					</tr>
                    					<tr>
                    						<td style="width: 100px;" >Số điện thoại: </span></td>
                    						<td>
                    							<?=$customer['phone']?>
                    						</td>
                    					</tr>
                    					<tr>
                    						<td style="width: 100px;">Địa chỉ:</span></td>
                    						<td style="width: 300px;">
                    							<?=$customer['address']?>
                    						</td>
                    					</tr>
                    				</tbody>
                    			</table>
                    		</div>

                    		<div class="formOrder" style="margin: 10px 0 0 55px;" >
                    			<form style="flex-direction: column;" action="?controller=customer&action=update" method="POST" enctype="multipart/form-data">
                    				<h3>ĐỔI MẬT KHẨU</h3>
                    				<label class="inputorder">Chọn ảnh đại diện</label>
                    				<input  required class="inputorder" type="file" name="img" value=""></br>
                    				<label class="inputorder">Tên</label>
                    				<input  required class="inputorder" type="text" name="fullname" value="<?=$customer['fullname']?>"></br>
                    				<label class="inputorder">Điện thoại</label>
                    				<input  required class="inputorder" type="text" name="phone" value="<?=$customer['phone']?>"></br>
                    				<label class="inputorder">Mật khẩu hiện tại</label>
                    				<input  required class="inputorder" type="password" name="password" value="<?=$customer['password']?>"></br>
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
                    <div class="buttonhead" style="margin: 0 0 40px 384px;"><a  style="text-decoration: none; color: white; font-size: medium;" href="?controller=product&action=index">Trở lại mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    	function showForm()
    	{
    		return $('.formOrder').slideToggle();
    	}

    	function hiddenButton()
    	{
    		return $('.hidden').hide();
    	}
    </script>

    <?php   require_once "./inc/footer.php"; ?>
