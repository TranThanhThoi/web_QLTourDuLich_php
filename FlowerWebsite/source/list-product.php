<?php echo "<div class=\"cross-line\" style='text-transform: capitalize'>$ten</div>"; ?>

<div class="grid-4">
    <?php
    $url = "index.php?".$_SERVER['QUERY_STRING']."";
    $_SESSION['thisurl'] = $url;
    $kq3 = mysqli_query($con,$qr);
    while($i = mysqli_fetch_array($kq3))
    {
        ?>
        <a href="?chitiethoa=<?php echo $i['id_hoas']; ?>" style="text-decoration: none; color: black;">
            <div class="col-md-3 column productbox">
                <img src="<?php echo $i['anh_hoas']; ?>" class="img-responsive">
                <div align="center" style="padding-top: 3px;"><label>Mã SP: <?php echo $i['id_hoas']; ?></label></div>
                <div class="producttitle">
                    <?php echo $i['ten_hoas']; ?>
                    <?php if($i['soluong'] < 1) echo '<span class="label label-warning">Tạm hết</span>'; ?>
                </div>
        </a>
                <div class="productprice"><div class="pull-right"><button <?php if($i['soluong'] < 1) echo "disabled"; ?> class="btn btn-danger btn-sm" value="1" onclick="ajax_cart(<?php echo $i['id_hoas']; ?>,'0','0')">Thêm giỏ</button></div>
                    <div class="pricetext"><?php echo number_format($i['gia_hoas']); ?>đ</div></div>
            </div>

        <?php
    }
    ?>
</div>