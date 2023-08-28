
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>T-Sneaker</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <style>
        .z{
            width: 30%;
            float: right;
        }
    </style>
</head>
<?php 
    include("../admincp/connect/config.php");
    
    session_start();
    ob_start();
    
?>
<body>
    <!-- Topbar Start -->
    <?php include("topbar.php"); ?>
    <!-- Topbar End -->
    <?php include("thanhtimkiem.php"); ?>

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <!-- <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <a href="shop.php?quanly=danhmucsanpham$id=1" class="nav-item nav-link">Adidas</a>
                        <a href="shop.php?quanly=danhmucsanpham$id=2" class="nav-item nav-link">Nike</a>
                        <a href="shop.php?quanly=danhmucsanpham$id=3" class="nav-item nav-link">Puma</a>
                    </div>
                </nav>
            </div> -->
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <?php
                            include("menu.php") 
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

  
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
            <div class="d-inline-flex">
               <p>Xin chào : 
                <?php
                    if(isset($_SESSION['dangky'])){
                        echo $_SESSION['dangky'];
                        echo $_SESSION['id_khachhang'];
                    } 
                ?>
               </p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <?php
	if(isset($_SESSION['cart'])){

	}
    ?>
    <p style="text-align: center;">Thông tin vận chuyển</p>
    <div class="container">
            <!-- Responsive Arrow Progress Bar -->
            <div class="arrow-steps clearfix">
                <div class="step done"> <span> <a href="giohang.php?quanly=giohang" >Giỏ hàng</a></span> </div>
                <div class="step current"> <span><a href="vanchuyen.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
            </div>
            <h4 style="margin-top: 20px;">Thông tin vận chuyển</h4>
            <?php
                if(isset($_POST['themvanchuyen'])){
                    $tenkhachhang = $_POST['tenkhachhang'];
                    $dienthoai = $_POST['dienthoai'];
                    $diachi = $_POST['diachi'];
                    $ghichu = $_POST['ghichu'];
                    $id_dangky = $_SESSION['id_khachhang'];
                    $sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(tenkhachhang,dienthoai,diachi,ghichu,id_dangky) 
                    VALUES('$tenkhachhang','$dienthoai','$diachi','$ghichu','$id_dangky')");
                    if($sql_them_vanchuyen)
                    {
                        echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
                        
                    }
                }elseif(isset($_POST['capnhatvanchuyen'])){
                    $tenkhachhang = $_POST['tenkhachhang'];
                    $dienthoai = $_POST['dienthoai'];
                    $diachi = $_POST['diachi'];
                    $ghichu = $_POST['ghichu'];
                    $id_dangky = $_SESSION['id_khachhang'];
                    $sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping SET tenkhachhang='$tenkhachhang',dienthoai='$dienthoai',diachi='$diachi',ghichu='$ghichu',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
                    if($sql_update_vanchuyen)
                    {
                        echo '<script>alert("Đặt hàng thành công")</script>';
                        
                        header('Location: camondadathang.php');
                    }
                }
            ?>
            <div class="row">
                <?php
                    $id_dangky = $_SESSION['id_khachhang'];
                    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
                    $count = mysqli_num_rows($sql_get_vanchuyen);
                    if($count>0){
                        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                        $tenkhachhang = $row_get_vanchuyen['tenkhachhang'];
                        $dienthoai = $row_get_vanchuyen['dienthoai'];
                        $diachi = $row_get_vanchuyen['diachi'];
                        $ghichu = $row_get_vanchuyen['ghichu'];
                    }else{
                        $tenkhachhang = '';
                        $dienthoai = '';
                        $diachi = '';
                        $ghichu = '';
                    }

                ?>
                <div class="col-md-12">
                <form action="" autocomplete="off" method="POST">
                <div class="form-group">
                    <label for="email">Họ và tên</label>
                    <input type="text" name="tenkhachhang" class="form-control" value="<?php echo $tenkhachhang ?>" placeholder="..." >
                </div>
                    <div class="form-group">
                    <label for="email">Số điện thoại</label>
                    <input type="text" name="dienthoai" class="form-control" value="<?php echo $dienthoai ?>"  placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" value="<?php echo $diachi ?>"  placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Ghi chú</label>
                    <input type="text" name="ghichu" class="form-control" value="<?php echo $ghichu ?>"  placeholder="..." >
                </div>
                <?php
                if($tenkhachhang=='' && $tenkhachhang=='') {
                ?>
                <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm vận chuyển</button>
                <?php
                } elseif($tenkhachhang!='' && $tenkhachhang!=''){
                ?>
                <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Đặt hàng</button>
                <?php
                } 
                ?>
                </form>
                </div>
            </div>
    </div>
    <!-- end Responsive Arrow Progress Bar -->
    <!-- GIỎ HÀNG -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Id</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                            <th>Thành tiền</th>
                            
                        </tr>
                    </thead>
                    <?php

                        if(isset($_SESSION['dangky'])){
                            $sql_show_gio_hang = "SELECT * FROM tbl_cart_chitiet , tbl_cart , tbl_sanpham WHERE tbl_cart.id_dangky = '".$_SESSION['id_khachhang']."' AND tbl_cart_chitiet.id_cart = tbl_cart.id_cart AND tbl_cart_chitiet.id_sanpham = tbl_sanpham.id_sanpham";
                            $query_show_gio_hang = mysqli_query($mysqli,$sql_show_gio_hang);
                            $i = 0;
                            $tongtien = 0;
                            while($row = mysqli_fetch_array($query_show_gio_hang)){
                                    $thanhtien = number_format($row['giasp']*$row['soluong_cart_chitiet'],0,',','.');
                                    $i++;
                                    $tongtien = $tongtien + $row['giasp']*$row['soluong_cart_chitiet'];
                        
                    ?>
                    <tr>
                        <td class="align-middle"><img src="../admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" style="width: 100px;"></td>
                        <td class="align-middle"><?php echo $i; ?></td>
                        <td class="align-middle"><?php echo $row['tensanpham']; ?></td>
                        <td class="align-middle"><?php echo $row['masp']; ?></td>
                        <td class="align-middle">
                                <!-- <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div> -->
                            
                            <?php echo $row['soluong_cart_chitiet']; ?>
                
                                    <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div> -->
                        </td>
                        <td class="align-middle"><?php echo number_format($row['giasp'],0,',','.').'vnd' ?></td>  
                        <td class="align-middle"><?php echo  $thanhtien?>vnd</td>
                        
                        
                    </tr>


                    <?php
                            }
                    ?>
                    <tr>  
                        <td colspan="8">
                            
                            <p>Tổng tiền : <?php echo  number_format($tongtien,0,',','.').'vnd'?></p>

                            <?php
                            if(isset($_SESSION['dangky'])){
                                ?>
                                <p><a href="thongtinthanhtoan.php?quanly=thongtinthanhtoan">Hình thức thanh toán </a></p>
                            <?php  
                            }else{
                            ?>
                                <p><a href="dangky.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                            <?php    
                            }   
                            ?>
                    
                           
                        </td>
                        <php
                         
                        ?>
                        
                    </tr>
                    <?php
                    }else {
                    ?>       
                    <tr>
                        <td colspan="8">Hiện tại giỏ hàng trống</td>
                    </tr>
                    <?php
                    } 
                    ?>
                </table>

            </div>
        </div>
    </div>

    <!-- GIỎ HÀNG -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>