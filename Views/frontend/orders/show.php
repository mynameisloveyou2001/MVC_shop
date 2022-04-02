<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4chan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<ul class="nav nav-tabs">
		<li class="nav-ite active">
			<a class="nav-link" href="Category.html">Quản lý Đơn Hàng</a>
		</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý Đơn Hàng</h2>
			</div>
			<!-- Tìm Kiếm -->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
					</div>
					<div class="col-lg-6">
						<form method="GET">
							<div class="form-group input">
								<input type="input" class="form-control" placeholder="Search..." name="" id="">
							</div>
						</form>					
					</div>
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead  class="text-center">
						<tr>
							<th>Mã đơn hàng</th>
							<th>Khách Hàng</th>
							<th>Điện thoại</th>
							<th>Tổng tiền</th>
							<th>Ngày tạo</th>
							<th>Trạng thái</th>
							<th colspan="1">Xử lý đơn</th>
							<th colspan="3">Thao tác</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php if (!empty($orders)): ?>
							<?php foreach ($orders as $value): ?>
								<tr>
									<td><?=$value['code']?></td>
									<td><?=$value['customer_name']?></td>
									<td><?=$value['customer_phone']?></td>
									<td><?=$value['product_price']*$value['product_qty']?></td>
									<td><?=$value['created_at']?></td>
									<!-- <td>Đang chờ duyệt</td> -->
									<?php if ($value['status'] == 0): ?>
										<td>Đang chờ hàng...</td>
									<?php endif; ?>
									<?php if($value['status'] == 1): ?>
										<td>Đang xác thực</a></td>
									<?php endif; ?>
									<?php if ($value['status'] == 2): ?>
										<td>Đã nhận</td>
									<?php endif; ?>

									<?php if ($value['status'] == 3): ?>
										<td>Đã hủy</td>
									<?php endif; ?>
<!-- 						<td><a href="#"><button id="confirm" onclick="confirmOrder()" class="btn btn-success">Duyệt đơn hàng</button></a></td>
							<td><a href="#"><button class="btn btn-danger" onclick="deleteitem()">Hủy đơn</button></a></td>
							<td><a href="#"><button class="btn btn-danger" onclick="deleteitem()">Xóa đơn</button></a></td>
							<td><a href="xemdon.html"><button class="btn btn-warning" >Xem</button ></a></t -->
								<?php if ($value['status'] == 2):?>
									<td>Đã nhận</td>
									<td><a href="?controller=order&action=orderDetails&id=<?=$value['id']?>">Xem đơn</a></td>
								<?php endif; ?>
								<?php if($value['status'] == 1):?>
									<td><a href="?controller=order&action=updateConfirm&id=<?=$value['id']?>">Xác thực Đã Nhận</a></td>
									<td><a onclick="return confirm('Are you sure ?')" href="?controller=order&action=updateDestroy&id=<?=$value['id']?>">Hủy đơn</a></td>
								thực Đã Nhận</a></td>
								<td><a href="?controller=order&action=orderDetails&id=<?=$value['id']?>">Xem đơn</a></td>
							<?php endif; ?>
							<?php if($value['status'] == 0):?>
								<td>N/A</td>
								<td><a href="?controller=order&action=orderDetails&id=<?=$value['id']?>">Xem đơn</a></td>
							<?php endif; ?>

							<?php if($value['status'] == 0):?>
								<td><a onclick="return confirm('Are you sure ?')"  href="?controller=order&action=updateDestroy&id=<?=$value['id']?>">Hủy đơn</a></td>
							<?php endif; ?>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</ul>
	<a href="?controller=product&action=index"><button style="" class="btn btn-success">Trở lại</button></a>
</div>
</div>
</div>
<script type="text/javascript">

</script>
</body>
</html>