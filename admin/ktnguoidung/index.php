<?php 
if (session_status() == PHP_SESSION_NONE) {
 session_start();
}
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE){  // chưa đăng nhập
    $action="dangnhap";
}
else{   // mặc định
    $action="macdinh";
}

$nd = new NGUOIDUNG();


switch($action){
    case "macdinh":               
        include("main.php");
        break;
    
    case "dangky":
        include("signup.php");
        break;

    case "xldangky":
        $email = $_POST["txtemail"];
        $nd = new NGUOIDUNG();
        
        // Kiểm tra email đã tồn tại chưa (dùng hàm có sẵn)
        if($nd->laythongtinnguoidung($email)){
            $tb = "Email này đã được sử dụng!";
            include("signup.php");
        } else {
            // Tạo đối tượng người dùng mới
            $ndmoi = new NGUOIDUNG();
            $ndmoi->sethoten($_POST["txthoten"]);
            $ndmoi->setsodienthoai($_POST["txtsodt"]);
            $ndmoi->setemail($email);
            $ndmoi->setmatkhau($_POST["txtmatkhau"]);
            $ndmoi->setloai(2); // Mặc định đăng ký là QUẢN TRỊ (1) luôn để bạn dễ test
            
            if($nd->themnguoidung($ndmoi)){
                echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.'); window.location.href='index.php';</script>";
            } else {
                $tb = "Lỗi không thể đăng ký!";
                include("signup.php");
            }
        }
        break;
    
    case "dangnhap":
        include("login.php");
        break;
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        if($nd->kiemtranguoidunghople($email,$matkhau)==TRUE){
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email); // đặt biến session
            include("main.php");
        }
        else{
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);  // hủy biến session
        //include("login.php");         // hiển thị trang login
        header("location:../../index.php");     // hoặc chuyển hướng ra bên ngoài (trang dành cho khách)
        break;  
    case "hoso":               
        include("profile.php");
        break; 
    case "xlhoso":
        $ndcapnhat = new NGUOIDUNG();
        $ndcapnhat->setid($_POST["txtid"]);
        $ndcapnhat->setemail($_POST["txtemail"]);        
        $ndcapnhat->setsodienthoai($_POST["txtdienthoai"]);
        $ndcapnhat->sethoten($_POST["txthoten"]);
        $ndcapnhat->sethinhanh($_POST["txthinhanh"]);

        if($_FILES["fhinh"]["name"] != null){
            $hinhanh = basename($_FILES["fhinh"]["name"]);
            $duongdan = "../../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
            $ndcapnhat->sethinhanh($hinhanh);
        }
        
        $nd->capnhatnguoidung($ndcapnhat);

        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($ndcapnhat->getemail());
        include("main.php");        
        break;

       
    case "matkhau":               
        include("changepass.php");
        break; 
    case "doimatkhau":
        $ndcapnhat = new NGUOIDUNG();
        $ndcapnhat->setemail($_POST["txtemail"]);
        $ndcapnhat->setmatkhau($_POST["txtmatkhaumoi"]);
        $nd->doimatkhau($ndcapnhat);
        include("main.php");
        break; 
    default:
        break;

    case "quenmatkhau":
        include("forgotpass.php");
        break;
    case "xacnhanemail":
        $email = $_POST["txtemail"];
        $nd = new NGUOIDUNG();
        if($nd->laythongtinnguoidung($email)){
            $email_xacnhan = $email;
            include("forgotpass.php");
        } else {
            $tb = "Email này không tồn tại trong hệ thống Admin!";
            include("forgotpass.php");
        }
        break;
    case "luumatkhaumoi":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $matkhau2 = $_POST["txtmatkhau2"];
        if($matkhau != $matkhau2){
            $tb = "Mật khẩu xác nhận không khớp!";
            $email_xacnhan = $email;
            include("forgotpass.php");
        } else {
            $ndcapnhat = new NGUOIDUNG();
            $ndcapnhat->setemail($email);
            $ndcapnhat->setmatkhau($matkhau);
            if($nd->doimatkhau($ndcapnhat)){
                echo "<script>alert('Đổi mật khẩu thành công! Vui lòng đăng nhập.'); window.location.href='index.php';</script>";
            } else {
                $tb = "Lỗi hệ thống!";
                include("forgotpass.php");
            }
        }
        break;
}
?>
