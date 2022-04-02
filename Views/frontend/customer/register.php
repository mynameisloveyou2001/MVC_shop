  <?php
  require_once "./inc/header.php";
?>
    <!-- Modal layout -->
    <div class="modal">
        <div class="modal__overlay"></div> 
        
        <div class="modal_body"> 


            <!-- Register form -->
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-from__heading">Đăng ký</h3>
                        <a class="auth-form__help-link" href="?controller=customer&action=login"><span class="auth-form__switch-btn">Đăng nhập</span></a> 
                    </div>
                    <form method="post" action="?controller=customer&action=register">
                        <div class="auth-from__form">

                            <div class="auth-form__group">
                                <input required type="text" name="fullname" class="auth-from__input" placeholder="Nhập họ tên">
                            </div>

                            <div class="auth-form__group">
                                <input required min="6" type="password" name="password" class="auth-from__input" placeholder="Nhập password">
                            </div>

                            <div class="auth-form__group">
                                <input min="6" required type="password" name="confirmpassword" class="auth-from__input" placeholder="Nhập lại password">
                            </div>
                            <div class="auth-form__group">
                                <input required type="text" name="email" class="auth-from__input" placeholder="Nhập Email">
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