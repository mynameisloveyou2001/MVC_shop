<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4chan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/detailsproduct.css">
    <script type="text/javascript" src="public/js/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="public/js/main.js"></script>
    <link rel="stylesheet" href="../public/css/Cart.css">
    <link 
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
    rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" src="../../public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>
<body>

</body>
<div class="modal">
    <div class="modal__overlay"></div> 

    <div class="modal_body"> 


        <!-- Register form -->
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-from__heading">Đăng ký</h3>
                    <a class="auth-form__help-link" href="?controller=admin&action=login"><span class="auth-form__switch-btn">Đăng nhập</span></a> 
                </div>
                <form method="post" action="?controller=admin&action=register">
                    <div class="auth-from__form">

                        <div class="auth-form__group">
                            <input required type="text" name="fullname" class="auth-from__input" placeholder="Nhập họ tên Admin">
                        </div>
                        <div class="auth-form__group">
                            <input required type="text" name="email" class="auth-from__input" placeholder="Nhập Email">
                        </div>

                        <div class="auth-form__group">
                            <input required min="6" type="password" name="password" class="auth-from__input" placeholder="Nhập password">
                        </div>

                        <div class="auth-form__group">
                            <input min="6" required type="password" name="confirmpassword" class="auth-from__input" placeholder="Nhập lại password">
                        </div>
                        <div class="auth-form__group">
                            <input min="6" required type="text" name="phone" class="auth-from__input" placeholder="Nhập sđt">
                        </div>

                        <?php if (!empty($alert)): ?>
                            <span style="color: red; font-size: 14px;"><?=$alert?></span>
                        <?php endif ?>

                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-from__policy-text">
                            Bằng việc đăng ký, bạn đã đồng ý với Shopee về
                            <a href="" class="auth-from__text-link">Điều khoản dịch vụ </a>&
                            <a href="" class="auth-from__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>
                    <div class="auth-from__controls">
                       <a style="text-decoration: none;color: white; font-weight: 500;" href="?controller=product&action=index" class="auth-form__help-link btn--normal btn auth-from__controls-back">TRỞ LẠI</a>
                       <button type="submit" class="btn btn--primary ">ĐĂNG KÝ</button>
                   </div>
               </form>

           </div>



           <div class="auth-form__socials">
            <a href="" class="auth-form__socials-fb btn btn--size-s btn--with-icon">
                <i class="auth-form__socials-icon fa fa-facebook-square"></i>
                <span class="auth-form__socials-title">
                    Kết nối với FB
                </span></a>

                <a href="" class="auth-form__socials-gg btn btn--size-s btn--with-icon">
                    <i class="auth-form__socials-icon fa fa-google"></i>
                    <span class="auth-form__socials-title">
                        Kết nối với GG
                    </span></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    <!-- Modal layout -->