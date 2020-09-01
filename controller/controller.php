<?php 
include_once"view/view.php";
include_once"model/model.php";
class controller{
	var $view;
	var $model;
	public function __construct(){
		$this->view = new view();
		$this->model = new model();
	}
	public function home(){
		$menu = $this->model->menu();
		$xemnhieu = $this->model->xemnhieu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$soluong = $this->model->soluongspcart();
		$this->view->trangchu($xemnhieu,$soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id, $menu);
	}
	public function dangkyuser(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$soluong = $this->model->soluongspcart();
		$this->view->dangky($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$menu);
	}
	public function chitietsp(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$soluong = $this->model->soluongspcart();

		$this->model->viewsp();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$this->view->ttsp($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount,$chitietsanpham,$catalog_id,$menu);
	}
	public function add_userkh(){
		$data = $this->model->useradd();
		if ($data == false) {
			$this->dangkyuser();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=home&tb=1" );// để không add lại giá trị vừa tạo
		}
	}
	public function dangnhapuser(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$soluong = $this->model->soluongspcart();
		$this->view->dangnhap($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$menu);
	}
	public function ttuser(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$soluong = $this->model->soluongspcart();
		$user = $this->model->tt_user();
		$lichsuGD = $this->model->lichsuGD();
		$this->view->tt_user($user,$soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$lichsuGD,$menu);
	}
	public function loginkh(){
		$data = $this->model->loginuser();
		if ($data == false) {
			Header( "Location: http://localhost/ttcn/index.php?task=dangnhapuser&tb=3" );
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=home&tb=2" );// để không add lại giá trị vừa tạo
		}
	}
	public function logout_user(){
		$this->model->logout();
		Header( "Location: http://localhost/ttcn/index.php?task=dangnhapuser" );
	}
	public function edituser(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$resultur = $this->model->id_user();
		$soluong = $this->model->soluongspcart();
		$this->view->user_updateur($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$resultur,$menu);
	}
	public function user_update_user(){
		$data = $this->model->userupdate();
		if ($data == false) {
			$this->edituser();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=home&tb=4" );// để không add lại giá trị vừa tạo
		}
	}
	public function form_cart(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$resultur = $this->model->id_user();
		$cart = $this->model->tt_cart();
		$soluong = $this->model->soluongspcart();
		$this->view->form_cart_($soluong, $slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$resultur,$cart,$menu);
	}
	public function add_cart(){
		$data = $this->model->addcart();
		if ($data == true) {
			$this->form_cart();
		}else{
			//$ar = $this->model->cart_array();
			$this->form_cart();
			//Header( "Location: http://localhost/ttcn/index.php?task=form_cart&arr=1" );
		}
	}
	public function capnhatcart(){
		$data = $this->model->updatecart();
		if ($data == true) {
			$this->form_cart();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=dangnhapuser" );
		}
	}
	public function delete_cart(){
		$this->model->deletecart();
		Header( "Location: http://localhost/ttcn/index.php?task=form_cart" );
	}
	public function form_thanhtoan(){
		$menu = $this->model->menu();
		$slide = $this->model->slide();
		$product_new = $this->model->product_new();
		$news = $this->model->news();
		$catalog = $this->model->catalog();
		$catalog_parent = $this->model->catalog_parent();
		$discount = $this->model->discount();
		$chitietsanpham = $this->model->chitietsanpham();
		$catalog_id = $this->model->catalog_id();
		$tt_user = $this->model->tt_user();
		$soluong = $this->model->soluongspcart();
		$data = $this->model->check_user();
		if ($data == true) {
			if (isset($_SESSION['cart'])) {
				$this->model->addcart2();
				$this->form_cart();
			}
			$this->view->thanhtoan($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$tt_user,$menu);
		}else{
			$this->dangnhapuser();
		}
		
	}
	public function addthanhtoan(){
		$data = $this->model->add_thanh_toan();
		if ($data == true) {
			$this->model->deletecart();
			Header( "Location: http://localhost/ttcn/index.php?task=home&tb=5" );
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=form_cart&tb=6" );
		}
	}










