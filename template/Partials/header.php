<link type="text/css" href="js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript">
    $(function() {
        $("#text-search").autocomplete({
            source: "product/search_ac.html",
        });
    });
</script>
<div class='top'>
    <!-- The top -->
    <div id="logo">
        <!-- the logo -->
        <a href="http://localhost/ttcn/index.php?task=home" title="Học lập trình website với PHP và MYSQL">
            <img style="height: 83px; padding-left: 30px;" src="images/logo.png" alt="Học lập trình website với PHP và MYSQL" />
        </a>
    </div>
    <!-- <div id="logo">
        <h3>Shop Hoàn Tuyết</h3>
    </div> -->
    <!-- End logo -->

    <!--  load gio hàng -->
    <div id="cart_expand" class="cart">
        <a href="http://localhost/ttcn/index.php?task=form_cart" class="cart_link">
               Giỏ hàng <span id="in_cart"><?php if (isset($_COOKIE['user_login'])) {
                   while ($row = $soluong->fetch_assoc()) {
                       echo $row['COUNT(id)'];
                   }

               }else{
               if (isset($_SESSION['cart'])) {
                    $dem = 0;
                       foreach ($_SESSION['cart'] as $row1) {
                            $dem++;
                       }
                       echo $dem;
                   }}
                ?></span> sản phẩm 
            </a>
        <img alt="cart bnc" src="images/cart.png">
    </div>
    <div id="search">
        <!-- the search -->
        <form method="get" action="index.php">
            <input type="hidden" name="task" value="home">
            <input type="search" id="text-search" name="noidung" value="<?php echo isset($_GET['noidung']) ? $_GET['noidung'] : ''?>" placeholder="Tìm kiếm tên sản phẩm..." class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
            <input type="submit" id="but" name="search" value="Tìm kiếm">
        </form>
    </div>
    <!-- End search -->

    <div class='clear'></div>
    <!-- clear float -->
</div>
<!-- End top -->
<!-- End box-header  -->

<!-- The box-header-->
<div id="menu">
    <!-- the menu -->
    <div class="row">
        <div class="col-md-12">
            <ul class="menu_top">
                <li class="active index-li"><a href="http://localhost/ttcn/index.php?task=home">Trang chủ </a></li>
                <!-- <li class=""><a href="info/view/1.html">Giới thiệu</a></li>
                <li class=""><a href="info/view/2.html">Hướng dẫn</a></li> -->
                <?php 
                while ($row = $menu->fetch_assoc()) { ?>
                    <li class=""><a href="<?php echo $row['url']; ?>"><?php echo $row['name']; ?></a></li>
                <?php }

                 ?>
                <?php if (isset($_COOKIE['user_login'])) {?>
                    <li class=""><a href="http://localhost/ttcn/index.php?task=ttuser">Xin chào : <?php echo $_COOKIE['name']; ?></a></li>
                    <li class=""><a href="http://localhost/ttcn/index.php?task=logout_user">Đăng xuất</a></li>
                <?php }else{

                    ?>
                    <li class=""><a href="http://localhost/ttcn/index.php?task=dangkyuser">Đăng ký</a></li>
                    <li class=""><a href="http://localhost/ttcn/index.php?task=dangnhapuser">Đăng nhập</a></li>
                    <?php

                }
                
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- End menu -->