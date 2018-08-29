<?php
    $del = mysqli_query($con,"DELETE FROM khachhang WHERE id_kh = '".$_GET["id"]."'");
    echo "<script>location.href='?p=khach-hang';</script>";
?>
