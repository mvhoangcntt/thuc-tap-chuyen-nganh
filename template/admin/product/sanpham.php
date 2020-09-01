<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Sản phẩm <br>
    <a href="http://localhost/ttcn/index.php?task=form_product_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
    <a href=""><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

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
                <h6>
                    Danh sách sản phẩm          
                </h6>
                    <div class="num f12">Số lượng: <b><?php while ($sl = $count->fetch_assoc()) {
                        echo $sl['COUNT(id)'];
                    }; ?></b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover" id="checkAll">

                    <thead class="filter">
                        
                                <form class="list_filter form" action="index.php" method="get">
                                    
                                        <tbody>

                                            <tr>
                                                <td colspan="6">
                                                    <input type="hidden" name="task" value="product_sanpham">
                                                    <input name="timkiem" value="<?php echo isset($_GET['timkiem']) ? $_GET['timkiem'] : ''?>" id="filter_iname" type="text" placeholder="  Tìm kiếm tên sản phẩm ..." style="width:200px;">
                                                    <input type="submit" name="tim" class="button blueB" value="Tìm kiếm">
                                                    <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'http://localhost/ttcn/index.php?task=product_sanpham'; ">
                                                </td>

                                            </tr>
                                        </tbody>
                                    
                                </form>
                           
                    </thead>

                    <thead>
                        <tr style="font-size: ">
                            <td style="width:21px;"><img src="images/icon/icons/tableArrows.png"></td>
                            <td style="width:60px;">Mã số</td>
                            <td>Tên</td>
                            <td>Giá</td>
                            <td style="width:100px;">Ngày tạo</td>
                            <td style="width:90px;">Hành động</td>
                        </tr>
                    </thead>

                    <tbody class="list_item">
                        <?php $i = 0; $next = 0;
                         while($row = $result->fetch_assoc()){ $i++;  ?>
                        <tr class="row_<?php echo $row['id']; ?>">
                            <td>
                                <?php echo $i; ?>
                            </td>

                            <td class="textC"><?php echo $row['id']; ?></td>

                            <td>
                                <div class="image_thumb">
                                    <img src="images/product/<?php echo $row['image_link']; ?>" height="50">
                                    <div class="clear"></div>
                                </div>

                                <!-- <a href="product/view/9.html" class="tipS" title="" target="_blank"> -->
                                    <b><?php echo $row['name']; ?></b>
                                <!-- </a> -->

                                <div class="f11">
                                    <!-- Đã bán: <?php //echo $row['buyed']; ?> | --> Xem: <?php echo $row['view']; ?> </div>

                            </td>

                            <td class="textR">
                                <b style="color: red"><?php echo number_format($row['price']); ?> đ</b>
                                 <?php if ($row['discount'] != 0) { ?>
                                    <p style="text-decoration:line-through">
                                    <?php echo $row['discount']; ?>
                                    đ</p>
                                <?php } ?>

                            </td>

                            <td class="textC"><?php echo $row['created']; ?></td>

                            <td class="option textC">
                                <a href="http://localhost/ttcn/index.php?task=product_chitiet&id=<?php echo $row['id']; ?>" target="_blank" class="tipS" title="Xem chi tiết sản phẩm">
                                    <img src="images/icon/icons/color/view.png">
                                </a>
                                <a href="index.php?task=form_update_product&id=<?php echo $row['id']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Chỉnh sửa" class="tipS">
                                    <img src="images/icon/icons/color/edit.png">
                                </a>

                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')" href="index.php?task=delete_product&id=<?php echo $row['id']; ?>&image_link=<?php echo $row['image_link']; ?>" title="Xóa" class="tipS verify_action">
                                    <img src="images/icon/icons/color/delete.png">
                                </a>
                            </td>
                        </tr>
                        <?php $next = $row['id']; ?>
                        <?php } ?>
                    </tbody>

                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="6">
                                <div class="pagination">
                                    <!-- Tạo thay trang -->
                                    <form action="index.php" method="get">
                                        <!-- <strong>1</strong>
                                        <a href="http://localhost/qlbanhang/admin/product/index/5" data-ci-pagination-page="2">2</a>
                                        <a href="http://localhost/qlbanhang/admin/product/index/5" data-ci-pagination-page="2" rel="next">Trang kế tiếp</a>  -->
                                        
                                        <?php
                                            for ($i=1; $i <= $sotrang ; $i++) { 
                                                if ($sotrang <= 4) { ?>
                                                    <a href="index.php?task=product_sanpham&trang=<?php echo $i; ?>"> [Trang <?php echo $i; ?>] </a>
                                                <?php }
                                                if ($sotrang > 4) {
                                                    if(isset($_GET['trang'])){
                                                        $trang  = $_GET['trang'];
                                                        if ($trang == '') {
                                                            $trang = 0;
                                                        }
                                                        if ($trang <= 3) {
                                                            for ($j=1; $j < $trang +3; $j++) { ?>
                                                                <a href="index.php?task=product_sanpham&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                            <?php } break;
                                                        }
                                                        if ($trang > 3 && $trang + 3 <= $sotrang) {
                                                            for ($j=$trang - 2; $j <= $trang +3; $j++) { ?>
                                                                <a href="index.php?task=product_sanpham&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                            <?php } break;
                                                        }
                                                        if ($trang > 3 && $trang = $sotrang) {
                                                            for ($j=$trang - 3; $j <= $trang; $j++) { ?>
                                                                <a href="index.php?task=product_sanpham&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                            <?php } break;
                                                        }
                                                    }else{
                                                        $trang  = 1;
                                                        if ($trang <= 3) {
                                                            for ($j=1; $j < $trang +3; $j++) { ?>
                                                                <a href="index.php?task=product_sanpham&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                            <?php } break;
                                                        }

                                                    }
                                                }
                                                ?>
                                                
                                         <?php   }
                                         ?>

                                        <!-- <input type="hidden" name="task" value="product_sanpham">
                                        <input type="hidden" name="next" value="<?php echo $next; ?>">
                                        <input type="hidden" name="back" value="<?php echo $back; ?>">
                                        <input type="submit" name="trolai" value="back">
                                        <input type="submit" name="tieptheo" value="next"> -->

                                        


                                     </form>
                                </div>
                                <style type="text/css">
                                    .pagination {
                                        float: right;
                                    }
                                    
                                    .pagination a {
                                        background: #f3f3f3;
                                        border: 1px solid #c4c4c4;
                                        border-radius: 2px;
                                        box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
                                        color: #717171;
                                        display: inline-block;
                                        font-weight: 700;
                                        line-height: 25px;
                                        margin-right: 4px;
                                        min-height: 25px;
                                        padding: 0 10px;
                                        text-decoration: none;
                                    }
                                    
                                    .pagination strong {
                                        background: #f3f3f3;
                                        border: 1px solid #c4c4c4;
                                        border-radius: 2px;
                                        box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
                                        color: maroon;
                                        display: inline-block;
                                        font-weight: 700;
                                        line-height: 25px;
                                        margin-right: 4px;
                                        min-height: 25px;
                                        padding: 0 10px;
                                        text-decoration: none;
                                    }
                                </style>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

        </div>
    </section>
</section>