<div class="modal fade" id="cartModal" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Giá</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="reload_cart">
                <?php
                if (isset($_SESSION['list_products'])) {
                    foreach ($_SESSION["list_products"] as $cart_itm) {
                        ?>
                        <tr>
                            <th class="col-lg-5">
                                <div class="media">
                                    <a class="thumbnail pull-left pr-pic" style="width: 30%; height: 30%" ><img
                                                class="media-object" src="<?php echo $cart_itm['anh_hoas']; ?>"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a
                                                    href="?chitiethoa=<?php echo $cart_itm['id_hoas']; ?>"><?php echo $cart_itm['ten_hoas']; ?></a>
                                        </h4>
                                        <span>Tình trạng: </span><span
                                                class="text-success"><strong>Còn hàng</strong></span>
                                    </div>
                                </div>
                            </th>
                            <th class="col-lg-2">
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="btn-minus" onclick="ajax_cart(<?php echo $cart_itm["id_hoas"] ?>,'1','0')"><span
                                                class="glyphicon glyphicon-minus"></span></button>
                                </span>
                                    <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $cart_itm['sl_hoas']; ?>" readonly>
                                    <span class="input-group-btn">
.                                    <button class="btn btn-default" type="button" id="btn-plus" onclick="ajax_cart(<?php echo $cart_itm["id_hoas"] ?>,'0','0')"><span
                                                class="glyphicon glyphicon-plus"></span></button>
                                </span>
                                </div>
                            </th>
                            <th class="col-lg-2 text-center">
                                <?php echo number_format($cart_itm['gia_hoas']); ?>đ
                            </th>
                            <th class="col-lg-2 text-center">
                                <?php
                                if(isset($_SESSION['km_today'])) {
                                    $kmpt = (100 - $_SESSION['km_today'])/100;
                                    $dongia = (int)$cart_itm['gia_hoas'];
                                    $soluong = (int)$cart_itm['sl_hoas'];
                                    $gias = ($dongia*$soluong)*$kmpt;
                                    $giagiam = ($dongia*$soluong) - $gias;
                                    echo "".number_format($gias)."đ <div style='color: #8d96a9;text-align: center'>(-".number_format($giagiam).")</div>";
                                } else {
                                    $dongia = (int)$cart_itm['gia_hoas'];
                                    $soluong = (int)$cart_itm['sl_hoas'];
                                    $gias = $dongia*$soluong;
                                    echo "".number_format($gias)."đ";
                                } ?>
                            </th>
                            <th class="col-lg-1 text-center">
                                <button class="btn btn-warning" onclick="ajax_cart(<?php echo $cart_itm["id_hoas"] ?>,'0','1')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </th>
                        </tr>
                        <?php
                    }
                }
                else echo "<tr><td colspan='5' style='text-align: center'>Giỏ hàng trống</td></tr>"
                ?>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td style="text-align: right">Tổng cộng</td>
                    <td class="text-right"><strong><?php
                            if (isset($_SESSION['list_products'])) {
                                $tongtien = 0;
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
                                    $tongtien = $tongtien + $gias;
                                } echo number_format($tongtien);
                            }
                            else echo '0'; ?> đ</strong></td>
                </tr>
                </tbody>
                <tfoot>

                <tr>
                    <td>
                    <a  role="button" class="btn btn-warning" href="?emptycart=1" style="width: 100%">
                        <span class="glyphicon glyphicon-trash" ></span> Xóa giỏ hàng
                    </a></td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100%">
                            <span class="glyphicon glyphicon-arrow-left" ></span> Tiếp tục mua hàng
                        </button>
                    </td>
                    <td>
                        <a role="button" href="index.php?thanhtoan=1" class="btn btn-success" data-toggle="modal" style="width: 100%">
                            Thanh toán <span class="glyphicon glyphicon-play"></span>
                        </a>
                    </td>
                </tr>
                </tfoot>
            </table>
            </table>

        </div>
    </div>
</div>