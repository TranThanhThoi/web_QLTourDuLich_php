
<div class="cross-line">Sản phẩm nổi bật</div>

<div class="grid-4">
    <?php
    $qr = "select * from hoas where soluotmua > 0 order by soluotmua desc limit 8";
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
                <?php if($i['soluong'] < 1) echo '<span class="label label-warning">Tạm hết</span>';
                        else echo "<span class=\"label label-danger\">HOT</span>"; ?>
            </div>
    </a>
    <div class="productprice"><div class="pull-right"><button <?php if($i['soluong'] < 1) echo "disabled"; ?> class="btn btn-danger btn-sm" value="1" onclick="ajax_cart(<?php echo $i['id_hoas']; ?>,'0','0')">Thêm giỏ</button></div>
        <div class="pricetext"><?php echo number_format($i['gia_hoas']); ?>đ</div></div>
</div>
<?php
}
?>
</div>

<div class="cross-line">Sản phẩm mới</div>

<div class="grid-4">
    <?php
    $url = "index.php?".$_SERVER['QUERY_STRING']."";
    $_SESSION['thisurl'] = $url;
    $qr = "select * from hoas order by id_hoas desc limit 8";
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
                    <?php if($i['soluong'] < 1) echo '<span class="label label-warning">Tạm hết</span>';
                    else echo "<span class=\"label label-info\">Mới</span>"; ?>
                </div>
        </a>
                <div class="productprice"><div class="pull-right"><button <?php if($i['soluong'] < 1) echo "disabled"; ?> class="btn btn-danger btn-sm" value="1" onclick="ajax_cart(<?php echo $i['id_hoas']; ?>,'0','0')">Thêm giỏ</button></div>
                    <div class="pricetext"><?php echo number_format($i['gia_hoas']); ?>đ</div></div>
            </div>
        <?php
    }
    ?>
</div>