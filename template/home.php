<?php include_once"Partials/head.php"; ?>
<div class="container-fluid">
	<?php if (isset($_GET['tb'])): ?>
		<?php if($_GET['tb'] == 1){ ?> <script type="text/javascript">alert('Đăng ký thành công !');</script> <?php } ?>
		<?php if($_GET['tb'] == 2){ ?> <script type="text/javascript">alert('Đăng nhập thành công !');</script> <?php } ?>
		<?php if($_GET['tb'] == 4){ ?> <script type="text/javascript">alert('Chỉnh sửa thành công !');</script> <?php } 
		?>
		<?php if($_GET['tb'] == 5){ ?> <script type="text/javascript">alert('Đặt hàng thành công !');</script> <?php } ?>
			
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
					<?php if (!isset($_GET['noidung'])) {
						include_once"Partials/slide.php";
					} ?>
					<?php include_once"Partials/content.php"; ?>
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