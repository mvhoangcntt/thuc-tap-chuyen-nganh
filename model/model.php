<?php 
class model{
	var $db;
	var $utf8;
	public function __construct(){
		$this->db = mysqli_connect("localhost","root","","webbanhang");
		$this->utf8 = mysqli_set_charset($this->db,"utf8");
	}
	// ----------- vùng home -------------
	//mới nhất
	public function product_new(){
		$this->utf8;
		$value = '';
		$price_from = '';
		$price_to = '';
		$sql = "SELECT * FROM `product` ORDER BY id DESC LIMIT 3";
		
		if (isset($_GET['search'])) {
			$value = $_GET['noidung'];
			if ($value != '') {
				$sql = 'SELECT * FROM `product` WHERE name LIKE \'%'.$value.'%\'';
			}
		}
		if (isset($_GET['search2'])) {
			$price_from = $_GET['price_from'];
			$price_to = $_GET['price_to'];
			if ($price_from != '' && $price_to != '') {
				$sql = 'SELECT * FROM `product` WHERE price > '.$price_from.' AND price <= '.$price_to.' ';
			}
		}
		if (isset($_GET['cantim'])) {
			$value = $_GET['cantim'];
			if ($value != '') {
				$sql = 'SELECT * FROM `product` WHERE name LIKE \'%'.$value.'%\'';
			}
		}
		if (isset($_GET['timid'])) {
			$value = $_GET['timid'];
			if ($value != '') {
				$sql = 'SELECT * FROM `product` WHERE catalog_id ='.$value;
			}
		}
		if (isset($_GET['menusp'])) {
			$sql = 'SELECT * FROM `product` ORDER BY id DESC';
		}
		if (isset($_GET['menudiscount'])) {
			$sql = 'SELECT * FROM `product` WHERE discount >0 and discount <= (SELECT MAX(discount) FROM `product`) ORDER BY discount DESC';
		}
		if (isset($_GET['menuluotxem'])) {
			$sql = 'SELECT * FROM `product` WHERE view > 0 and view <= (SELECT MAX(view) FROM `product`) ORDER BY view DESC';
		}

		$result = $this->db->query($sql);
		return $result;
	}
	public function xemnhieu(){
		$this->utf8;
		$sql = "SELECT * FROM `product` WHERE view <= (SELECT MAX(view) FROM `product`) ORDER BY view DESC LIMIT 3";
		$result = $this->db->query($sql);
		return $result;
	}
	public function news(){
		$this->utf8;
		$sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 5";
		$result = $this->db->query($sql);
		return $result;
	}
	public function slide(){
		$this->utf8;
		$sql = "SELECT * FROM `slide`";
		$result = $this->db->query($sql);
		return $result;
	}
	public function menu(){
		$this->utf8;
		$sql = "SELECT * FROM `menu`";
		$result = $this->db->query($sql);
		return $result;
	}
	public function catalog(){
		$this->utf8;
		$sql = "SELECT * FROM `catalog` WHERE parent_id > 0";
		$result = $this->db->query($sql);
		return $result;
	}
	public function catalog_parent(){
		$this->utf8;
		$sql = "SELECT * FROM `catalog` WHERE parent_id = 0";
		$result = $this->db->query($sql);
		return $result;
	}
	public function discount(){
		$this->utf8;
		$sql = "SELECT * FROM `product` WHERE discount <= (SELECT MAX(discount) FROM `product`) ORDER BY discount DESC LIMIT 3";
		$result = $this->db->query($sql);
		return $result;
	}
	public function chitietsanpham(){
		$this->utf8;
		if (isset($_GET['chitietsanpham'])) {
			$chitietsanpham = $_GET['chitietsanpham'];
			$sql = "SELECT * FROM `product` WHERE id = ".$chitietsanpham;
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function viewsp(){
		if (isset($_GET['chitietsanpham'])) {
			$chitietsanpham = $_GET['chitietsanpham'];
			$x = 0;
			$sql = "SELECT * FROM `product` WHERE id = ".$chitietsanpham;
			$result = $this->db->query($sql);
			while ($row = $result->fetch_assoc()) {
				$x = $row['view'];
			}
			$x = $x +1;
			$sql1 = "UPDATE `product` SET `view`= '$x' WHERE id = ".$chitietsanpham;
			$this->db->query($sql1);
		}
	}
	public function catalog_id(){
		$this->utf8;
		if (isset($_GET['idcatalog'])) {
			$catalog_id = $_GET['idcatalog'];
			$sql = "SELECT * FROM `catalog` WHERE id = ".$catalog_id;
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function loginuser(){
		if (isset($_POST['click'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $sql = "select * from user where email = '".$email."' and password = '".$pass."'" ;
            
            $result =$this->db->query($sql);
            if ($result->num_rows == 0) {
                return false;
            }else{
                while ($row = $result->fetch_assoc()) { 
                   setcookie("user_login", $row['id'], time() + (86400 * 30), "/");
                   setcookie("name", $row['name'], time() + (86400 * 30), "/");
                   // dang xuat set thoi gian - lon hon
                }
                return true;
            }
        }
	}
	public function logout(){
		setcookie("user_login", '', time() - (86400 * 30), "/");
		setcookie("name", '', time() - (86400 * 30), "/");
	}
	public function check_login(){
		if (isset($_COOKIE['user_login'])) {
			return true;
		}else{
			return false;
		}
	}
	public function tt_user(){
		if (isset($_COOKIE['user_login'])) {
			$this->utf8;
			$sql = "SELECT * FROM `user` WHERE id = ".$_COOKIE['user_login'];
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function lichsuGD(){
		$this->utf8;
		if (isset($_GET['user_id'])) {
			$user_id = $_GET['user_id'];
			$sql = "SELECT order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id AND transaction.user_id = ".$user_id." ORDER BY id DESC";
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function tt_cart(){
		if (isset($_COOKIE['user_login'])) {
			$this->utf8;
			$sql = "SELECT * FROM `cart` WHERE id_user = ".$_COOKIE['user_login'];
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function soluongspcart(){
		if (isset($_COOKIE['user_login'])) {
			$this->utf8;
			$sql = "SELECT COUNT(id) FROM `cart` WHERE id_user =".$_COOKIE['user_login'];
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function addcart(){
		if (isset($_COOKIE['user_login'])) {
			$id_product = $_GET['id'];
			$id_user = $_COOKIE['user_login'];
			$name = $_GET['name'];
			$pty = $_GET['pty'];
			$price = $_GET['price'];
			$discount = $_GET['discount'];
			$image_link = $_GET['image_link'];
			$result1 = $this->tt_cart();

			if ($result1->fetch_assoc()) {
				$result = $this->tt_cart();
				$kt = 0;
				$ktpty = 0;
			 	while ($row = $result->fetch_assoc()) {
					if ($row['id_product'] == $id_product) {
						$kt++;
						$ktpty = $row['pty'];
					}
				}
				if ($kt > 0) {
					$pty = $pty + $ktpty;
					$sql = "UPDATE `cart` SET `pty`= '$pty' WHERE id_user =".$id_user." AND id_product = ".$id_product;
					if ($this->db->query($sql)) {
						return true;
					}else{
						return false;
					}
				}else{
					$sql = "INSERT INTO `cart`(`id_user`, `id_product`, `name`, `pty`, `price`, `discount`, `image_link`) VALUES('$id_user','$id_product','$name','$pty','$price','$discount','$image_link')";
					if ($this->db->query($sql)) {
						return true;
					}else{
						return false;
					}
				}
			 }else{
			 	$sql = "INSERT INTO `cart`(`id_user`, `id_product`, `name`, `pty`, `price`, `discount`, `image_link`) VALUES('$id_user','$id_product','$name','$pty','$price','$discount','$image_link')";
				if ($this->db->query($sql)) {
					return true;
				}else{
					return false;
				}
			 }
			
		}else{
			return false;
		}
	}
	public function addcart2(){
		if (isset($_COOKIE['user_login'])) {

			
			$id_user = $_COOKIE['user_login'];
			// $name = $_GET['name'];
			// $pty = $_GET['pty'];
			// $price = $_GET['price']; 
			// $discount = $_GET['discount'];
			// $image_link = $_GET['image_link'];
			
			foreach ($_SESSION['cart'] as $row1) {
       			$id_product = $row1['id'];
       			$name = $row1['name'];
       			$pty = $row1['pty'];
       			$price = $row1['price'];
       			$discount = $row1['discount'];
       			$image_link = $row1['image_link'];
       		$result1 = '';
			$result1 = $this->tt_cart();
			$result = '';
			if ($result1->fetch_assoc()) {
				$result = $this->tt_cart();
				$kt = 0;
				$ktpty = 0;
			 	while ($row = $result->fetch_assoc()) {
					if ($row['id_product'] == $row1['id']) {
						$kt++;
						$ktpty = $row['pty'];
					}
				}
				if ($kt > 0) {
					$pty = $pty + $ktpty;
					$sql = "UPDATE `cart` SET `pty`= '$pty' WHERE id_user =".$id_user." AND id_product = ".$id_product;
					$this->db->query($sql);
				}else{
					$sql = "INSERT INTO `cart`(`id_user`, `id_product`, `name`, `pty`, `price`, `discount`, `image_link`) VALUES('$id_user','$id_product','$name','$pty','$price','$discount','$image_link')";
					$this->db->query($sql);
				}
			 }else{
			 	$sql = "INSERT INTO `cart`(`id_user`, `id_product`, `name`, `pty`, `price`, `discount`, `image_link`) VALUES('$id_user','$id_product','$name','$pty','$price','$discount','$image_link')";
				$this->db->query($sql);
			 }
			}
		}
		unset($_SESSION['cart']);
	}
	public function updatecart(){
		if (isset($_POST['click'])) {
			if (isset($_POST['capnhatmang'])) {
				$thutu = $_POST['capnhatmang'];
				$pty = $_POST['pty'];
				$_SESSION['cart'][$thutu-1] = 
                [
                    "id"     => $_POST['id_product'],
                    "pty"    => $pty,
                    "name"   => $_POST['name'],
                    "price"  => $_POST['price'],
                    "discount" => $_POST['discount'],
                    "image_link" => $_POST['image_link'],
                
                ];
                //echo $_POST['image_link']; exit();
                return true;
			}else{
				$pty = $_POST['pty'];
				$id_product = $_POST['id_product'];
				$sql = "UPDATE `cart` SET `pty`= '$pty' WHERE id_user =".$_COOKIE['user_login']." AND id_product = ".$id_product;
				if ($this->db->query($sql)) {
					return true;
				}else{
					return false;
				}
			}
		}
	}
	public function check_user(){
		if (isset($_COOKIE['name'])) {
			if (isset($_COOKIE['user_login'])) {
				$name = $_COOKIE['name'];
				$id = $_COOKIE['user_login'];
				$sql = "select * from user" ;
            	$kt = 0;
	            $result =$this->db->query($sql);
                while ($row = $result->fetch_assoc()) { 
                   if ($row['id'] == $id) {
                   		$kt++;
                   }
                   if ($row['name'] == $name) {
                   		$kt++;
                   }
                }
                if ($kt == 2) {
                	return true;
                }
				return false;
			}
			return false;
		}
		return false;
	}
	public function deletecart(){
		if (isset($_GET['thutu'])) {
			$thutu = $_GET['thutu'];
			
			$size = -1;
			foreach($_SESSION['cart'] as $row ) {
				$size++;
			}
			for ($i= $thutu-1; $i < $size ; $i++) { 
				$_SESSION['cart'][$thutu-1] = $_SESSION['cart'][$i+1];
			}
			unset($_SESSION['cart'][$size]);
			//echo $size; exit();
			return true;
		}else{
			$id = $_GET['id'];
			$sql = "DELETE FROM `cart` WHERE id = ".$id;
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
		}
	}
	public function add_thanh_toan(){
		if (isset($_POST['click'])) {
			$user_id = $_GET['id'];
			$user_name = $_POST['name'];
			$user_name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($user_name));
			$user_email = $_POST['email'];
			$user_email = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($user_email));
			$user_phone = $_POST['phone'];
			$amount = $_GET['amount'];
			$message = $_POST['message'];
			$message = preg_replace('/([^\pL\.\ , . ! ]+)/u', '', strip_tags($message));
			$payment = $_POST['payment'];

			$created = date('Y/m/d');
			if ($user_name == '' || $user_email=='' || $user_phone=='' || $amount=='' || $payment=='') {
				return false;
			}else{

				$sql = "INSERT INTO `transaction`(`status`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `payment`, `message`, `created`) VALUES ('0','$user_id','$user_name','$user_email','$user_phone','$amount','$payment','$message','$created')";
				//var_dump($sql); exit();
				$this->db->query($sql);
				$id_transaction = '';
				$sql2 = "SELECT * FROM `transaction` ORDER BY id DESC LIMIT 1";// WHERE created = '".$created."'
				$result = $this->db->query($sql2);
				while ($row = $result->fetch_assoc()) {
					//if ($row['created'] == $created) {
						$id_transaction = $row['id'];
					//}
				}
				//echo "string".$id_transaction;exit();
				$kt = 0;

				if ($id_transaction != '') {
					$sql1 = "SELECT * FROM `cart` WHERE id_user = ".$user_id;
					$result1 = $this->db->query($sql1);
					while ($row1 = $result1->fetch_assoc()) { $kt++;
						$tt = 0; 
						(int)$price = $row1['price']; 
						(int)$discount = $row1['discount']; 
						(int)$pty = $row1['pty'];
						(int)$tt = ($price - $discount) * $pty;
						$id_product = $row1['id_product'];

						$sql3 = "INSERT INTO `order`(`transaction_id`, `product_id`, `qty`, `amount`, `status`) VALUES ('$id_transaction','$id_product','$pty','$tt','0')";
						//var_dump($sql3); exit();
						$this->db->query($sql3);
					}
				}
				if ($kt > 0) {
					$sql4 = "DELETE FROM `cart` WHERE id_user = ".$user_id;
					if ($this->db->query($sql4)) {
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
		}
	}







//-----------------------------------------------------------------------------
	// lấy dữ liệu ra bản đồ
	public function ttbieudo(){
		$this->utf8;
		if (isset($_GET['nam'])) {
			$value = $_GET['nam'];
			$sql = 'SELECT order.amount, transaction.created FROM `transaction`, `order` WHERE transaction.id = order.transaction_id and order.status = 1 and transaction.created LIKE \'%'.$value.'%\'';
		}else{
			$value = date('Y');
			$sql = 'SELECT order.amount, transaction.created FROM `transaction`, `order` WHERE transaction.id = order.transaction_id and order.status = 1 and transaction.created LIKE \'%'.$value.'%\'';
		}
		
		$result = $this->db->query($sql);
		return $result;
	}
	public function tonggiaodich(){
		$sql = "SELECT COUNT(id) FROM `order`";
		$result = $this->db->query($sql);
		return $result;
	}
	public function tongsp(){
		$sql = "SELECT COUNT(id) FROM `product`";
		$result = $this->db->query($sql);
		return $result;
	}
	public function tongdoanhso(){
		$sql = "SELECT SUM(amount) FROM `order`";
		$result = $this->db->query($sql);
		return $result;
	}
	public function doanhsohomnay(){
		$date = date('Y/m/d');
		$sql = "SELECT SUM(order.amount) FROM `order`,`transaction` WHERE transaction.id = order.transaction_id AND transaction.created = "."'$date'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function tonguser(){
		$sql = "SELECT COUNT(id) FROM `user`";
		$result = $this->db->query($sql);
		return $result;
	}
	public function doanhsothangnay(){
		$yeah = date('Y');
		$month = date('m');
		$sql = 'SELECT SUM(order.amount) FROM `order`,`transaction` WHERE transaction.id = order.transaction_id AND transaction.created LIKE \'%'.$yeah.'-'.$month.'%\'';
		$result = $this->db->query($sql);
		return $result;
	}





	// -------- admin ----------
	// product
	public function product_admin(){
		$this->utf8;
		$value = '';
		$sql = '';
		if (isset($_GET['trang'])) {
			$trang = $_GET['trang'];
			settype($trang, "int");
			$sotin = 4;
			$solimit = ($trang - 1)*$sotin;
			if ($solimit < 0) {
				$solimit = 0;
			}
			$sql = "SELECT * FROM `product` LIMIT $solimit, $sotin";
		}else{
			$sql = "SELECT * FROM `product` LIMIT 0, 4";
		}

		if (isset($_GET['tim'])) {
			$value = $_GET['timkiem'];
			if ($value != '') {
				$sql = 'SELECT * FROM `product` WHERE name LIKE \'%'.$value.'%\'';
			}
		}
		
		$result = $this->db->query($sql);
		return $result;
		
	}
	public function sotrang(){
		$this->utf8;
		$sotin = 4;
		$sql = "SELECT * FROM `product`";
		$result = $this->db->query($sql);
		$tongsotin = mysqli_num_rows($result);
		$sotrang = ceil($tongsotin / $sotin);
		return $sotrang;
	}
	public function count_product(){
		$sql = 'SELECT COUNT(id) FROM `product`';
		$count = $this->db->query($sql);
		return $count;
	}
	// addproduct
	public function addprduct(){
		if (isset($_POST['send'])) {
			//$image_list = array();
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$image = $_FILES['image'];
			//$image_list = $_FILES['image_list'];
			$price = $_POST['price'];
			$discount = $_POST['discount'];
			$catalog = $_POST['catalog'];
			$warranty = $_POST['warranty'];
			$warranty = preg_replace('/([^\pL\.\ , ! . ]+)/u', '', strip_tags($warranty));
			$gifts = $_POST['gifts'];
			$gifts = preg_replace('/([^\pL\.\ , . ! ]+)/u', '', strip_tags($gifts));
			$content = $_POST['content'];
			$content = preg_replace('/([^\pL\.\ , - . ! ]+)/u', '', strip_tags($content));

			if ($name == '' || $image == '' || $price == '' || $content == ''|| $catalog == '') {
				//Header( "Location: http://localhost/ttcn/index.php?task=admin&banmuon=go_form_add_product" );
				?>
				<script type="text/javascript">
					//window.location = "http://localhost/ttcn/index.php?task=admin&banmuon=go_form_add_product"
					alert("Không được để trống !");
				</script><?php
				return false;
				
			}else{
				if ($_FILES['image']['type']== "image/jpeg" || $_FILES['image']['type']=="image/png" || $_FILES['image']['type']== "image/gif") {
					if ($_FILES['image']['size'] > 1000000) {
						?>
						<script type="text/javascript">
							alert("File lớn hơn 1000000 kb !");
						</script><?php
						return false;
					}else{
						$path = "images/product/";
						$tmp_name = $_FILES['image']['tmp_name'];
						$nameimg = $_FILES['image']['name'];
						$type = $_FILES['image']['type'];
						$size = $_FILES['image']['size'];
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$created = date('Y/m/d');
						//echo $created; exit();
						$time = time();
						$rename = $time.$nameimg;
						move_uploaded_file($tmp_name, $path.$rename);
						$sql = "INSERT INTO `product`(`catalog_id`, `name`, `price`, `content`, `discount`, `image_link`, `created`,`warranty`,`gifts`)
						VALUES ('".$catalog."', '".$name."', '".$price."', '".$content."', '".$discount."', '".$rename."','".$created."','".$warranty."','".$gifts."') ";
						if ($this->db->query($sql)) {
			    			return true;
			    		}else{
			    			return $this->db->error;
			    		}
					}
				}else{
					?>
					<script type="text/javascript">
						alert(" Upload file không hợp lệ !");
					</script><?php
					return false;
				}

			}
		}
	}
	// lây tt ra form update
	public function product_update(){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `product` WHERE id = ".$id;
		$result = $this->db->query($sql);
		return $result;

	}
	// updateproduct
	public function updateproduct(){
		if (isset($_POST['send'])) {
			$id = $_GET['id'];
			$image_link = $_GET['image_link'];
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			// $image = $_FILES['image'];
			$price = $_POST['price'];
			$discount = $_POST['discount'];
			$catalog = $_POST['catalog'];
			$warranty = $_POST['warranty'];
			$warranty = preg_replace('/([^\pL\.\ , . ! ]+)/u', '', strip_tags($warranty));
			$gifts = $_POST['gifts'];
			$gifts = preg_replace('/([^\pL\.\ , . ! ]+)/u', '', strip_tags($gifts));
			$content = $_POST['content'];
			$content = preg_replace('/([^\pL\.\ 1 2 3 4 5 6 7 8 9 0 % , - . ! ]+)/u', '', strip_tags($content));
			$check = $_FILES["image"]["tmp_name"];

			if ($name == '' || $price == '' || $content == ''|| $catalog == '') {
				?>
				<script type="text/javascript">
					alert("Không được để trống ! hoặc chứa ký tự đặc biệt !");
				</script><?php
				return false;
				
			}else{
				if ($check == '') {
					date_default_timezone_set('Asia/Ho_Chi_Minh');
					$created = date('Y/m/d');
					$sql = "UPDATE product SET name ='$name', price = '$price', discount = '$discount', catalog_id ='$catalog', warranty = '$warranty', gifts = '$gifts', content = '$content', created = '$created' WHERE id = ".$id;

					if ($this->db->query($sql)) {
		    			return true;
		    		}else{
		    			return false;
		    		}

				}else{
					$path = "images/product/";
					//$image_link = $_GET['image_link'];
					
					if (file_exists($path.''.$image_link))
					{
					    unlink($path.''.$image_link);
					}
					if ($_FILES['image']['type']== "image/jpeg" || $_FILES['image']['type']=="image/png" || $_FILES['image']['type']== "image/gif") {
						if ($_FILES['image']['size'] > 1000000) {
							?>
							<script type="text/javascript">
								alert("File lớn hơn 1000000 kb !");
							</script><?php
							return false;
						}else{
							$path = "images/product/";
							$tmp_name = $_FILES['image']['tmp_name'];
							$nameimg = $_FILES['image']['name'];
							$type = $_FILES['image']['type'];
							$size = $_FILES['image']['size'];
							date_default_timezone_set('Asia/Ho_Chi_Minh');
							$created = date('Y/m/d');
							$time = time();
							$rename = $time.$nameimg;
							move_uploaded_file($tmp_name, $path.$rename);
							$sql = "UPDATE product SET image_link = '$rename', name ='$name', price = '$price', discount = '$discount', catalog_id ='$catalog', warranty = '$warranty', gifts = '$gifts', content = '$content', created = '$created' WHERE id = ".$id;
							if ($this->db->query($sql)) {
				    			return true;
				    		}else{
				    			return $this->db->error;
				    		}
						}
					}else{
						?>
						<script type="text/javascript">
							alert(" Upload file không hợp lệ !");
						</script><?php
						return false;
					}
				}
				

			}
		}
	}
	// deleteproduct
	public function deleteproduct(){
		$path = "images/product/";
		$id = $_GET['id'];
		$image_link = $_GET['image_link'];
		if (file_exists($path.''.$image_link))
		{
		    unlink($path.''.$image_link);
		}
		$sql = "DELETE FROM `product` WHERE id = ".$id;
		if($this->db->query($sql)){
			return true;
			?>
			<script type="text/javascript">
				alert(" Xóa thành công !");
			</script><?php
		}else{
			return false;
			?>
			<script type="text/javascript">
				alert(" Xóa thất bại !");
			</script><?php
		}
	}
	public function chitietsp(){
		$this->utf8;
		if (isset($_GET['id'])) {
			$chitietsanpham = $_GET['id'];
			$sql = "SELECT * FROM `product` WHERE id = ".$chitietsanpham;
			$result = $this->db->query($sql);
			return $result;
		}
	}
	// -------------- catalog ---------------
	public function catalog_admin(){
		$this->utf8;
		$sql = "SELECT * FROM catalog ORDER BY id DESC";
		$result = $this->db->query($sql);
		return $result;
	}
	public function count_catalog(){
		$sql = 'SELECT COUNT(id) FROM `catalog`';
		$count = $this->db->query($sql);
		return $count;
	}


	public function addcatalog(){
		if (isset($_POST['add'])) {
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$parent_id = $_POST['parent_id'];
			$sort_order = $_POST['sort_order'];
			$sort_order = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($sort_order));
			if ($name != '' && $parent_id != 0 && $sort_order != '') {
				$sql = "INSERT INTO `catalog`(`name`,`parent_id`, `sort_order`) VALUES ('$name', '$parent_id', '$sort_order')";
				if ($this->db->query($sql)) {
					?>
					<script type="text/javascript">
						alert(" Thêm danh mục thành công !");
					</script><?php
					return true;
				}else{
					?>
					<script type="text/javascript">
						alert(" Thêm danh mục thất bại !");
					</script><?php
					return false;
				}
			}else{
				?>
				<script type="text/javascript">
					alert(" Không được để trống !");
				</script><?php
				return false;
			}
		}
	}
	public function id_update(){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `catalog` WHERE id = ".$id;
		$result = $this->db->query($sql);
		return $result;
	}

	public function updatecatalog(){
		if (isset($_POST['add'])) {
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$parent_id = $_POST['parent_id'];
			$sort_order = $_POST['sort_order'];
			$sort_order = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($sort_order));
			if ($name != '' && $parent_id != 0 && $sort_order != '') {
				$sql = "UPDATE `catalog` SET name='$name', parent_id = '$parent_id', sort_order = '$sort_order' WHERE id = ".$_GET['id'];
				if ($this->db->query($sql)) {
					?>
					<script type="text/javascript">
						alert(" Update danh mục thành công !");
					</script><?php
					return true;
				}else{
					?>
					<script type="text/javascript">
						alert(" Update danh mục thất bại !");
					</script><?php
					return false;
				}
			}else{
				?>
				<script type="text/javascript">
					alert(" Không được để trống !");
				</script><?php
				return false;
			}
		}
	}

	public function deletecatalog(){
		$id = $_GET['id'];
		$sql = "DELETE FROM `catalog` WHERE id = ".$id;
		if($this->db->query($sql)){
			return true;
			?>
			<script type="text/javascript">
				alert(" Xóa thành công !");
			</script><?php
		}else{
			return false;
			?>
			<script type="text/javascript">
				alert(" Xóa thất bại !");
			</script><?php
		}
	}

	// ------------ slide ---------------
	
	public function count_slide(){
		$sql = 'SELECT COUNT(id) FROM `slide`';
		$count = $this->db->query($sql);
		return $count;
	}
	public function slidehome_(){
		$sql = 'SELECT * FROM `slide`';
		$result = $this->db->query($sql);
		return $result;
	}
	public function addslide(){
		if (isset($_POST['click'])) {
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$tmp_name = $_FILES['image']['tmp_name'];
			$link = $_POST['link'];
			$info = $_POST['info'];
			$sort_order = $_POST['sort_order'];

			if ($name == '' || $tmp_name == '') {
				?>
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				return false;
			}else{
				if ($_FILES['image']['type']== "image/jpeg" || $_FILES['image']['type']=="image/png" || $_FILES['image']['type']== "image/gif") {
					if ($_FILES['image']['size'] > 1000000) {
						?>
						<script type="text/javascript">
							alert("File lớn hơn 1000000 kb !");
						</script><?php
						return false;
					}else{
						$path = "images/slide/";
						$tmp_name = $_FILES['image']['tmp_name'];
						$nameimg = $_FILES['image']['name'];
						$type = $_FILES['image']['type'];
						$size = $_FILES['image']['size'];
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$created = date('Y/m/d');
						$time = time();
						$rename = $time.$nameimg;
						move_uploaded_file($tmp_name, $path.$rename);
						$sql = "INSERT INTO `slide`(`name`, `image_link`, `link`, `info`, `sort_order`)
						VALUES ('".$name."', '".$rename."', '".$link."', '".$info."', '".$sort_order."') ";
						if ($this->db->query($sql)) {
			    			return true;
			    		}else{
			    			return $this->db->error;
			    		}
					}
				}else{
					?>
					<script type="text/javascript">
						alert(" Upload file không hợp lệ !");
					</script><?php
					return false;
				}

			}
		}
	}
	public function idupdate_slide(){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `slide` WHERE id = ".$id;
		$result = $this->db->query($sql);
		return $result;
	}
	public function updateslide(){
		if (isset($_POST['click'])) {
			$id = $_GET['id'];
			$image_link = $_GET['image_link'];
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$tmp_name = $_FILES['image']['tmp_name'];
			$link = $_POST['link'];
			$info = $_POST['info'];
			$sort_order = $_POST['sort_order'];

			if ($name == '') {
				?>
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				return false;
				
			}else{
				if ($tmp_name == '') {
					date_default_timezone_set('Asia/Ho_Chi_Minh');
					$created = date('Y/m/d');
					$sql = "UPDATE slide SET name ='$name', link = '$link', info = '$info', sort_order ='$sort_order' WHERE id = ".$id;
					if ($this->db->query($sql)) {
		    			return true;
		    		}else{
		    			return false;
		    		}

				}else{
					$path = "images/slide/";
					if (file_exists($path.''.$image_link))
					{
					    unlink($path.''.$image_link);
					}
					if ($_FILES['image']['type']== "image/jpeg" || $_FILES['image']['type']=="image/png" || $_FILES['image']['type']== "image/gif") {
						if ($_FILES['image']['size'] > 1000000) {
							?>
							<script type="text/javascript">
								alert("File lớn hơn 1000000 kb !");
							</script><?php
							return false;
						}else{
							$path = "images/slide/";
							$tmp_name = $_FILES['image']['tmp_name'];
							$nameimg = $_FILES['image']['name'];
							$type = $_FILES['image']['type'];
							$size = $_FILES['image']['size'];
							date_default_timezone_set('Asia/Ho_Chi_Minh');
							$created = date('Y/m/d');
							$time = time();
							$rename = $time.$nameimg;
							move_uploaded_file($tmp_name, $path.$rename);
							$sql = "UPDATE slide SET name ='$name', image_link = '$rename' , link = '$link', info = '$info', sort_order ='$sort_order' WHERE id = ".$id;
							if ($this->db->query($sql)) {
				    			return true;
				    		}else{
				    			return $this->db->error;
				    		}
						}
					}else{
						?>
						<script type="text/javascript">
							alert(" Upload file không hợp lệ !");
						</script><?php
						return false;
					}
				}
				

			}
		}
	}
	public function deleteslide(){
		$path = "images/slide/";
		$id = $_GET['id'];
		$image_link = $_GET['image_link'];
		if (file_exists($path.''.$image_link))
		{
		    unlink($path.''.$image_link);
		}
		$sql = "DELETE FROM `slide` WHERE id = ".$id;
		if($this->db->query($sql)){
			return true;
			?>
			<script type="text/javascript">
				alert(" Xóa thành công !");
			</script><?php
		}else{
			return false;
			?>
			<script type="text/javascript">
				alert(" Xóa thất bại !");
			</script><?php
		}
	}

	// ------------ admin user ---------------
	
	public function useradmin_(){
		$this->utf8;
		$sql = 'SELECT * FROM `admin`';
		$result = $this->db->query($sql);
		return $result;
	}

	public function count_user_admin(){
		$sql = 'SELECT COUNT(id) FROM `admin`';
		$count = $this->db->query($sql);
		return $count;
	}
	public function adminadd(){
		if (isset($_POST['click'])) {
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$username = $_POST['username'];
			$username = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($username));
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];
			$sql2 = "SELECT * FROM admin";
			$result = $this->db->query($sql2);
			$kiemtra = 0;
			while ($row = $result->fetch_assoc()) {
				if ($row['username'] == $username) {
					$kiemtra++;
				}
			}
			if ($kiemtra == 0) {
				if ($name != '' && $username != '' && $password != '' && $re_password != '') {
					if ($password == $re_password) {
						$sql = "INSERT INTO `admin`(`username`, `password`, `name`) VALUES ('$username','$password','$name')";
						if ($this->db->query($sql)) {
							?>
							<script type="text/javascript">
								alert("Thêm tài khoản thành công !");
							</script><?php
							return true;
						}else{
							?>
							<script type="text/javascript">
								alert("Thêm tài khoản thất bại !");
							</script><?php
							return false;
						}
					}else{
						?>
					<script type="text/javascript">
						alert("Mật khẩu không trùng khớp !");
					</script><?php
					}
				}else{
					?>
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				}
			}else{
				?>
				<script type="text/javascript">
					alert("Tên đăng nhập đã tồn tại ! hoặc chứa ký tự đặc biệt !");
				</script><?php
			}
		}
	}
	public function id_admin(){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `admin` WHERE id = ".$id;
		$result = $this->db->query($sql);
		return $result;
	}
	public function adminupdate(){
		if (isset($_POST['click'])) {
			$id = $_GET['id'];
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$username = $_POST['username'];
			$username = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($username));
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];
			$sql2 = "SELECT * FROM admin";
			$result = $this->db->query($sql2);
			$kiemtra = 0;
			while ($row = $result->fetch_assoc()) {
				if ($row['username'] == $username) {
					$kiemtra++;
				}
			}
			if ($kiemtra == 0) {
				if ($name != '' && $username != '') {
					if ($password != '') {
						if ($password == $re_password) {
							$sql = "UPDATE `admin` SET `username`='$username',`password`='$password',`name`='$name' WHERE id = ".$id;
							if ($this->db->query($sql)) {
								?>
								<script type="text/javascript">
									alert("Update tài khoản thành công !");
								</script><?php
								return true;
							}else{
								?>
								<script type="text/javascript">
									alert("Update tài khoản thất 1 bại !");
								</script><?php
								return false;
							}
						}else{
							?>
						<script type="text/javascript">
							alert("Mật khẩu không trùng khớp !");
						</script><?php
						}
					}else{
						$sql = "UPDATE `admin` SET `username`='$username',`name`='$name' WHERE id = ".$id;
						if ($this->db->query($sql)) {
							?>
							<script type="text/javascript">
								alert("Update tài khoản thành công !");
							</script><?php
							return true;
						}else{
							?>
							<script type="text/javascript">
								alert("Update tài khoản thất bại !");
							</script><?php
							return false;
						}
					}
				}else{
					?>
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				}
			}else{
				?>
				<script type="text/javascript">
					alert("Tên đăng nhập đã tồn tại ! hoặc tên chứa ký tự đặc biệt !");
				</script><?php
			}
		}
	}
	public function deleteadmin(){
		$id = $_GET['id'];
		$sql = "DELETE FROM `admin` WHERE id = ".$id;
		if($this->db->query($sql)){
			return true;
			?>
			<script type="text/javascript">
				alert(" Xóa thành công !");
			</script><?php
		}else{
			return false;
			?>
			<script type="text/javascript">
				alert(" Xóa thất bại !");
			</script><?php
		}
	}

	// ------------- user customer khach hang-------------
	
	public function khuser_(){
		$this->utf8;
		$sql = 'SELECT * FROM `user`';
		$result = $this->db->query($sql);
		return $result;
	}
	public function khcount_user(){
		$sql = 'SELECT COUNT(id) FROM `user`';
		$count = $this->db->query($sql);
		return $count;
	}
	public function useradd(){
		if (isset($_POST['click'])) {
			// $chuoicanxoa='Xóa ?,\Ký, ;tự {Đặc Biệt! } ';
			// echo $ketqua=preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($chuoicanxoa));

			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$email = $_POST['email'];
			$address = $_POST['address'];
			$address = preg_replace('/([^\pL\.\ , ]+)/u', '', strip_tags($address));
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time = date('Y/m/d');
			$sql2 = "SELECT * FROM user";
			$result = $this->db->query($sql2);
			$kiemtra = 0;
			while ($row = $result->fetch_assoc()) {
				if ($row['email'] == $email) {
					$kiemtra++;
				}
			}
			if ($kiemtra == 0) {
				if ($name != '' && $email != ''&& $address != '' && $password != '' && $re_password != '') {
					if ($password == $re_password) {
						$sql = "INSERT INTO `user`(`phone`,`address`,`email`, `password`, `name`,`created`) VALUES ('$phone','$address','$email','$password','$name','$time')";
						if ($this->db->query($sql)) {
							?>
							<script type="text/javascript">
								alert("Thêm tài khoản thành công !");
							</script><?php
							return true;
						}else{
							?>
							<script type="text/javascript">
								alert("Thêm tài khoản thất bại !");
							</script><?php
							return false;
						}
					}else{
						?>
					<script type="text/javascript">
						alert("Mật khẩu không trùng khớp !");
					</script><?php
					}
				}else{
					?>
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				}
			}else{
				?>
				<script type="text/javascript">
					alert("Tên đăng nhập đã tồn tại ! hoặc chứa ký tự đặc biệt !");
				</script><?php
			}
		}
	}

	public function id_user(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = "SELECT * FROM `user` WHERE id = ".$id;
			$result = $this->db->query($sql);
			return $result;
		}
	}
	public function userupdate(){
		if (isset($_POST['click'])) {
			$id = $_GET['id'];
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$email = $_POST['email'];
			$address = $_POST['address'];
			$address = preg_replace('/([^\pL\.\ , ]+)/u', '', strip_tags($address));
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time = date('Y/m/d');
			$sql2 = "SELECT * FROM user";
			$result = $this->db->query($sql2);
			
				if ($name != '' && $email != ''&& $address != '' && $phone != '') {
					if ($password != '') {
						if ($password == $re_password) {
							$sql = "UPDATE `user` SET `password`='$password',`name`='$name',`email`='$email', `address`='$address',`phone`='$phone', `created`='$time' WHERE id = ".$id;
							if ($this->db->query($sql)) {
								?>
								<script type="text/javascript">
									alert("Thêm tài khoản thành công !");
								</script><?php
								return true;
							}else{
								?>
								<script type="text/javascript">
									alert("Thêm tài khoản thất bại !");
								</script><?php
								return false;
							}
						}else{
							?>
						<script type="text/javascript">
							alert("Mật khẩu không trùng khớp !");
						</script><?php
						}
					}else{
						$sql = "UPDATE `user` SET `name`='$name',`email`='$email', `address`='$address',`phone`='$phone', `created`='$time' WHERE id = ".$id;
						if ($this->db->query($sql)) {
							?>
							<script type="text/javascript">
								alert("Thêm tài khoản thành công !");
							</script><?php
							return true;
						}else{
							?>
							<script type="text/javascript">
								alert("Thêm tài khoản thất bại !");
							</script><?php
							return false;
						}
					}
				}else{
					?>
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				}
			
		}
	}
	public function deleteuser(){
		$id = $_GET['id'];
		$sql = "DELETE FROM `user` WHERE id = ".$id;
		if($this->db->query($sql)){
			return true;
			?>
			<script type="text/javascript">
				alert(" Xóa thành công !");
			</script><?php
		}else{
			return false;
			?>
			<script type="text/javascript">
				alert(" Xóa thất bại !");
			</script><?php
		}
	}

	//-------- order -----------------
	
	public function load_order(){
		$this->utf8;
		// $sql = "SELECT order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
		// 		FROM `order`,`transaction` , `product`
		// 		WHERE transaction.id = order.transaction_id AND order.product_id = product.id";
		if (!isset($_GET['status'])) {
			$value = '';
			$sql = '';
			if (isset($_GET['trang'])) {
				$trang = $_GET['trang'];
				settype($trang, "int");
				$sotin = 4;
				$solimit = ($trang - 1)*$sotin;
				if ($solimit < 0) {
					$solimit = 0;
				}
				$sql = "SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id ORDER BY id DESC LIMIT $solimit, $sotin";
			}else{
				$sql = "SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id ORDER BY id DESC LIMIT 0, 4";
			}

			if (isset($_GET['tim'])) {
				$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id AND product.name LIKE \'%'.$value.'%\'';
				}
			}
			if (isset($_GET['email'])) {
				$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id AND transaction.user_email LIKE \'%'.$value.'%\'';
				}
			}
			if (isset($_GET['ma'])) {
				(int)$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id AND order.id LIKE \'%'.$value.'%\'';
				}
			}
			if (isset($_GET['ngay'])) {
				(int)$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id AND transaction.created LIKE \'%'.$value.'%\'';
				}
			}
		}else{
			$status = $_GET['status'];
			if ($status != 0 && $status != 1 && $status != 2) {
				$status = 0;
			}
			$value = '';
			$sql = '';
			// if (isset($_GET['trang'])) {
			// 	$trang = $_GET['trang'];
			// 	settype($trang, "int");
			// 	$sotin = 4;
			// 	$solimit = ($trang - 1)*$sotin;
			// 	if ($solimit < 0) {
			// 		$solimit = 0;
			// 	}
			// 	$sql = "SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
			// 		FROM `order`,`transaction` , `product`
			// 		WHERE transaction.id = order.transaction_id AND order.status = '".$status."' AND order.product_id = product.id ORDER BY id DESC LIMIT $solimit, $sotin";
			// 		//var_dump($sql); exit();
			// }else{
				$sql = "SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.status = '$status' AND order.product_id = product.id ORDER BY id DESC";
			// }

			if (isset($_GET['tim'])) {
				$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.product_id = product.id AND order.status = "'.$status.'" AND product.name LIKE \'%'.$value.'%\'';
				}
			}
			if (isset($_GET['email'])) {
				$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.status = "'.$status.'" AND order.product_id = product.id AND transaction.user_email LIKE \'%'.$value.'%\'';
				}
			}
			if (isset($_GET['ma'])) {
				(int)$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.status = "'.$status.'" AND order.product_id = product.id AND order.id LIKE \'%'.$value.'%\'';
				}
			}
			if (isset($_GET['ngay'])) {
				(int)$value = $_GET['timkiem'];
				if ($value != '') {
					$sql = 'SELECT transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created
					FROM `order`,`transaction` , `product`
					WHERE transaction.id = order.transaction_id AND order.status = "'.$status.'" AND order.product_id = product.id AND transaction.created LIKE \'%'.$value.'%\'';
				}
			}

		}



		$result = $this->db->query($sql);
		return $result;
	}
	public function count_order(){
		$sql = 'SELECT COUNT(id) FROM `order`';
		if (isset($_GET['status'])) {
			$status = $_GET['status'];
			if ($status == '') {
				$status = 0;
			}
			$sql = "SELECT COUNT(id) FROM `order` WHERE status = ".$status;
		}
		$count = $this->db->query($sql);
		return $count;
	}
	public function sotrangorder(){
		$this->utf8;
		$sotin = 4;
		$sql = "SELECT * FROM `order`";
		if (isset($_GET['status'])) {
			$status = $_GET['status'];
			if ($status == '') {
				$status = 0;
			}
			$sql = "SELECT COUNT(id) FROM `order` WHERE status = ".$status;
		}
		$result = $this->db->query($sql);
		$tongsotin = mysqli_num_rows($result);
		$sotrang = ceil($tongsotin / $sotin);
		return $sotrang;
	}
	public function updateorder(){
		if (isset($_GET['status'])) {
			$status = $_GET['status'];
			$id = $_GET['id'];

			$sql1 = "SELECT * FROM `order` WHERE id = ".$id;
			$result = $this->db->query($sql1);
			$ktstatsus ='';
			$date = date('Y/m/d');
			while ($row = $result->fetch_assoc()) {
				$ktstatsus = $row['status'];
			}
			if ($ktstatsus == 0 ) {
				$sql = "UPDATE `order` SET `data`='$date', `status`= '$status' WHERE id = ".$id;
				$this->db->query($sql);
				return true;
			}
			return false;
			
		}
		return false;
	}
	public function chitiet_(){
		$this->utf8;
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sql = "SELECT transaction.user_name, transaction.user_phone, transaction.message, transaction.payment, transaction.user_email, order.id ,product.image_link,product.name,order.qty,order.amount,order.status,transaction.created,user.address,order.data  
				FROM `order`,`transaction` , `product`,`user`
				WHERE transaction.id = order.transaction_id AND transaction.user_id = user.id AND  order.product_id = product.id AND order.id = ".$id;
			$result = $this->db->query($sql);
			return $result;
		}
	}
	// ------------------ login admin ---------------
	public function check_login_admin_(){
		if (isset($_POST['click'])) {
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $sql = "select * from admin where username = '".$username."' and password = '".$pass."'" ;
            
            $result =$this->db->query($sql);
            if ($result->num_rows == 0) {
                return false;
            }else{
                while ($row = $result->fetch_assoc()) { 
                   setcookie("id_admin", $row['id'], time() + (86400 * 30), "/");
                   setcookie("user_name", $row['username'], time() + (86400 * 30), "/");
                   // dang xuat set thoi gian - lon hon
                }
                return true;
            }
        }
	}