	//--------- admin ----------
	
	public function admin(){
		$data = $this->model->ttbieudo();
		$tonggiaodich = $this->model->tonggiaodich();
		$tongsp = $this->model->tongsp();
		$tongdoanhso = $this->model->tongdoanhso();
		$doanhsohomnay = $this->model->doanhsohomnay();
		$tonguser = $this->model->tonguser();
		$doanhsothangnay = $this->model->doanhsothangnay();
		$this->view->trangchuadmin($data, $tonggiaodich,$tongsp,$tongdoanhso,$doanhsohomnay,$tonguser,$doanhsothangnay);
	}
	public function product_sanpham(){
		$result = $this->model->product_admin();
		$count = $this->model->count_product();
		$sotrang = $this->model->sotrang();
		$this->view->sanpham($result,$count, $sotrang);
	}
	public function form_product_add(){
		$result = $this->model->catalog_parent();
		$this->view->add($result);
	}
	public function add_prduct(){
		$data = $this->model->addprduct();
		if ($data == false) {
			$this->form_product_add();
		}else{
			//$this->product_sanpham();
			Header( "Location: http://localhost/ttcn/index.php?task=product_sanpham" );// để không add lại giá trị vừa tạo
		}
	}
	public function form_update_product(){
		$result = $this->model->catalog_parent();
		$sanphamupdate = $this->model->product_update();
		$this->view->update($result, $sanphamupdate);
	}
	public function update_product(){
		$data = $this->model->updateproduct();
		if ($data == false) {
			$this->form_update_product();
		}else{
			$this->product_sanpham();
		}
	}
	public function delete_product(){
		$this->model->deleteproduct();
		$this->product_sanpham();
	}
	public function product_chitiet(){
		$result = $this->model->chitietsp();
		$this->view->form_chitietsp($result);
	}

	// ------ catalog ----------
	public function catalog_danhmuc(){
		$result = $this->model->catalog_admin();
		$count = $this->model->count_catalog();
		$this->view->catalog($result, $count);
	}
	public function form_catalog_add(){
		$resultp = $this->model->catalog_parent();
		$this->view->form_addcatalog($resultp);
	}
	public function add_catalog(){
		$data = $this->model->addcatalog();
		if ($data == false) {
			$this->form_catalog_add();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=catalog_danhmuc" );// để không add lại giá trị vừa tạo
		}
	}
	public function form_update_catalog(){
		$result = $this->model->catalog_parent();
		$idupdate = $this->model->id_update();
		$this->view->form_updatecatalog($result,$idupdate);
	}
	public function update_catalog(){
		$data = $this->model->updatecatalog();
		if ($data == false) {
			$this->form_update_catalog();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=catalog_danhmuc" );// để không add lại giá trị vừa tạo
		}
	}
	public function delete_catalog(){
		$this->model->deletecatalog();
		$this->catalog_danhmuc();
	}
	//----------- slide ----------------
	
	public function slide_home(){
		$count = $this->model->count_slide();
		$result = $this->model->slidehome_();
		$this->view->slidehome($count, $result);
	}
	public function form_add_slide(){
		$this->view->add_slide();
	}
	public function add_slide_(){
		$data = $this->model->addslide();
		if ($data == false) {
			$this->form_add_slide();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=slide_home" );// để không add lại giá trị vừa tạo
		}
	}
	public function form_update_slide(){
		$result = $this->model->idupdate_slide();
		$this->view->update_slide($result);
	}
	public function update_slide_(){
		$data = $this->model->updateslide();
		if ($data == false) {
			$this->form_update_slide();
		}else{
			$this->slide_home();
		}
	}
	public function delete_slide(){
		$this->model->deleteslide();
		$this->slide_home();
	}
	// ------------- menu ----------------
	public function form_menu(){
		$count = $this->model->count_menu();
		$result = $this->model->menu();
		$this->view->form_menu_admin($result,$count);
	}
	public function form_add_menu(){
		$this->view->add_menu();
	}
	public function add_menu_(){
		$data = $this->model->addmenu();
		if ($data == true) {
			Header( "Location: http://localhost/ttcn/index.php?task=form_menu" );
		}else{
			$this->form_add_menu();
		}
	}
	public function form_update_menu(){
		$result = $this->model->idupdate_menu();
		$this->view->viewupdate($result);
	}
	public function capnhat(){
		$data = $this->model->updatemenu();
		if ($data == true) {
			Header( "Location: http://localhost/ttcn/index.php?task=form_menu" );
		}else{
			$this->form_update_menu();
		}
	}
	public function delete_menu(){
		$this->model->deletemenu();
		$this->form_menu();
	}

