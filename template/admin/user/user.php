<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>User khách hàng <br>
	<a href="http://localhost/ttcn/index.php?task=form_user_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
	<a href="http://localhost/ttcn/index.php?task=khuser"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

</h3>
        <div class="row">

            <div class="col-md-12">
                <div style="padding-bottom: 245px;">
                    <div class="title">
                <h6>
                    User khách hàng          
                </h6>
                    <div class="num f12">Số lượng: <b><?php while ($sl = $count->fetch_assoc()) {
                        echo $sl['COUNT(id)'];
                    }; ?></b></div>
                </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover" id="checkAll">

                        <thead>
                            <tr>
                                <td style="width:21px;"><img src="images/icon/icons/tableArrows.png"></td>
                                <th>Mã số</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ngày tạo</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =0; while($row = $result->fetch_assoc()){ $i++; ?>
                            <tr><td><?php echo $i; ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['created']; ?></td>
                                <td>
                                    <a href="http://localhost/ttcn/index.php?task=form_update_user&id=<?php echo $row['id']; ?>">
                                        <img src="images/icon/icons/color/edit.png">
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')" href="http://localhost/ttcn/index.php?task=delete_user&id=<?php echo $row['id']; ?>">
                                        <img src="images/icon/icons/color/delete.png">
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <!-- /content-panel -->
            </div>
        </div>
        <!-- row -->
    </section>
</section>