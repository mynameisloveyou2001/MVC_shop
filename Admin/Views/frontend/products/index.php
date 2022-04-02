
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
			<a class="nav-link" href="index.php?controller=category&action=index">Quản lý Danh mục</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="">Quản lý Sản Phẩm</a>
		</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý sản phẩm</h2>
			</div>
			<!-- Tìm Kiếm -->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<a href="?controller=product&action=insert">
							<button class="btn btn-success" style="margin-bottom: 20px;">Thêm sản phẩm
							</button>
						</a>
					</div>
					<div class="col-lg-6">
						<form method="post" action="index.php?controller=product&action=index">
							<div class="form-group input">
								<input type="text" class="form-control" placeholder="Search..." name="keysearch">
								<input type="submit" value="Search">
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
							<th>Hình Ảnh</th>
							<th>Tên Sản Phẩm</th>
							<th>Giá Gốc</th>
							<th>Giá Bán</th>
							<th>Danh mục</th>
							<th>Trạng thái</th>
							<th>Ngày Cập Nhật</th>
							<th>Số lượng</th>
							<th>Nhập hàng</th>
							<th width="70px"></th>
							<th width="70px"></th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php if (!empty($products)): $stt=($page-1)*4; ?>
							<?php foreach ($products as $value): ?>		
								<tr>
									<td><?=++$stt?></td>
									<td><img style="max-width: 49px;" src="Uploads/<?=$value['image']?>" alt="Dell"></td>
									<td><?=$value['name']?></td>
									<td><?=$value['price']?> VND</td>
									<td><?=$value['price_sale']?> VND</td>
									<td><?=$value['categoryName']?></td>
									<?php if ($value['status']=='1'): ?>
										<td>Hoạt động</td>
									<?php else: ?>
										<td>Ngưng hoạt động</td>
									<?php endif ?>
									<td><?=$value['updated_at']?></td>
									<td><?=$value['number']?></td>
									<td width="140px"><a href="?controller=product&action=import&id=<?=$value['id']?>"><button class="btn btn-success">Nhập thêm</button></a></td>
									<td><a href="?controller=product&action=update&id=<?=$value['id']?>"><button class="btn btn-warning">Sửa</button></a></td>
									<td><a href="?controller=product&action=delete&id=<?=$value['id']?>"><button class="btn btn-danger" onclick="deleteitem()">Xóa</button ></a></td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<span>Chưa có sản phẩm nào được bán</span>
						<?php endif ?>
					</tbody>
				</table>
			</ul>
			<a style="text-decoration: none;" href="?controller=product&action=home"><button class="btn btn-success">Trở lại</button></a>
			<div class="page" style="display: flex;
			justify-content: center;.
			align-items: baseline;">
			<?php if (isset($page) && $page > 1): ?>
				<?php echo '<a style="margin: 0 15px;
				background-color: black;
				padding: 0 10px;
				border-radius: 3px;
				color: white;
				text-decoration: none;
				opacity: 0.9;"  href="?controller=product&action=index&page='.($page-1).'"><</a>' ?>	
			<?php endif ?>				
			<?php 
			for ($i=1; $i <= $pageNumber; $i++) { 
				$stt += $stt;
				echo '<a style="margin: 0 15px;
				background-color: black;
				padding: 0 10px;
				border-radius: 3px;
				color: white;
				text-decoration: none;
				opacity: 0.9;"  href="?controller=product&action=index&page='.$i.'">'.$i.'</a>';
			}
			?>
			<?php if ($page<$pageNumber):$stt += $stt;?>

				<?php echo '<a style="margin: 0 15px;
				background-color: black;
				padding: 0 10px;
				border-radius: 3px;
				color: white;
				text-decoration: none;
				opacity: 0.9;"  href="?controller=product&action=index&page='.($page+1).'">></a>' ?>
			<?php endif ?>
		</div>
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