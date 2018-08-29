<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $qr1 = "select * from nhanvien where idnhanvien = '$id'";
    $kq1 = mysqli_query($con, $qr1);
    $rowfix = mysqli_fetch_array($kq1);
}

if(isset($_POST['letgofix']))
{
    if($_POST['checkedmail'] == "emailok") {
        $id = $_POST['letgofix'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $cmnd = $_POST['cmnd'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $quequan = $_POST['quequan'];
        $chucvu = $_POST['chucvu'];
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        $updat = "UPDATE nhanvien SET tennhanvien = '$hoten', thecmnd = '$cmnd', ngaysinh = '$ngaysinh', gioitinh = '$gioitinh', diachi = '$diachi', sdt = '$sdt', quequan = '$quequan', chucvu = '$chucvu', email = '$email', username = '$user', pass = '$pass' WHERE idnhanvien = $id";
        if (mysqli_query($con, $updat)) {
            echo '<script> alert("Sửa thành công!"); </script>';
            echo "<script>location.href='?p=nhan-vien'</script>";
        }
    }
    else {
        return;
    }
}

?>

<script>
    function load_email1(){
        $.ajax({
            url : "quantrinhanvien/checkmail1.php",
            type : "post",
            dataType:"text",
            data : {
                email1 : $('#email1').val(),
                id1 : $('#letgofix').val()
            },
            success : function (result){
                $('#result1').html(result);
            }
        });
    }

    function load_usr1(){
        $.ajax({
            url : "quantrinhanvien/checkusr1.php",
            type : "post",
            dataType:"text",
            data : {
                usr1 : $('#username1').val(),
                id1 : $('#letgofix').val()
            },
            success : function (result){
                $('#resultuser1').html(result);
            }
        });
    }
</script>

<div class="modal fade" id="fixModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Thông tin Nhân viên</legend>
            </div>
            <form action="index.php?p=nhan-vien" method="post">
                <div class="container" style="width: 100%">
                    <table class="tb-su">
                        <tr>
                            <td style="width: 25%"><label for="">Họ và Tên</label></td>
                            <td style="width: 75%"><input type="text" class="form-control first-tb" name="hoten" value="<?php echo $rowfix['tennhanvien'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Email</label></td>
                            <td><div id="result1" class="has-feedback"><input type="email" class="form-control" name="email" value="<?php echo $rowfix['email'] ?>" required id="email1" onblur="load_email1()"></div></td>
                        </tr>
                        <tr>
                            <td><label for="">CMND</label></td>
                            <td><input type="text" class="form-control" name="cmnd" pattern="[0-9]+" value="<?php echo $rowfix['thecmnd'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Ngày sinh</label></td>
                            <td><input type="date" class="form-control" name="ngaysinh" value="<?php echo $rowfix['ngaysinh'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="" style="margin: 10px 0 10px 0">Giới tính</label></td>
                            <td><label class="radio-inline" style="margin: 10px 0 10px 0">
                                    <input type="radio" name="gioitinh" id="inlineCheckbox1" value="Nam" <?php if($rowfix['gioitinh'] == "Nam") echo "checked"; ?>  required />
                                    Nam
                                </label>
                                <label class="radio-inline" style="margin: 10px 0 10px 10px">
                                    <input type="radio" name="gioitinh" id="inlineCheckbox2" value="Nữ" <?php if($rowfix['gioitinh'] == "Nữ") echo "checked"; ?> required />
                                    Nữ
                                </label></td>
                        </tr>
                        <tr>
                            <td><label for="">Địa chỉ</label></td>
                            <td><input type="text" class="form-control" name="diachi" value="<?php echo $rowfix['diachi'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Số điện thoại</label></td>
                            <td><input type="text" class="form-control" name="sdt" pattern="(?:0)[0-9]{9,10}" value="<?php echo $rowfix['sdt'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Quê quán</label></td>
                            <td><input type="text" class="form-control" name="quequan" value="<?php echo $rowfix['quequan'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Chức vụ</label></td>
                            <td><select class="form-control" name="chucvu">
                                    <option value="Nhân viên bán hàng" selected>Nhân viên bán hàng</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="">Tên đăng nhập</label></td>
                            <td><div id="resultuser1" class="has-feedback"><input type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" value="<?php echo $rowfix['username'] ?>" id="username1" onblur="load_usr1()" required></div></td>
                        </tr>
                        <tr>
                            <td><label for="">Mật khẩu</label></td>
                            <td><input type="password" class="form-control" name="pass" pattern="[a-zA-Z0-9]+" value="<?php echo $rowfix['pass'] ?>"  required></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                    <button type="submit" id="letgofix" name="letgofix" class="btn btn-success pull-right" value="<?php echo $rowfix['idnhanvien']; ?>">Hoàn tất</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>