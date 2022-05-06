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
			<a class="nav-link active" href="">Quản lý Danh mục</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index.php?controller=product&action=index">Quản lý Sản Phẩm</a>
		</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý danh mục sản phẩm</h2>
			</div>
			<!-- Tìm Kiếm -->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<a href="?controller=category&action=insert">
							<button class="btn btn-success" style="margin-bottom: 20px;">Thêm danh mục
							</button>
						</a>
					</div>
					<div class="col-lg-6">
						<form method="post" action="?controller=category&action=index">
							<div class="form-group input">
								<input type="input" class="form-control" placeholder="Search..." name="keysearch">
								<input type="submit" class="form-control" value="Search">
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
							<th>Tên danh mục</th>
							<th>Trạng thái</th>
							<th>Ngày Cập Nhật</th>
							<th width="70px"></th>
							<th width="70px"></th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php if (!empty($categories)):
							$stt = 1; ?>
							<?php foreach ($categories as $value): ?>

								<tr>
									<td><?=$stt++?></td>
									<td><?=$value['name']?></td>
									<td>
								<?php if ($value['status'] == '0'): ?>
									<a href="?controller=category&action=updateStatus&id=<?=$value['id']?>&status=<?=$value['status']?>">Off</a>
								<?php else: ?>
									<a href="?controller=category&action=updatestatus&id=<?=$value['id']?>&status=<?=$value['status']?>">On</a>
								<?php endif ?></td>	
									<td><?=$value['created_at']?></td>
									<td><a href="?controller=category&action=update&id=<?=$value['id']?>"><button class="btn btn-warning">Sửa</button></a></td>
									<td><a href="?controller=category&action=delete&id=<?=$value['id']?>"><button class="btn btn-danger" onclick="deleteitem()">Xóa</button ></a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</ul>
			<a style="text-decoration: none;" href="?controller=product&action=home"><button class="btn btn-success">Trở lại</button></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	function deleteitem(){
		var option = confirm("Bạn chắc xóa chứ?");
		if(!option){
			return;
		}
	}
</script>
</body>
</html>