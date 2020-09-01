<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Danh mục <br>
	<a href="http://localhost/ttcn/index.php?task=form_catalog_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
	<a href="http://localhost/ttcn/index.php?task=catalog_danhmuc"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

</h3>
        <div class="row">

            <div class="col-md-12">
                <div class="">
                    <div class="title">
                <h6>
                    Danh mục sản phẩm          
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
                                <th>Thứ tự hiển thị</th>
                                <th>Tên danh mục</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =0; while($row = $result->fetch_assoc()){ $i++; ?>
                            <tr><td><?php echo $i; ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['sort_order']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>
                                    <?php 

                                        if ($row['parent_id'] != 0) { ?>
                                            <a href="http://localhost/ttcn/index.php?task=form_update_catalog&id=<?php echo $row['id']; ?>">
                                                <img src="images/icon/icons/color/edit.png">
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')" href="http://localhost/ttcn/index.php?task=delete_catalog&id=<?php echo $row['id']; ?>">
                                                <img src="images/icon/icons/color/delete.png">
                                            </a>
                                       <?php }else{
                                        echo "Danh mục cha";
                                       }
                                     ?>
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