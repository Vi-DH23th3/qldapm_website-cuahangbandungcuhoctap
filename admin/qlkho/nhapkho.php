<?php include("../inc/top.php"); ?>
<div class="container p-0">
    <h4 class="text-primary mb-3">➡ Nhập Kho</h4>
    <div class="card col-md-8 mx-auto">
        <div class="card-header"><h5>Phiếu Nhập Kho</h5></div>
        <div class="card-body">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="xl_nhapkho">
                <div class="mb-3">
                    <label class="form-label">Mặt Hàng (*)</label>
                    <select name="mathang_id" class="form-select" required>
                        <option value="">-- Chọn mặt hàng --</option>
                        <?php foreach($mathang as $m): ?>
                            <option value="<?php echo $m['id']; ?>"><?php echo $m['tenmathang']; ?> (Tồn: <?php echo $m['soluongton']; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhà Cung Cấp (*)</label>
                    <select name="ncc_id" class="form-select" required>
                        <option value="">-- Chọn nhà cung cấp --</option>
                        <?php foreach($nhacungcap as $n): ?>
                            <option value="<?php echo $n['id']; ?>"><?php echo $n['tenncc']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3"><label class="form-label">Số Lượng Nhập (*)</label><input type="number" name="soluong" class="form-control" min="1" required></div>
                <div class="text-center"><button type="submit" class="btn btn-primary">Lưu Phiếu Nhập</button><a href="index.php" class="btn btn-warning">Hủy</a></div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>