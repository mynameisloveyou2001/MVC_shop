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
	<script src="/asset/js/main.js"></script>
</head>

<body>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="">Quản Lý Liên Hệ</a>
		</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Danh sách Liên Hệ</h2>
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
							<th width="30px">STT</th>
							<th>Tên</th>
							<th>Ngày gửi</th>
							<th>Email</th>
							<th>Sản Phẩm</th>
							<th>Nội Dung</th>
							<th width="70px" colspan="2">Thao Tác</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php if (!empty($comments)): $stt=1; ?>
							<?php foreach ($comments as $value): ?>	
								<tr>
									<td><?=$stt++?></td>
									<td><?php foreach ($customers as $valueCus): ?>
									<?php if ($valueCus['id']==$value['member_id']): ?>
										<?=$valueCus['fullname']?>
									<?php endif ?>
									<?php endforeach ?></td>
									<td><?=$value['date']?></td>
									<td><?php foreach ($customers as $valueCus): ?>
									<?php if ($valueCus['id']==$value['member_id']): ?>
										<?=$valueCus['email']?>
									<?php endif ?>
									<?php endforeach ?></td>
									<td><?php foreach ($products as $valuePro): ?>
									<?php if ($valuePro['id']==$value['product_id']): ?>
										<?=$valuePro['name']?>
									<?php endif ?>
									<?php endforeach ?></td>
									<td style="width: 400px;"><p readonly style="width: 400px;" rows="3"><?php echo trim($value['content'])?></p>
										<?php if ($value['status']==1): ?>
											<form method="post" action="?controller=product&action=responeComment">
												<input type="hidden" name="idCmt" value="<?=$value['id']?>">
												<textarea class="contentArea" id="reply" style="width:400px" rows="4" name="reply"></textarea>
											<?php endif ?>
											<?php if ($value['status']==2): ?>
												<textarea class="contentArea" readonly style="outline:none;border: 1px solid black;width:400px" id="reply" rows="4" name="reply">
													<?=$value['reply']?></textarea>
												<?php endif ?>
											</td>
											<?php if ($value['status']==0): ?>
												<td><a href="?controller=product&action=confirmComment&id=<?=$value['id']?>"><button style="margin-top:70px; width: 90px;" onclick="return confirm('Are you sure?')" class="btn btn-success">Duyệt</button ></a></td>
											<?php else: ?>
												<?php if ($value['status']==1): ?>
													<td><button style="margin-top:70px; width: 90px; cursor: pointer;" class="btn btn-success" name="responeCmt" type="submit">Phản hồi</button></td>
												<?php endif ?>
												<?php if ($value['status']==2): ?>
													<td><p style="margin-top:70px; width: 100px;">Đã phản hồi</p></td>
												<?php endif ?>
											</form>
										<?php endif ?>
										<td><a href="?controller=product&action=deleteComment&id=<?=$value['id']?>"><button style="margin-top:70px; width: 90px;" onclick="return confirm('Are you sure?')" class="btn btn-danger">Xóa</button ></a></td>
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