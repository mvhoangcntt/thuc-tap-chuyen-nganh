<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Quản lý khách hàng <br>
	<a href="http://localhost/ttcn/index.php?task=form_user_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
	<a href="http://localhost/ttcn/index.php?task=khuser"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

</h3>            <div class="row" style="padding-bottom: 180px;">
                <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <legend>&nbsp;Update khách hàng !
                        </legend>
                        <form action="index.php?task=user_update_&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" class="form" role="form">

                            <input class="form-control" name="name" value="<?php if(!isset($_POST['name'])){ echo $row['name'];} echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Họ và tên" type="name">
                            

                            <input class="form-control" name="email" value="<?php if(!isset($_POST['email'])){ echo $row['email'];} echo isset($_POST['email']) ? $_POST['email'] :'' ?>" placeholder="Đăng nhập bằng email này !" type="email">
                            
                            <input minlength="10" value="<?php if(!isset($_POST['phone'])){ echo $row['phone'];} echo isset($_POST['phone']) ? $_POST['phone'] :'' ?>" class="form-control" name="phone" placeholder="Số điện thoại !" type="number">

                            <textarea placeholder="Địa chỉ !" class="form-control" name="address"><?php if(!isset($_POST['address'])){ echo $row['address'];} echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>

                            <input minlength="8" class="form-control" name="password" placeholder="Mật khẩu" type="password">
                            
                            <input minlength="8" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" type="password">
                            
                            <br>
                            <input class="btn btn-lg btn-primary btn-block" name="click" type="submit" value="Thêm">
                        </form>
                        <?php } ?>
                    </div>
                <div class="col-sm-4"></div>
                </div>
                
            <!-- row -->
    </section>
</section>