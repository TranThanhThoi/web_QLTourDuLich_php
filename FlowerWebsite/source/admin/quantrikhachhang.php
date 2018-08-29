<?php

$qr = "select * from khachhang";
$kq = mysqli_query($con, $qr);

if(isset($_GET['xoakh'])) {
    require_once('quantrikhachhang/xoakhachhang.php');
}

require_once('quantrikhachhang/suakhachhang.php');

if(isset($_GET['suakh']))
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

<div class="width-tb">
    <table class="table table-hover table-striped" style="font-size: 14px; table-layout: fixed; width: 100%;">
        <tr>
        <th>Họ và Tên</th>
        <th>Email</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th></th>
        </tr>
        <?php while($row = mysqli_fetch_array($kq)) { ?>
            <tr>
                <td data-toggle="tooltip" title="<?php echo $row['tenkh'] ?>"><?php echo $row['tenkh'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['ngaysinh'] ?>"><?php echo $row['ngaysinh'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['gioitinh'] ?>"><?php echo $row['gioitinh'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['diachi'] ?>"><?php echo $row['diachi'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['sdt'] ?>"><?php echo $row['sdt'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['username'] ?>"><?php echo $row['username'] ?></td>
                <td data-toggle="tooltip" title="<?php echo $row['pass'] ?>"><?php echo $row['pass'] ?></td>
                <td>
                    <a href="?p=khach-hang&suakh&id=<?php echo $row["id_kh"] ?>" ><span class="glyphicon glyphicon-pencil"></span> </a>
                    &ensp;
                    <a onClick="return ConfirmDelete()" href="?p=khach-hang&xoakh&id=<?php echo $row["id_kh"] ?>"> <span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>