<?php

$qr3 = "select * from hoas as h, mauhoa as m,loaihoa as l where h.id_loaihoa = l.id_loaihoa and h.idmauhoa = m.idmauhoa order by id_hoas desc";
$kq5 = mysqli_query($con, $qr3);

if(isset($_GET['xoasp'])) {
    require_once('quanlyhanghoa/xoasanpham.php');
}

require_once('quanlyhanghoa/suasanpham.php');

if(isset($_GET['suasp']))
    echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#fixModalsp').modal('show');
            });
        </script>";

//Phân trang
$tong_sp = mysqli_num_rows($kq5);
$slsp = 5;
$tongtrang = ceil($tong_sp/$slsp);
if(isset($_GET['trang']) && is_numeric($_GET['trang'])) {
    $tranghientai = $_GET['trang'];
}
else {
    $tranghientai = 1;
}
$tranglimit = ($tranghientai-1)*$slsp;
$qr6 = "select * from hoas as h, mauhoa as m,loaihoa as l where h.id_loaihoa = l.id_loaihoa and h.idmauhoa = m.idmauhoa order by id_hoas desc limit $tranglimit,$slsp";
$kq6 = mysqli_query($con, $qr6);

?>

<script>function ConfirmDelete() {
        var x = confirm('Xác nhận xóa?');
        if (x)
            return true;
        else
            return false;
    }
</script>

<style>
    .table-db tr th {
        white-space : nowrap;
        overflow : hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="dropdown" style="margin-bottom: 10px;">
    <button type="button" class="dropdown-toggle btn btn-info" data-toggle="dropdown">
        <span class="fa fa-plus-circle"></span> Thêm sản phẩm
    </button>
    <?php require_once("quanlyhanghoa/themsanpham.php"); ?>
</div>
<div>
    <table class="table table-striped table-hover table-db">
        <tr>
            <th>Tên bó hóa</th>
            <th>Giá</th>
            <th>Ảnh hoa</th>
            <th>Thông tin</th>
            <th>Thể loại</th>
            <th>Màu chủ đạo</th>
            <th>Số lượng</th>
            <th>Function</th>
        </tr>
        <?php while($row = mysqli_fetch_array($kq6)) { ?>
            <tr>
                <td><?php echo $row['ten_hoas'] ?></td>
                <td><?php echo number_format($row['gia_hoas']) ?></td>
                <td><?php echo "<img src='../../".$row['anh_hoas']."' class='img-responsive'>"; ?></td>
                <td><?php echo $row['thongtin_hoas'] ?></td>
                <td style="white-space : nowrap; text-transform: capitalize"><?php echo $row['ten_loaihoa'] ?></td>
                <td style="text-transform: capitalize"><?php echo $row['mamau'] ?></td>
                <td><?php echo $row['soluong'] ?></td>
                <td><a href="?p=hang-hoa&suasp&id=<?php echo $row["id_hoas"] ?>&trang=<?php echo $tranghientai ?>" ><span class="glyphicon glyphicon-pencil"></span> </a>
                    &ensp;
                    <a onClick="return ConfirmDelete()" href="?p=hang-hoa&xoasp&id=<?php echo $row["id_hoas"] ?>&trang=<?php echo $tranghientai ?>"> <span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
        <?php } ?>
    </table>
    <center><ul class="pagination">
            <?php for($i = 1; $i <= $tongtrang; $i++) {
                if(isset($_GET['trang'])){
                    if($tranghientai == $i)
                        echo "<li class='active'><a href='?p=hang-hoa&trang=$i'>$i</a></li>";
                    else echo "<li><a href='?p=hang-hoa&trang=$i'>$i</a></li>";
                }
                else {
                    if($i == 1)
                        echo "<li class='active'><a href='?p=hang-hoa&trang=$i'>$i</a></li>";
                    else echo "<li><a href='?p=hang-hoa&trang=$i'>$i</a></li>";
                }
            }
                ?>
    </ul></center>
</div>