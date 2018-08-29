<?php
    $del = mysqli_query($con,"DELETE FROM khuyenmai WHERE id_km = '".$_GET["id"]."'");
    echo "<script>location.href='?p=khuyen-mai';</script>";
?>
