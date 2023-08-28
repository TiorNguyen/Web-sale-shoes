<?php   
        include("../admincp/connect/config.php");
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        
 ?> 
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>
<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">T</span>Sneaker</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                <?php
			                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
			                    ?>
                                    <a href="shop.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>&idkhachhang=<?php echo $_SESSION['id_khachhang'] ?>" class="nav-item nav-link"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
                                <?php
				                }
			                    ?>
                                </div>
                            </div>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="giohang.php?quanly=giohang" class="dropdown-item">Giỏ hàng</a>
                                    
                                </div>
                            </div>
                            <!-- <a href="contact.html" class="nav-item nav-link">Liên hệ</a> -->
                        
                       
                        
                            <a href="dangnhap.php" class="nav-item nav-link">Đăng nhập</a>
                            <?php
                                if(isset($_SESSION['dangky'])){

                            ?>
                                <a href="index.php?dangxuat=1" class="nav-item nav-link">Đăng xuất</a>
                                <a href="thaydoimatkhau.php?quanly=thaydoimatkhau" class="nav-item nav-link">Thay đổi mật khẩu</a>
                                <p style="margin-top: 20px;">Xin chào : 
                                    <?php
                                        if(isset($_SESSION['dangky'])){
                                            echo $_SESSION['dangky'];
                                            // echo $_SESSION['id_khachhang'];
                                        } 
                                    ?>
                                </p>
                            <?php 
                            }else {
                            ?>
                                <a href="dangky.php?quanly=dangky" class="nav-item nav-link">Đăng ký</a>
                            <?php
                            } 
                            ?>
                        </div>
                        

                    </div>
 </nav>