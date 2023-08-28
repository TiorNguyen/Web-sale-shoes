<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>T-Sneaker Giỏ hàng</title>
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
                        // echo $_SESSION['id_khachhang'];
                    } 
                ?>
               </p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <!-- Responsive Arrow Progress Bar -->
        <div class="arrow-steps clearfix">
            
            
        </div>
    </div>
    <!-- end Responsive Arrow Progress Bar -->

    <!-- Cart Start -->
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
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <?php
                        if(isset($_SESSION['dangky'])){
                        $i = 0;
                        $tongtien = 0;
                        $sql_show_giohang = "SELECT * FROM tbl_cart_chitiet , tbl_cart , tbl_sanpham WHERE tbl_cart.id_dangky = '".$_SESSION['id_khachhang']."' AND tbl_cart_chitiet.id_cart = tbl_cart.id_cart AND tbl_cart_chitiet.id_sanpham = tbl_sanpham.id_sanpham ";
                        $query_show_giohang = mysqli_query($mysqli,$sql_show_giohang);
                        while($row = mysqli_fetch_array($query_show_giohang)){
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
                                            <i class="fa fa-plus"></
                                        </button>
                                    </div>
                                </div> -->
                        </td>
                        <td class="align-middle"><?php echo number_format($row['giasp'],0,',','.').'vnd' ?></td>  
                        <td class="align-middle"><a href="themgiohang.php?xoa=<?php echo $row['id_sanpham'] ?>">Xóa</a></td>
                        
                    </tr>


                    <?php
                        }
                    ?>
                    <tr>  
                        <td colspan="8">
                            <p style="text-align:center; padding: 15px"><a href="themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
                            <?php
                            if(isset($_SESSION['dangky'])){
                                ?>
                                <p><a href="vanchuyen.php?quanly=vanchuyen">Đặt hàng</a></p>
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
            <!-- <div class="col-lg-4">
                 <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Cart End -->


    <!-- Footer Start -->
   
    <!-- Footer End -->


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