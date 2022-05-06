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

    <style type="text/css">
        .text {
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

<body>
    <ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link active" href="#">Quản lý Danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=category&action=index">Quản lý Sản Phẩm</a>
        </li>
    </ul>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Cập nhật Danh Mục</h2>
            </div>
            <div class="panel-body">
                <div class="form-group" >
                    <form method="post" action="index.php?controller=category&action=update&id=<?php echo $id ?>">
                        <div class="form-group">
                            <label for="name">Tên Danh Mục:</label>
                            <input required="true" type="text" class="form-control" id="id" name="name" value="<?=$result['name']?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="status" id="id">
                                <option value="">--- Lựa chọn trạng thái ---</option>
                                <?php if ($result['status']=='1'): ?> 
                                <option selected value="1">On</option>
                                <option value="0">Off</option>
                            <?php else: ?>
                                <option value="1">On</option>
                                <option selected value="0">Off</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <button style="margin-top: 70px;" class="btn btn-success" type="submit">Lưu</button>
                    </form>
                </div>
            </div>
        </div>



        <!-- Perious page -->
        <div class="text">
            <a href="index.php?controller=category&action=index" class="fonttext">BACK</a>
        </div>
    </body>