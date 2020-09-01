<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Slide <br>
    <a href="http://localhost/ttcn/index.php?task=form_add_slide"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
    <a href="http://localhost/ttcn/index.php?task=slide_home"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

</h3>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    var main = $('#form');

                    // Tabs
                    main.contentTabs();
                });
            })(jQuery);
        </script>
        <div>
            <div class="widget">

                <div class="title">
                    <!-- <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span> -->
                    <h6>
                Danh sách slide          
            </h6>
                    <div class="num f12">Số lượng: <b><?php while ($sl = $count->fetch_assoc()) {
                        echo $sl['COUNT(id)'];
                    }; ?></b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover" id="checkAll">

                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="http://localhost/qlbanhang/public/admin/images/icons/tableArrows.png"></td>
                            <td style="width:60px;">Mã số</td>
                            <td>Tiêu đề</td>
                            <td style="width:83px;">Thứ tự</td>
                            <td style="width:90px;">Hành động</td>
                        </tr>
                    </thead>

                    <tbody class="list_item">
                        <?php $i = 0; while($row = $result->fetch_assoc()){ $i++;  ?>
                        <tr class="row_<?php echo $row['id'] ?>">
                            <td><?php echo $i; ?></td>

                            <td class="textC"><?php echo $row['id']; ?></td>

                            <td>
                                <div class="image_thumb">
                                    <img src="images/slide/<?php echo $row['image_link']; ?>" height="50">
                                    <div class="clear"></div>
                                </div>

                                <a href="" class="tipS" title="" target="_blank">
                                    <b><?php echo $row['name']; ?></b>
                                </a>

                            </td>

                            <td class="textC"><?php echo $row['sort_order']; ?></td>

                            <td class="option textC">
                                <a href="http://localhost/ttcn/index.php?task=form_update_slide&id=<?php echo $row['id']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Chỉnh sửa" class="tipS">
                                    <img src="images/icon/icons/color/edit.png">
                                </a>

                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')" href="http://localhost/ttcn/index.php?task=delete_slide&id=<?php echo $row['id']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Xóa" class="tipS verify_action">
                                    <img src="images/icon/icons/color/delete.png">
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>

                </table>
            </div>

        </div>
    </section>
</section>