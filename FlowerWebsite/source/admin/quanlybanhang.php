<?php

$qr3 = "select * from hoadon order by id_hoadon desc";
$kq5 = mysqli_query($con, $qr3);

if(isset($_GET['idhd']))
    echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#ct-hdModal').modal('show');
            });
        </script>";

if(isset($_POST['hoan_tat'])) {
    $id = $_POST['id_hd'];
    if(mysqli_query($con,"update hoadon set trang_thai = 'Hoàn tất' where id_hoadon = $id")) {
        echo '<script> alert("Hoàn tất đơn hàng!"); </script>';
        echo "<script>location.href='?p=ban-hang'</script>";
    }
}

?>

<style>
    .table-db tr th {
        white-space : nowrap;
        overflow : hidden;
        text-overflow: ellipsis;
    }
</style>

<div>
    <table class="table table-striped table-hover table-db">
        <tr>
            <th>ID Hóa Đơn</th>
            <th>Tổng Cộng</th>
            <th>Thành Tiền</th>
            <th>Ngày Hóa Đơn</th>
            <th>Phương Thức</th>
            <th>Tình Trạng</th>
            <th>Function</th>
        </tr>
        <?php while($row = mysqli_fetch_array($kq5)) { ?>
            <tr>
                <td><?php echo $row['id_hoadon'] ?></td>
                <td><?php echo number_format($row['tongtien']) ?></td>
                <td><?php echo number_format($row['thanhtien']) ?></td>
                <td><?php echo $row['ngay_hd'] ?></td>
                <td><?php echo $row['phuong_thuc'] ?></td>
                <td style="text-transform: capitalize"><?php echo $row['trang_thai'] ?></td>
                <td><?php if($row['trang_thai'] == "Hoàn tất") {
                    echo 'Đã hoàn tất';
                } else {?>
                <a href="?p=ban-hang&idhd=<?php echo $row['id_hoadon'] ?>">Chi tiết hóa đơn</a>
                <?php } ?></td>
            </tr>
        <?php }
        require_once("chitiethoadon.php");
        ?>
    </table>
</div>