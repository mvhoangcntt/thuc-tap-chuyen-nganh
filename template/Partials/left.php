<div class="left">
	<div class="box-left">
        <div class="title tittle-box-left">
            <h2> Tìm kiếm theo giá </h2>
        </div>
        <div class="content-box">
            <!-- The content-box -->
            <form class="t-form form_action" method="get" style="padding:10px" action="index.php" name="search">

                <div class="form-row">
                    <label for="param_price_from" class="form-label" style="width:60px">Giá từ:<span class="req">*</span></label>
                    <div class="form-item" style="width:100px">
                        <select class="input" id="price_from" name="price_from">
                            <?php for ($i=0; $i <= 20000000 ; $i=$i+100000): ?>
                                <option 
                                <?php if(isset($_GET['search2'])){ if($_GET['price_from'] == $i) { echo 'selected';}} ?> 
                                value="<?php echo $i; ?>"><?php echo number_format($i); ?> đ</option>

                            <?php endfor; ?>
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-row">
                    <label for="param_price_from" class="form-label" style="width:60px">Giá tới:<span class="req">*</span></label>
                    <div class="form-item" style="width:100px">
                        <select class="input" id="price_to" name="price_to">
                            <?php for ($i=0; $i <= 20000000 ; $i=$i+100000): ?>
                                <option <?php if(isset($_GET['search2'])){ if($_GET['price_to'] == $i) { echo 'selected';}} ?> value="<?php echo $i; ?>"><?php echo number_format($i); ?> đ</option>
                            <?php endfor; ?>                 
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="form-row">
                    <label class="form-label">&nbsp;</label>
                    <div class="form-item">
                        <input type="hidden" name="task" value="home">
                        <input type="submit" class="button" name="search2" value="Tìm kiềm" style="height:30px !important;line-height:30px !important;padding:0px 10px !important">
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
        <!-- End content-box -->
    </div>

    <div class="box-left">
        <div class="title tittle-box-left">
            <h2> Danh mục sản phẩm </h2>
        </div>
        <div class="content-box">
            <!-- The content-box -->
            <ul class="catalog-main">
                <?php 
                $db = mysqli_connect("localhost","root","","webbanhang");
                $utf8 = mysqli_set_charset($db,"utf8");
                $mang = array();
                 ?>
                <?php $i =0; while($row = $catalog_parent->fetch_assoc()){ $i++; ?>
                    <?php 
                        $result2 ='';
                        $sql1 = "SELECT * FROM `catalog` WHERE parent_id > 0";
                        $result2 = $db->query($sql1);

                     ?>
                    <li>
                        <span><a href="index.php?task=home&cantim=<?php echo $row['name']; ?>" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a></span>
                        <!-- lay danh sach danh muc con -->
                        <?php if ($row['parent_id'] == 0) {  ?>
                            <?php while($row2 = $result2->fetch_assoc() ){ ?>
                                <?php if($row['id'] == $row2['parent_id']){//kiểm tra mục con ?>
                                    <ul class="catalog-sub">
                                        <li>

                                            <a href="index.php?task=home&timid=<?php echo $row2['id']; ?>" title="<?php echo $row2['name']; ?>"> 
                                            <?php echo $row2['name']; ?></a>
                                        </li>
                                    </ul>
                                <?php }?>
                            <?php } ?>
                        <?php } ?>

                    </li>
                <?php } ?>    
            </ul>
        </div>
        <!-- End content-box -->
    </div>
			</div>