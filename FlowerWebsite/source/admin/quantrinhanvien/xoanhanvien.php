<?php
    $del = mysqli_query($con,"DELETE FROM nhanvien WHERE idnhanvien = '".$_GET["id"]."'");
    echo "<script>location.href='?p=nhan-vien';</script>";
?>
