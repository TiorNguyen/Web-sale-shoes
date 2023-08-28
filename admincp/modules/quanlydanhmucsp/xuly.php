
<?php 
include('../../connect/config.php');



if(isset($_POST['themdanhmuc'])){
	//them
	$tenloaisp = $_POST['tendanhmuc'];
	$thutu = $_POST['thutu'];
	$sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUE ('".$tenloaisp."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	$tenloaisp = $_POST['tendanhmuc'];
	$thutu = $_POST['thutu'];
	$sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]' ";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{

	$id=$_GET['iddanhmuc'];
	$sql_get_id_sanpham = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '".$id."'";
	$query_get_id_sanpham = mysqli_query($mysqli,$sql_get_id_sanpham);
	while($row = mysqli_fetch_array($query_get_id_sanpham)){
		$id_sanpham = $row['id_sanpham'];
		$sql_xoa_cart_chitiet = "DELETE FROM tbl_cart_chitiet WHERE id_sanpham = '".$id_sanpham."'";
		mysqli_query($mysqli,$sql_xoa_cart_chitiet);
	}
	$sql_xoa_sanpham = "DELETE FROM tbl_sanpham WHERE id_danhmuc = '".$id."'";
	mysqli_query($mysqli,$sql_xoa_sanpham);
	$sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc= '".$id."' ";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');

}


 ?>