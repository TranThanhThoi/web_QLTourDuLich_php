<?php

if(isset($_POST['thongtindangky']) && isset($_POST['checkedmail']))
{
    if($_POST['checkedmail'] == "emailok") {
        $hoten = "".$_POST['ho']." ".$_POST['ten']."";
        $yruser = $_POST['yourusername'];
        $yremail = $_POST['youremail'];
        $password = $_POST['password'];
        $repass = $_POST['re-password'];
        $youraddress = $_POST['youraddress'];
        $sdt = $_POST['sdt'];
        $ngaysinh = "" . $_POST['nam'] . "-" . $_POST['thang'] . "-" . $_POST['ngay'] . "";
        $gioitinh = $_POST['gioitinh'];
        if($password == $repass) {
            $regist = "INSERT INTO khachhang (tenkh, gioitinh, ngaysinh, diachi, sdt, email, username, pass) VALUES ('$hoten', '$gioitinh', '$ngaysinh', '$youraddress', '$sdt', '$yremail', '$yruser', '$password')";
            if (mysqli_query($con, $regist)) {
                $_SESSION['alert'] = "regdone";
                $_SESSION['last-time'] = time();
            }
        }
        else {
            $_SESSION['alert'] = "changepassre";
            $_SESSION['last-time']= time();
        }
    }
    else {
        $_SESSION['alert'] = "emailexists";
        $_SESSION['last-time']= time();
    }
}

?>

<style>
    .form-control {
        margin-bottom: 10px;
    }
    .modal-dialog {
        vertical-align: middle;
    }
    .modal-lg {
        vertical-align: middle;
    }
</style>

<div class="modal fade" id="dangkyModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Đăng ký thành viên!</legend>
            </div>
            <form action="index.php" method="post" class="form" role="form">
            <div class="modal-body" style="padding: 0 50px 0 50px;">

                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="ho" placeholder="Họ" type="text"
                                   required autofocus />
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="ten" placeholder="Tên" type="text" required />
                        </div>
                    </div>
                    <div id="result1" class="has-feedback">
                    <input class="form-control has-feedback" name="yourusername" placeholder="Tên đăng nhập" type="text" required id="username" onblur="load_ajax1()" />
                    </div>
                    <div id="result" class="has-feedback">
                    <input class="form-control has-feedback" name="youremail" placeholder="Email" type="email" required id="email" onblur="load_ajax()" />
                    </div>
                    <input class="form-control" name="password" placeholder="Mật khẩu" type="password" pattern=".{6,}"   required title="Tối thiểu 6 ký tự." />
                    <input class="form-control" name="re-password" placeholder="Nhập lại mật khẩu" type="password" pattern=".{6,}" required title="Tối thiểu 6 ký tự." />
                    <input class="form-control" name="youraddress" placeholder="Địa chỉ" type="text" required />
                    <input class="form-control" name="sdt" placeholder="Số điện thoại" type="text" pattern="(?:0)[0-9]{9,10}" required title="Số điện thoại chưa đúng." />
                    <label for="">
                        Ngày sinh</label>
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="ngay" required>
                                <option value="">Ngày</option>
                                <?php
                                    for ($i=1; $i<=31; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="thang" required>
                                <option value="">Tháng</option>
                                <?php
                                    for ($i=1; $i<=12; $i++) { ?>
                                    <option value="<?php echo $i; ?>">Tháng <?php echo $i; ?></option><?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="nam" required >
                                <option value="">Năm</option>
                                <?php
                                for ($i=2018; $i>=1920; $i--) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                            </select>
                        </div>
                    </div>
                    <label class="radio-inline">
                        <input type="radio" name="gioitinh" id="inlineCheckbox1" value="Nam" checked />
                        Nam
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gioitinh" id="inlineCheckbox2" value="Nữ" />
                        Nữ
                    </label>


            </div>
            <div class="modal-footer">
                <div id="clicksign">
                    <button class="btn btn-lg btn-info btn-block" type="submit" name="thongtindangky">
                        Đăng ký</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>