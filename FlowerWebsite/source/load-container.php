<?php
require_once('connect.php');

if (isset($_POST['sended'])) {
    $theloai = $_POST['sended'];
    $id = $_POST['id'];

    if ($theloai == 'loaihoa') {
        $ql = "select ten_loaihoa from loaihoa where id_loaihoa = $id";
        $kq = mysqli_query($con,$ql);
        $tenlh = mysqli_fetch_array($kq);
        $ten = $tenlh['ten_loaihoa'];
        $qr = "select * from hoas where id_loaihoa = $id";
        require_once("list-product.php");
    }
    if ($theloai == 'tenhoa') {
        $ql = "select tenhoa from tenloaihoa where id_tenhoa = $id";
        $kq = mysqli_query($con,$ql);
        $tenlh = mysqli_fetch_array($kq);
        $ten = $tenlh['tenhoa'];
        $qr = "select * from v_hoas where id_tenhoa = $id";
        require_once("list-product.php");
    }
    if ($theloai == 'mauhoa') {
        $ql = "select mamau from mauhoa where idmauhoa = $id";
        $kq = mysqli_query($con,$ql);
        $tenlh = mysqli_fetch_array($kq);
        $ten = $tenlh['mamau'];
        $qr = "select * from hoas where idmauhoa = $id";
        require_once("list-product.php");
    }
}

?>