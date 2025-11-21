<?php 
if (session_status() == PHP_SESSION_NONE) {
 session_start();
}
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/khachhang.php");
require("../../model/donhang.php");
require("../../model/donhangct.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$kh = new KHACHHANG();
$dh = new DONHANG();
$dhct = new DONHANGCT();

switch($action){
    case "xem":
        $khachhang = $kh->laytatcakhachhang();
		include("main.php");
        break;

    case "xemdonhang":
        if(isset($_GET['id']))
            $id=$_GET['id'];
        $dsdonhang = $dh->laydanhsachdonhangtheokh($id);      
        include("xemdonhang.php");
        break;
    case "chitietdonhang":
        if(isset($_GET["dhid"])){
            $donhang = $dh->laydanhsachdonhangtheoid($_GET["dhid"]); 
            $donhangct = $dhct->laychitietdonhang($_GET["dhid"]);
        }
        include("xemdonhang.php");
        break;
    case "timkhachhang":
        $tim = $_POST['txtTim']?? '';
        var_dump($tim);
        if (trim($tim) === "") {
            $khachhang = [];
        }else{
            $khachhang = $kh->timkiem($tim);
        }   
        include("dstimkiem.php");
        break;
    default:
        break;
}
?>
