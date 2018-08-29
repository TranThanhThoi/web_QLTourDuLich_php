<style>

    label {
        font-weight: normal;
    }

</style>

<?php

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $cautruyvan = "select * from khachhang where username = '$email'";
        $kq = mysqli_query($con, $cautruyvan);
        $rowfix = mysqli_fetch_array($kq);
    }

if(isset($_POST['letgofix']))
{
    if($_POST['checkedmail'] == "emailok") {
        $id = $_POST['letgofix'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $updat = "UPDATE khachhang SET tenkh = '$hoten', ngaysinh = '$ngaysinh', gioitinh = '$gioitinh', diachi = '$diachi', sdt = '$sdt', email = '$email' WHERE id_kh = $id";
        if (mysqli_query($con, $updat)) {
            $_SESSION['alert'] = "changeinfodone";
            $_SESSION['last-time'] = time();
            header("location:" . $_SESSION['thisurl'] . "");
        }
    }
    else {
        $_SESSION['alert'] = "emailexists";
        $_SESSION['last-time']= time();
    }
}

if(isset($_POST['fixpass']))
{
    $id = $_POST['fixpass'];
    $oldpass = $_POST['old-pass'];
    $newpass = $_POST['new-pass'];
    $repass = $_POST['re-pass'];
    if($newpass == $repass) {
        if($oldpass == $rowfix['pass']) {
            $updat1 = "UPDATE khachhang SET pass = '$newpass' WHERE id_kh = $id";
            if(mysqli_query($con, $updat1)) {
                $_SESSION['alert'] = "changepassdone";
                $_SESSION['last-time']= time();
                header("location:".$_SESSION['thisurl']."");
            }
        }
        else {
            $_SESSION['alert'] = "changepassfail";
            $_SESSION['last-time']= time();
            header("location:".$_SESSION['thisurl']."");
        }
    }
    else {
        $_SESSION['alert'] = "changepassre";
        $_SESSION['last-time']= time();
        header("location:".$_SESSION['thisurl']."");
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

<script>
    function load_info(){
        $.ajax({
            url : "source/checkinfo.php",
            type : "post",
            dataType:"text",
            data : {
                emailinfo : $('#emailinfo').val(),
                id : $('#letgofix').val()
            },
            success : function (result){
                $('#result2').html(result);
            }
        });
    }
</script>

<div class="modal fade" id="infoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Thông tin Nhân viên</legend>
            </div>
                <div class="container" style="width: 100%; padding: 0 50px 0 50px;">
                    <form action="index.php" method="post">
                    <table class="tb-su">
                        <tr>
                            <td style="width: 25%"><label for="">Họ và Tên</label></td>
                            <td style="width: 75%"><input type="text" class="form-control first-tb" name="hoten" value="<?php echo $rowfix['tenkh'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Email</label></td>
                            <td><div id="result2" class="has-feedback">
                                    <input type="email" class="form-control" name="email" value="<?php echo $rowfix['email'] ?>" required id="emailinfo" onblur="load_info()">
                                </div></td>
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
                    </table>
                        <button type="submit" id="letgofix" name="letgofix" class="btn btn-success pull-right" value="<?php echo $rowfix['id_kh']; ?>">Hoàn tất</button>
                    </form>
                    <form action="index.php" method="post" class="form" role="form">
                        <table style="width: 100%">
                            <tr>
                                <th colspan="2" style="text-align: right"><h3 style="margin: 10px 0 15px 0"><span class="label label-primary">Đổi mật khẩu</span></h3></th>
                                <td></td>
                            </tr>
                            <tr>
                                <td><label for="old-pass">Mật khẩu hiện tại:</label></td>
                                <td>
                                    <input  name="old-pass" class="form-control" type="password" value="" required />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="new-pass">Mật khẩu mới:</label></td>
                                <td>
                                    <input name="new-pass" class="form-control" type="password" value="" required pattern=".{6,}"   required title="Tối thiểu 6 ký tự." />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="re-pass">Nhập lại mật khẩu:</label></td>
                                <td>
                                    <input name="re-pass" class="form-control" type="password" value="" required pattern=".{6,}"   required title="Tối thiểu 6 ký tự." />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button name="fixpass" class="btn btn-success pull-right" type="submit" value="<?php echo $rowfix['id_kh']; ?>">Hoàn tất</button></td>
                            </tr>
                        </table>
                    </form>
            <div class="modal-footer">
            </div>
                </div>

        </div>
    </div>
</div>
