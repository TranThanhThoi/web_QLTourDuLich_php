<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $qr1 = "select * from khuyenmai where id_km = '$id'";
    $kq1 = mysqli_query($con, $qr1);
    $rowfix = mysqli_fetch_array($kq1);
}

if(isset($_POST['addkm'])) {
    $id = $_POST['addkm'];
    $ten_km = $_POST['ten_km'];
    $ngaybd = $_POST['ngaybd'];
    $ngaykt = $_POST['ngaykt'];
    $phantram = $_POST['phantram'];
    if(strtotime($ngaybd)>strtotime($ngaykt)) {
        echo '<script> alert("Ngày bắt đầu phải trước ngày kết thúc!"); </script>';
        echo "<script>location.href='?p=khuyen-mai'</script>";
    }
    else {
        $qe2 = "update khuyenmai set ten_km='$ten_km', ngaybd='$ngaybd', ngaykt='$ngaykt', phantram='$phantram' where id_km = $id";
        if (mysqli_query($con, $qe2)) {
            echo '<script> alert("Sửa khuyến mãi thành công!"); </script>';
            echo "<script>location.href='?p=khuyen-mai'</script>";
        }
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

<div class="modal fade" id="fixkmModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Thông tin Khuyến mãi</legend>
            </div>
            <form action="index.php?p=khuyen-mai" method="post">
                <div class="container" style="width: 100%">
                    <table class="tb-su">
                        <tr>
                            <td style="width: 25%"><label for="">Tên khuyến mãi</label></td>
                            <td style="width: 75%"><input type="text" class="form-control first-tb" name="ten_km" value="<?php echo $rowfix['ten_km'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Ngày bắt đầu</label></td>
                            <td><input type="date" class="form-control" name="ngaybd" value="<?php echo $rowfix['ngaybd'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Ngày kết thúc</label></td>
                            <td><input type="date" class="form-control" name="ngaykt" value="<?php echo $rowfix['ngaykt'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Phần trăm</label></td>
                            <td><input type="number" class="form-control" name="phantram" max="60" value="<?php echo $rowfix['phantram'] ?>" required></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="submit" id="addkm" name="addkm" class="btn btn-success pull-right" value="<?php echo $rowfix['id_km']; ?>">Hoàn tất</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
