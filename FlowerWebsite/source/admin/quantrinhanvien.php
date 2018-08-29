<?php

if(!isset($_SESSION['admin'])) {
    header("location:?p=dash-board");
}

$qr = "select * from nhanvien where chucvu!='Administrator'";
$kq = mysqli_query($con, $qr);

if(isset($_GET['xoanv'])) {
    require_once('quantrinhanvien/xoanhanvien.php');
}

require_once('quantrinhanvien/suanhanvien.php');

if(isset($_GET['suanv']))
    echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#fixModal').modal('show');
            });
        </script>";
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
    .width-tb {
        width: 100%;
        max-width: 100%;
        white-space : nowrap;
        overflow : hidden;
        text-overflow: ellipsis;
    }
    .width-tb table tr td {
        white-space : nowrap;
        overflow : hidden;
        text-overflow: ellipsis;
    }
    .width-tb table tr th {
        white-space : nowrap;
        overflow : hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="dropdown" style="margin-bottom: 10px;">
    <button type="button" class="dropdown-toggle btn btn-info" data-toggle="dropdown">
        <span class="fa fa-plus-circle"></span> Thêm nhân viên
    </button>
    <?php require_once("quantrinhanvien/themnhanvien.php"); ?>
</div>
<div class="width-tb">
<table class="table table-hover table-striped" style="font-size: 14px; table-layout: fixed; width: 100%;">
    <tr>
        <th>Họ và Tên</th>
        <th>Email</th>
        <th>CMND</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Quê quán</th>
        <th>Chức vụ</th>
        <th>Thâm niên</th>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th></th>
    </tr>
    <?php while($row = mysqli_fetch_array($kq)) { ?>
    <tr>
        <td data-toggle="tooltip" title="<?php echo $row['tennhanvien'] ?>"><?php echo $row['tennhanvien'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['thecmnd'] ?>"><?php echo $row['thecmnd'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['ngaysinh'] ?>"><?php echo $row['ngaysinh'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['gioitinh'] ?>"><?php echo $row['gioitinh'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['diachi'] ?>"><?php echo $row['diachi'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['sdt'] ?>"><?php echo $row['sdt'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['quequan'] ?>"><?php echo $row['quequan'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['chucvu'] ?>"><?php echo $row['chucvu'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['thamnien'] ?>"><?php echo $row['thamnien'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['username'] ?>"><?php echo $row['username'] ?></td>
        <td data-toggle="tooltip" title="<?php echo $row['pass'] ?>"><?php echo $row['pass'] ?></td>
        <td>
            <a href="?p=nhan-vien&suanv&id=<?php echo $row["idnhanvien"] ?>" ><span class="glyphicon glyphicon-pencil"></span> </a>

            &ensp;
            <a onClick="return ConfirmDelete()" href="?p=nhan-vien&xoanv&id=<?php echo $row["idnhanvien"] ?>"> <span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php } ?>
</table>
</div>