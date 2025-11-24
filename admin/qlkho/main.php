<?php include("../inc/top.php"); ?>
<div class="container-fluid p-0">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-3 text-info"><i class="align-middle" data-feather="box"></i> Quản lý kho</h5>
            <div class="d-flex justify-content-between">
                <a href="index.php?action=ql_nhacc" class="btn btn-info text-white"><i class="align-middle" data-feather="users"></i> Quản lý Nhà Cung Cấp</a>
                <div>
                    <a href="index.php?action=nhapkho" class="btn btn-success"><i class="align-middle" data-feather="arrow-down-circle"></i> Nhập Kho</a>
                    <a href="index.php?action=xuatkho" class="btn btn-danger"><i class="align-middle" data-feather="arrow-up-circle"></i> Xuất Kho</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php if(isset($tb)) echo "<div class='alert alert-info'>$tb</div>"; ?>
            <h5 class="card-title">Bảng Tồn Kho</h5>
            <table class="table table-bordered table-hover mt-3">
                <thead class="table-light"><tr><th>Mã MH</th><th>Tên mặt hàng</th><th>Nhà cung cấp</th><th>Giá bán</th><th>Số lượng tồn</th></tr></thead>
                <tbody>
                    <?php foreach($mathang as $m): ?>
                    <tr>
                        <td>#<?php echo $m["id"]; ?></td>
                        <td><?php echo $m["tenmathang"]; ?></td>
                        <td class="text-primary">
                            <?php echo $m["tenncc"]; ?>
                        </td>
                        <td><?php echo number_format($m["giaban"]); ?>đ</td>
                        <td>
                            <?php if($m["soluongton"] <= 10): ?>
                                <span class="fw-bold text-danger"><?php echo $m["soluongton"]; ?></span>
                                <span class="badge bg-warning text-dark">Cảnh báo tồn kho thấp</span>
                            <?php else: ?>
                                <span class="fw-bold text-success"><?php echo $m["soluongton"]; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>