<?php
    $del = mysqli_query($con,"DELETE FROM hoas WHERE id_hoas = '".$_GET["id"]."'");
    echo "<script>location.href='?p=hang-hoa';</script>";
?>
