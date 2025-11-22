<?php include("../inc/top.php"); ?>

<h3 class="text-primary">Chi tiết đơn hàng #<?= $donhang['id'] ?></h3>

<table class="table table-bordered">
    <tr>
        <th>Mã đơn</th>
        <td><?= $donhang['id'] ?></td>
    </tr>
    <tr>
        <th>Ngày đặt</th>
        <td><?= date("d/m/Y H:i", strtotime($donhang['ngay'])) ?></td>
    </tr>
    <tr>
        <th>Khách hàng</th>
        <td><?= $donhang['hoten'] ?></td>
    </tr>
    <tr>
        <th>Tổng tiền</th>
        <td class="fw-bold text-danger"><?= number_format($donhang['tongtien']) ?>đ</td>
    </tr>
</table>

<h4 class="text-info">Danh sách sản phẩm</h4>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($donhangct as $ct): ?>
        <tr>
            <td><?= $ct['tenmathang'] ?></td>
            <td><?= $ct['soluong'] ?></td>
            <td><?= number_format($ct['dongia']) ?>đ</td>
            <td><?= number_format($ct['thanhtien']) ?>đ</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php" class="btn btn-secondary">Quay lại</a>

<?php include("../inc/bottom.php"); ?>
