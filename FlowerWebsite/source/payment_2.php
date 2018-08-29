<?php
session_start();
ob_start();
if(isset($_POST['pm_radio'])) {
    ?>
    <h3><span class="label label-primary" style="margin-bottom: 10px">3. Xác nhận đặt hàng</span></h3><br/>
    <form action="" method="post">
        <div>
            <table class="table table-striped" style="background-color: white; border: 1px solid silver">
                <?php  if(isset($_SESSION['list_products'])) {
                    foreach ($_SESSION["list_products"] as $cart_itm) { ?>
                        <tr>
                            <td><?php echo $cart_itm['sl_hoas']; ?> x <a href="?chitiethoa=<?php echo $cart_itm['id_hoas']; ?>"><?php echo $cart_itm['ten_hoas']; ?></a></td>
                            <td class="text-right"><?php
                                    $dongia = (int)$cart_itm['gia_hoas'];
                                    $soluong = (int)$cart_itm['sl_hoas'];
                                    $gias = $dongia*$soluong;
                                    echo number_format($gias);
                                    ?>đ</td>
                        </tr>
                    <?php } } ?>
                <tr>
                    <td >Tổng cộng</td>
                    <td class="text-right"><strong><?php
                            if (isset($_SESSION['list_products'])) {
                                $tongtien = 0;
                                foreach ($_SESSION["list_products"] as $cart_itm) {
                                        $dongia = (int)$cart_itm['gia_hoas'];
                                        $soluong = (int)$cart_itm['sl_hoas'];
                                        $gias = $dongia*$soluong;
                                    $tongtien = $tongtien + $gias;
                                } echo number_format($tongtien);
                                echo "<input type='text' name='tongtien' value='$tongtien' hidden />";
                            }
                            else echo '0'; ?> đ</strong></td>
                </tr>
                <tr>
                    <td >Thành tiền</td>
                    <td class="text-right"><strong><?php
                            if (isset($_SESSION['list_products'])) {
                                $thanhtien = 0;
                                foreach ($_SESSION["list_products"] as $cart_itm) {
                                    if(isset($_SESSION['km_today'])) {
                                        $kmpt = (100 - $_SESSION['km_today'])/100;
                                        $dongia = (int)$cart_itm['gia_hoas'];
                                        $soluong = (int)$cart_itm['sl_hoas'];
                                        $gias = ($dongia*$soluong)*$kmpt;
                                    } else {
                                        $dongia = (int)$cart_itm['gia_hoas'];
                                        $soluong = (int)$cart_itm['sl_hoas'];
                                        $gias = $dongia*$soluong;
                                    }
                                    $thanhtien = $thanhtien + $gias;
                                } echo number_format($thanhtien);
                                echo "<input type='text' name='thanhtien' value='$thanhtien' hidden />";
                            }
                            else echo '0'; ?> đ</strong>
                        (-<?php if(isset($_SESSION['km_today'])) echo $_SESSION['km_today']; ?>%)
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <p><label>Phương thức thanh toán: <strong>
                        <?php
                        if($_POST['pm_radio'] == '1') {
                            echo "Thanh toán trực tiếp tại shop";
                            echo "<input type='text' name='phuong_thuc' value='Thanh toán trực tiếp tại shop' hidden>";
                        }
                        if($_POST['pm_radio'] == '2') {
                            echo "Thanh toán khi nhận hoa";
                            echo "<input type='text' name='phuong_thuc' value='Thanh toán khi nhận hoa' hidden>";
                        }
                        if($_POST['pm_radio'] == '3') {
                            echo "Thu tiền ở địa điểm khác";
                            echo "<input type='text' name='phuong_thuc' value='Thu tiền ở địa điểm khác' hidden>";
                        }
                        if($_POST['pm_radio'] == '4') {
                            echo "Chuyển khoản ngân hàng";
                            echo "<input type='text' name='phuong_thuc' value='Chuyển khoản ngân hàng' hidden>";
                        }
                        ?>
                    </strong></label></p>
            <p><label>Tên người nhận: <strong><?php echo $_POST['pm_ten'] ?></strong></label></p>
            <p><label>Địa chỉ giao hoa: <strong><?php echo $_POST['pm_add'] ?></strong></label></p>
            <?php if($_POST['pm_radio'] == "3") {
                $add2 = $_POST['pm_add2'];
                echo "<p><label>Địa chỉ thanh toán: <strong>$add2</strong></label></p>";
            }?>
            <p><label>Số điện thoại: <strong><?php echo $_POST['pm_tel'] ?></strong></label></p>
        </div>
        <hr/>
        <a role="button" href="?thanhtoan=1" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Thực hiện lại</a>
        <button class="btn btn-primary pull-right next-but" name="com_payment" type="submit">Xác nhận <span class="glyphicon glyphicon-ok"></span></button>
        <input type="text" name="ten_kh" value="<?php echo $_POST['pm_ten'] ?>" hidden>
        <input type="text" name="dia_chi" value="<?php echo $_POST['pm_add'] ?>" hidden>
        <?php if($_POST['pm_radio'] == "3") {
            $add2 = $_POST['pm_add2'];
            echo "<input type=\"text\" name=\"dia_chi2\" value='$add2' hidden>";
        }?>
        <input type="text" name="sdt_kh" value="<?php echo $_POST['pm_tel'] ?>" hidden>
    </form>
    <?php

}

?>