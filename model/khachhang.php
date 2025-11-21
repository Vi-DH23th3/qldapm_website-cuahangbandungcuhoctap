<?php 
    class KHACHHANG{
        public function topkhachhang(){
            $db = DATABASE::connect();
            try{
                $sql = "SELECT
                            nguoidung.hoten AS TenKhachHang,
                            nguoidung.email AS EmailKhachHang,
                            SUM(donhang.tongtien) AS TongTienDaMua,
                            COUNT(donhang.id) AS SoLuongDonHang
                        FROM
                            nguoidung
                        JOIN
                            donhang ON nguoidung.id = donhang.nguoidung_id
                        GROUP BY
                            nguoidung.id, nguoidung.hoten, nguoidung.email
                        ORDER BY
                            TongTienDaMua DESC -- Sắp xếp để xem khách hàng có doanh thu cao nhất
                        LIMIT 5";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $ketqua = $cmd->fetchAll(PDO::FETCH_ASSOC);
                return $ketqua;
            }
            catch(PDOException $e){
                $error_message=$e->getMessage();
                echo "<p>Lỗi truy vấn: $error_message</p>";
                exit();
            }
        }
            // lấy thông tin người dùng có $email
	public function laythongtinkhachhang($email){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND loai=3";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
    } 
    public function themkhachhang($email,$sodt,$hoten){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai,trangthai) VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($sodt));
			$cmd->bindValue(':sodt',$sodt);
			$cmd->bindValue(':hoten',$hoten);			
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}// Kiểm tra khách hàng hợp lệ (đăng nhập)
    public function kiemtrakhachhanghople($email, $matkhau){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1 AND loai=3";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", md5($matkhau));
            $cmd->execute();
            $valid = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $valid;
        }
        catch(PDOException $e){ return false; }
    }

    // Cập nhật thông tin khách hàng
    public function capnhatkhachhang($id, $sodt, $hoten){
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET sodienthoai=:sodt, hoten=:hoten WHERE id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':sodt',$sodt);
            $cmd->bindValue(':hoten',$hoten);
            $cmd->bindValue(':id',$id);
            return $cmd->execute();
        }
        catch(PDOException $e){ return false; }
    }

    // Đăng ký tài khoản mới
    public function dangkytaikhoan($email, $sodt, $hoten, $matkhau){
        $db = DATABASE::connect();
        try{
            $sqlCheck = "SELECT id FROM nguoidung WHERE email=:email";
            $cmdCheck = $db->prepare($sqlCheck);
            $cmdCheck->bindValue(':email', $email);
            $cmdCheck->execute();
            if($cmdCheck->rowCount() > 0){ return false; }

            $sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai,trangthai) VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email',$email);
            $cmd->bindValue(':matkhau',md5($matkhau));
            $cmd->bindValue(':sodt',$sodt);
            $cmd->bindValue(':hoten',$hoten);
            $cmd->execute();
            return true;
        }
        catch(PDOException $e){ return false; }
    }

    // Kiểm tra email tồn tại
    public function kiemtraemail($email){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND loai=3";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            return $cmd->rowCount() > 0;
        }
        catch(PDOException $e){ return false; }
    }

    // Reset mật khẩu
    public function resetmatkhau($email, $matkhaumoi){
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET matkhau=:matkhau WHERE email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':matkhau', md5($matkhaumoi));
            $cmd->bindValue(':email', $email);
            return $cmd->execute();
        }
        catch(PDOException $e){ return false; }
    }
    //tìm khách hàng
    public function timkiem($tim){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung 
                    WHERE email LIKE :tim 
                    OR hoten LIKE :tim
                    AND loai=3 AND trangthai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":tim", "%$tim%");
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
    }
    public function laytatcakhachhang(){
        $db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE loai=3 AND trangthai=1";
			$cmd = $db->prepare($sql);
			$cmd->execute();
			$ketqua = $cmd->fetchALL(PDO::FETCH_ASSOC);
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
    }
	
}
?>