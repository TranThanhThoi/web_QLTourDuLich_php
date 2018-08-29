<?php

$qr = "select * from khuyenmai order by id_km desc";
$kq = mysqli_query($con, $qr);
require_once('khuyenmai/suakhuyenmai.php');

if(isset($_POST['themkm'])) {
    $ten_km = $_POST['ten_km'];
    $ngaybd = $_POST['ngaybd'];
    $ngaykt = $_POST['ngaykt'];
    $phantram = $_POST['phantram'];
    if(strtotime($ngaybd)>strtotime($ngaykt)) {
        echo '<script> alert("Ngày bắt đầu phải trước ngày kết thúc!"); </script>';
        echo "<script>location.href='?p=khuyen-mai'</script>";
    }
    else {
        $qe = "insert into khuyenmai (ten_km, ngaybd, ngaykt, phantram) values ('$ten_km','$ngaybd','$ngaykt', '$phantram')";
        if (mysqli_query($con, $qe)) {
            echo '<script> alert("Thêm khuyến mãi thành công!"); </script>';
            echo "<script>location.href='?p=khuyen-mai'</script>";
        }
    }
}

if(isset($_GET['suakm']))
    echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#fixkmModal').modal('show');
            });
        </script>";

if(isset($_GET['xoakm'])) {
    require_once('khuyenmai/xoakhuyenmai.php');
}

?>

<script>function ConfirmDelete() {
        var x = confirm('Xác nhận xóa?');
        if (x)
            return true;
        else
            return false;
    }
</script>

<div>
    <table class="table table-striped table-hover">
        <tr>
            <th>Tên khuyến mãi</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Phần trăm</th>
            <th></th>
        </tr>
        <tr>
            <form action="index.php?p=khuyen-mai" method="post">
                <td><input type="text" name="ten_km" class="form-control" required></td>
                <td><input type="date" name="ngaybd" class="form-control" required></td>
                <td><input type="date" name="ngaykt" class="form-control" required></td>
                <td><input type="number" name="phantram" class="form-control" required></td>
                <td><input type="submit" name="themkm" class="form-control btn-success" value="Thêm"></td>
            </form>
        </tr>
        <?php while($row = mysqli_fetch_array($kq)) { ?>
            <tr>
                <td><?php echo $row['ten_km'] ?></td>
                <td><?php echo $row['ngaybd'] ?></td>
                <td><?php echo $row['ngaykt'] ?></td>
                <td><?php echo $row['phantram'] ?></td>
                <td><a href="?p=khuyen-mai&suakm&id=<?php echo $row["id_km"] ?>" ><span class="glyphicon glyphicon-pencil"></span> </a>
                    &ensp;
                    <a onClick="return ConfirmDelete()" href="?p=khuyen-mai&xoakm&id=<?php echo $row["id_km"] ?>"> <span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
        <?php } ?>
    </table>
</div>