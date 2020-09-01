<section id="main-content">
    <?php 
        if (isset($_GET['kt'])) {
            if ($_GET['kt'] == 1) { ?>
                <script type="text/javascript">alert("Đã thay đổi tình trạng đơn hàng mã sô : <?php echo $_GET['id']; ?>");</script>
            <?php }
            if ($_GET['kt'] == 2) { ?>
                <script type="text/javascript">alert("Chỉ những đơn hàng chờ sử lý mới được thay đổi !");</script>
            <?php }
        }

     ?>
    <section class="wrapper">
        

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
                <h6><br/>
                    Danh sách đơn hàng         
                </h6>
                    <div class="num f12">Số lượng: <b><?php while ($sl = $count->fetch_assoc()) {
                        echo $sl['COUNT(id)'];
                    }; ?></b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover" id="checkAll">

                    <thead class="filter">           
                        <tbody>
                            <tr>
                                
                                    <form class="list_filter form" action="index.php" method="get">
                                        <td colspan="7">
                                            <input type="hidden" name="task" value="form_order">
                                            <input style="font-family: monospace; font-size: 14px; width: 250px;" name="timkiem" value="<?php echo isset($_GET['timkiem']) ? $_GET['timkiem'] : ''?>" id="filter_iname" type="text" placeholder="  Thông tin cần tìm ..." style="width:200px;">
                                            <input style="font-family: monospace; font-size: 14px;" type="submit" name="tim" class="button blueB" value="Tìm Tên sản phẩm">
                                            <input style="font-family: monospace; font-size: 14px;" type="submit" name="email" class="button blueB" value="Tìm email">
                                            <input style="font-family: monospace; font-size: 14px;" type="submit" name="ngay" class="button blueB" value="Tìm ngày">
                                            <input style="font-family: monospace; font-size: 14px;" type="submit" name="ma" class="button blueB" value="Tìm mã">
                                            <input style="font-family: monospace; font-size: 14px;" type="reset" class="basic" value="Reset" onclick="window.location.href = 'http://localhost/ttcn/index.php?task=form_order'; ">
                                        </td>
                                        <td colspan="2">
                                            <select style="font-family: monospace; font-size: 14px;" name="status"  onchange="this.form.submit()">
                                            <option>Lọc tình trạng</option>
                                            <option <?php if (isset($_GET['status'])){if($_GET['status'] == 0){echo 'selected';}} ?> value="0">Chờ sử lý</option>
                                            <option <?php if (isset($_GET['status'])){if($_GET['status'] == 1){echo 'selected';}} ?> value="1">Đã gửi hàng</option>
                                            <option <?php if (isset($_GET['status'])){if($_GET['status'] == 2){echo 'selected';}} ?> value="2">Đã hủy</option>
                                            
                                        </select>
                                        </td>
                                    </form>

                                
                            </tr>
                        </tbody>   
                    </thead>

                    <thead>
                        <tr style="font-size: ">
                            <td style="width:21px;"><img src="images/icon/icons/tableArrows.png"></td>
                            <td style="width:60px;">Mã số</td>
                            <td>Tên</td>
                            <td>Email</td>
                            <td style="width:83px;">Số lượng</td>
                            <td style="width:120px;">Tổng số tiền</td>
                            <td style="width:83px;">Tình trạng</td>
                            <td style="width:90px;">Ngày tạo</td>
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

                                    <b><?php echo $row['name']; ?></b>

                            </td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['qty']; ?></td>
                            <td class="textR">
                                <b style="color: red"><?php echo number_format($row['amount']); ?> đ</b>

                            </td>
                        <td>
                            <form class="form-inline" method="get" action="index.php">
                                <input type="hidden" name="task" value="update_order">
                                <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
                                <?php 
                                if (isset($_GET['status'])) { ?>
                                    <!-- <input type="hidden" name="statu"  value="<?php //echo $_GET['status']; ?>"> -->
                                <?php }

                                 ?>
                                <select name="status" onchange="this.form.submit()">
                                    <option <?php if ($row['status'] == 0){echo 'selected';} ?> value = 0 >Chờ sử lý</option>
                                    <option <?php if ($row['status'] == 1){echo 'selected';} ?> value = 1 >Đã gửi hàng</option>
                                    <option <?php if ($row['status'] == 2){echo 'selected';} ?> value = 2 >Đã hủy</option>
                                </select>
                            </form>
                        </td>

                            <td class="textC"><?php echo $row['created']; ?></td>

                            <td class="option textC">
                                <a href="http://localhost/ttcn/index.php?task=order_chitiet&id=<?php echo $row['id']; ?>&trang=<?php if(isset($_GET['trang'])){echo $_GET['trang'];} ?>"class="tipS" title="Xem chi tiết sản phẩm">
                                    <img src="images/icon/icons/color/view.png">
                                </a>
                            </td>
                        </tr>

                        <?php $next = $row['id']; ?>
                        <?php } ?>
                    </tbody>

                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="9">
                                <div class="pagination">
                                    <!-- Tạo thay trang -->
                                    <form action="index.php" method="get">
                                        <?php 
                                            if (!isset($_GET['status'])) {
                                                for ($i=1; $i <= $sotrang ; $i++) { 
                                                    if ($sotrang <= 4) { ?>
                                                        <a href="index.php?task=form_order&trang=<?php echo $i; ?>"> [Trang <?php echo $i; ?>] </a>
                                                    <?php }
                                                    if ($sotrang > 4) {
                                                        if(isset($_GET['trang'])){
                                                            $trang  = $_GET['trang'];
                                                            if ($trang == '') {
                                                                $trang = 0;
                                                            }
                                                            if ($trang <= 3) {
                                                                for ($j=1; $j < $trang +3; $j++) { ?>
                                                                    <a href="index.php?task=form_order&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                                <?php } break;
                                                            }
                                                            if ($trang > 3 && $trang + 3 <= $sotrang) {
                                                                for ($j=$trang - 2; $j <= $trang +3; $j++) { ?>
                                                                    <a href="index.php?task=form_order&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                                <?php } break;
                                                            }
                                                            if ($trang > 3 && $trang = $sotrang) {
                                                                for ($j=$trang - 3; $j <= $trang; $j++) { ?>
                                                                    <a href="index.php?task=form_order&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                                <?php } break;
                                                            }
                                                        }else{
                                                            $trang  = 1;
                                                            if ($trang <= 3) {
                                                                for ($j=1; $j < $trang +3; $j++) { ?>
                                                                    <a href="index.php?task=form_order&trang=<?php echo $j; ?>"> [Trang <?php echo $j; ?>] </a>
                                                                <?php } break;
                                                            }

                                                        }
                                                    }
                                                }
                                            }
                                         ?>

                                        


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