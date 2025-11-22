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

if(isset($_REQUEST["action"]))
    $action = $_REQUEST["action"];
else
    $action="xem";

$kh = new KHACHHANG();
$dh = new DONHANG();
$dhct = new DONHANGCT();

switch($action){

    // Hiện tất cả đơn hàng
    case "xem":
        $dsdonhang = $dh->laytatcadonhang();
        include("main.php");
        break;

    // Tìm đơn hàng theo mã
    case "tim":
        $ma = $_POST['txtTim'] ?? '';

        if(trim($ma) == "")
            $dsdonhang = [];
        else
            $dsdonhang = $dh->timkiemdonhang($ma);
        
        include("dstimkiem.php");
        break;

    // Chi tiết đơn hàng
    case "chitiet":
        if(isset($_GET["id"])){
            $donhang = $dh->laydonhangtheoid($_GET["id"]);
            $donhangct = $dhct->laychitietdonhang($_GET["id"]);
        }
        include("chitiet.php");
        break;
}
?>
