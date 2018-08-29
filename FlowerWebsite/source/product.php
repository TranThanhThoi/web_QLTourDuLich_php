<?php

$id_hoas = $_GET['chitiethoa'];
$qrr = "select * from hoas where id_hoas = $id_hoas";
$kq4 = mysqli_query($con, $qrr);
foreach ($kq4 as $row) {
?>
<div class="pr-pic">
    <img src="<?php echo $row['anh_hoas']; ?>" class="img-responsive center-img">
    <div align="center" style="padding-top: 3px;"><label>Mã SP: <?php echo $row['id_hoas']; ?></label></div>
    <div class="producttitle">
        <?php echo $row['ten_hoas']; ?>
        <?php if($row['soluong'] < 1) echo '<span class="label label-warning">Tạm hết</span>'; ?>
    </div>
    <hr style="margin: 0"/>
    <div class="pr-pricetext"><?php echo number_format($row['gia_hoas']); ?>đ</div>
    <div class="productprice">
        <div><button <?php if($row['soluong'] < 1) echo "disabled"; ?> class="btn btn-success btn-lg" data-toggle="modal" data-target="#cartModal" value="1" style="width: 100%; float: left; margin-bottom: 10px;" onclick="ajax_cart(<?php echo $row['id_hoas']; ?>,'0','0')">MUA NGAY</button></div>
        <div><button <?php if($row['soluong'] < 1) echo "disabled"; ?> class="btn btn-danger btn-lg" value="1" style="width: 100% ; float: left" onclick="ajax_cart(<?php echo $row['id_hoas']; ?>,'0','0')">Thêm giỏ</button></div>
    </div>
</div>
<div class="pr-price">
    <span>THÔNG TIN</span>
    <hr/>
    <div>
        <p style="width: 70%">
            <?php echo $row['thongtin_hoas']; ?>
        </p>
    </div>
    <div class="pr-price-div">
        <h3>KHUYẾN MÃI ***</h3>
        <h5>Tặng thiệp hoặc băng rôn chúc mừng.</h5>
        <?php
            if(isset($_SESSION['km_today'])) {
                $phan_tram = $_SESSION['km_today'];
                $km_start = $_SESSION['km_start'];
                $km_end = $_SESSION['km_end'];
                $km_start = date('d-m-Y', strtotime($km_start));
                $km_end = date('d-m-Y', strtotime($km_end));
                $km_start = str_replace('-', '/', $km_start);
                $km_end = str_replace('-', '/', $km_end);
                echo "<h5>Từ $km_start đến hết $km_end giảm $phan_tram% toàn Shop.</h5>";
            }
        ?>
    </div>
    <div class="pr-price-div2">
        <ul>
            <li>Tặng băng rôn, thiệp (trị giá 20.000đ) miễn phí</li>
            <li>Giảm ngay 20.000đ khi Bạn tạo đơn hàng online</li>
            <li>Giao miễn phí trong nội thành HCM</li>
            <li>Giao gấp trong vòng 2 giờ</li>
            <li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li>
            <li>Cam kết hoa tươi trên 3 ngày</li>
        </ul>
    </div>
</div>
<div class="cross-line">Chi tiết sản phẩm</div>
<div class="pr-info">
    <p>Bó hoa gồm các loại hoa tươi:</p>
    <?php
    $qrrr = "select * from chitiet_hoas as c,hoa as h where c.id_hoa = h.id_hoa and c.id_ct_hoas = $id_hoas ";
    $kq5 = mysqli_query($con, $qrrr);
    foreach ($kq5 as $row2) {
        $sl = $row2['soluong'];
        $tenlhoa = $row2['tenhoa'];
        echo "<p>- $sl $tenlhoa</p>";
    }
    ?>
    <p>- Hoa lá phụ khác</p>
</div>
<div class="cross-line">Sản phẩm tương tự</div>
<div class="grid-4">
    <?php
    $url = "index.php?".$_SERVER['QUERY_STRING']."";
    $_SESSION['thisurl'] = $url;
    $mauhoa = $row['idmauhoa'];
    $qr = "select * from hoas where idmauhoa = $mauhoa and id_hoas != $id_hoas limit 4";
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
    } }
    ?>
</div>