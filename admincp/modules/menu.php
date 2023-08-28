
<!-- <ul class="admincp_list">
	<li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản Lý Danh Mục Sản Phẩm</a></li>
	<li><a href="index.php?action=quanlysp&query=them">Quản Lý  Sản Phẩm</a></li>
	<li><a href="index.php?action=quanlybaiviet&query=them">Quản Lý bài viết</a></li>
	<li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản Lý danh mục bài viết</a></li>
	<li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Đăng xuất</a></li>
</ul> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <style>
        li:hover {
            background-color: burlywood;
        }
    </style>
</head>
<body>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="color: #000;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15" style="color: #000;">
        <i class="fa-solid fa-lock"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="color: #000;">Admin T-Sneaker <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->


<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item is-active" style="color: #000;" active-color="DarkSlateBlue">
    <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">
        <span style="color: #000; font-size: 15px">Quản lý danh mục sản phẩm</span>
    </a>
    <span class="nav-indicator"></span>
</li>
<li class="nav-item" style="color: #000;" active-color="red">
    <a class="nav-link" href="index.php?action=quanlysp&query=them">
        <span style="color: #000; font-size: 15px;">Quản lý sản phẩm</span>
    </a>
    <span class="nav-indicator"></span>
</li>
<li class="nav-item" style="color: #000;" active-color="pink">
    <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">
        <span style="color: #000; font-size: 15px;">Quản lý đơn hàng</span>
    </a>
    <span class="nav-indicator"></span>
</li>
</ul>
        
</body>
</html>
<!-- <script>
 
    var items = document.querySelectorAll('.nav-item');
   function handleIndicator(el) {
        items.forEach(function (item) {
            item.classList.remove('is-active');
            item.removeAttribute('style');
        });
        indicator.style.width = "".concat(el.offsetWidth, "px");
        indicator.style.left = "".concat(el.offsetLeft, "px");
        indicator.style.backgroundColor = el.getAttribute('active-color');
        el.classList.add('is-active');
        el.style.color = el.getAttribute('active-color');
    }
   items.forEach(function (item, menu) {
        item.addEventListener('click', function (e) {
            handleIndicator(e.target);
        });
        item.classList.contains('is-active') && handleIndicator(item);
    });
</script> -->
