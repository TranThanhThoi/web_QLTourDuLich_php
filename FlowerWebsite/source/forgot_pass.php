<?php

if(isset($_POST['forgot_email']))
{
    $fg_email = $_POST['forgot_email'];
    $kq = mysqli_query($con, "select * from khachhang where email = '$fg_email'");
    if(mysqli_num_rows($kq) > 0) {
        $new_pass = generateRandomString();
        if(mysqli_query($con, "UPDATE khachhang SET pass = '$new_pass' WHERE email = '$fg_email'")) {
            $msg = "Xin chào!\nChúng tôi đã đặt lại mật khẩu của bạn tạm thời:\n\n$new_pass\n\nVui lòng đăng nhập và đổi lại mật khẩu!\nShop Hoa Tươi Tiến Đạt.";
            $msg = wordwrap($msg, 70);
            if(mail($fg_email, "Mật khẩu đã được đặt lại", $msg)) {
                $_SESSION['alert'] = "reseted";
                $_SESSION['last-time'] = time();
                header("location:" . $_SESSION['thisurl'] . "");
            }
        }
    } else {
        $_SESSION['alert']= "resetfail";
        $_SESSION['last-time']= time();
        header("location:".$_SESSION['thisurl']."");
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

<div class="modal fade" id="forgotModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Quên mật khẩu!</legend>
            </div>
            <form action="index.php" method="post" class="form" role="form">
                <div class="modal-body" style="padding: 0 50px 0 50px;">

                    <label for="forgot_email">Nhập email của bạn:</label>
                    <input type="email" name="forgot_email" class="form-control" required>

                </div>
                <div class="modal-footer">
                    <div id="clicksign">
                        <button class="btn btn-lg btn-info btn-block" type="submit" name="thongtinemail">
                            Đặt lại mật khẩu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>