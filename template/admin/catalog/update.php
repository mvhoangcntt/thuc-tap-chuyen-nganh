<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Danh mục <br>
        	<a href="http://localhost/ttcn/index.php?task=form_catalog_add"><button type="button" class="btn btn-primary btn-sm">Thêm mới</button></a>
        	<a href="http://localhost/ttcn/index.php?task=catalog_danhmuc"><button type="button" class="btn btn-primary btn-sm">Danh sách</button></a>
        </h3>        
        <div class="row" style="padding-bottom: 220px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <legend>&nbsp;Update danh mục sản phẩn !
                </legend>
                <form action="index.php?task=update_catalog&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" class="form" role="form">
                    <?php while($row = $idupdate->fetch_assoc()){ ?>

                    <input class="form-control" name="name" value="<?php if(!isset($_POST['name'])){ echo $row['name'];} echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Tên danh mục" type="name">
                    
                    <select class="form-control" id="sel1" _autocheck="true" name="parent_id">
                        <option value="0">Là danh mục cha</option>
                        <?php while($rowp = $result->fetch_assoc()){ ?>
                            <option value="<?php echo $rowp['id']; ?>"><?php echo $rowp['name']; ?></option>
                        <?php } ?>
                    
                    </select>
                    
                    <input class="form-control" name="sort_order" value="<?php if(!isset($_POST['sort_order'])){ echo $row['sort_order'];} echo isset($_POST['sort_order']) ? $_POST['sort_order'] : '' ?>" placeholder="Thứ tự hiển thị" type="sort_order">
                    <br>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Thêm" name="add">
                    <?php } ?>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </section>
</section>