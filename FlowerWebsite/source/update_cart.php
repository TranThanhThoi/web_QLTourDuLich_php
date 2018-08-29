<?php

require_once('connect.php');
session_start();
ob_start();

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    if($_POST['removep'] == '0') {
        $sl = 1;
        $er = "SELECT ten_hoas, anh_hoas, gia_hoas FROM hoas WHERE id_hoas='$id'";
        $result = mysqli_query($con, $er);
        $obj = mysqli_fetch_array($result);
        if ($result) {
            $new_product = array(array('id_hoas' => $id, 'ten_hoas' => $obj['ten_hoas'], 'anh_hoas' => $obj['anh_hoas'], 'sl_hoas' => $sl, 'gia_hoas' => $obj['gia_hoas']));
        }
        if (isset($_SESSION['list_products'])) {
            $found = false;

            foreach ($_SESSION["list_products"] as $cart_itm) {
                if ($cart_itm["id_hoas"] == $id) { //sản phẩm đã tồn tại trong mảng
                    $sl_hoas = (int)$cart_itm["sl_hoas"];
                    if ($_POST['minus'] == '1') {
                        if ($sl_hoas > 1)
                            $product[] = array('id_hoas' => $cart_itm["id_hoas"], 'ten_hoas' => $cart_itm["ten_hoas"], 'anh_hoas' => $cart_itm['anh_hoas'], 'sl_hoas' => $sl_hoas - 1, 'gia_hoas' => $cart_itm["gia_hoas"]);
                        else    $product[] = array('id_hoas' => $cart_itm["id_hoas"], 'ten_hoas' => $cart_itm["ten_hoas"], 'anh_hoas' => $cart_itm['anh_hoas'], 'sl_hoas' => $sl_hoas, 'gia_hoas' => $cart_itm["gia_hoas"]);

                    } else {
                        $product[] = array('id_hoas' => $cart_itm["id_hoas"], 'ten_hoas' => $cart_itm["ten_hoas"], 'anh_hoas' => $cart_itm['anh_hoas'], 'sl_hoas' => $sl_hoas + 1, 'gia_hoas' => $cart_itm["gia_hoas"]);
                    }
                    $found = true; // Thiết lập biến kiểm tra sản phẩm tồn tại thành true
                } else {
                    $sl_hoas = (int)$cart_itm["sl_hoas"];
                    //item doesn't exist in the list, just retrive old info and prepare array for session var
                    $product[] = array('id_hoas' => $cart_itm["id_hoas"], 'ten_hoas' => $cart_itm["ten_hoas"], 'anh_hoas' => $cart_itm['anh_hoas'], 'sl_hoas' => $sl_hoas, 'gia_hoas' => $cart_itm["gia_hoas"]);
                }
            }
            if ($found == false) //Không tìm thấy sản phẩm trong giỏ hàng
            {
                //Thêm mới sản phẩm vào mảng
                $_SESSION["list_products"] = array_merge($product, $new_product);
            } else {
                //Tìm thấy sản phẩm đã có trong mảng SESSION nên chỉ cập nhật lại số lượng(QTY)
                $_SESSION["list_products"] = $product;
            }
        } else {
            //Tạo biến SESSION mới hoàn toàn nếu không có sản phẩm nào trong giỏ hàng
            $_SESSION["list_products"] = $new_product;
        }
    }
    else if($_POST["removep"] == '1' && isset($_SESSION["list_products"])) {
        $product_id = $_POST["id"]; //Lấy product_id để xóa
        if (count($_SESSION["list_products"]) < 2)
            unset($_SESSION["list_products"]);
        else {
            foreach ($_SESSION["list_products"] as $cart_itm) //Vòng lặp biến SESSION
            {
                if ($cart_itm["id_hoas"] != $product_id) { //Lọc lại giỏ hàng, sản phẩm nào trùng product_id muốn xóa sẽ bị loại bỏ
                    $product[] = array('id_hoas' => $cart_itm["id_hoas"], 'ten_hoas' => $cart_itm["ten_hoas"], 'anh_hoas' => $cart_itm['anh_hoas'], 'sl_hoas' => $cart_itm["sl_hoas"], 'gia_hoas' => $cart_itm["gia_hoas"]);
                    $_SESSION["list_products"] = $product;
                }
                //Tạo mới biến SESSION lưu giỏ hàng
            }
        }
    }
    if (isset($_SESSION['list_products'])) {
        foreach ($_SESSION["list_products"] as $cart_itm) {
            ?>
            <tr>
                <th class="col-lg-5">
                    <div class="media">
                        <a class="thumbnail pull-left pr-pic" style="width: 30%; height: 30%"><img class="media-object" src="<?php echo $cart_itm['anh_hoas']; ?>" > </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="?chitiethoa=<?php echo $cart_itm['id_hoas']; ?>"><?php echo $cart_itm['ten_hoas']; ?></a></h4>
                            <span>Tình trạng: </span><span class="text-success"><strong>Còn hàng</strong></span>
                        </div>
                    </div>
                </th>
                <th class="col-lg-2">
                    <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="btn-minus" onclick="ajax_cart(<?php echo $cart_itm["id_hoas"] ?>,'1','0')"><span class="glyphicon glyphicon-minus" ></span></button>
                                </span>
                        <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $cart_itm['sl_hoas']; ?>" readonly>
                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="btn-plus" onclick="ajax_cart(<?php echo $cart_itm["id_hoas"] ?>,'0','0')"><span class="glyphicon glyphicon-plus"></span></button>
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
                            $gias = $dongia * $soluong;
                            echo "".number_format($gias)."đ";
                        } ?>
                </th>
                <th class="col-lg-1 text-center">
                    <button class="btn btn-warning" onclick="ajax_cart(<?php echo $cart_itm["id_hoas"] ?>,'x','1')">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </th>
            </tr>

            <?php
        }
    }
    else echo "<tr><td colspan='5' style='text-align: center'>Giỏ hàng trống</td></tr>";
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
    <?php

}

?>