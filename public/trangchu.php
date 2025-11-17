<?php
session_start();

// Include models
include(__DIR__ . "/../model/database.php");
include(__DIR__ . "/../model/danhmuc.php");
include(__DIR__ . "/../model/mathang.php");

// Lấy dữ liệu
$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();

$mh = new MATHANG();
$mathang = $mh->laymathang();

// Hàm đếm số mặt hàng trong giỏ (giả sử lưu trong $_SESSION['giohang'])
function demHangTrongGio() {
    if(isset($_SESSION['giohang'])) {
        return array_sum($_SESSION['giohang']);
    }
    return 0;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ - ABC Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar-custom { background-color: #28a745; } 
        .btn-custom { background-color: #fd7e14; color: white; }
        .btn-custom:hover { background-color: #e8590c; color: white; }
        .card-title { color: #000; }
        .price-text { color: #c82333; font-weight: bold; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
    <div class="container">
        <a class="navbar-brand" href="#">ClassTools</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Trang chủ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Danh mục</a>
                    <ul class="dropdown-menu">
                        <?php foreach($danhmuc as $dmItem): ?>
                            <li>
                                <a class="dropdown-item" href="?action=group&id=<?php echo $dmItem['id']; ?>">
                                    <?php echo $dmItem['tendanhmuc']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <!-- Bên phải navbar -->
            <div class="d-flex">
                <?php if(isset($_SESSION["khachhang"])): ?>
                    <span class="navbar-text text-warning me-2">
                        Chào <?php echo $_SESSION["khachhang"]["hoten"]; ?>
                    </span>
                    <a href="index.php?action=dangxuat" class="btn btn-outline-light me-2">Đăng xuất</a>
                <?php else: ?>
                    <a href="index.php?action=dangnhap" class="btn btn-outline-light me-2">Đăng nhập</a>
                <?php endif; ?>

                <a href="index.php?action=giohang" class="btn btn-outline-light">
                    <i class="bi bi-cart3"></i> Giỏ hàng 
                    <span class="badge bg-danger ms-1 rounded-pill"><?php echo demHangTrongGio(); ?></span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- SẢN PHẨM -->
<div class="container mt-4">
    <h4 class="text-success mb-3">Tất cả mặt hàng</h4>
    <div class="row g-3">
        <?php foreach($mathang as $mhItem): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="../<?php echo $mhItem['hinhanh']; ?>" 
                         class="card-img-top" 
                         style="height:180px; object-fit:cover;" 
                         alt="<?php echo $mhItem['tenmathang']; ?>">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $mhItem['tenmathang']; ?></h6>
                        <p class="price-text"><?php echo number_format($mhItem['giaban']); ?>đ</p>
                        <a href="index.php?action=detail&id=<?php echo $mhItem['id']; ?>" 
                           class="btn btn-custom w-100">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
