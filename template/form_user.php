<?php include_once"Partials/head.php"; ?>
<div class="container-fluid">
	<div class=''>
		<?php include_once"Partials/header.php"; ?>
	</div>
</div>
<div class="container-fluid">
	<div style="padding-top: 5px;">
	<div class="row">
		<div class="col-md-2">
			<?php include_once"Partials/left.php"; ?>
		</div>
		<div class="col-md-8">
			<div class="content">


<div class="box-center"><!-- The box-center register-->
            <div class="tittle-box-center">
		    <h2>Thông tin thành viên</h2>
		    </div>
		    <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Thông tin thành viên</h1>
            <div class="row">
            	<div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
							<?php while($row = $user->fetch_assoc()){ ?>
							<tr>
								<td>Họ tên :</td>
								<td><?php echo $row['name']; ?></td>
							</tr>
							<tr>
								<td>Email :</td>
								<td><?php echo $row['email']; ?></td>
							</tr>
							<tr>
								<td>Số điện thoại :</td>
								<td><?php echo $row['phone']; ?></td>
							</tr>
							<tr>
								<td>Địa chỉ : </td>
								<td><?php echo $row['address']; ?></td>
							</tr>
							<tr>
								<td colspan=""><a style="color: red;" href="http://localhost/ttcn/index.php?task=edituser&id=<?php echo $_COOKIE['user_login']; ?>">Sửa thông tin</a></td>
								<td><a style="color: red;" href="http://localhost/ttcn/index.php?task=ttuser&user_id=<?php echo $_COOKIE['user_login']; ?>">Lịch sử giao dịch</a></td>
							</tr>
							<?php } ?>
                       </table>
                    </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
            	<?php 
            	if (isset($_GET['user_id'])) { ?>
            		<table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
	            		<tr>
	            			<th>Mã</th>
	            			<th>Tên hàng</th>
	            			<th>Số lượng</th>
	            			<th>Tổng số tiền</th>
	            			<th>Ngày đặt</th>
	            			<th>Tình trạng</th>
	            		</tr>
	            	<?php while ($row = $lichsuGD->fetch_assoc()) {?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?><br/><img style="max-width: 100px;" src="images/product/<?php echo $row['image_link']; ?>"></td>
							<td><?php echo $row['qty']; ?></td>
							<td><b style="color: red;"><?php echo number_format($row['amount']); ?> đ </b></td>
							<td><?php echo $row['created']; ?></td>
							<td><?php if ($row['status'] == 0) {
											echo "Chờ sử lý";
										}else{
											if ($row['status'] == 1) {
												echo "Đã gửi hàng";
											}else{
												echo "Đã hủy";
											}
										} 
							?></td>
						</tr>

	            	<?php }  ?>
	            	</table>
            	<?php }

            	 ?>
            </div>
         </div><!-- End box-content-center register-->
 </div>


			</div>
		</div>
		<div class="col-md-2">
			<?php include_once"Partials/right.php"; ?>
		</div>
	</div>
	</div>
	<div class="row">
		<?php include_once"Partials/fooder.php"; ?>
	</div>
</div>