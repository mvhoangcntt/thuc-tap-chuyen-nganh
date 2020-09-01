<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Sản phẩm <br>
    <a href="http://localhost/ttcn/index.php?task=form_product_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
    <a href="http://localhost/ttcn/index.php?task=product_sanpham"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>

</h3>
        
        <div class="">

            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="index.php?task=add_prduct" id="form" class="form">
                <fieldset>
                    <div class="widget">
                        
                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
                            <tbody>
                                <tr>
                                    <td style="width: 25px; padding-top: 17px;"><img class="titleIcon" src="http://localhost/ttcn/images/icon/icons/dark/add.png"></td>
                                    <td style="font-size: 20px;">
                                        Thêm mới Sản phẩm</td>
                                </tr>

                            </tbody>
                        </table>
                        
                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
                            <tbody>
                                <tr>
                                    <td style="width: 150px">
                                        <li class="activeTab">Thông tin chung</li>
                                    </td>

                                    <td></td>
                                </tr>
                                <style type="text/css">
                                    li {
                                        list-style: none;
                                    }
                                </style>

                                <tr>
                                    <td>
                                        <label for="param_name" class="formLeft">Tên sản phẩm:<span class="req">*</span></label>
                                        <div style="color: red;"></div>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <input type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" class="form-control" _autocheck="true" id="param_name" name="name">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <div class="left">
                                                <input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- <tr>
                                    <td>
                                        <label class="formLeft">Ảnh kèm theo:</label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <div class="left">
                                                <input type="file" multiple="" name="image_list[]" id="image_list" size="25">
                                            </div>
                                        </div>
                                    </td>
                                </tr> -->

                                <!-- Price -->
                                <tr>
                                    <td>
                                        <label for="param_price" class="formLeft">
                                            Giá :
                                            
                                        </label>
                                        <div style="color: red;"></div>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input type="number" _autocheck="true" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" class="format_number" id="param_price" style="width:100px" name="price">
                                                <img src="http://localhost/ttcn/images/icon/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
                                            </span>
                                            
                                        </div>
                                    </td>
                                </tr>

                                <!-- Price -->
                                <tr>
                                    <td>
                                        <label for="param_discount" class="formLeft">
                                            Giảm giá (VND)
                                            <span></span>:
                                        </label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <span>
                                                <input type="number" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : '' ?>" class="format_number" id="param_discount" style="width:100px" name="discount">
                                                <img src="http://localhost/ttcn/images/icon/information.png" style="margin-bottom:-8px" class="tipS" original-title="Số tiền giảm giảm giá">
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                                        <div style="color: red;"></div>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            
                                            <select name="catalog" class="form-control">
                                                <option value=""></option>
                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <?php $db = mysqli_connect("localhost","root","","webbanhang");
                                                $utf8 = mysqli_set_charset($db,"utf8");

                                                 ?>
                                                <?php $i =0; while($row = $result->fetch_assoc()){ $i++; ?>
                                                    <?php 
                                                        $result2 ='';
                                                        $sql1 = "SELECT * FROM `catalog` WHERE parent_id > 0";
                                                        $result2 = $db->query($sql1);

                                                     ?>
                                                        <optgroup label="<?php echo $row['name'];?>">
                                                            <?php if ($row['parent_id'] == 0) {  ?>
                                                                <?php while($row2 = $result2->fetch_assoc() ){ ?>
                                                                    <?php if($row['id'] == $row2['parent_id']){//kiểm tra mục con ?>
                                                                <option value="<?php echo $row2['id'];?>">
                                                                    <?php echo $row2['name'];?>
                                                                </option>
                                                            <?php } } }?>
                                                        </optgroup>
                                                            
                                                <?php }?>
                                            </select>
                                            
                                        </div>
                                    </td>
                                </tr>

                                <!-- warranty -->
                                <tr>
                                    <td>
                                        <label for="param_warranty" class="formLeft">
                                            Bảo hành :
                                        </label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <input class="form-control" value="<?php echo isset($_POST['warranty']) ? $_POST['warranty'] : '' ?>" type="text" id="param_warranty" name="warranty">
                                            
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="param_sale" class="formLeft">Tặng quà:</label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <textarea cols="" class="form-control" id="param_gifts" name="gifts"><?php echo isset($_POST['gifts']) ? $_POST['gifts'] : '' ?></textarea>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="formLeft">Mô tả sản phẩm:</label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <textarea cols="" class="form-control" name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
                                    
                            </div>
                        </td></tr>

                <!-- End tab_container-->

                <tr>
                    <td style="width: 250px ">
                    <input type="submit" name="send" class="redB" value="Thêm mới "></td><td>
                    <input type="reset" class="basic" value="Hủy bỏ "></td></tr>

            </tbody></table>
            </div>
        </fieldset>
    </form>
</div>

    </section>
</section>