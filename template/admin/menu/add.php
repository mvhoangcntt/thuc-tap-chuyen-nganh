<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Menu <br>
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

        <div class="">
            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="index.php?task=add_menu_" id="form" class="form">
                <fieldset>
                    <div class="widget">
                        <div class="row">
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
                            <tbody>
                                <tr>
                                    <td style="width: 25px; padding-top: 14px"><img class="titleIcon" src="http://localhost/ttcn/images/icon/icons/dark/add.png"></td>
                                    <td>
                                        <h6>Thêm mới menu</h6></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">

                            <tbody>
                                <tr>
                                    <td>
                                        <label for="param_title" class="formLeft">Tên menu :</label>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <input type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] :'' ?>" class="form-control" _autocheck="true" id="param_title" name="name">
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label for="param_title" class="formLeft">Link menu :</label>
                                        <div style="color: red;"></div>
                                    </td>
                                    <td>
                                        <div class="formRight">
                                            <input value="<?php echo isset($_POST['link']) ? $_POST['link'] :'' ?>" type="text" class="form-control" _autocheck="true" id="param_link" name="link">
                                        </div>
                                    </td>
                                </tr>
                                <!-- End tab_container-->

                                <tr>
                                    <td style="width: 250px">
                                        <input type="submit" name="click" class="redB" value="Thêm mới">
                                    </td>
                                    <td>
                                        <input type="reset" class="basic" value="Hủy bỏ">
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </form>
        </div>

    </section>
</section>