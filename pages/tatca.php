<?php 
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*4)-4;
    }
	$sql_pro = "SELECT * FROM tbl_danhmuc,tbl_sanpham WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham  DESC LIMIT $begin,4";
    $query_pro = mysqli_query($mysqli,$sql_pro);
			//get ten danh muc 
    //  $query_cate = mysqli_query($mysqli,$sql_cate);
    //  $row_title = mysqli_fetch_array($query_cate);
?>
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Tất cả sản phẩm</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
				while ($row_pro = mysqli_fetch_array($query_pro)) {
			?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="../admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $row_pro['tensanpham'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6 class="text-muted ml-2"><?php echo number_format($row_pro['giasp'],0,',','.').'vnd' ?></h6>
                        </div>
                        <h6 class="text-truncate mb-3"><?php echo $row_pro['tendanhmuc'] ?></h6>
                    </div>
                    <form  method="POST" action="themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?> ">
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <button name="themgiohang" value="Thêm giỏ hàng" class="themgiohang"><i class="fa fa-shopping-cart mr-1"></i>Thêm giỏ hàng</button>
                    </div>
                    </form>
                 </div>

            </div>
            <?php
            } 
            ?>
        </div>
        <style>
            ul.list_trang{
                padding-left: 50px;
                padding-bottom: 40px;
                list-style: none;
            }
            ul.list_trang li{
                float: left;
                padding: 5px 13px;
                margin: 10px;
                background-color: burlywood;
            }
            ul.list_trang li a{
                color: black;
                text-align: center;
                text-decoration: none;
                display: block;
            }
        </style>
        <?php
        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count/4); 
        ?>
        <p style="padding-left: 50px;">Trang hiện tại : <?php echo $page ?>/ <?php echo $trang ?> </p>

        <ul class="list_trang">
            <?php
            
            for($i=1;$i<=$trang;$i++){
            ?>
                <li <?php if($i==$page){echo 'style="background:#f777"';}else{echo '';} ?>><a href="tatcasanpham.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            } 
            ?>

        </ul>
</div>