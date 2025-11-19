<?php include("../inc/top.php"); ?>
<div class="container-fluid p-0">
    <h4 class="mb-3 text-info">Quản Lý Nhà Cung Cấp</h4>
    <div class="card mb-3">
        <div class="card-body">
            <form action="index.php" method="post" class="row g-3">
                <input type="hidden" name="action" value="them_ncc">
                <div class="col-md-3"><input type="text" class="form-control" name="ten" placeholder="Tên nhà cung cấp" required></div>
                <div class="col-md-3"><input type="text" class="form-control" name="diachi" placeholder="Địa chỉ"></div>
                <div class="col-md-2"><input type="text" class="form-control" name="sodt" placeholder="SĐT"></div>
                <div class="col-md-3"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                <div class="col-md-1"><button type="submit" class="btn btn-primary">+ Thêm</button></div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead><tr><th>ID</th><th>Tên NCC</th><th>Địa chỉ</th><th>SĐT</th><th>Email</th><th>Hành động</th></tr></thead>
                <tbody>
                    <?php foreach($nhacungcap as $n): ?>
                    <tr>
                        <td><?php echo $n["id"]; ?></td>
                        <td><?php echo $n["tenncc"]; ?></td>
                        <td><?php echo $n["diachi"]; ?></td>
                        <td><?php echo $n["sodienthoai"]; ?></td>
                        <td><?php echo $n["email"]; ?></td>
                        <td>
                            <a href="index.php?action=sua_ncc&id=<?php echo $n["id"]; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="index.php?action=xoa_ncc&id=<?php echo $n["id"]; ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-secondary mt-3">Quay lại</a>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>