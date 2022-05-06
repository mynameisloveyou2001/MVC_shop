            <div class="app__container">
            	<div class="grid">
            		<div class="grid__row app__content">
            			<div class="grid__column-2">
            				<nav class="category">
            					<h3 class="category__heading">Danh mục</h3>

            					<ul class="category-list">
                                    <li class="category-item category-item--active" id="removeClass">
                                        <a class="category-item__link" href="index.php?controller=product&action=index">Trang chủ</a>
                                    </li>
                                    <?php if (!empty($categories)): ?>
                                     <?php foreach ($categories as $value): ?>
                                      <li class="category-item" id="getcolor">
                                       <a href="index.php?controller=product&action=index&id=<?=$value['id']?>" class="category-item__link"><?php print(strtolower($value['name'])) ?></a>
                                   </li>
                               <?php endforeach ?>   
                           <?php endif ?>
                           <script type="text/javascript">
                           </script>
                       </ul>
                   </nav>
               </div>

               <div class="grid__column-10">
                   <div class="home-filter">
                      <span class="home-filter__lablel">sắp xếp theo</span>
                      <button class="home-filter__btn btn <?php echo $otherColor1;?>"><a href="?controller=product&action=index&color=primary" style="text-decoration: none;color: black;">Phổ Biến</a></button>
                      <button class="home-filter__btn btn <?php echo !empty($primaryColor)?$primaryColor:'' ?>"><a href="?controller=product&action=index&moinhat=moinhat" style="text-decoration: none;color: black;">Mới Nhất</a></button>
                      <button class="home-filter__btn btn <?php echo !empty($otherColor)?$otherColor:'' ?>"><a href="?controller=product&action=index&banchay=searchProBanChay" style="text-decoration: none;color: black;">Bán Chạy</a></button>


                      <div class="select-input">
                         <span class="select-input__lablel">
                         Giá</span>
                         <i class="select-input__icon fa fa-chevron-down"></i>

                         <!-- List option -->
                         <ul class="select-input__list">
                            <li class="select-input__item">
                               <a href="?controller=product&action=index&sort=asc" class="select-input__link">Giá: thấp đến cao</a>
                           </li>

                           <li class="select-input__item">
                               <a href="?controller=product&action=index&sort=desc" class="select-input__link">Giá: cao đến thấp</a>
                           </li>
                       </ul>
                   </div>


                   <div class="home-filter__page">
                    <?php if (isset($page)&&isset($pageNumber)): ?>
                        
                     <span class="home-filter__page-num">
                        <span class="home-filter__page-curent"><?=$page?></span>/<?=$pageNumber?>
                    </span>
                    <!--                 //home-filter__page-btn--disable -->
                    <div class="home-filter__page-control">
                        <?php if (isset($page) && $page > 1): ?>
                            <?php echo '
                            <a href="?controller=product&action=index&page='.($page-1).'" class="home-filter__page-btn ">
                            <i class="home-filter__page-icon fa fa-chevron-left"></i>
                            </a>'
                            ?>    
                        <?php endif ?>
                        <?php if ($page < $pageNumber): ?>
                            <?php echo '
                            <a href="?controller=product&action=index&page='.($page+1).'" class="home-filter__page-btn">
                            <i class="home-filter__page-icon fa fa-chevron-right"></i>
                            </a>'
                            ?>
                        <?php endif ?>
                    </div>
                    <?php endif ?>
                </div>
            </div>

