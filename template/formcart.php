<?php include_once"Partials/head.php"; ?>
<div class="container-fluid">
	<?php if (isset($_GET['tb'])): ?>
		<?php if($_GET['tb'] == 1){ ?> <script type="text/javascript">alert('Đăng ký thành công !');</script> <?php } ?>
		<?php if($_GET['tb'] == 2){ ?> <script type="text/javascript">alert('Đăng nhập thành công !');</script> <?php } ?>
		<?php if($_GET['tb'] == 4){ ?> <script type="text/javascript">alert('Chỉnh sửa thành công !');</script> <?php } ?>
        <?php if($_GET['tb'] == 6){ ?> <script type="text/javascript">alert('Không được để trống !');</script> <?php } ?>
			
	<?php endif ?>
	<div class=''>
		<?php include_once"Partials/header.php"; ?>
	</div>
</div>
<div class="container-fluid">
    <div style="padding-top: 5px;">
	<div class="row">
		<div class="d-none d-lg-block col-lg-2">
			<?php include_once"Partials/left.php"; ?>
		</div>
		<div class="col-12 col-lg-8">
			<div class="content">



<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Thông tin giỏ hàng</h2>
    </div>
    <div class="box-content-center product">
        <!-- The box-content-center -->
        
            <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
            	
                <thead>
                    <tr>
                    	<th>Hình ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Tổng số</th>
                        <th style="width: 130px;">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $thanht = 0;
                        if (!isset($_COOKIE['user_login'])) {
                            if (isset($_GET['pty'])) {
                            if (!isset($_SESSION['cart'])) {
                                $_SESSION['cart'] = [
                                    [
                                        "id"     => $_GET['id'],
                                        "pty"    => $_GET['pty'],
                                        "name"   => $_GET['name'],
                                        "price"  => $_GET['price'],
                                        "discount" => $_GET['discount'],
                                        "image_link" => $_GET['image_link'],
                                    ],
                                ];
                            }
                            }
                            
                            $kt = 0;
                            $pty = '';
                            $vitri = 0;
                            if (isset($_GET['id'])) {
                                foreach ($_SESSION['cart'] as $row1) {
                                    $vitri++;
                                    if ($row1['id'] == $_GET['id']) {
                                        $kt++;
                                        $pty = $row1['pty'];
                                        break;
                                    }
                                }
                            }
                            if ($kt == 0) {
                                if (isset($_GET['pty'])) {
                                    $_SESSION['cart'][] = 
                                    [
                                        "id"     => $_GET['id'],
                                        "pty"    => $_GET['pty'],
                                        "name"   => $_GET['name'],
                                        "price"  => $_GET['price'],
                                        "discount" => $_GET['discount'],
                                        "image_link" => $_GET['image_link'],
                                    
                                    ];
                                }
                            }else{
                                $_SESSION['cart'][$vitri-1] = 
                                    [
                                        "id"     => $_GET['id'],
                                        "pty"    => $pty+1,
                                        "name"   => $_GET['name'],
                                        "price"  => $_GET['price'],
                                        "discount" => $_GET['discount'],
                                        "image_link" => $_GET['image_link'],
                                    
                                    ];
                            }
                            
                            //print_r($_SESSION['cart']); exit();
                            
                            if (isset($_SESSION['cart'])) {
                            
                        $thutu = 0; foreach($_SESSION['cart'] as $row ): ?>
                            <form action="index.php?task=capnhatcart" method="post">
                        <tr>
                            <td><img style="max-width: 150px;" src="images/product/<?php echo $row['image_link']; ?>"></td>
                            <td>
                                <?php echo $row['name']; ?> </td>
                            <td>
                                <?php if ($row['discount'] > 0) {
                                    $total = $row['price'] - $row['discount'];
                                    echo number_format($total);
                                }else{
                                    $total = $row['price'];
                                    echo number_format($total);
                                } ?>
                                
                            </td>
                            <td>
                                
                                <input name="pty" value="<?php echo $row['pty']; ?>" size="5">
                                
                            </td>
                            <td>
                                <?php echo $tong = $total * $row['pty'];  $thutu++; ?>
                            </td>
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="discount" value="<?php echo $row['discount']; ?>">
                            <input type="hidden" name="image_link" value="<?php echo $row['image_link']; ?>">
                            <input type="hidden" name="capnhatmang" value="<?php echo $thutu ?>">
                            <input type="hidden" name="id_product" value="<?php echo $row['id']; ?>">
                            <td><a href="index.php?task=delete_cart&id=<?php echo $row['id']; ?>&thutu=<?php echo $thutu; ?>"><input type="button" value="Xóa" name="">/ </a><button name="click" type="submit">Cập nhât</button></td>
                        </tr></form>
                        <?php $thanht += $tong;  
                            endforeach;
                        }


                        }else{

                         while($row = $cart->fetch_assoc()){ ?>
                		<form action="index.php?task=capnhatcart" method="post">
                    <tr>
                    	<td><img style="max-width: 150px;" src="images/product/<?php echo $row['image_link']; ?>"></td>
                        <td>
                            <?php echo $row['name']; ?> </td>
                        <td>
                        	<?php if ($row['discount'] > 0) {
                        		echo $total = $row['price'] - $row['discount'];
                        	}else{
                        		echo $total = $row['price'];
                        	} ?>
                            
                        </td>
                        <td>
                        	
                            <input name="pty" value="<?php echo $row['pty']; ?>" size="5">
                            
                        </td>
                        <td>
                            <?php echo $tong = $total * $row['pty']; ?>
                        </td>

                        <input type="hidden" name="id_product" value="<?php echo $row['id_product']; ?>">
                        <td><a href="index.php?task=delete_cart&id=<?php echo $row['id']; ?>"><input type="button" value="Xóa" name="">/ </a><button name="click" type="submit">Cập nhât</button></td>
                    </tr></form>
					<?php $thanht += $tong;  }
                    } ?>
                    <tr>
                        <td colspan="6">
                            Tổng số tiền thanh toán: <b style="color:red"><?php echo $thanht; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            
                            <a href="http://localhost/ttcn/index.php?task=form_thanhtoan&sotien=<?php echo $thanht; ?>" class="button">Mua hàng</a>
                        </td>
                    </tr>
                </tbody>
            
            </table>
        
    </div>
</div>





			</div>
		</div>
		<div class="d-none d-lg-block col-lg-2">
			<?php include_once"Partials/right.php"; ?>
		</div>
    </div>
	</div>
	<div class="row">
		<?php include_once"Partials/fooder.php"; ?>
	</div>
</div>
