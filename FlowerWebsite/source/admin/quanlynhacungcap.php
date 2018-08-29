<?php

$qr = "select * from nhacungcap";
$kq = mysqli_query($con, $qr);
require_once('quanlynhacungcap/suanhacungcap.php');

if(isset($_POST['addncc'])) {
    $tenncc = $_POST['tenncc'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $qe = "insert into nhacungcap (tennhacc,diachi,sdt) values ('$tenncc','$diachi','$sdt')";
    if(mysqli_query($con,$qe)) {
        echo '<script> alert("Thêm nhà cung cấp thành công!"); </script>';
        echo "<script>location.href='?p=nha-cung-cap'</script>";
    }
}

if(isset($_GET['suancc']))
    echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#fixModal').modal('show');
            });
        </script>";

if(isset($_GET['xoancc'])) {
    require_once('quanlynhacungcap/xoanhacungcap.php');
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
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th></th>
            </tr>
            <tr>
                <form action="index.php?p=nha-cung-cap" method="post">
                <td><input type="text" name="tenncc" class="form-control" required></td>
                <td><input type="text" name="diachi" class="form-control" required></td>
                <td><input type="text" name="sdt" class="form-control" pattern="(?:0)[0-9]{9,10}" required></td>
                <td><input type="submit" name="addncc" class="form-control btn-success" value="Thêm"></td>
                </form>
            </tr>
            <?php while($row = mysqli_fetch_array($kq)) { ?>
            <tr>
                <td><?php echo $row['tennhacc'] ?></td>
                <td><?php echo $row['diachi'] ?></td>
                <td><?php echo $row['sdt'] ?></td>
                <td><a href="?p=nha-cung-cap&suancc&id=<?php echo $row["id_nhacc"] ?>" ><span class="glyphicon glyphicon-pencil"></span> </a>
                    &ensp;
                    <a onClick="return ConfirmDelete()" href="?p=nha-cung-cap&xoancc&id=<?php echo $row["id_nhacc"] ?>"> <span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            <?php } ?>
        </table>
</div>