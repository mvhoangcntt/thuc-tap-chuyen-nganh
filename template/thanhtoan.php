<?php include_once"Partials/head.php"; ?>
<div class="container-fluid">
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
				<?php //include_once"Partials/slide.php"; ?>




<div class="box-center"><!-- The box-center register-->
             <div class="tittle-box-center">
		        <h2>Thông tin thành viên</h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Chỉnh sửa thông tin cẩn thận để được giao hàng nhanh nhất !</h1>
            <div class="row">
            	<div class="col-sm-3"></div>
                    <div class="col-sm-6"><br/>
                        <?php while ($row = $tt_user->fetch_assoc()) { ?>
                        <legend>&nbsp;Thông tin thanh toán ! <b style="color: red;">Số tiền : <?php echo $_GET['sotien']; ?></b>
                        </legend>
                        <form action="index.php?task=addthanhtoan&id=<?php echo $_COOKIE['user_login']; ?>&amount=<?php echo $_GET['sotien']; ?>" method="post" enctype="multipart/form-data" class="form" role="form">

                            <input class="form-control" name="name" value="<?php if(!isset($_POST['name'])){ echo $row['name'];} echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Họ và tên" type="name">
                            

                            <input class="form-control" name="email" value="<?php if(!isset($_POST['email'])){ echo $row['email'];} echo isset($_POST['email']) ? $_POST['email'] :'' ?>" placeholder="Đăng nhập bằng email này !" type="email">
                            
                            <input minlength="10" value="<?php if(!isset($_POST['phone'])){ echo $row['phone'];} echo isset($_POST['phone']) ? $_POST['phone'] :'' ?>" class="form-control" name="phone" placeholder="Số điện thoại !" type="number">

                            <textarea placeholder="Địa chỉ !" class="form-control" name="address"><?php if(!isset($_POST['address'])){ echo $row['address'];} echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
                            <textarea placeholder="Ghi chú !" class="form-control" name="message"></textarea>
                            <select class="form-control" name="payment">
                                <option value="">Chọn cổng thanh toán</option>
                                <option value="offline">Thanh toán khi nhận hàng</option>
                                <option value="baokim">Bảo kim</option>
                                <option value="nganluong">Ngân lượng</option>
                                
                            </select>
                            
                            <br>
                            <input class="btn btn-lg btn-primary btn-block" name="click" type="submit" value="Thanh toán">
                        </form>
                        <?php } ?>
                    </div>
                <div class="col-sm-3"></div>
            </div>
         </div><!-- End box-content-center register-->
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