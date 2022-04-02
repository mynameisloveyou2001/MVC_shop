 <?php
 require_once "./inc/header.php";
 // require_once "./inc/menu.php";

 ?>

 <link 
 href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
 rel="stylesheet"  type='text/css'>
 <link rel="stylesheet" src="public/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">

 <script> 
    function upDate(preview) {
        var src = preview.src;
        document.getElementById('img').src = src;
    }
    function unDo() {
        document.getElementById('img').src = src;
    }
    function updated() {
        var src = "img/dell.PNG";
        document.getElementById('img').src = src;
    }
    function updated1() {
        var src = "img/Dell1.PNG";
        document.getElementById('img').src = src;
    }
    function updated2() {
        var src = "img/macbook.PNG";
        document.getElementById('img').src = src;
    }
    function updated3() {
        var src = "img/Asus.PNG";
        document.getElementById('img').src = src;
    }
    function updated4() {
        var src = "img/Dell4.PNG";
        document.getElementById('img').src = src;
    }
    $(function()
    {
        $('.contentArea').summernote({ height: 200});
    })
</script>

<div class="app__container">

    <!--  -->
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $value): ?>
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="grid__column-4">
                        <div class="imgproduct" style="margin: 0px 0 20px 200px;">
                            <img style="width: 50%;min-height: 300px;" id="img" class="imgdetails" src="Admin/Uploads/<?=$value['image']?>" alt="">
                        </div>
                        <div class="imghover">
                            <?php if (!empty($imagePro)): ?>
                                <?php foreach ($imagePro as $key => $value1): ?>   
                                    <img style="width: 20%;height: 150px;" class="imgreview" src="Admin/Uploads/<?=$value1['images']?>" alt="" onmouseover="upDate(this)"
                                    onmouseout="unDo()">
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>

                        <div class="footerimg">
                            <div class="footerimghead">
                                <span>Chia sẻ:</span>
                                <div class="imgicon">
                                    <a href=""> <i class="coloricon fa fa-facebook-messenger"></i></a>
                                    <a href=""> <i class="coloriconfb fa fa-facebook"></i></a>
                                    <a href=""> <i class="coloricon fa fa-linkedin"></i></a>
                                    <a href=""> <i class="coloricon fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="footerimgend">
                                <a href=""><i style="color:#ee2c4a;" class="fa fa-heart imgicon"></i></a>
                                <span>Đã thích (232)</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid__column-7">
                        <div class="headerproduct">
                            <h4 class="headeritem">Yêu thích</h4>
                            <span class="headerdecript"><?=$value['name']?></span>
                        </div>

                        <div class="secondproduct">
                            <ul class="rateproduct spaceright">
                                <li class="ratelist fontrate">4.8</li>
                                <li class="ratelist">
                                    <i class="colorrate fa fa-star"></i>
                                    <i class="colorrate fa fa-star"></i>
                                    <i class="colorrate fa fa-star"></i>
                                    <i class="colorrate fa fa-star"></i>
                                    <i class="colorrate fa fa-star"></i>
                                </li>
                            </ul>
                            <ul class="rateproduct linerateproduct">
                                <li class="ratelist fontrate">2.3k</li>
                                <li class="ratelist">Đánh giá</li>
                            </ul>
                            <ul class="rateproduct linerateproduct">
                                <li class="ratelist fontrate"><?=$value['product_saled']?></li>
                                <li class="ratelist">Đã bán</li>
                            </ul>
                        </div>

                        <div class="home-product-item__price spaceleft">
                            <span class="home-product-item__price-old"><?php echo $fm->Money($value['price'])?>đ</span>
                            <span class="home-product-item__price-current"><?php echo $fm->Money($value['price_sale'])?> VND</span>
                        </div>

                        <div class="transformproduct">
                            <label style="margin-right: 90px;" class="fontlabel">Màu sắc</label>
                            <div class="commentproductuser">
                                <a href="">
                                    <div class="numberstar colorhover" onmouseover="updated1(this)" onmouseout="unDo()">Đen
                                    </div>
                                </a>
                                <a href="">
                                    <div class="numberstar colorhover" onmouseover="updated2(this)" onmouseout="unDo()">Trắng
                                    </div>                   
                                </a>
                                <a href="">
                                    <div class="numberstar colorhover" onmouseover="updated3(this)" onmouseout="unDo()">Đỏ</div>
                                </a>
                                <a href="">
                                    <div class="numberstar colorhover" onmouseover="updated4(this)" onmouseout="unDo()">Vàng
                                    </div>
                                </a>
                                <a href="">
                                    <div class="numberstar colorhover" onmouseover="updated(this)" onmouseout="unDo()">Xanh
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="transformproduct">
                            <label for="" class="fontlabel">Vận chuyển</label>
                            <div class="contenttransform">
                                <div class="headertransform">
                                    <div class="descripttransform">
                                        <div class="imgtransform">
                                            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/../../assets/1cdd37339544d858f4d0ade5723cd477.png"
                                            width="25" height="10" class="_2K1bHr">
                                            Miễn phí vẫn chuyển
                                        </div>
                                        <div class="contentdescripttransform">
                                            Miễn phí vận chuyển cho đơn hàng trên 40.000đ
                                        </div>
                                    </div>
                                </div>
                                <div class="footertransform">
                                    <div class="flighttransform">
                                        <svg enable-background="new 0 0 18 18" viewBox="0 0 18 18"
                                        class="shopee-svg-icon icon-shipping-airplane">
                                        <path
                                        d="m15 4s2.7-1.1 2.5 2c-1.8.7-5.6 2.6-5.6 2.6l-2.8 5.1-2.1 1.3 1.7-5-6.7 3v-2l-1.5-2 1.2-.9 1.6 1.6 2.5-1.3-2.8-2.4 2-1 3.3 2.2z"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </div>

                            <div class="placetransform">
                                <div class="headerplacetransform">
                                    <div class="headerplacetransformleft">
                                        Vận chuyển từ
                                    </div>
                                    <div class="headerplacetransformright">
                                        <div class="headerplacetransformrightright">Nước ngoài</div>
                                        <div class="headerplacetransformrightend">
                                            <div class="to">tới</div>
                                            <div class="toplace">
                                                <span>Huyện Hải Lăng</span>
                                                <img src="" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="feetransform">
                                    <div class="headfeetransform">
                                        Phí vận chuyển
                                    </div>
                                    <div class="footerfeetransform">10.000đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Số lượng sản phẩm -->
                <form method="post" action="?controller=cart&action=insert">
                    <input type="hidden" name="idPro" value="<?=$value['id']?>">
                    <div class="formnumberproduct">
                        <label for="" class="fontlabel">Số lượng</label>
                        <div class="contentnumber">
                            <input type="number" name="qty" min="1" value="1" class="inputnumber">
                            <div class="fontlabel"><?=$value['number']?> sản phẩm có sẵn</div>
                        </div>
                    </div>

                    <div class="formcart" style="margin: 50px 0 20px 40px;">
                        <button type="submit" style="border: none;">
                            <div class="buttonhead">
                                <div class="formbuttonforadd">
                                    <i class="fa fa-cart-plus middlecart"></i>
                                    <span>Thêm vào giỏ hàng</span>
                                </div>
                            </div>
                        </button>
                        <button style="border: none;" type="submit">
                            <div class="buttonhead buttonhead1">Mua ngay</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid">
            <div class="grid__row">
                <div class="grid__column-11">
                    <div class="descriptproduct">
                        <div class="decriptproducthead">
                            Mô tả sản phẩm
                        </div>
                        <div class="contentdescript">
                            <span>
                                <?=$value['product_desc']?>
                            </span>
                        </div>
                        <div class="decriptproducthead">
                            Chi tiết sản phẩm
                        </div>
                        <div class="contentdescript" style="width: 100%;
                        list-style: none;">
                        <ul style="padding-left: 17px; font-size: 14px;">
                            <?=$value['product_detail']?>
                        </ul>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
        <!-- Rate -->
        <div class="commentproduct">
            <span class="commentproducthead">Đánh giá sản phẩm</span>
            <div class="commentproductcontent">
                <div class="starcomment">
                    <div class="headstarcomment">
                        <span>5 trên 5</span>
                    </div>
                    <div class="endstarcomment">
                        <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                        <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                        <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                        <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                        <i style="color:#d0011b;" class="fa fa-star"></i>
                    </div>
                </div>
                <div class="commentproductuser">
                    <a href="">
                        <div class="numberstar headnumber">Tất cả</div>
                    </a>
                    <a href="">
                        <div class="numberstar">5 Sao (18)</div>
                    </a>
                    <a href="">
                        <div class="numberstar">4 Sao (0)</div>
                    </a>
                    <a href="">
                        <div class="numberstar">3 Sao (0)</div>
                    </a>
                    <a href="">
                        <div class="numberstar">2 Sao (0)</div>
                    </a>
                    <a href="">
                        <div class="numberstar">1 Sao (0)</div>
                    </a>
                    <a href="">
                        <div class="numberstar">Có Bình luận (6)</div>
                    </a>
                    <a>
                        <div class="numberstar">Có hình ảnh / video (8)</div>
                    </a>
                </div>
            </div>
            <!-- Comment -->

            <div class="commentofuser">

                <div style="margin: 20px 0 0 50px;">
                    <div class="contentcommentuser" style="margin-bottom: 20px;">
                        <p><?=$sumCmt?> Bình Luận</p>
                    </div>
                    <div class="currenComment">
                      <?php if (empty($alert)): ?> 
                        <div class="contentcommentuser1">
                            <img  style="margin-top: 0;" src="Admin/Uploads/<?=$customer['img']?>" alt=""
                            class="header__navbar-user-img">
                        </div>
                    <?php else: ?>
                        <div class="contentcommentuser1">
                            <img  style="margin-top: 0;" src="../../img/iconu.png" alt=""
                            class="header__navbar-user-img">
                        </div>
                    <?php endif ?>
                    <style type="text/css">
                      .header__navbar-user-img:hover{
                        width: 250px;
                        min-height: 250px;
                        z-index: 3;
                        transform: scale3d(1.5, 1.5, 1.5);
                        bottom: 300px;
                        top: 2000px;
                        right: 125px;
                    } 
                </style>

                <form method="post" action="">
                    <div class="form-group" style="display: flex;flex-direction: row;align-items: center;">
                        <textarea class="contentArea" id="content" rows="4" style="resize: none;" name="content">
                        </textarea>
                        <button class="btn btn-success"  
                        <?php if (!empty($alert)): ?>
                            <?php echo 'disabled' ?>
                            <?php endif ?>   name="submit" type="submit" style="float: right;font-size: 14px;margin-left: 10px; margin-right: 20px;">Gửi bình luận</button>
                        </div>
                    </form>
                </div>
                <?php if (!empty($comment)): ?>
                  <?php foreach ($comment as $value): ?>
                    <?php foreach ($customerComment as $valueCus): ?>
                        <?php if ($valueCus['id']==$value['member_id']): ?>
                            <div class="contentcommentuser">
                                <img style="margin-top: 0;" src="Admin/Uploads/<?=$valueCus['img']?>" alt=""
                                class="header__navbar-user-img">
                            </div>
                            <div class="contentcommentuser">
                                <a style="text-decoration: none; color: black;" href=""><span
                                    style="margin-left: 30px;">
                                    <?=$valueCus['fullname']?>
                                <?php endif ?>
                                <?php endforeach ?></span></a>
                                <div style="margin-left: 30px;
                                font-size: 12px;" class="endstarcomment">
                                <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                                <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                                <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                                <i style="color:#d0011b;" class="home-product-item__star-gold fa fa-star"></i>
                                <i style="color:#d0011b;" class="fa fa-star"></i>
                            </div>
                            <div class="contentuser1">
                                <span>
                                    <?=$value['content']?>
                                </span>
                            </div>
                            <div class="imageuser">
                                <img class="imguserproduct" src="img/samsung-galaxy-a50-black-9.jpg" alt="">
                                <img class="imguserproduct" src="img/samsung-galaxy-a50-black-9.jpg" alt="">
                                <img class="imguserproduct" src="img/samsung-galaxy-a50-black-9.jpg" alt="">
                                <img class="imguserproduct" src="img/samsung-galaxy-a50-black-9.jpg" alt="">
                            </div>
                            <div style="margin-left: 30px;" type="date">2021-10-10 <span>11:17</span></div>
                            <div class="responeuser">
                                <span style="color: #8b572a; margin-bottom: 7px;">Phản hồi của shop</span>
                                <span style="padding-bottom: 10px;">
                                    <?=$value['reply']?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach ?>  
                <?php endif ?>
            </div>
        </div>
    </div>
    <center><span  class="advhead">Sản phẩm Liên Quan</span></center>
    <div class="adv" style="flex-wrap: wrap;">
        <?php if (!empty($productsByCat)): $sale=0 ?>
            <?php foreach ($productsByCat as $value): ?>
                <?php
                if (is_numeric($value['price_sale']) && is_numeric($value['price'])) {
                    $value['price_sale'] = floatval($value['price_sale']);
                    $value['price'] = floatval($value['price']);
                    $sale=(100-($value['price_sale']*100)/$value['price']);
                    $sale=ceil($sale);
                }
                ?>
                <div class="grid__column-2-4" style="width: 25%;">
                    <!-- Product item -->
                    <?php $image = !empty($value['image']) ? $value['image']:'no Image'; ?>
                    <a class="home-product-item" href="?controller=product&action=details&id=<?=$value['id']?>">
                        <div class="home-product-item__img"
                        style="background-image: url(Admin/Uploads/<?=$value['image']?>);"></div>
                        <h4 class="home-product-item__name" style="text-align: center; font-weight: bold;"><?=$value['name']?></h4>
                        <div class="home-product-item__price">
                            <span class="home-product-item__price-old"><?php echo $fm->Money($value['price']) ?>đ</span>
                            <span class="home-product-item__price-current"><?php echo $fm->Money($value['price_sale']) ?> VND</span>
                        </div>

                        <div class="home-product-item__action">
                            <span class="home-product-item__like home-product-item__like--liked">
                                <i class="home-product-item__like-icon-empty fa fa-heart"></i>
                                <i class="home-product-item__like-icon-fill fa fa-heart"></i>
                            </span>
                            <div class="home-product-item__rating">
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <span class="home-product-item__sold"><?$value['number']?></span>
                        </div>
                        <div class="home-product-item__origin">
                            <span class="home-product-item__brand">Whooe</span>
                            <span class="home-product-item__origin-name">Japan</span>
                        </div>

                        <div class="home-product-item__favourite">
                            <i style="margin-left: 4px;" class="fa fa-check"></i>
                            <span>Yêu thích</span>
                        </div>

                        <div class="home-product-item__percent-off">
                            <span class="home-product-item__percent-off-percent"><?php echo abs($sale)?>%</span>
                            <?php if ($sale<0): ?>
                              <span class="home-product-item__percent-off-label">Tăng</span>
                          <?php else: ?>
                              <span class="home-product-item__percent-off-label">Giảm</span>  
                          <?php endif ?>
                      </div>
                  </a>
              </div>
          <?php endforeach ?>
      <?php endif ?>
      <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
  </script>
