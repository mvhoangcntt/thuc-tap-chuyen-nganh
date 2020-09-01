<section id="main-content">
    <section class="wrapper"><br/>
        <h3><i class="fa fa-angle-right"></i>Thông tin chi tiết sản phẩm <br>

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
                                    <td>id :</td>
                                    <td><?php echo $row['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên sản phẩm :</td>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Giá gốc :</td>
                                    <td><?php echo $row['price']; ?></td>
                                </tr>
                                <tr>
                                    <td>Giảm giá :</td>
                                    <td><?php echo $row['discount']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh :</td>
                                    <td><img style="max-width: 200px;" src="images/product/<?php echo $row['image_link']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Bảo hành :</td>
                                    <td><?php echo $row['warranty']; ?></td>
                                </tr>
                                <tr>
                                    <td>Qùa tặng :</td>
                                    <td><?php echo $row['gifts']; ?></td>
                                </tr>
                                <tr>
                                    <td>Thông tin chi tiết :</td>
                                    <td><?php echo $row['content']; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo :</td>
                                    <td><?php echo $row['created']; ?></td>
                                </tr>
                                <tr>
                                    <td>Lượt xem :</td>
                                    <td><?php echo $row['view']; ?></td>
                                </tr>
                            <?php } ?>
                               


                            

                            <tr>
                                <td colspan="4" style="width: 250px ">
                                <a href="index.php?task=product_sanpham&trang=<?php if(isset($_GET['trang'])){echo $_GET['trang'];} ?>"><input type="button" class="basic" value="Trở Lại"></a></td></tr>

                            </tbody>
                        </table>
            </div>
        </fieldset>
    </form>
</div>

    </section>
</section>