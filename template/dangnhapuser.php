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

<?php if (isset($_GET['tb'])): ?>
		<?php if($_GET['tb'] == 3){ ?> <script type="text/javascript">alert('Đăng nhập thất bại !');</script> <?php } ?>
?>
			
	<?php endif ?>

<div class="box-center"><!-- The box-center register-->
             <div class="tittle-box-center">
		        <h2>Đăng nhập thành viên</h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Đăng nhập thành viên</h1>
            <div class="row">
            	<div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        
                        <form action="index.php?task=loginkh" method="post" enctype="multipart/form-data" class="form" role="form">
                            
                            <input class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] :'' ?>" placeholder="Đăng nhập bằng email này !" type="email">
             
                            <input minlength="8" class="form-control" name="password" placeholder="Mật khẩu" type="password">
                
                            
                            <br>
                            <input class="btn btn-lg btn-primary btn-block" name="click" type="submit" value="Đăng nhập">
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