<?php 
// $file_path = realpath(dirname(__FILE__));
include_once './Helper/Format.php';
$fm = new Format();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4chan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/detailsproduct.css">
    <script type="text/javascript" src="public/js/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="public/js/main.js"></script>
    <link rel="stylesheet" href="public/css/Cart.css">
    <link 
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
    rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" src="public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--qr header__navbar-item-separate">Vào cửa hàng trên ứng dụng
                            <div class="header__qr">
                                <img src="img/qrcode.png" alt="QR code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="img/Google_Play.png" alt="Google_Play" class="header__qr-dowload-img"> Google_Play
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="img/app-store.png" alt="app-store" class="header__qr-dowload-img"> app store
                                    </a>                               
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item"><span class="header__navbar-title-nopoint">Kết nối</span>
                            <a href="" class="header__navbar-ion-link">
                                <i  class="header__navbar-ion fa fa-facebook-square"></i>
                            </a>
                            <a href="" class="header__navbar-ion-link">
                                <i  class="header__navbar-ion fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- slogan -->
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--qr">
                            <span class="slogan">DỄ ĐẾN</span></li>
                            <span class="slogan slogantail">KHÓ ĐI</span>
                        </li>
                    </ul>
                    <ul class="header__navbar-list">
                        <?php if (isset($_SESSION['login']) && $_SESSION['login']==1): ?>  
                            <li class="header__navbar-item header__navbar-item--notify ">
                                <a href="" class="header__navbar-item-link">
                                    <i  class="header__navbar-ion fa fa-bell"></i>Thông báo
                                </a>
                                <div class="header__notify">
                                    <header class="header__notify-header">
                                        <h3 style="text-align: center;">Thông báo mới nhận</h3>
                                    </header>
                                    <ul class="header__notify-list">
                                        <li class="header__notify-item header__notify-item-viewed">
                                            <a href="chitietsp.html" class="header__notify-link">
                                                <img src="img/dell2.PNG" alt="Avatar" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Sản phẩm Dell chính hãng Siêu HOT</span>
                                                    <span class="header__notify-description">Sản phẩm chính hãng siêu giảm giá</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item header__notify-item-viewed">
                                            <a href="" class="header__notify-link">
                                                <img src="img/dell.PNG" alt="Avatar" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Sản phẩm Dell Siêu rẻ</span>
                                                    <span class="header__notify-description">Sản phẩm chính hãng vừa rẻ vừa ngon</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item header__notify-item-viewed">
                                            <a href="" class="header__notify-link">
                                                <img src="https://cdn.vn.garenanow.com/web/lol-product/home/images/articles/KaioShin/2016/MSI_2016/logo_cac_doi/130px-SK_Telecom_T1logo_square.png" alt="Avatar" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Sản phẩm TaoLe chính hãng</span>
                                                    <span class="header__notify-description">Sản phẩm Nhóm 4 chính hãng</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer class="header__notify-footer">
                                        <a href="?controller=customer&action=register" class="header__notify-footer-btn">Xem thêm</a>

                                    </footer>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="header__navbar-item header__navbar-item--notify ">
                                <a href="" class="header__navbar-item-link">
                                    <i  class="header__navbar-ion fa fa-bell"></i>Thông báo
                                </a>
                                <div class="header__notify">
                                    <header class="header__notify-header">
                                        <h3 style="text-align: center;">Đăng nhập để nhận thông báo</h3>
                                    </header>
                                    <ul class="header__notify-list">
                                        <li class="header__notify-item header__notify-item-viewed">
                                            <!-- <a href="chitietsp.html" class="header__notify-link"> -->
                                                <img style="width: 100px;height: 100px; margin: auto;" src="img/noNote.png"/>
                                            </li>

                                        </ul>
                                        <footer class="header__notify-footer">
                                            <a href="?controller=customer&action=register" style="float: left;" class="header__notify-footer-btn">Đăng ký</a>
                                            <a href="?controller=customer&action=login" style="float: right;" class="header__notify-footer-btn">Đăng nhập</a>
                                        </footer>
                                    </div>
                                </li>
                            <?php endif ?>

                            <li class="header__navbar-item">
                                <a href="" class="header__navbar-item-link">
                                    <i  class="header__navbar-ion fa fa-question-circle"></i>Trợ giúp</a>
                                </li>
                                <style type="text/css">
                                 .header__navbar-user-img:hover{
                                    transform: scale(10);
                                    top: 210px;
                                    right: 100px;
                                    z-index: 2;
                                }

