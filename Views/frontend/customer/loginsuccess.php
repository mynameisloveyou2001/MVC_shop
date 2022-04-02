  <?php
  require_once "./inc/header.php";
  require_once "./inc/menu.php";
  function Money($n=0){
    $n=(string)$n;
    $n=strrev($n);
    $res='';
    for ($i=0; $i < strlen($n) ; $i++) { 
        if ($i%3==0&&$i!=0) {
            $res .='.';
        }
        $res .=$n[$i];
    }
    $res=strrev($res);
    return $res;
}

?>

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
                        <div class="home-product-item__img" style="background-image: url(../Admin/Uploads/<?=$value['image']?>);"></div>
                        <h4 class="home-product-item__name" style="text-align: center; font-weight: bold;"><?=$value['name']?></h4>
                        <div class="home-product-item__price">
                            <span class="home-product-item__price-old"><?php echo Money($value['price']) ?>đ</span>
                            <span class="home-product-item__price-current"><?=$value['price_sale']?>VND</span>
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

                            <span class="home-product-item__sold"><?=$value['number']?> còn</span>
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
                            <div class="home-product-item__img" style="background-image: url(../Admin/Uploads/<?=$value['image']?>);"></div>
                            <h4 class="home-product-item__name" style="text-align: center; font-weight: bold;"><?=$value['name']?></h4>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-old"><?php echo Money($value['price']) ?>đ</span>
                                <span class="home-product-item__price-current"><?php echo Money($value['price']) ?>VND</span>
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

                                <span class="home-product-item__sold"><?=$value['number']?> còn</span>
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
                <div class="grid__column-2-4" style="text-align: center;
                margin: auto;">  
                <div style="text-align: center; font-size: 20px; color: black;width: 100%;
                height: 200px;
                margin-top: 73px;">
                <span style="line-height: 30px;" >Không có sản phẩm nào như <span style="font-size: 20px; color: red;font-weight: 700;"><i><u><?=$keysearch?></u></i></span> được tìm thấy</span>
            </div>
        </div>
    <?php endif ?>
<?php endif ?>

</div>
</div>
<ul class="pagination home-product__pagination">
    <li class="pagination-item">
        <a href="" class="pagination-item__link">
            <i class="pagination-item__icon fa fa-chevron-left"></i>
        </a>
    </li>


    <li class="pagination-item">
        <a href="" class="pagination-item__link">0</a>
    </li>
    <li class="pagination-item pagination-item--active">
        <a href="" class="pagination-item__link">1</a>
    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">2</a>
    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">3</a>
    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">4</a>

    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">5</a>
    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">...</a>
    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">14</a>
    </li>

    <li class="pagination-item">
        <a href="" class="pagination-item__link">
            <i class="pagination-item__icon fa fa-chevron-right"></i>
        </a>
    </li>
</ul>
</div>
</div>
</div>
</div>


<?php 
require_once "./inc/footer.php";
?>
