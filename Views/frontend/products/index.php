  <?php
  require_once "./inc/header.php";
  require_once "./inc/menu.php";

  ?>
  <?php if (isset($refresh)): ?>
      
    <?php echo $refresh; ?>
  <?php endif ?>
  <div class="home-product">
    <div class="grid__row">
        <?php if (!empty($productsByCat)): $sale = 0;?>
            <?php foreach ($productsByCat as $value): ?>   
                <?php
                if (is_numeric($value['price_sale']) && is_numeric($value['price'])) {
                    $value['price_sale'] = floatval($value['price_sale']);
                    $value['price'] = floatval($value['price']);
                    $sale=(100-($value['price_sale']*100)/$value['price']);
                    $sale=ceil($sale);
                }
                ?>
                <div class="grid__column-2-4">

                    <!-- Product item -->
                    <a class="home-product-item" href="?controller=product&action=details&id=<?=$value['id']?>">
                        <div class="home-product-item__img" style="background-image: url(Admin/Uploads/<?=$value['image']?>);"></div>
                        <h4 class="home-product-item__name" style="text-align: center; font-weight: bold;"><?=$value['name']?></h4>
                        <div class="home-product-item__price">
                            <span class="home-product-item__price-old"><?php echo $fm->Money($value['price']) ?>đ</span>
                            <span class="home-product-item__price-current"><?php echo $fm->Money($value['price_sale'])  ?>VND</span>
                        </div>

                        <div class="home-product-item__action">
                            <span class="home-product-item__like home-product-item__like--liked">
                                <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                <i class="home-product-item__like-icon-fill fa fa-heart"></i>
                            </span>
                            <div class="home-product-item__rating">
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="home-product-item__star-gold fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <span class="home-product-item__sold"><?=$value['product_saled']?> đã bán</span>
                        </div>
                        <div class="home-product-item__origin">
                            <span class="home-product-item__brand"></span>
                            <span class="home-product-item__origin-name">Hà Nội</span>
                        </div>

                        <div class="home-product-item__favourite">
                            <i style="margin-left: 4px;" class="fa fa-check"></i>
                            <span>Yêu thích</span>
                        </div>
                        <div class="home-product-item__percent-off">
                            <span class="home-product-item__percent-off-percent"><?=$sale?>%</span>
                            <span class="home-product-item__percent-off-label">Giảm</span>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <?php if (!empty($products)): $sale = 0; ?>

                <?php foreach ($products as $value): ?>

                    <?php
                    if (is_numeric($value['price_sale']) && is_numeric($value['price'])) {
                        $value['price_sale'] = floatval($value['price_sale']);
                        $value['price'] = floatval($value['price']);
                        $sale=(100-($value['price_sale']*100)/$value['price']);
                        $sale=ceil($sale);
                    }
                    ?>

                    <div class="grid__column-2-4">

                        <!-- Product item -->
                        <a class="home-product-item" href="?controller=product&action=details&id=<?=$value['id']?>">
                            <div class="home-product-item__img" style="background-image: url(Admin/Uploads/<?=$value['image']?>);"></div>
                            <h4 class="home-product-item__name" style="text-align: center; font-weight: bold;"><?=$value['name']?></h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old"><?php echo $fm->Money($value['price']) ?>đ</span>
                                <span class="home-product-item__price-current"><?php echo $fm->Money($value['price_sale']) ?>VND</span>
                            </div>

                            <div class="home-product-item__action">
                                <span class="home-product-item__like home-product-item__like--liked">
                                    <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                    <i class="home-product-item__like-icon-fill fa fa-heart"></i>
                                </span>
                                <div class="home-product-item__rating">
                                    <i class="home-product-item__star-gold fa fa-star"></i>
                                    <i class="home-product-item__star-gold fa fa-star"></i>
                                    <i class="home-product-item__star-gold fa fa-star"></i>
                                    <i class="home-product-item__star-gold fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <span class="home-product-item__sold"><?=$value['product_saled']?> đã bán</span>
                            </div>
                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand"></span>
                                <span class="home-product-item__origin-name">Hà Nội</span>
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
          <?php else: ?>
            <div class="grid__column-2-4" style="text-align: center;
            margin: auto;">  
            <div style="text-align: center; font-size: 20px; color: black;width: 100%;
            height: 200px;
            margin-top: 73px;">
            <span style="line-height: 30px;" >Không có sản phẩm nào như <span style="font-size: 20px; color: red;font-weight: 700; "><i><u><?=$keysearch?></u></i></span> được tìm thấy</span>
        </div>
    </div>
<?php endif ?>
<?php endif ?>

</div>
</div>
<ul class="pagination home-product__pagination">

    <?php if (isset($page) && $page > 1): ?>
        <?php echo '
        <li class="pagination-item">
        <a href="?controller=product&action=index&page='.($page-1).'" class="pagination-item__link">
        <i class="pagination-item__icon fa fa-chevron-left"></i>
        </a>
        </li>
        ' ?>    
    <?php endif ?>   

    <?php 
    for ($i=1; $i <= $pageNumber; $i++) { 
        if ($page==$i) {
           echo '
           <li class="pagination-item pagination-item--active">
           <a class="pagination-item__link"href="?controller=product&action=index&page='.$i.'">'.$i.'</a>
           </li>';
       }else{
        echo '
        <li class="pagination-item pagination-item">
        <a class="pagination-item__link"href="?controller=product&action=index&page='.$i.'">'.$i.'</a>
        </li>';
    }

}
?>
<?php if ($page < $pageNumber): ?>
    <?php echo '
    <li class="pagination-item">
    <a href="?controller=product&action=index&page='.($page+1).'" class="pagination-item__link">
    <i class="pagination-item__icon fa fa-chevron-right"></i>
    </a>
    </li>
    ' ?>
<?php endif ?>
</ul>
</div>
</div>
</div>
</div>


<?php 
require_once "./inc/footer.php";
?>
