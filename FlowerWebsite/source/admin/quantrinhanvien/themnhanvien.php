<style>
    .tb-su {
        width: 100%;
    }
    .form-control {
        margin-bottom: 5px;
    }
    .first-tb {
        margin-top: 10px;
    }
</style>

<?php

if(isset($_POST['letgo']))
{
    if($_POST['checkedmail'] == "emailok") {
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
        $thamnien = 0;
        $regist = "INSERT INTO nhanvien (tennhanvien, thecmnd, ngaysinh, gioitinh, diachi, sdt, quequan, chucvu, thamnien, email, username, pass) VALUES ('$hoten', '$cmnd', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$quequan', '$chucvu', '$thamnien', '$email', '$user', '$pass')";
        if (mysqli_query($con, $regist)) {
            echo '<script> alert("Tạo tài khoản thành công!"); </script>';
            echo "<script>location.href='?p=nhan-vien'</script>";
        }
    }
    else {
        return;
    }
}

?>

<script>
    function load_email(){
        $.ajax({
            url : "quantrinhanvien/checkmail.php",
            type : "post",
            dataType:"text",
            data : {
                email : $('#email').val()
            },
            success : function (result){
                $('#result').html(result);
            }
        });
    }

    function load_usr(){
        $.ajax({
            url : "quantrinhanvien/checkusr.php",
            type : "post",
            dataType:"text",
            data : {
                usr : $('#username').val()
            },
            success : function (result){
                $('#resultuser').html(result);
            }
        });
    }
</script>

<ul class="dropdown-menu" role="menu" style="width: 50%">
    <li>
        <form action="index.php?p=nhan-vien" method="post">
        <div class="container" style="width: 100%">
            <table class="tb-su">
                <tr>
                    <td style="width: 20%"><label for="">Họ và Tên</label></td>
                    <td style="width: 80%"><input type="text" class="form-control first-tb" name="hoten" required></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td><div id="result" class="has-feedback"><input class="form-control has-feedback" name="email" type="email" required id="email" onblur="load_email()" /></div></td>
                </tr>
                <tr>
                    <td><label for="">CMND</label></td>
                    <td><input type="text" class="form-control" name="cmnd" pattern="[0-9]+" required></td>
                </tr>
                <tr>
                    <td><label for="">Ngày sinh</label></td>
                    <td><input type="date" class="form-control" name="ngaysinh" required></td>
                </tr>
                <tr>
                    <td><label for="" style="margin: 10px 0 10px 0">Giới tính</label></td>
                    <td><label class="radio-inline" style="margin: 10px 0 10px 0">
                        <input type="radio" name="gioitinh" id="inlineCheckbox1" value="Nam" checked />
                            Nam
                        </label>
                        <label class="radio-inline" style="margin: 10px 0 10px 10px">
                        <input type="radio" name="gioitinh" id="inlineCheckbox2" value="Nữ" />
                            Nữ
                        </label></td>
                </tr>
                <tr>
                    <td><label for="">Địa chỉ</label></td>
                    <td><input type="text" class="form-control" name="diachi" required></td>
                </tr>
                <tr>
                    <td><label for="">Số điện thoại</label></td>
                    <td><input type="text" class="form-control" name="sdt" pattern="(?:0)[0-9]{9,10}" required></td>
                </tr>
                <tr>
                    <td><label for="">Quê quán</label></td>
                    <td><input type="text" class="form-control" name="quequan" required></td>
                </tr>
                <tr>
                    <td><label for="">Chức vụ</label></td>
                    <td><select class="form-control" name="chucvu">
                            <option value="Nhân viên bán hàng" selected>Nhân viên bán hàng</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="">Tên đăng nhập</label></td>
                    <td><div id="resultuser" class="has-feedback"><input type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" id="username" onblur="load_usr()" required></div></td>
                </tr>
                <tr>
                    <td><label for="">Mật khẩu</label></td>
                    <td><input type="password" class="form-control" name="pass" pattern="[a-zA-Z0-9]+" required></td>
                </tr>
            </table>
            <button type="submit" name="letgo" class="btn btn-success pull-right">Hoàn tất</button>
        </div>
        </form>
    </li>
</ul>