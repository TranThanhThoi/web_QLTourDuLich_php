<?php

require_once("../../connect.php");
session_start();
ob_start();

if(isset($_POST['email1']))
{
    $vl = $_POST['email1'];
    $id = $_POST['id1'];
    if($vl != "") {
        $ql = "select email from khachhang where email='$vl'";
        $ql1 = "select email from nhanvien where email='$vl' and idnhanvien!=$id";
        $kq = mysqli_query($con, $ql);
        $kq1 = mysqli_query($con, $ql1);
        if (mysqli_num_rows($kq) != 0 || mysqli_num_rows($kq1) != 0) {
            echo "<input class=\"form-control\" name=\"email\" type=\"email\" required id=\"email1\" onblur=\"load_email1()\" placeholder=\"Email đã tồn tại\" value=\"\" />";
            echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
            echo "<input type='text' name='checkedmail' value='emailexists' hidden />";
        } else {
            echo "<input class=\"form-control\" name=\"email\" type=\"email\" required id=\"email1\" onblur=\"load_email1()\" value=\"$vl\" />";
            echo "<span class=\"glyphicon glyphicon-ok form-control-feedback\"></span>";
            echo "<input type='text' name='checkedmail' value='emailok' hidden />";
        }
    }
    else {
        echo "<input class=\"form-control\" name=\"email\" type=\"email\" required id=\"email1\" onblur=\"load_email1()\" placeholder=\"Không được để trống trường này.\" />";
        echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
        echo "<input type='text' name='checkedmail' value='emailexists' hidden />";
    }
}

?>