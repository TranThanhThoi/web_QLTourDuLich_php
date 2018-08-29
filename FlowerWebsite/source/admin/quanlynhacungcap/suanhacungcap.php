<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $qr1 = "select * from nhacungcap where id_nhacc = '$id'";
    $kq1 = mysqli_query($con, $qr1);
    $rowfix = mysqli_fetch_array($kq1);
}

if(isset($_POST['addncc1'])) {
    $id = $_POST['addncc1'];
    $tenncc = $_POST['tenncc'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $qe1 = "update nhacungcap set tennhacc='$tenncc', diachi='$diachi', sdt='$sdt' where id_nhacc = $id";
    if(mysqli_query($con,$qe1)) {
        echo '<script> alert("Sửa nhà cung cấp thành công!"); </script>';
        echo "<script>location.href='?p=nha-cung-cap'</script>";
    }
}

?>

<style>
    .tb-su {
        width: 100%;
    }
    .form-control {
        margin-bottom: 5px;
    }
    .first-tb {
        margin-top: 5px;
    }
</style>

<div class="modal fade" id="fixModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Thông tin Nhà cung cấp</legend>
            </div>
            <form action="index.php?p=nha-cung-cap" method="post">
                <div class="container" style="width: 100%">
                    <table class="tb-su">
                        <tr>
                            <td style="width: 25%"><label for="">Tên nhà cung cấp</label></td>
                            <td style="width: 75%"><input type="text" class="form-control first-tb" name="tenncc" value="<?php echo $rowfix['tennhacc'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Địa chỉ</label></td>
                            <td><input type="text" class="form-control" name="diachi" value="<?php echo $rowfix['diachi'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Số điện thoại</label></td>
                            <td><input type="text" class="form-control" name="sdt" pattern="(?:0)[0-9]{9,10}" value="<?php echo $rowfix['sdt'] ?>" required></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="submit" id="addncc" name="addncc1" class="btn btn-success pull-right" value="<?php echo $rowfix['id_nhacc']; ?>">Hoàn tất</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