	//------------- user admin -----------
	
	public function user_admin(){
		$count = $this->model->count_user_admin();
		$result = $this->model->useradmin_();
		$this->view->useradmin($result, $count);
	}
	public function form_admin_add(){
		$this->view->useradmin_add();
	}
	public function admin_add(){
		$data = $this->model->adminadd();
		if ($data == false) {
			$this->form_admin_add();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=user_admin" );// để không add lại giá trị vừa tạo
		}
	}
	public function form_update_admin(){
		$result = $this->model->id_admin();
		$this->view->useradmin_update($result);
	}
	public function admin_update(){
		$data = $this->model->adminupdate();
		if ($data == false) {
			$this->form_update_admin();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=user_admin" );// để không add lại giá trị vừa tạo
		}
	}
	public function delete_admin(){
		$this->model->deleteadmin();
		$this->user_admin();
	}

	// -------------- user customer khach hang-------------
	
	public function khuser(){
		$count = $this->model->khcount_user();
		$result = $this->model->khuser_();
		$this->view->viewuser($result, $count);
	}
	public function form_user_add(){
		$this->view->user_add();
	}
	public function add_user(){
		$data = $this->model->useradd();
		if ($data == false) {
			$this->form_user_add();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=khuser" );// để không add lại giá trị vừa tạo
		}
	}
	public function form_update_user(){
		$result = $this->model->id_user();
		$this->view->user_update($result);
	}
	public function user_update_(){
		$data = $this->model->userupdate();
		if ($data == false) {
			$this->form_update_user();
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=khuser" );// để không add lại giá trị vừa tạo
		}
	}
	public function delete_user(){
		$this->model->deleteuser();
		$this->khuser();
	}

	//--------------- order ----------------
	
	public function form_order(){
		$result = $this->model->load_order();
		$count = $this->model->count_order();
		$sotrang = $this->model->sotrangorder();
		$this->view->order($result,$count,$sotrang);
	}
	public function update_order(){
		$data = $this->model->updateorder();
		// $this->form_order();
		if ($data == true) {
			Header( "Location: http://localhost/ttcn/index.php?task=form_order&kt=1&id='".$_GET['id']."'" );
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=form_order&kt=2&id='".$_GET['id']."'" );
		}
	}
	public function order_chitiet(){
		$this->check_login_();
		$result = $this->model->chitiet_();
		$this->view->order_chitietsp($result);
	}
	public function login_admin(){
		$this->view->loginadmin();
	}
	public function check_login_admin(){
		$data = $this->model->check_login_admin_();
		if ($data == true) {
			Header( "Location: http://localhost/ttcn/index.php?task=admin&check=1" );
		}else{
			Header( "Location: http://localhost/ttcn/index.php?task=login_admin&check=2" );
		}
	}
	public function logout_admin(){
		$this->model->logout_admin();
		$this->login_admin();
	}
	public function check_login_(){
		$data = $this->model->checklogin();
		if ($data == false) {
			Header( "Location: http://localhost/ttcn/index.php?task=login_admin&check=2" );
		}
	}




	
}


 ?>