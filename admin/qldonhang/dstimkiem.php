<?php include("../inc/top.php"); ?>

<h3 class="text-info">KẾT QUẢ TÌM KIẾM ĐƠN HÀNG</h3>

<?php if(empty($dsdonhang)): ?>
    <div class="alert alert-warning">Không tìm thấy đơn hàng.</div>
<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dsdonhang as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= date("d/m/Y H:i", strtotime($d['ngay'])) ?></td>
            <td><?= $d['hoten'] ?></td>
            <td><?= number_format($d['tongtien']) ?>đ</td>
            <td><a class="btn btn-info btn-sm" href="index.php?action=chitiet&id=<?= $d['id'] ?>">Xem</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include("../inc/bottom.php"); ?>
