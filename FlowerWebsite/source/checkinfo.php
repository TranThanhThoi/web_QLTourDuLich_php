<?php

require_once("connect.php");
session_start();
ob_start();

if(isset($_POST['emailinfo']))
{
    $vl = $_POST['emailinfo'];
    $id = $_POST['id'];
    if($vl != "") {
        $ql2 = "select email from khachhang where email='$vl' and id_kh!=$id";
        $ql3 = "select email from nhanvien where email='$vl'";
        $kq2 = mysqli_query($con, $ql2);
        $kq3 = mysqli_query($con, $ql3);
        if (mysqli_num_rows($kq2) != 0 || mysqli_num_rows($kq3) != 0) {
            echo "<input class=\"form-control\" name=\"email\" placeholder=\"Email\" type=\"email\" required id=\"emailinfo\" onblur=\"load_info()\" value=\"$vl\" />";
            echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
            echo "<input type='text' name='checkedmail' value='emailexists' hidden />";
        } else {
            echo "<input class=\"form-control\" name=\"email\" placeholder=\"Email\" type=\"email\" required id=\"emailinfo\" onblur=\"load_info()\" value=\"$vl\" />";
            echo "<span class=\"glyphicon glyphicon-ok form-control-feedback\"></span>";
            echo "<input type='text' name='checkedmail' value='emailok' hidden />";
        }
    }
    else {
        echo "<input class=\"form-control\" name=\"email\" type=\"email\" required id=\"emailinfo\" onblur=\"load_info()\" pattern=\"[a-zA-Z0-9]+\" placeholder=\"Không được để trống trường này.\" />";
        echo "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
    }
}

?>