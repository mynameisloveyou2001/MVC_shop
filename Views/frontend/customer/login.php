  <?php
  require_once "./inc/header.php";
?>
    <!-- Modal layout -->
    <div class="modal">
        <div class="modal__overlay"></div> 
        
        <div class="modal_body"> 

                <!-- Login form -->
                <div class="auth-form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-from__heading">Đăng Nhập</h3>
                            <a class="auth-form__help-link" href="?controller=customer&action=register"><span class="auth-form__switch-btn">Đăng ký</span></a>
                        </div>
                        <form method="post" action="?controller=customer&action=login">

                            <div class="auth-from__form">

                                <div class="auth-form__group">
                                    <input required type="text" name="email" class="auth-from__input" placeholder="Nhập Email">
                                </div>

                                <div class="auth-form__group">
                                    <input required type="password" name="password" class="auth-from__input" placeholder="Nhập password">
                                </div>

                            </div>

                            <div class="auth-form__aside">
                              <div class="auth-form__help">
                                 <?php if (!empty($alert)): ?>
                                 <span style="color: red; font-size: 14px;margin-right: 44px;"><?=$alert?></span>
                                 <?php endif ?>
                                 <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                 <span class="auth-form__help-separate"></span>
                                 <a href="" class="auth-form__help-link">Cần trợ giúp ?</a>
                             </div>
                         </div>
                         <div class="auth-from__controls">
                             <a style="text-decoration: none;color: white; font-weight: 500;" href="?controller=product&action=index" class="auth-form__help-link btn--normal btn auth-from__controls-back">TRỞ LẠI</a> 
                             <button type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
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
                </div> -->
            </div>
        </body>
        </html>