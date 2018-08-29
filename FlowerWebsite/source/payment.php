<?php
$url = "index.php?".$_SERVER['QUERY_STRING']."";
$_SESSION['thisurl'] = $url;
if(isset($_SESSION['list_products'])) {

}
else {
    $_SESSION['alert']= "nocart";
    $_SESSION['last-time']= time();
    header("location:".$_SESSION['thisurl']."");
}

if(isset($_POST['com_payment'])) {

    $tongtien = $_POST['tongtien'];
    $thanhtien = $_POST['thanhtien'];
    $rdm = generateRandomString();
    $ngay = date('Y-m-d');
    if(isset($_SESSION['email']))
        $kh = $_SESSION['email'];
    else $kh = "khach-vang-lai";
    $phuong_thuc = $_POST['phuong_thuc'];
    $ten_kh = $_POST['ten_kh'];
    $dia_chi = $_POST['dia_chi'];
    if(isset($_POST['dia_chi2']))
        $dia_chi2 = $_POST['dia_chi2'];
    else $dia_chi2 = $_POST['dia_chi'];
    $sdt_kh = $_POST['sdt_kh'];

    $qr = "INSERT INTO hoadon (randomize_name, thanhtien, tongtien, ngay_hd, user_kh, phuong_thuc, ten_kh, dia_chi_giao, dia_chi_thu, so_dien_thoai, trang_thai) values ('$rdm', $thanhtien, $tongtien, '$ngay', '$kh', '$phuong_thuc', '$ten_kh', '$dia_chi', '$dia_chi2', '$sdt_kh', 'Đang xử lý')";
    if(mysqli_query($con, $qr))
    {
        $kq = mysqli_query($con, "select id_hoadon from hoadon where randomize_name = '$rdm'");
        if($row = mysqli_fetch_array($kq)) {
            $id_hoadon = $row['id_hoadon'];
            if(isset($_SESSION['list_products'])) {
                foreach ($_SESSION["list_products"] as $cart_itm) {
                    $slhoa = (int)$cart_itm['sl_hoas'];
                    $dongiahoa = (int)$cart_itm['gia_hoas'];
                    $giahoa = $slhoa * $dongiahoa;
                    $id_hoass = $cart_itm['id_hoas'];
                    $qr2 = "INSERT INTO chitiethoadon (soluongmua, dongia, thanhtien, id_hoadon, id_hoa) values ($slhoa, $dongiahoa, $giahoa, $id_hoadon, $id_hoass)";
                    $qr3 = "UPDATE hoas SET soluotmua = soluotmua + 1 where id_hoas = '$id_hoass'";
                    if (mysqli_query($con, $qr2) && mysqli_query($con, $qr3)) {
                        unset($_SESSION['list_products']);
                        $_SESSION['alert'] = "dathangthanhcong";
                        $_SESSION['last-time'] = time();
                        header("location:index.php");
                    } else echo "ECHO 3";
                }
            } else echo "ECHO 2";
        } else echo "ECHO";
    } else echo "ECHO4";
}

?>

<style>
    .paydiv {
        height: auto;
        border: 1px solid white;
        background-color: white;
        align-content: center;
        display: flex;
    }
    .sub-pay {
        width: 32%;
        margin: 5px auto;
        padding: 10px;
        float: left;
        border: 1px solid rgba(236,76,177,0.08);
        border-radius: 15px;
        background-color: rgba(236,76,177,0.08);
        box-shadow: 2px 2px 2px 2px #E0E0E0;
    }

    .next-but {
        margin-top: 0;
    }
    .sub-pay textarea {
        resize: none;
        min-height: 100px;
    }
    .box{
        display: none;
        border-radius: 10px;
        border: 1px solid #e53366;
        padding: 15px;
        background-color: rgba(255,68,187,0.08);
        text-align: ;
    }
</style>

<div class="cross-line" style="width: 100%; padding-right: 5px"> <span class="glyphicon glyphicon-credit-card"></span> Trang thanh toán<a href="index.php" style="color: white" class="pull-right"><span class="glyphicon glyphicon-chevron-left"></span>Trở về</a></div>
<div class="paydiv">
    <div class="sub-pay">
        <?php
        if(isset($_SESSION['quyen'])) {
            $user = $_SESSION['email'];
            $kq = mysqli_query($con,"select * from khachhang where username = '$user'");
            if($row = mysqli_fetch_array($kq)) {
                echo "<form action=\"\" method=\"post\" onsubmit=\"return ajax_payment(this)\">
        <h3><span class=\"label label-primary\" style=\"margin-bottom: 10px\">1. Địa chỉ giao hàng</span></h3><br/>
        <label>Tên người nhận:</label>
        <input type=\"text\" name=\"hoten\" id=\"pm_ten\" class=\"form-control\" value='".$row['tenkh']."' required/>
        <label>Địa chỉ giao hoa:</label>
        <textarea name=\"diachi\" id=\"pm_add\" class=\"form-control\" required>".$row['diachi']."</textarea>
        <label>Số điện thoại:</label>
        <input type=\"text\" name=\"sdt\" id=\"pm_tel\" class=\"form-control\" pattern=\"(?:0)[0-9]{9,10}\" title=\"Số điện thoại chưa đúng.\" value='".$row['sdt']."' required/>
        <hr/>
        <button class=\"btn btn-primary pull-right next-but\">Tiếp theo <span class=\"glyphicon glyphicon-chevron-right\"></span></button>
        </form>";
            }
        }
        else {
        ?>
        <form action="" method="post" onsubmit="return ajax_payment(this)">
        <h3><span class="label label-primary" style="margin-bottom: 10px">1. Địa chỉ giao hàng</span></h3><br/>
        <label>Tên người nhận:</label>
        <input type="text" name="hoten" id="pm_ten" class="form-control" required/>
        <label>Địa chỉ giao hoa:</label>
        <textarea name="diachi" id="pm_add" class="form-control" required></textarea>
        <label>Số điện thoại:</label>
        <input type="text" name="sdt" id="pm_tel" class="form-control" pattern="(?:0)[0-9]{9,10}" title="Số điện thoại chưa đúng." required/>
        <hr/>
        <button class="btn btn-primary pull-right next-but">Tiếp theo <span class="glyphicon glyphicon-chevron-right"></span></button>
        <?php } ?>
    </div>
    <div class="sub-pay" id="pm_2">
        <h1 class="text-center"><span class="glyphicon glyphicon-lock"></span></h1>
    </div>
    <div class="sub-pay" id="pm_3">
        <h1 class="text-center"><span class="glyphicon glyphicon-lock"></span></h1>
    </div>

</div>