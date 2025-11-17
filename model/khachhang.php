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

}
?>