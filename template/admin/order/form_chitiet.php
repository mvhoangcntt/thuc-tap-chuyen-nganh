<section id="main-content">
    <section class="wrapper"><br/>
        <h3><i class="fa fa-angle-right"></i>Thông tin chi tiết đơn hàng <br>

</h3>
        
        <div class="">
            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
                <fieldset>
                    <div class="widget">
                        
                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <th colspan="2"><h5>Thông tin sản phẩm</h5></th>
                                    <th colspan="2"><h5>Thông tin Khách hàng</h5></th>
                                </tr>
                                <tr>
                                    <td>
                                        Mã đơn hàng :
                                    </td>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>Họ tên :</td>
                                    <td><?php echo $row['user_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Tên sản phẩm :</label>
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>Số điện thoại :</td>
                                    <td><?php echo $row['user_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <label>Hình ảnh :</label>
                                    </td>
                                    <td rowspan="3">
                                        <img style="max-width: 150px;" src="images/product/<?php echo $row['image_link']; ?>">
                                    </td>
                                    <td>Email : </td>
                                    <td><?php echo $row['user_email']; ?></td>
                                </tr>

                                <tr>
                                    <td>Hình thức thanh toán : </td>
                                    <td><?php echo $row['payment']; ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ : </td>
                                    <td><?php echo $row['address']; ?></td>

                                </tr>
                                <tr>
                                    <td>
                                        <label>Số tiền : </label>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['amount']);  ?> đ
                                    </td>
                                    <td>Nội dung ghi chú của khách hàng : </td>
                                    <td><?php echo $row['message']; ?></td>

                                </tr>
                                <tr>
                                    <td>
                                        <label>Ngày đặt : </label>
                                    </td>
                                    <td>
                                        <?php echo $row['created']; ?> 
                                    </td>
                                    <td>
                                        <label><?php if ($row['status'] == 1) {
                                            echo "Ngày gửi : ";
                                        }else{
                                            if ($row['status'] == 2) {
                                                echo "Ngày hủy : ";
                                            }else{
                                                echo "Tình trạng : ";
                                            }
                                        } ?> </label>
                                    </td>
                                    <td>
                                        <?php if ($row['data'] == 0) {
                                            echo "Chưa gửi !";
                                        }else{
                                            echo $row['data'];
                                        } ?> 
                                    </td>

                                </tr>
                            <?php } ?>
                               


                <!-- End tab_container-->

                <tr>
                    <td colspan="4" style="width: 250px ">
                    <a href="index.php?task=form_order&trang=<?php echo $_GET['trang']; ?>"><input type="button" class="basic" value="Trở Lại"></a></td></tr>

            </tbody></table>
            </div>
        </fieldset>
    </form>
</div>

    </section>
</section>