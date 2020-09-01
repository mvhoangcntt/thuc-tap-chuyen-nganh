<?php include_once"Partials/head.php"; ?>
<div class="container-fluid">
    <div class=''>
        <?php include_once"Partials/header.php"; ?>
    </div>
</div>
<div class="container-fluid">
    <div style="padding-top: 5px;">
    <div class="row">
        <div class="d-none d-lg-block col-lg-2">
            <?php include_once"Partials/left.php"; ?>
        </div>
        <div class="col-12 col-lg-8">
            <div class="content">
<!-- video -->
<script type='text/javascript' src='js/jwplayer.js'></script>
<script type='text/javascript'>
    jQuery('document').ready(function() {
        jwplayer('mediaspace').setup({
            'flashplayer': 'js/player.swf',
            'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
            'controlbar': 'bottom',
            'width': '560',
            'height': '315',
            'autoplay': true
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('a.tab').click(function() {
            var an_di = $('a.selected').attr('rel'); //lấy title của thẻ <a class='active'>
            $('div#' + an_di).hide(); //ẩn thẻ <div id='an_di'>
            $('a.selected').removeClass('selected');
            $(this).addClass('selected');
            var hien_thi = $(this).attr('rel'); //lấy title của thẻ <a> khi ta kick vào nó
            $('div#' + hien_thi).show(); //hiện lên thẻ <div id='hien_thi'>
        });
    });
</script>

<!-- zoom image -->
<script src="js/jquery.jqzoom-core.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/jquery.jqzoom.css" type="text/css">
<script type="text/javascript">
    $(document).ready(function() {
        $('.jqzoom').jqzoom({
            zoomType: 'standard',
        });
    });
</script>
<!-- end zoom image -->

<!-- Raty -->
<script type="text/javascript">
    $(document).ready(function() {
        //raty
        $('.raty_detailt').raty({
            score: function() {
                return $(this).attr('data-score');
            },
            half: true,
            click: function(score, evt) {
                var rate_count = $('.rate_count');
                var rate_count_total = rate_count.text();
                $.ajax({
                    url: 'http://localhost/webphp/product/raty.html',
                    type: 'POST',
                    data: {
                        'id': '9',
                        'score': score
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.complete) {
                            var total = parseInt(rate_count_total) + 1;
                            rate_count.html(parseInt(total));
                        }
                        alert(data.msg);
                    }
                });
            }
        });
    });
</script>
<!--End Raty -->
<div class="box-center">
    <!-- The box-center product-->

    <?php 
    $content = '';
    $idsp = '';
    while ($row = $chitietsanpham->fetch_assoc()) { ?>
    <?php $content = $row['content']; $idsp = $row['id']; ?>
    <div class="tittle-box-center">
        <h2>Chi tiết sản phẩm</h2>
    </div>
    <div class="box-content-center product">
        <!-- The box-content-center -->
        <div class="product_view_img">
            <a href="images/product/<?php echo $row['image_link']; ?>" class="jqzoom" rel="gal1" title="triumph">
                <img src="images/product/<?php echo $row['image_link']; ?>" alt="Tivi LG 520" style="width:100% !important">
            </a>
            <div class="clear" style="height:10px"></div>
            <div class="clearfix">
            </div>
        </div>

        <div class="product_view_content">
            <h1><?php echo $row['name']; ?></h1>

            <p class="option">
                Giá:
                    <?php if($row['discount'] > 0):?>
                    <?php $price_new = $row['price'] - $row['discount'];?>
                    <?php echo number_format($price_new)?> đ <span class="price_old"><?php echo number_format($row['price'])?> đ</span>
                    <?php else:?>
                    <?php echo number_format($row['price'])?> đ
                    <?php endif;?>

            </p>

            <p class="option">
                Danh mục:
                <a href="" title=" Acer">
                    <b> 
                        
                    <?php

                    while ($row2 = $catalog_id->fetch_assoc()) {
                         echo $row2['name'];
                     } 
                         ?>
                    </b>
                </a>
            </p>

            <p class="option">
                Lượt xem: <b><?php echo $row['view']; ?></b>
            </p>
            <p class="option">
                Bảo hành: <b><?php echo $row['warranty']; ?></b>
            </p>
            <p class="option">
                Tặng quà: <b><?php echo $row['gifts']; ?></b>
            </p><br/>

            <!-- Đánh giá &nbsp;
            <span class='raty_detailt' style = 'margin:5px' id='9' data-score='4'></span> 
                       | Tổng số: <b  class='rate_count'>1</b> -->

            <div class="action">
                <a class="button" style="float:left;padding:8px 15px;font-size:16px" 
                href="index.php?task=add_cart&id=<?php echo $row['id']; ?>&pty=1&name=<?php echo $row['name']; ?>&price=<?php echo $row['price']; ?>&discount=<?php echo $row['discount']; ?>&image_link=<?php echo $row['image_link']; ?>
                " title="Mua ngay">Thêm vào giỏ hàng</a>
                <div class="clear"></div>
            </div>

        </div>
        <div class="clear" style="height:15px"></div>
        <center>
          <!-- AddThis Button BEGIN -->
            <script type="text/javascript">var switchTo5x=true;</script>
            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">stLight.options({publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
            <span class='st_facebook_hcount' displayText='Facebook'></span>
            <span class='st_fblike_hcount' displayText='Facebook Like'></span>
            <span class='st_googleplus_hcount' displayText='Google +'></span>
            <span class='st_twitter_hcount' displayText='Tweet'></span>
            <!-- AddThis Button END -->
        </center>  
    <div class="clear" style="height:10px"></div>
    <table width="100%" cellspacing="0" cellpadding="3" border="0" class="tbsicons">
        <tbody>
            <tr>
                <td width="25%"><img alt="Phục vụ chu đáo" src="http://localhost/ttcn/images/icon-services.png">
                    <div>Phục vụ chu đáo</div>
                </td>
                <td width="25%"><img alt="Giao hàng đúng hẹn" src="http://localhost/ttcn/images/icon-shipping.png">
                    <div>Giao hàng đúng hẹn</div>
                </td>
                <td width="25%"><img alt="Đổi hàng trong 24h" src="http://localhost/ttcn/images/icon-delivery.png">
                    <div>Đổi hàng trong 24h</div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php } ?>
</div>
<div class="usual" id="usual1">
     <ul>
           <li><a title="Chi tiết sản phẩm" rel='tab2' href='javascript:void(0)' class="tab selected">Chi tiết sản phẩm</a></li>         
    </ul>
</div>
<div class="usual-content">
    <div id="tab2" style="display: block;"> 
            <center style="text-align: left;">
                <?php echo $content; ?>
                
            </center>   
    </div>
    <div id="tab4" style="display: none;"> 
           <div class='box-show-product'>
           <div class="comments">
    <div class="title"><h3>THẢO LUẬN CỦA KHÁCH HÀNG <span class="yellow">(0)</span></h3><h4>Ý kiến khách hàng về Sản phẩm Tivi LG 520</h4></div>
    <br class="break">
    <div class="reviews">
            <div class="content">
                                </div>
    </div>
</div>
<div class='clear'></div>          


<style>
.error{
    margin:15px 0px;
}
</style>
<form name='send_comment' id='show_box_comment' class="t-form form_action" method='post' action=''>
     <table width="90%" cellspacing="0" cellpadding="0" border="0" style="margin:10px auto">
          <tbody>
              <tr>
                  <td style='width:210px;padding-right:15px;vertical-align:top'>
                       <input type="text" style="width:200px;" class='input' id="user_name" placeholder="Họ tên" value='' name="user_name">
                       <div name="user_name_error" class="error"></div>
                       <input type="text" style="width:200px;" id="user_email" class='input' placeholder="Email" value='' name="user_email">
                       <div name="user_email_error" class="error"></div>
                       <img id="imgsecuri"  src="http://localhost/webphp/captcha/three.html" style="margin-bottom: -6px;" _captcha="http://localhost/webphp/captcha/three.html" class="imgrefresh" >
                       
                       <input type="text"  class='input'   style="width:80px;" id="security_code" placeholder="Mã xác nhận" name="security_code">
                       <div name="security_code_error" class="error"></div>
                  </td>
                  <td>
                        <textarea id="content_comment" cols="50" rows="3" style='width:320px' class='input' placeholder='Nội dung phản hồi' name="content">
                        </textarea>
                        <div name="content_error" class="error"></div>
                        <input type="hidden" name='product_id' value='9'>
                        <input type="hidden" name='parent_id' id='comment_parent_id' value=''>
                        <input type="submit" class="button button-border medium blue f" id=""   value="Gửi" name="_submit">
                        <input type="reset" class="button button-border medium red f"  value='Nhập lại'>
                        <div class='clear'></div>
                  </td>
              </tr>
          </tbody>
     </table>
</form>        </div>
    </div>
</div>
</div>
        </div>
        <div class="d-none d-lg-block col-lg-2">
            <?php include_once"Partials/right.php"; ?>
        </div>
    </div>
    </div>
    <div class="row">
        <?php include_once"Partials/fooder.php"; ?>
    </div>
</div>
