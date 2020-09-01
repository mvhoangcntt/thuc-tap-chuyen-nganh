<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Form menu <br>
    <a href="http://localhost/ttcn/index.php?task=form_add_menu"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
    <a href="http://localhost/ttcn/index.php?task=form_menu"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

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
                            <td>Url</td>
                            <td style="width:90px;">Hành động</td>
                        </tr>
                    </thead>

                    <tbody class="list_item">
                        <?php $i = 0; while($row = $result->fetch_assoc()){ $i++;  ?>
                        <tr class="row_<?php echo $row['id'] ?>">
                            <td><?php echo $i; ?></td>

                            <td class="textC"><?php echo $row['id']; ?></td>

                            <td>
                                <b><?php echo $row['name']; ?></b>
                            </td>

                            <td class="textC"><?php echo $row['url']; ?></td>

                            <td class="option textC">
                                <a href="http://localhost/ttcn/index.php?task=form_update_menu&id=<?php echo $row['id']; ?>" title="Chỉnh sửa" class="tipS">
                                    <img src="images/icon/icons/color/edit.png">
                                </a>

                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')" href="http://localhost/ttcn/index.php?task=delete_menu&id=<?php echo $row['id']; ?>" title="Xóa" class="tipS verify_action">
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