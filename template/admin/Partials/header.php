<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <!--logo start-->
  <a href="http://localhost/ttcn/index.php?task=admin" class="logo"><b>AD<span>MIN</span></b></a>
  <!--logo end-->
  <div class="top-menu">
    <ul style="padding-top: 20px;" class="nav pull-right top-menu">
      <?php if (isset($_COOKIE['id_admin'])) { ?>
        <li><a class="logout" href="http://localhost/ttcn/index.php?task=logout_admin">Đăng xuất</a></li>
      <?php }else{
        Header( "Location: http://localhost/ttcn/index.php?task=login_admin&check=2" );
      }
      if (!isset($_COOKIE['user_name'])) {
        Header( "Location: http://localhost/ttcn/index.php?task=login_admin&check=2" );
      }
       ?>
      
    </ul>
  </div>
</header>