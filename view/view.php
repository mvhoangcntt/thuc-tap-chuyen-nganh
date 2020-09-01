<?php 
class view{
	public function trangchu($xemnhieu,$soluong,$slide ,$product_new , $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id, $menu){
		include_once"template/home.php";
	}
	public function dangky($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$menu){
		include_once"template/dangkyuser.php";
	}
	public function dangnhap($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$menu){
		include_once"template/dangnhapuser.php";
	}
	public function user_updateur($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$resultur,$menu){
		include_once"template/edituser.php";
	}
	public function form_cart_($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$resultur,$cart,$menu){
		include_once"template/formcart.php";
	}
	public function tt_user($user,$soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$lichsuGD,$menu){
		include_once"template/form_user.php";
	}
	public function thanhtoan($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount, $chitietsanpham, $catalog_id,$tt_user,$menu){
		include_once"template/thanhtoan.php";
	}
	public function ttsp($soluong,$slide ,$product_new, $news, $catalog, $catalog_parent, $discount,$chitietsanpham,$catalog_id,$menu){
		include_once"template/chitietsp.php";
	}




	// ---------- admin -------------
	public function trangchuadmin($data, $tonggiaodich, $tongsp, $tongdoanhso,$doanhsohomnay,$tonguser,$doanhsothangnay){
		include_once"template/admin/admin.php";
	}
	// --------- product ----------
	public function sanpham($result,$count, $sotrang){
		include_once"template/admin/product_sanpham.php";
	}
	public function add($result){
		include_once"template/admin/product_add.php";
	}
	public function update($result, $sanphamupdate){
		include_once"template/admin/product_update.php";
	}
	public function form_chitietsp($result){
		include_once"template/admin/product_chitiet.php";
	}
	// ---------- catalog -------------
	public function catalog($result,$count){
		include_once"template/admin/catalog_danhmuc.php";
	}
	public function form_addcatalog($resultp){
		include_once"template/admin/catalog_add.php";
	}
	public function form_updatecatalog($result, $idupdate){
		include_once"template/admin/catalog_update.php";
	}
	//----------- slide ---------------
	public function slidehome($count, $result){
		include_once"template/admin/slide_img.php";
	}
	public function add_slide(){
		include_once"template/admin/slide_add.php";
	}
	public function update_slide($result){
		include_once"template/admin/slide_update.php";
	}
	// ------------- user admin ------------
	public function useradmin($result, $count){
		include_once"template/admin/admin_user.php";
	}
	public function useradmin_add(){
		include_once"template/admin/admin_add.php";
	}
	public function useradmin_update($result){
		include_once"template/admin/admin_update.php";
	}
	//--------------- user khach hang ----------
	public function viewuser($result, $count){
		include_once"template/admin/user_customer.php";
	}
	public function user_add(){
		include_once"template/admin/user_add.php";
	}
	public function user_update($result){
		include_once"template/admin/user_update.php";
	}
	//--------------- order -----------------
	public function order($result,$count,$sotrang){
		include_once"template/admin/order_sanpham.php";
	}
	public function order_chitietsp($result){
		include_once"template/admin/order_chitietsp.php";
	}
	//------ login ------------
	public function loginadmin(){
		include_once"template/admin/login_admin.php";
	}
	// ---------- menu ------------
	
	public function form_menu_admin($result,$count){
		include_once"template/admin/menu.php";
	}
	public function add_menu(){
		include_once"template/admin/menu_add.php";
	}
	public function viewupdate($result){
		include_once"template/admin/menu_update.php";
	}
	

	

	

}


 ?>