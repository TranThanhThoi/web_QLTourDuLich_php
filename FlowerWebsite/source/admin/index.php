<!DOCTYPE html>
<html>

<?php

require_once("../connect.php");
session_start();
ob_start();

if(isset($_SESSION['quyen'])) {
    if ($_SESSION['quyen'] == "nhanvien") {

    }
    else header("location:../../index.php");
}
else header("location:../../index.php");

if(isset($_POST['Destroyall'])) {
    session_destroy();
    session_unset();
    header("location:index.php");
}

if(isset($_GET['p'])) {
    switch ($_GET['p']) {

        case "nhan-vien":
            {
                $phienphuc = "Quản lý nhân viên";
            }break;
        case 'khach-hang':
            {
                $phienphuc = "Quản lý khách hàng";
            }break;
        case 'hang-hoa':
            {
                $phienphuc = "Quản lý hàng hóa";
            }break;
        case 'ban-hang':
            {
                $phienphuc = "Quản lý bán hàng";
            }break;
        case 'nha-cung-cap':
            {
                $phienphuc = "Quản lý nhà cung cấp";
            }break;
        case 'thong-ke':
            {
                $phienphuc = "Thống kê";
            }break;
        case 'khuyen-mai':
            {
                $phienphuc = "Khuyến mãi";
            }break;
        default:
            $phienphuc = "Bảng điều khiển";
    }
}
else $phienphuc = "Bảng điều khiển";

?>

<head>
    <meta charset="UTF-8">
    <title>Quản trị Hoa Tươi Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../../bootstrap/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/8970b6f900.js"></script>
    <script src="../../bootstrap/Chart.js"></script>

</head>

<body>
<div class="head-ad">
<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 10px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><i class="fa fa-user-secret"></i> ADMIN PANEL</a>
        </div>
        <form action="index.php" method="post">
        <ul class="nav navbar-nav navbar-right" style="padding-right: 5px;">
            <?php if(isset($_SESSION['admin'])) {
                ?>
            <li>
                <div class="dropdown">
                    <button style="text-decoration: none" class="navbar-btn btn btn-link dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Admin
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#p-aModal">Đổi mật khẩu</a></li>
                    </ul>
                </div>
            </li>
            <?php } ?>
            <button type="submit" name="Destroyall" class="btn btn-link navbar-btn" style="text-decoration: none">
                    <span class="glyphicon glyphicon-log-out"></span> Đăng xuất
                </button>
        </ul>
        </form>
    </div>
</nav>
</div>

<div class="left-ad">
    <?php require_once('menu.php'); ?>
</div>

<div class="right-ad">
    <ul class="breadcrumb" style="margin-bottom: 10px;">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active"><?php echo $phienphuc; ?></li>
    </ul>
    <?php
    if(isset($_GET['p'])) {
        switch ($_GET['p']) {

            case "nhan-vien":
                {
                    require_once('quantrinhanvien.php');
                }break;
            case 'khach-hang':
                {
                    require_once('quantrikhachhang.php');
                }break;
            case 'hang-hoa':
                {
                    require_once('quanlyhanghoa.php');
                }break;
            case 'ban-hang':
                {
                    require_once('quanlybanhang.php');
                }break;
            case 'nha-cung-cap':
                {
                    require_once('quanlynhacungcap.php');
                }break;
            case 'thong-ke':
                {
                    require_once('thongke.php');
                }break;
            case 'khuyen-mai':
                {
                    require_once('khuyenmai.php');
                }break;
            default:
                require_once('dashboard.php');
        }
    }
    else require_once('dashboard.php');
    require_once("p-a.php");
    ?>
</div>

</body>
</html>
