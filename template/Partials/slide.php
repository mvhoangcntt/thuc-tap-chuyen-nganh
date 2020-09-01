<!-- lay slide -->
<?php
    if (!isset($_GET['menuluotxem']) && !isset($_GET['menudiscount']) && !isset($_GET['menusp']) && !isset($_GET['chitietsanpham']) && !isset($_GET['cantim']) && !isset($_GET['timid']) && !isset($_GET['price_to'])) { ?>
    <script src="royalslider/jquery.royalslider.min.js"></script>
    <link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
    <link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">

    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $("#HomeSlide").royalSlider({
                    arrowsNav: true,
                    loop: false,
                    keyboardNavEnabled: true,
                    controlsInside: false,
                    imageScaleMode: "fill",
                    arrowsNavAutoHide: false,
                    autoScaleSlider: true,
                    autoScaleSliderWidth: 580, //chiều rộng slide
                    autoScaleSliderHeight: 205, //chiều cao slide
                    controlNavigation: "bullets",
                    thumbsFitInViewport: false,
                    navigateByClick: true,
                    startSlideId: 0,
                    autoPlay: {
                        enabled: true,
                        stopAtAction: false,
                        pauseOnHover: true,
                        delay: 5000
                    },
                    transitionType: "move",
                    slideshowEnabled: true,
                    slideshowDelay: 5000,
                    slideshowPauseOnHover: true,
                    slideshowAutoStart: true,
                    globalCaption: false
                });
            });
        })(jQuery);
    </script>

    <style>
        #HomeSlide.royalSlider {
            width: 100%;
            height: 300px;
            overflow: hidden;
        }
    </style>

    <div id="slide">
        <div id="img-slide" class="sliderContainer" ">
            <div id="HomeSlide" class="royalSlider rsMinW">
                <?php while ($row = $slide->fetch_assoc()) { ?>
                    <a href="<?php echo $row['link']; ?>" target="_blank"><img style="width: 100%;" src="images/slide/<?php echo $row['image_link']; ?>"> </a>
                    
                <?php } ?>
                
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear pb20"></div>
<?php } ?>