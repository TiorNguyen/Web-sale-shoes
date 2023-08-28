<?php
    session_start();
    include("../admincp/connect/config.php");

    // them so luong 
    if(isset($_GET['cong'])){
		$id = $_GET['cong'];
		foreach($_SESSION['cart']as $cart_item){
			if($cart_item['id']!=$id){
				$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong']+1;
				if($cart_item['soluong']<9){
					
					$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}

		}header('Location:giohang.php?quanly=giohang');

	}
    // tru so luong 
    if(isset($_GET['tru'])){
		$id = $_GET['tru'];
		foreach($_SESSION['cart']as $cart_item){
			if($cart_item['id']!=$id){
				$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong']-1;
				if($cart_item['soluong']>1){
					
					$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}header('Location:giohang.php?quanly=giohang');

	}
    //xoa sp
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_get_id_cart = "SELECT * FROM tbl_cart_chitiet WHERE id_sanpham = '".$id."'";
        $query_get_id_cart = mysqli_query($mysqli,$sql_get_id_cart);
        $row_get_id_cart = mysqli_fetch_array($query_get_id_cart);
        $sql_xoa_row = "DELETE FROM tbl_cart_chitiet WHERE id_sanpham = '".$id."'";
        mysqli_query($mysqli,$sql_xoa_row);
        $sql_xoa_cart = "DELETE FROM tbL_cart WHERE id_cart = '".$row_get_id_cart['id_cart']."'";
        header('Location:giohang.php?quanly=giohang');
    }
	//xoa tat ca
	if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
		$sql_get_id_cart_delete = "SELECT * FROM tbl_cart WHERE id_dangky = '".$_SESSION['id_khachhang']."'";
        $query_get_id_cart_delete = mysqli_query($mysqli,$sql_get_id_cart_delete);
        while($row_delete = mysqli_fetch_array($query_get_id_cart_delete)){
            $sql_delete_rows_tbl_cart_chitiet = "DELETE FROM tbl_cart_chitiet WHERE id_cart = '".$row_delete['id_cart']."'";
            mysqli_query($mysqli,$sql_delete_rows_tbl_cart_chitiet);
        }
        $sql_delete_rows_tbl_cart = "DELETE FROM tbl_cart WHERE id_dangky = '".$_SESSION['id_khachhang']."'";
        mysqli_query($mysqli,$sql_delete_rows_tbl_cart);
        header('Location:giohang.php?quanly=giohang');
	}
    // them san pham vao giohang
    if(isset($_POST['themgiohang'])){
            $id = $_GET['idsanpham'];
            
            $id_khachhang = $_GET['idkhachhang'];
            $sql_check_sanpham = "SELECT * FROM tbl_cart_chitiet WHERE id_sanpham = '".$id."' AND id_cart IN (SELECT id_cart FROM tbl_cart WHERE id_dangky = '".$id_khachhang."' )";
            $query_check_sanpham = mysqli_query($mysqli,$sql_check_sanpham);
            $num_row = mysqli_num_rows($query_check_sanpham);
            echo $num_row;
            if($num_row == 0){
                $soluong = 1 ;
                $sql_them_cart = "INSERT INTO tbl_cart(id_dangky) VALUES('".$id_khachhang."')";
                mysqli_query($mysqli,$sql_them_cart);
                $sql_lay_id_cart = "SELECT * FROM tbl_cart WHERE id_dangky = '".$id_khachhang."' ORDER BY id_cart DESC LIMIT 1";
                $query_lay_id_cart = mysqli_query($mysqli,$sql_lay_id_cart);
                $row_lay_id_cart = mysqli_fetch_array($query_lay_id_cart);
                $sql_them_cart_chitiet = "INSERT INTO tbl_cart_chitiet(soluong_cart_chitiet,id_sanpham,id_cart) VALUES('".$soluong."','".$id."','".$row_lay_id_cart['id_cart']."') ";
                mysqli_query($mysqli,$sql_them_cart_chitiet);
            }
            else{
                $sql_get_soluong_cart_chitiet = "SELECT * FROM tbl_cart_chitiet WHERE id_sanpham = '".$id."' AND id_cart IN (SELECT id_cart FROM tbl_cart WHERE id_dangky = '".$id_khachhang."' ) ";
                
                $query_get_soluong_cart_chitiet = mysqli_query($mysqli,$sql_get_soluong_cart_chitiet);
                $row_soluong_cart_chitiet = mysqli_fetch_array($query_get_soluong_cart_chitiet);
                $soluong_cart_chitiet = $row_soluong_cart_chitiet['soluong_cart_chitiet'] + 1;
                $sql_update_soluong = "UPDATE tbl_cart_chitiet SET soluong_cart_chitiet = '".$soluong_cart_chitiet."' WHERE id_sanpham = '".$id."' AND id_cart IN (SELECT id_cart FROM tbl_cart WHERE id_dangky = '".$id_khachhang."' ) ";
                mysqli_query($mysqli,$sql_update_soluong);
            }
            
            
            
            
            header('Location:giohang.php?quanly=giohang');
    }
?>