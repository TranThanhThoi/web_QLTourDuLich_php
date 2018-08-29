<style>
    .form-control {
        margin-bottom: 10px;
    }
    .modal-dialog {
        vertical-align: middle;
    }
    .modal-lg {
        vertical-align: middle;
    }
</style>

<script type='text/javascript'>
    function print_page() {
        printElement(document.getElementById("printThis"));
    }

    function printElement(elem) {
        var domClone = elem.cloneNode(true);

        var $printSection = document.getElementById("printSection");

        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }

        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }
</script>

<?php
if(isset($_GET['idhd'])) {
    $id = $_GET['idhd'];
    $qr = "select * from chitiethoadon,hoas where hoas.id_hoas = chitiethoadon.id_hoa and id_hoadon = $id";
    $kq = mysqli_query($con, $qr);
?>
<div id="printThis">
<div class="modal fade" id="ct-hdModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-briefcase"></span> Chi tiết hóa đơn!</legend>
            </div>
            <div>
                <ul class="list-group" style="width: 90%; margin: auto">
                <?php
                if(mysqli_num_rows($kq)>0) {
                    foreach ($kq as $rows) {
                        ?>
                        <li class="list-group-item"><?php echo $rows['soluongmua']; ?> x <?php echo $rows['ten_hoas']; ?>
                            <p class="pull-right"><?php echo number_format($rows['dongia']*$rows['soluongmua']); ?> đ</p>
                        </li>
                <?php
                    }
                }
                $qr2 = "select * from hoadon where id_hoadon = $id";
                $kq2 = mysqli_query($con, $qr2);
                foreach ($kq2 as $rows) {
                ?>
                    <li class="list-group-item" style="text-align: right">
                        Tổng tiền: <b><?php echo number_format($rows['thanhtien']); ?> đ</b>
                    </li>
                </ul>
                <div style="width: 90%; margin: auto; padding-top: 10px">
                    <p><label>Phương thức thanh toán: <strong>
                                <?php echo $rows['phuong_thuc']; ?>
                            </strong></label></p>
                    <p><label>Tên người nhận: <strong><?php echo $rows['ten_kh'] ?></strong></label></p>
                    <p><label>Địa chỉ giao hoa: <strong><?php echo $rows['dia_chi_giao'] ?></strong></label></p>
                    <p><label>Địa chỉ thu tiền: <strong><?php echo $rows['dia_chi_thu'] ?></strong></label></p>
                    <p><label>Số điện thoại: <strong><?php echo $rows['so_dien_thoai'] ?></strong></label></p>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button onclick="print_page()" id="print-btn" class="btn btn-info pull-left" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
                <form action="?p=ban-hang" method="post">
                    <input type="text" name="id_hd" value="<?php echo $id; ?>" hidden>
                    <button id="print-btn" name="hoan_tat" class="btn btn-success"><span id="print-btn" class="glyphicon glyphicon-check"></span> Hoàn tất</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
