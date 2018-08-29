<?php
    if(isset($_POST['passmoi'])) {
        $passn = $_POST['pass'];
        $updat = "update nhanvien set pass = '$passn' where username = 'admin'";
        if (mysqli_query($con, $updat)) {
            echo '<script> alert("Đổi mật khẩu thành công!"); </script>';
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

<div class="modal fade" id="p-aModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Đổi mật khẩu!</legend>
            </div>
            <form action="index.php" method="post" class="form" role="form">
                <div class="modal-body" style="padding: 0 50px 0 50px;">

                    <label for="forgot_email">Nhập mật khẩu mới:</label>
                    <input type="password" name="pass" class="form-control" required>

                </div>
                <div class="modal-footer">
                    <div id="clicksign">
                        <button class="btn btn-lg btn-info btn-block" type="submit" name="passmoi">
                            Đặt lại mật khẩu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
