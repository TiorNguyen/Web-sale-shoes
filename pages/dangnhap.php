<?php 
    session_start();
    include('../admincp/connect/config.php');

    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']);
        $sql= "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);

        if($count>0){ 
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] =$row_data['tenkhachhang'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['id_khachhang'] =$row_data['id_dangky'];
            header("Location:index.php");
        }else{
            echo '<script>alert("Email hoặc mật khẩu không đúng, vui lòng nhập lại.");</script>';
           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="icon" href="images/logo/ThuanPhat_Logo.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Custom fonts for this template-->
    <link href="../admincp/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admincp/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../admincp/css/sb-admin-2.css" rel="stylesheet">
</head>

    <body class="bg-gradient-primary">



        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center" style="margin-top: 90px;">
                                    <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                                </div>
                                <form action="" method="POST">
                                   
                                    <div class="form-group">
                                        <p>Tên đăng nhập hoặc Email :</p>
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Email "name="email">
                                    </div>
                                    <div class="form-group">
                                        <p>Mật khẩu :</p>
                                        <input type="password" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Mật khẩu "name="matkhau">
                                    </div>
                                    <input name="dangnhap" type="submit" class="btn btn-google btn-user btn-block" value="Đăng nhập">
                                    <!-- <a name="dangky" class="btn btn-google btn-user btn-block">
                                        Đăng ký
                                    </a> -->

                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="dangky.php">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="../admincp/vendor/jquery/jquery.min.js"></script>
        <script src="../admincp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../admincp/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../admincp/js/sb-admin-2.min.js"></script>

    </body>
</html>