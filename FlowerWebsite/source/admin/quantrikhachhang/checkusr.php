<?php

require_once("../../connect.php");
session_start();
ob_start();

if(isset($_POST['usr']))
{
    $vl = $_POST['usr'];
    $id = $_POST['id'];
    if($vl != "") {
        $ql2 = "select username from khachhang where username='$vl' and id_kh!=$id";
        $ql3 = "select username from nhanvien where username='$vl'";
        $kq2 = mysqli_query($con, $ql2);
        $kq3 = mysqli_query($con, $ql3);
        if (mysqli_num_rows($kq2) != 0 || mysqli_num_rows($kq3) != 0) {
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