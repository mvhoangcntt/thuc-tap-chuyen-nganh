<!DOCTYPE html>
<html>
<head>
	<?php include_once"Partials/head.php"; ?>
</head>
<?php 
if (isset($_GET['check'])) {
	if ($_GET['check'] == 2) { ?>
		<script type="text/javascript">alert("Sai tài khoản hoặc mật khẩu !");</script>
	<?php }
}
 ?>
<body>
<div id="login-page">
    <div class="container">
      <form method="POST" class="form-login" action="index.php?task=check_login_admin">
        <h2 class="form-login-heading">Đăng nhập ngay</h2>
        <div class="login-wrap">
			
			<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
			<br>

			<input type="password" name="password" class="form-control" placeholder="Password">

			<br/>
			<button class="btn btn-theme btn-block" name="click" type="submit"><i class="fa fa-lock"></i> Đăng nhập </button><br/>
        </div>
      </form>
    </div>
 </div>

</body>
</html>