<!DOCTYPE html>
<html>

<?php

    require_once("source/connect.php");
    session_start();
    ob_start();
    if(isset($_POST['Destroyall'])) {
        $url = $_SESSION['thisurl'];
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['quyen']);
        header("location:".$url."");
    }
    if(isset($_SESSION['alert']) && isset($_SESSION['last-time'])) {
        if(time() - $_SESSION['last-time'] > 4)
        {
            unset($_SESSION['alert']);
        }
    }

    if(isset($_SESSION['quyen']))
        if($_SESSION['quyen']=="nhanvien")
            header("location:source/admin");

    if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
    {
        unset($_SESSION['list_products']);
        $_SESSION['alert']= "cartclear";
        $_SESSION['last-time']= time();
        header("location:".$_SESSION['thisurl']."");
    }

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

    $km = mysqli_query($con, "select * from khuyenmai");
    while($row_km = mysqli_fetch_array($km)) {
        $start = $row_km['ngaybd'];
        $end = $row_km['ngaykt'];
        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            new DateTime($end)
        );
        foreach ($period as $key => $value) {
            if($value->format('Y-m-d') == date('Y-m-d')) {
                $_SESSION['km_today'] = $row_km['phantram'];
                $_SESSION['km_start'] = $start;
                $_SESSION['km_end'] = $end;
            }
        }
        $date_end = new DateTime($end);
        $date_start = new DateTime($start);
        if($date_end->format('Y-m-d') == date('Y-m-d') || $date_start->format('Y-m-d') == date('Y-m-d')) {
            $_SESSION['km_today'] = $row_km['phantram'];
            $_SESSION['km_start'] = $start;
            $_SESSION['km_end'] = $end;
        }
    }

?>

<head>
    <meta charset="UTF-8">
    <title>Hoa Tươi Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="bootstrap/jquery/3.3.1/jquery.min.js"></script>
    <script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="source/style.css">
    <script src="source/scripts.js"></script>
</head>

<body>

<div id="header">

    <?php include("source/header.php"); ?>

</div>

<div class="content">

    <?php

        require_once('source/alert.php');
        if(isset($_GET['thanhtoan']))
        {
            require('source/payment.php');
        }
        else {

        if (!isset($_GET['chitiethoa']) && !isset($_GET['search'])) {
            ?>

            <div class="banner"><img src="img/banner.png"></div>

            <?php
            if(isset($_SESSION['km_today'])) {
                $phan_tram = $_SESSION['km_today'];
                $km_start = $_SESSION['km_start'];
                $km_end = $_SESSION['km_end'];
                $km_start = date('d-m-Y', strtotime($km_start));
                $km_end = date('d-m-Y', strtotime($km_end));
                $km_start = str_replace('-', '/', $km_start);
                $km_end = str_replace('-', '/', $km_end);
                echo "<marquee><b>Từ $km_start đến hết $km_end giảm $phan_tram% toàn Shop.</b></marquee>";
            }
        }
    ?>

    <div class="side-menu">

        <?php require_once("source/menu.php"); ?>
        <?php require_once("source/thongtinthanhtoan.php"); ?>

    </div>
    <div id="container">
        <?php
        if(isset($_GET['chitiethoa'])) {
            require_once('source/product.php');
        }
        else if(isset($_GET['gioithieu'])) {
            require_once('source/gioi_thieu.php');
        }
        else if(isset($_GET['search'])) {
            require_once('source/search.php');
        }
        else require_once("source/home.php");
        ?>
    </div>
    <?php } ?>
</div>

<footer>
    <?php require_once("source/footer.php"); ?>
</footer>

<button onclick="topFunction()" id="myBtn" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#cartModal" style="margin-bottom: 10px;">
    <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng
</button>

</body>
</html>
