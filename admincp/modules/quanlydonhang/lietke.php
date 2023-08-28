<p style="text-align: center;">QUẢN LÝ ĐƠN HÀNG</p>
<p>Liệt kê đơn hàng</p>
<?php
	$sql_lietke_donhang = "SELECT * FROM tbl_shipping,tbl_cart_chitiet,tbl_cart,tbl_sanpham WHERE tbl_shipping.id_dangky = tbl_cart.id_dangky AND tbl_cart_chitiet.id_cart = tbl_cart.id_cart AND tbl_cart_chitiet.id_sanpham = tbl_sanpham.id_sanpham ";
	$query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);

?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr style="text-align: center;">
  	<th>Id</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Tên sản phẩm</th>
  	<th>Số lượng</th>
    <th>Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_donhang)){
  	$i++;
  ?>
  <tr style="text-align: center;">
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluong_cart_chitiet'] ?></td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>