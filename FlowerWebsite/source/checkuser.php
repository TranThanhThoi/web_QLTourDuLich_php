<?php

require_once("connect.php");
session_start();
ob_start();

if(isset($_POST['user1']))
{
    $vl = $_POST['user1'];
    if($vl != "") {
        $ql = "select username from khachhang where username='$vl'";
        $ql1 = "select username from nhanvien where username='$vl'";
        $kq = mysqli_query($con, $ql);
        $kq1 = mysqli_query($con, $ql1);
        if (mysqli_num_rows($kq) != 0 || mysqli_num_rows($kq1) != 0) {
            echo "<input class=\"form-control\" name=\"yourusername\" placeholder=\"Tên đăng nhập\" type=\"text\" pattern=\"[a-zA-Z0-9]+\" required id=\"username\" onblur=\"load_ajax1()\" value=\"$vl\" />";
            echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
            echo "<input type='text' name='checkedmail' value='emailexists' hidden />";
        } else {
            echo "<input class=\"form-control\" name=\"yourusername\" placeholder=\"Tên đăng nhập\" type=\"text\" pattern=\"[a-zA-Z0-9]+\" required id=\"username\" onblur=\"load_ajax1()\" value=\"$vl\" />";
            echo "<span class=\"glyphicon glyphicon-ok form-control-feedback\"></span>";
            echo "<input type='text' name='checkedmail' value='emailok' hidden />";
        }
    }
    else {
        echo "<input class=\"form-control\" name=\"yourusername\" type=\"text\" required id=\"username\" onblur=\"load_ajax1()\" pattern=\"[a-zA-Z0-9]+\" placeholder=\"Không được để trống trường này.\" />";
        echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
    }
}

?>