/*                                .header__navbar-ion:hover{
                                    z-index: 1;
                                    margin: 0 324px 0 0;
                                }
*/

                            </style>

                            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1): ?>
                                <li class="header__navbar-item header__navbar-user">
                                 <?php if (!empty($customer)): ?>
                                    <img  src="Admin/Uploads/<?=$customer['img']?>" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name"><?php echo $customer['fullname'] ?></span>
                                <?php else: ?>
                                    <span class="header__navbar-user-name">*</span>
                                <?php endif ?>

                                <ul class="header__navbar-user-menu">
                                    <li class="header__navbar-user-item">
                                        <a href="?controller=customer&action=getInforCusCurr">Tài khoản của tôi</a>
                                    </li>
                                    <li class="header__navbar-user-item">
                                        <a href="?controller=order&action=getInforOrderByCus">Đơn mua</a>
                                    </li>
                                    <li class="header__navbar-user-item header__navbar-user-item--saparate">
                                        <a href="?controller=customer&action=logout&idCus=<?=$_SESSION['id']?>">Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="header__navbar-item">
                                <a href="?controller=customer&action=register" class="header__navbar-item-link">
                                    <i  class="header__navbar-ion"></i>Đăng ký
                                </a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="?controller=customer&action=login" class="header__navbar-item-link">
                                    <i class="header__navbar-ion"></i>Đăng nhập
                                </a>
                            </li>
                            <li class="header__navbar-item header__navbar-user">
                                <!-- <img src="http://127.0.0.1:5500/tym.jpg" alt="" class="header__navbar-user-img"> -->
                                <span class="header__navbar-user-name"></span>
                                <ul class="header__navbar-user-menu">
                                    <li class="header__navbar-user-item">
                                        <a href="?controller=customer&action=login">Đăng Nhập</a>
                                    </li>
                                    <li class="header__navbar-user-item header__navbar-user-item--saparate">
                                        <a href="?controller=customer&action=register">Đăng Ký</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>

                <!-- header with search and logo -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="?controller=product&action=index" class="header__logo-link">
                            <img width="100px" height="70px" style="margin-left: 44px;" src="img/logo1.PNG" alt="">
                        </a>

                    </div>

                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <form style="display: flex;
                            height: 100%;
                            flex-direction: row;
                            justify-items: center;
                            align-items: center;
                            width: auto;" method="post" action="?controller=product&action=index">
                            <input type="text" class="header__search-input" placeholder="Search..." name="keysearch">
                            <input type="submit" value="Search" name="" style="margin-right: 3px;width: 10%;font-size: 17px;" class="header__search-btn">
                            <!--                           <i class="header__search-btn-icon fa fa-search header__search-option-item--active"></i> -->
                        </input>
                    </form>
                </div>
            </div>


            <!-- CART Layout -->
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1): ?>
                <div class="header__cart">
                    <div class="header__cart-wrap">
                        <?php if (!empty($sumOrder)): ?>
                            <a style="text-decoration: none;color: white;" href="index.php?controller=cart&action=index">
                                <i style="font-size: xx-large;" class="header__cart-icon fa fa-shopping-cart"></i>
                                <span class="header__cart-notice"><?=$sumOrder?></span>
                            </a>
                        <?php else: ?>
                            <i style="font-size: xx-large;" class="header__cart-icon fa fa-shopping-cart"></i>
                            <span class="header__cart-notice">0</span>
                        <?php endif?>
                        <!--  header__cart-list--no-cart -->
                        <div class="header__cart-list  ">
                            <img src="./asset/img/nocart.png" alt="" class="header__cart-list--no-cart-img">
                            <!--<span class="header__cart-list--no-cart-msg">Chưa có sản phẩm</span> -->

                            <!-- Cart item -->
                            <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                            <ul class="header__cart-list-item">
                                <?php if (!empty($productsCart)): ?>
                                    <?php foreach ($productsCart as $value): ?>
                                        <?php if ($value['idUser']==$_SESSION['id']): ?>     
                                            <a class="home-product-item" href="?controller=product&action=details&id=<?=$value['id']?>"> 
                                                <li class="header__cart-item">
                                                    <img src="Admin/Uploads/<?=$value['image']?>" alt="" class="header__cart-img">
                                                    <div class="header__cart-item-info">
                                                        <div class="header__cart-item-head">
                                                            <h5 class="header__cart-item-name"><?=$value['name']?></h5>
                                                            <div class="header__cart-item-price-wrap">
                                                                <span class="header__cart-item-price"><?php echo $fm->Money($value['price_sale']) ?>đ</span>
                                                                <span class="header__cart-item-multiply">x</span>
                                                                <span class="header__cart-item-qnt"><?=$value['qty']?></span>
                                                            </div>
                                                        </div>
                                                        <div class="header__cart-item-body" style="margin-top: 0px;
                                                        align-items: baseline;">
                                                        <a style="text-decoration:none" onclick="return confirm('Are you sure delete This?')" href="?controller=cart&action=deleteCartIndex&idDel=<?=$value['id']?>"><span class="header__cart-item-remove">Xóa</span></a>
                                                    </div>
                                                </div>
                                            </li>  
                                        </a>    
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>

                        <a href="index.php?controller=cart&action=index" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="header__cart">
                <div class="header__cart-wrap">
                  <a style="text-decoration: none;color: white;" href="index.php?controller=cart&action=index">
                    <i style="font-size: xx-large;" class="header__cart-icon fa fa-shopping-cart"></i>
                    <span class="header__cart-notice">0</span>
                </a>

                <div class="header__cart-list">
                    <img src="./asset/img/nocart.png" alt="" class="header__cart-list--no-cart-img">
                    <!-- <span class="header__cart-list--no-cart-msg"></span> -->
                    <h4 class="header__cart-heading">Chưa có sản phẩm</h4>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>
</div>
</div>
</div>
</header>

