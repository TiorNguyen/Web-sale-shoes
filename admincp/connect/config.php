<?php
    $mysqli = new mysqli("localhost","root","","webbanhang");
    if ($mysqli->connect_errno) {
        echo "Kết nối MYSQL lỗi" . $mysqli->connect_errno;
        exit();
    }
?>