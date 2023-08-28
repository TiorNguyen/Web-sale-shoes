<?php
	session_start();
	include('../admincp/connect/config.php');
	require('../mail/sendmail.php');
	$id_khachhang = $_SESSION['id_khachhang'];
	$ma_order = rand(0,9999);
	$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$ma_order."',1)";
	$cart_query = mysqli_query($mysqli,$insert_cart);
	if($cart_query){    
		//them gio hang chi tiet
		foreach($_SESSION['cart'] as $key => $value){
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];
			$insert_order_chitiet = "INSERT INTO tbl_cart_chitiet(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$ma_order."','".$soluong."')";
			mysqli_query($mysqli,$insert_order_chitiet);
		}
		$tieude = "Đặt hàng Website Bán Giày T-Sneaker thành công";
		$noidung = "<div>
						<p>Cảm ơn đã đặt hàng mã đơn hàng của quý khách là : ".$ma_order."</p>
					</div>";
		$noidung.="<h4>Đơn hàng đặt bao gồm :</h4>";

		foreach($_SESSION['cart'] as $key => $val){
			$noidung.= "<ul style='border:1px solid blue;margin:10px;'>
							<li><h4>Tên sản phẩm : ".$val['tensanpham']."</h4></li>
							<li><h4>Mã sản phẩm : ".$val['masp']."</h4></li>
							<li><h4>Giá tiền : ".number_format($val['giasp'],0,',','.')."đ</h4></li>
							<li><h4>Số lượng : ".$val['soluong']."</h4></li>
						</ul>";
		}
		$maildathang = $_SESSION['email'];
		$mail = new Mailer();
		$mail->dathangmail($tieude,$noidung,$maildathang);
	}
	unset($_SESSION['cart']);
	header('Location:camondadathang.php?quanly=camondadathang');


?>