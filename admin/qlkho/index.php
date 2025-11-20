<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION["nguoidung"])) { header("location:../index.php"); exit(); }
require("../../model/database.php");
require("../../model/mathang.php");
require("../../model/nhacungcap.php");
$mh = new MATHANG();
$ncc = new NHACUNGCAP();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "xem";

switch($action){
    case "xem":
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "ql_nhacc":
        $nhacungcap = $ncc->laynhacungcap();
        include("nhacungcap.php");
        break;
    case "them_ncc":
        $ncc->themnhacungcap($_POST["ten"], $_POST["diachi"], $_POST["email"], $_POST["sodt"]);
        header("Location: index.php?action=ql_nhacc");
        break;
    case "xoa_ncc":
        if(isset($_GET["id"])) $ncc->xoanhacungcap($_GET["id"]);
        header("Location: index.php?action=ql_nhacc");
        break;
    case "sua_ncc":
        if(isset($_GET["id"])){
            $ncc_hientai = $ncc->laynhacungcaptheoid($_GET["id"]);
            include("sua_ncc.php");
        }
        break;
    case "xl_sua_ncc":
        $ncc->suanhacungcap($_POST["id"], $_POST["ten"], $_POST["diachi"], $_POST["email"], $_POST["sodt"]);
        header("Location: index.php?action=ql_nhacc");
        break;
    case "nhapkho":
        $mathang = $mh->laymathang();
        $nhacungcap = $ncc->laynhacungcap();
        include("nhapkho.php");
        break;
    case "xl_nhapkho":
        $mh->nhaphang($_POST["mathang_id"], $_POST["soluong"]);
        $tb = "Đã nhập kho thành công!";
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "xuatkho":
        $mathang = $mh->laymathang();
        include("xuatkho.php");
        break;
    case "xl_xuatkho":
        if($mh->xuathang($_POST["mathang_id"], $_POST["soluong"])){
            $tb = "Đã xuất kho thành công!";
        } else {
            $tb = "Lỗi: Số lượng tồn kho không đủ để xuất!";
        }
        $mathang = $mh->laymathang();
        include("main.php");
        break;
}
?>