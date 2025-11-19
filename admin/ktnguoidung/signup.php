<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng ký - Admin</title>
	<link href="../inc/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2 text-uppercase fw-bold text-primary">Đăng ký</h1>
							
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
                                    <?php if(isset($tb)){ ?>
                                        <div class="alert alert-danger"><?php echo $tb; ?></div>
                                    <?php } ?>
                                    
									<form action="index.php" method="post">
                                        <input type="hidden" name="action" value="xldangky">
										<div class="mb-3">
											<label class="form-label">Họ tên</label>
											<input class="form-control form-control-lg" type="text" name="txthoten" required />
										</div>
                                        <div class="mb-3">
											<label class="form-label">Số điện thoại</label>
											<input class="form-control form-control-lg" type="number" name="txtsodt" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="txtemail" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Mật khẩu</label>
											<input class="form-control form-control-lg" type="password" name="txtmatkhau" required />
										</div>
										<div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Đăng ký</button>
                                            <a href="index.php" class="btn btn-lg btn-secondary">Quay lại đăng nhập</a>
										</div>
									</form>
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