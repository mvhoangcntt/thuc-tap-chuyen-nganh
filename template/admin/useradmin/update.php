<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Quản lý quản trị viên <br>
	<a href="http://localhost/ttcn/index.php?task=form_admin_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
	<a href="http://localhost/ttcn/index.php?task=user_admin"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

</h3>            <div class="row" style="padding-bottom: 180px;">
                <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <legend>&nbsp;Update quản trị viên!
                        </legend>
                        <form action="index.php?task=admin_update&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" class="form" role="form">
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                
                            <input class="form-control" name="name" value="<?php if(!isset($_POST['name'])){ echo $row['name'];} echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Họ và tên" type="name">
                            
                            <input class="form-control" name="username" value="<?php if(!isset($_POST['username'])){ echo $row['username'];} echo isset($_POST['username']) ? $_POST['username'] :'' ?>" placeholder="Tên đăng nhập" type="username">
                            
                            <input minlength="8" class="form-control" name="password" placeholder="Mật khẩu" type="password">
                            
                            <input minlength="8" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" type="password">
                            
                            <br>
                            <input class="btn btn-lg btn-primary btn-block" name="click" type="submit" value="Cập nhật">
                            <?php } ?>
                        </form>
                    </div>
                <div class="col-sm-4"></div>
                </div>
                
            <!-- row -->
    </section>
</section>