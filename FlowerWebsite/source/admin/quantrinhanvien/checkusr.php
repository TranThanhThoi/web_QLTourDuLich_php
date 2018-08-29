<?php

require_once("../../connect.php");
session_start();
ob_start();

if(isset($_POST['usr']))
{
    $vl = $_POST['usr'];
    if($vl != "") {
        $ql = "select username from khachhang where username='$vl'";
        $ql1 = "select username from nhanvien where username='$vl'";
        $kq = mysqli_query($con, $ql);
        $kq1 = mysqli_query($con, $ql1);
        if (mysqli_num_rows($kq) != 0 || mysqli_num_rows($kq1) != 0) {
            echo "<input class=\"form-control\" name=\"username\" type=\"text\" required id=\"username\" onblur=\"load_usr()\" pattern=\"[a-zA-Z0-9]+\" placeholder=\"Tên đăng nhập đã tồn tại\" value=\"\" />";
            echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
        } else {
            echo "<input class=\"form-control\" name=\"username\" type=\"text\" required id=\"username\" onblur=\"load_usr()\" pattern=\"[a-zA-Z0-9]+\" value=\"$vl\" />";
            echo "<span class=\"glyphicon glyphicon-ok form-control-feedback\"></span>";
        }
    }
    else {
        echo "<input class=\"form-control\" name=\"username\" type=\"text\" required id=\"username\" onblur=\"load_usr()\" pattern=\"[a-zA-Z0-9]+\" placeholder=\"Không được để trống trường này.\" />";
        echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
    }

}

?>