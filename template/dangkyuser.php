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
		        <h2>Đăng ký thành viên</h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Đăng ký thành viên</h1>
            <div class="row">
            	<div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form action="index.php?task=add_userkh" method="post" enctype="multipart/form-data" class="form" role="form">
                            <input class="form-control" name="name" pattern="{1,15}" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Họ và tên" type="name">
                            
                            <input class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] :'' ?>" placeholder="Đăng nhập bằng email này !" type="email">
                            
                            <input minlength="10" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] :'' ?>" class="form-control" name="phone" placeholder="Số điện thoại !" type="number">

                            <textarea placeholder="Địa chỉ !" class="form-control" name="address"><?php echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>

                            <input minlength="8" class="form-control" name="password" placeholder="Mật khẩu" type="password">
                            
                            <input minlength="8" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" type="password">
                            
                            <br>
                            <input class="btn btn-lg btn-primary btn-block" name="click" type="submit" value="Thêm">
                        </form>
                    </div>
                <div class="col-sm-4"></div>
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