<?php
    $del = mysqli_query($con,"DELETE FROM nhacungcap WHERE id_nhacc = '".$_GET["id"]."'");
    echo "<script>location.href='?p=nha-cung-cap';</script>";
?>
