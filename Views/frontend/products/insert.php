<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		.text  {
			background-color: gray;
			display: inline-block;
			margin: 0 591px;
			border: 1px solid #333;
		}

		.text:hover .fonttext {
			background-color: red;
			cursor: context-menu;
			color: white;
			text-decoration: none;
		}

		.fonttext {
			text-decoration: none;
			color: black;
			font-weight: 700;
		}
	</style>
	<title>Danh sách sản phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="public/js/main.js">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->

	<!-- <link rel="stylesheet" type="text/css" href="../../../public/css/main.css"> -->
	<!-- Summernode -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../public/js/ckeditor.js">
</head>
<body>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link" href="Category.php">Quản lý Danh Mục</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="product.php">Quản lý Sản Phẩm</a>
		</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm sản phẩm</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<form method="post" action="index.php?controller=product&action=insert" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Tên Sản Phẩm</label>
							<!-- <input type="text" name="" value="" HIDDEN> -->
							<input required="true" type="text" class="form-control" id="title" name="name" value="">
						</div>

						<div class="form-group">
							<label for="id_category">Chọn Danh mục loại sản phẩm:</label>
							<select class="form-control" name="category_id" id="id_category">
								<option>--- Lựa chọn Danh Mục ---</option>
								<?php if (isset($categories)): ?>
									<?php foreach ($categories as $value): ?>
										<option value="<?=$value['id']?>"><?=$value['name']?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
						</div>
						<div class="form-group">
							<label for="price">Giá bán</label>
							<input required="true" type="number" class="form-control" id="price" name="price" value="">
						</div>
						<div class="form-group">
							<label for="price">Số lượng</label>
							<input required="true" type="number" class="form-control" id="numb" name="number" value="">
						</div>
						<div class="form-group">
							<label for="price">Trạng thái hoạt động</label>
							<select name="status">
								<option>-----Chọn trạng thái</option>
								<option value="0">Ngững bán</option>
								<option value="1">Hoạt động</option>
							</select>
						</div>
						<div class="form-group">
							<label>Hình Ảnh</label>
							<input required="true" type="file" class="form-control" id="image" name="image" value="">
						</div>
<!--                         <label for="thumbnail">Nhà Cung Cấp</label>
				  		<input required="true" type="text" class="form-control" id="ncc" name="ncc" value="">
				  	</div> -->
				  	<div class="form-group">
				  		<label for="content">Mô tả</label>
				  		<textarea class="form-control" id="product_desc" rows="4" style="resize: none;" name="product_desc">
				  		</textarea>
				  	</div>
				  	<button class="btn btn-success" type="submit">Lưu</button>
				  </form>
				</div>
			</div>
			<script>
				tinymce.init({
					selector: '#product_desc'
				});
			</script>
		</div>



		<!-- Perious page -->
		<div class="text">
			<a href="index.php" class="fonttext">BACK</a>
		</div>

<!-- 		<script type="text/javascript">
			$(function()
			{
				$('#product_desc').summernote({ height: 300});
			})
		</script> -->
	</body>
	</html>