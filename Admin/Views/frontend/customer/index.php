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
		<li class="nav-item">
			<a class="nav-link active" href="">Quản Lý Khách Hàng</a>
		</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Danh sách Khách Hàng</h2>
			</div>
			<!-- Tìm Kiếm -->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
					</div>
					<div class="col-lg-6">
						<form method="GET">
							<div class="form-group input">
								<input type="input" class="form-control" placeholder="Search..." name="s" id="s">
							</div>
						</form>					
					</div>
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead  class="text-center">
						<tr>
							<th width="50px">STT</th>
							<th>Tên khách hàng</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th width="200px">Đơn đã đặt</th>
							<th width="100px">Thao tác</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php if (!empty($customer)):$stt=1; ?>
							<?php foreach ($customer as $value): ?>
								<tr>
									<td><?=$stt++?></td>
									<td><?=$value['fullname']?></td>
									<td><?=$value['email']?></td>
									<td><?=$value['phone']?></td>
									<td><?=$value['saled']?></td>
<!-- 									<td><a href="editkhachhang.html"><button class="btn btn-warning">Xem</button></a></td> -->
									<td><a onclick="return confirm('Arre you sure?')" href="?controller=customer&action=delete&id=<?=$value['id']?>"><button class="btn btn-danger">Xóa</button ></a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</ul>
			<a href="?controller=product&action=home"><button class="btn btn-success">Trở lại</button></a>
		</div>
	</div>
</div>
</body>
</html>