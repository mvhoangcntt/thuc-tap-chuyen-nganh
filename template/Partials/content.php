
    <!-- lay san pham moi nhat -->
    <div class="box-center">
        <!-- The box-center product-->
        <div class="tittle-box-center">
            <h2>
                <?php 
                    if (!isset($_GET['menuluotxem']) && !isset($_GET['menudiscount']) && ! isset($_GET['noidung']) && !isset($_GET['menusp']) && !isset($_GET['price_from']) && !isset($_GET['cantim']) && !isset($_GET['timid'])) {
                        echo 'Sản phẩm mới nhất !';
                    }
                    if (isset($_GET['cantim'])) {
                        echo 'Kết quả tìm kiếm của " '.$_GET['cantim'].' "';
                    }
                    if (isset($_GET['timid'])) {
                        echo 'Kết quả tìm kiếm là : ';
                    }
                    if (isset($_GET['price_from']) && isset($_GET['price_to'])) {
                        echo 'Kết quả tìm kiếm giá từ " '.$_GET['price_from'].'đ " đến " '.$_GET['price_to'].'đ "' ;
                    }
                    if (isset($_GET['noidung'])) {
                        echo 'Kết quả tìm kiếm của " '.$_GET['noidung'].' "';
                    }
                    if (isset($_GET['menusp'])) {
                        echo 'Sản phẩm !';
                    }
                    if (isset($_GET['menudiscount'])) {
                        echo "Các sản phẩm giảm giá !";
                    }
                    if (isset($_GET['menuluotxem'])) {
                        echo "Lượt xem nhiều !";
                    }
                 ?>
            </h2>
        </div>
        <div class="box-content-center product">
            <!-- The box-content-center -->
            
            <?php while($row = $product_new->fetch_assoc()){  ?>
            <div class="product_item">
                
                <div class="product_img">
                    <a href="index.php?task=chitietsp&chitietsanpham=<?php echo $row['id'] ?>&idcatalog=<?php echo $row['catalog_id']; ?>" title="<?php echo $row['name']; ?>">
                        <img src="images/product/<?php echo $row['image_link']; ?>" alt="">
                    </a>
                </div>

                <div>
                    <h3>
                       <a href="index.php?task=chitietsp&chitietsanpham=<?php echo $row['id'] ?>&idcatalog=<?php echo $row['catalog_id']; ?>" title="<?php echo $row['name']; ?>">
                       <?php echo $row['name']; ?>                       </a>
                   </h3>
                    <p class="price" style="color: red;">
                        <?php if($row['discount'] > 0):?>
                          <?php $price_new = $row['price'] - $row['discount'];?>
                          <?php echo number_format($price_new)?> đ <span class="price_old"><?php echo number_format($row['price'])?> đ</span>
                          <?php else:?>
                            <?php echo number_format($row['price'])?> đ
                          <?php endif;?>
                    </p>
                    <div class="action">
                        <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row['view'];?></b></p>
                        <a class="button" href="index.php?task=add_cart&id=<?php echo $row['id']; ?>&pty=1&name=<?php echo $row['name']; ?>&price=<?php echo $row['price']; ?>&discount=<?php echo $row['discount']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Mua ngay">Mua ngay</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="clear"></div>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <?php 
                        if (isset($_GET['menusp']) || isset($_GET['menudiscount']) || isset($_GET['menuluotxem'])) {
                            echo "<h1>Hết</h1>";
                        }else{ ?>
                            <a href="http://localhost/ttcn/index.php?task=home&menusp=1">Xem nhiều hơn ...</a>
                        <?php }

                     ?>

                </div>
            </div>
            
        </div>
        <!-- End box-content-center -->
    </div>
    <!-- End box-center product-->
















    <!-- lay san pham dang giam gia -->
    <div class="box-center">
        <!-- The box-center product-->
        <div class="tittle-box-center">
            <h2>Sản phẩm giảm giá nhiều nhất</h2>
        </div>
        <div class="box-content-center product">
            <!-- The box-content-center -->
            
            <?php while($row = $discount->fetch_assoc()){  ?>
            <div class="product_item">
                
                <div class="product_img">
                    <a href="index.php?task=chitietsp&chitietsanpham=<?php echo $row['id'] ?>&idcatalog=<?php echo $row['catalog_id']; ?>" title="<?php echo $row['name']; ?>">
                        <img src="images/product/<?php echo $row['image_link']; ?>" alt="">
                    </a>
                </div>
                <h3>
                   <a href="index.php?task=chitietsp&chitietsanpham=<?php echo $row['id'] ?>&idcatalog=<?php echo $row['catalog_id']; ?>" title="<?php echo $row['name']; ?>">
                   <?php echo $row['name']; ?>                       </a>
               </h3>
                <p class="price" style="color: red;">
                    <?php if($row['discount'] > 0):?>
                      <?php $price_new = $row['price'] - $row['discount'];?>
                      <?php echo number_format($price_new)?> đ <span class="price_old"><?php echo number_format($row['price'])?> đ</span>
                      <?php else:?>
                        <?php echo number_format($row['price'])?> đ
                      <?php endif;?>
                </p>
                <div class="action">
                    <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row['view'];?></b></p>
                    <a class="button" href="index.php?task=add_cart&id=<?php echo $row['id']; ?>&pty=1&name=<?php echo $row['name']; ?>&price=<?php echo $row['price']; ?>&discount=<?php echo $row['discount']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Mua ngay">Mua ngay</a>
                    <div class="clear"></div>
                </div>
            </div>
            <?php } ?>

            <div class="clear"></div>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <?php 
                        if (!isset($_GET['menudiscount'])) { ?>
                            <a href="http://localhost/ttcn/index.php?task=home&menudiscount=1">Xem nhiều hơn ...</a>
                        <?php }
                     ?>

                </div>
            </div>
        </div>
        <!-- End box-content-center -->
    </div>
    <!-- End box-center product-->
    <!-- lay san pham xem nhieu -->
    <div class="box-center">
        <!-- The box-center product-->
        <div class="tittle-box-center">
            <h2>Sản phẩm xem nhiều nhất</h2>
        </div>
        <div class="box-content-center product">
            <!-- The box-content-center -->
            
            <?php while($row = $xemnhieu->fetch_assoc()){  ?>
            <div class="product_item">
                
                <div class="product_img">
                    <a href="index.php?task=chitietsp&chitietsanpham=<?php echo $row['id'] ?>&idcatalog=<?php echo $row['catalog_id']; ?>" title="<?php echo $row['name']; ?>">
                        <img src="images/product/<?php echo $row['image_link']; ?>" alt="">
                    </a>
                </div>
                <h3>
                   <a href="index.php?task=chitietsp&chitietsanpham=<?php echo $row['id'] ?>&idcatalog=<?php echo $row['catalog_id']; ?>" title="<?php echo $row['name']; ?>">
                   <?php echo $row['name']; ?>                       </a>
               </h3>
                <p class="price" style="color: red;">
                    <?php if($row['discount'] > 0):?>
                      <?php $price_new = $row['price'] - $row['discount'];?>
                      <?php echo number_format($price_new)?> đ <span class="price_old"><?php echo number_format($row['price'])?> đ</span>
                      <?php else:?>
                        <?php echo number_format($row['price'])?> đ
                      <?php endif;?>
                </p>
                <div class="action">
                    <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row['view'];?></b></p>
                    <a class="button" href="index.php?task=add_cart&id=<?php echo $row['id']; ?>&pty=1&name=<?php echo $row['name']; ?>&price=<?php echo $row['price']; ?>&discount=<?php echo $row['discount']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Mua ngay">Mua ngay</a>
                    <div class="clear"></div>
                </div>
            </div>
            <?php } ?>

            <div class="clear"></div>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <?php 
                        if (!isset($_GET['menuluotxem'])) { ?>
                            <a href="http://localhost/ttcn/index.php?task=home&menuluotxem=1">Xem nhiều hơn ...</a>
                       <?php }
                     ?>

                </div>
            </div>
        </div>
        <!-- End box-content-center -->
    </div>
    <!-- End box-center product-->