</div>
</div>
<div class="grid__column-2-4 ">
    <div class="descriptproduct" style="background-color: #e0f5e0; margin-bottom: 20px;">
        <span class="other">
            Top sản phẩm bán chạy
        </span>
        <?php if (!empty($banchayDetails)): $sale=0; ?>
            <?php foreach ($banchayDetails as $valueDetails): ?>
                <?php
                if (is_numeric($valueDetails['price_sale']) && is_numeric($valueDetails['price'])) {
                    $valueDetails['price_sale'] = floatval($valueDetails['price_sale']);
                    $valueDetails['price'] = floatval($valueDetails['price']);
                    $sale=(100-($valueDetails['price_sale']*100)/$valueDetails['price']);
                    $sale=ceil($sale);
                }  
                ?>
                <?php $image = !empty($valueDetails['image']) ? $valueDetails['image']:'no Image'; ?>
                <div class="grid__column-2-4" style="width: 90%;">
                    <a class="home-product-item" href="?controller=product&action=details&id=<?=$valueDetails['id']?>">
                        <div class="home-product-item__img"
                        style="background-image: url(Admin/Uploads/<?=$valueDetails['image']?>);"></div>
                        <h4 class="home-product-item__name" style="text-align: center; font-weight: bold;"><?php echo $fm->textShorten($valueDetails['name'],20) ?>
                    </h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old"><?php echo $fm->Money($valueDetails['price']) ?>đ</span>
                        <span class="home-product-item__price-current"><?php echo $fm->Money($valueDetails['price_sale']) ?> VND</span>
                    </div>
                    <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__like--liked">
                            <i class="home-product-item__like-icon-empty fa fa-heart"></i>
                            <i class="home-product-item__like-icon-fill fa fa-heart"></i>
                        </span>
                        <div class="home-product-item__rating">
                            <i class="home-product-item__star-gold fa fa-star"></i>
                            <i class="home-product-item__star-gold fa fa-star"></i>
                            <i class="home-product-item__star-gold fa fa-star"></i>
                            <i class="home-product-item__star-gold fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <span class="home-product-item__sold"></span>
                    </div>
                    <div class="home-product-item__origin">
                        <span class="home-product-item__brand"><?=$valueDetails['product_saled']?> đã bán</span>
                        <span class="home-product-item__origin-name">Japan</span>
                    </div>

                    <div class="home-product-item__favourite">
                        <i style="margin-left: 4px;" class="fa fa-check"></i>
                        <span>Yêu thích</span>
                    </div>
                    <div class="home-product-item__percent-off">
                        <span class="home-product-item__percent-off-percent"><?php echo abs($sale)?>%</span>
                        <?php if ($sale < 0): ?>
                          <span class="home-product-item__percent-off-label">Tăng</span>
                      <?php else: ?>
                          <span class="home-product-item__percent-off-label">Giảm</span>  
                      <?php endif ?>
                  </div>
              </a>
          </div>
          <?php endforeach ?>
      <?php endif ?>
  </div>
</div>
</div>
</div>


<?php 
require_once "./inc/footer.php";
?>
