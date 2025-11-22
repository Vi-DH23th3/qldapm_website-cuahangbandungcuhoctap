<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Trang quản trị - ClassTools Shop</title>

	<link href="../inc/css/app.css" rel="stylesheet">
	<script src="../inc/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle">ClassTools Shop</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-info">
						HỆ THỐNG
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"ktnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../ktnguoidung/index.php">
						<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Bảng điều khiển</span>
						</a>
					</li>

				<?php if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==1){ ?>
					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlnguoidung/index.php">
						<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý người dùng</span>
						</a>
					</li>
				<?php } ?>

					<li class="sidebar-header text-info">
						DANH MỤC
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldanhmuc") !== false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldanhmuc/index.php">
						<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Quản lý danh mục</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlmathang") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlmathang/index.php">
						<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý hàng hóa</span>
						</a>
					</li>

					<li class="sidebar-header text-info">
						KINH DOANH
					</li>
					
					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlkhachhang") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlkhachhang/index.php">
						<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý khách hàng</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldonhang") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldonhang/index.php">
						<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Quản lý đơn hàng</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldoanhthu") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldoanhthu/index.php">
						<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Quản lý doanh thu</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlkho") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlkho/index.php">
						<i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Quản lý kho</span>
 						</a>
					</li>

				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>..
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								Tài khoản
							</a>
							<div class="dropdown-menu dropdown-menu-end">
							
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=hoso">
									<i class="align-middle me-1" data-feather="user"></i> Hồ sơ cá nhân
								</a>								
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=matkhau">
									<i class="align-middle me-1" data-feather="key"></i> Đổi mật khẩu
								</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=dangxuat"><i class="align-middle me-1" data-feather="log-out"></i> Đăng xuất</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">