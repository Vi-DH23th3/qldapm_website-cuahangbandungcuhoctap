<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khôi phục mật khẩu - Admin</title>
    <link href="../inc/css/app.css" rel="stylesheet">
</head>
<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4"><h1 class="h2">Khôi phục mật khẩu</h1></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <?php if(isset($tb)) echo "<div class='alert alert-danger'>$tb</div>"; ?>
                                    <?php if(!isset($email_xacnhan)): ?>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="xacnhanemail">
                                        <div class="mb-3"><label class="form-label">Email</label><input class="form-control form-control-lg" type="email" name="txtemail" required /></div>
                                        <div class="d-grid gap-2 mt-3"><button type="submit" class="btn btn-lg btn-primary">Tiếp tục</button><a href="index.php" class="btn btn-lg btn-secondary">Quay lại</a></div>
                                    </form>
                                    <?php else: ?>
                                    <div class="alert alert-success">Email hợp lệ: <b><?php echo $email_xacnhan; ?></b></div>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="luumatkhaumoi">
                                        <input type="hidden" name="txtemail" value="<?php echo $email_xacnhan; ?>">
                                        <div class="mb-3"><label class="form-label">Mật khẩu mới</label><input class="form-control form-control-lg" type="password" name="txtmatkhau" required /></div>
                                        <div class="mb-3"><label class="form-label">Nhập lại</label><input class="form-control form-control-lg" type="password" name="txtmatkhau2" required /></div>
                                        <div class="d-grid gap-2 mt-3"><button type="submit" class="btn btn-lg btn-success">Đổi mật khẩu</button><a href="index.php?action=quenmatkhau" class="btn btn-lg btn-secondary">Hủy</a></div>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>