	public function logout_admin(){
		setcookie("id_admin", '', time() - (86400 * 30), "/");
		setcookie("user_name", '', time() - (86400 * 30), "/");
	}

	public function checklogin(){
		if (isset($_COOKIE['id_admin'])) {
			if (isset($_COOKIE['user_name'])) {
				$id_admin = $_COOKIE['id_admin'];
				$user_name = $_COOKIE['user_name'];
				$sql = "select * from admin" ;
            	$kt = 0;
	            $result =$this->db->query($sql);
                while ($row = $result->fetch_assoc()) { 
                   if ($row['id'] == $id_admin) {
                   		$kt++;
                   }
                   if ($row['username'] == $user_name) {
                   		$kt++;
                   }
                }
                if ($kt == 2) {
                	return true;
                }
				return false;
			}
			return false;
		}
		return false;
	}

	// ----------- menu -----------
	
	public function count_menu(){
		$sql = 'SELECT COUNT(id) FROM `menu`';
		$count = $this->db->query($sql);
		return $count;
	}
	public function addmenu(){
		if (isset($_POST['click'])) {
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$link = $_POST['link'];
			if ($name == '' || $link == '') {
				?>
				<script type="text/javascript">
					alert("Không được để trống ! hoặc nhập ký tự không hợp lệ !");
				</script><?php
				return false;
			}else{
				$sql = "INSERT INTO `menu`(`name`, `url`)
				VALUES ('".$name."','".$link."') ";
				if ($this->db->query($sql)) {
	    			return true;
	    		}else{
	    			return $this->db->error;
	    		}
			}
		}
	}
	public function idupdate_menu(){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `menu` WHERE id = ".$id;
		$result = $this->db->query($sql);
		return $result;
	}
	public function updatemenu(){
		if (isset($_POST['click'])) {
			$id = $_GET['id'];
			$name = $_POST['name'];
			$name = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($name));
			$link = $_POST['link'];

			if ($name == '' || $link == '') { ?>
				
				<script type="text/javascript">
					alert("Không được để trống !");
				</script><?php
				return false;
				
			}else{
				$sql = "UPDATE `menu` SET `name`='$name',`url`='$link' WHERE id = ".$id;
				if($this->db->query($sql)){
					return true;
				}
				return false;
			}
		}
	}
	public function deletemenu(){
		$id = $_GET['id'];
		$sql = "DELETE FROM `menu` WHERE id = ".$id;
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}




}


	




 ?>