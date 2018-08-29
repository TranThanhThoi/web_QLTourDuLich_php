<?php
if(isset($_SESSION['alert']))
{
    if($_SESSION['alert']=="error")
    {
        echo "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Xin lỗi!</strong> Email hoặc mật khẩu chưa chính xác.
                        </div>";
    }
    if($_SESSION['alert']=="done")
    {
        echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Chào mừng!</strong> Bạn đã đãng nhập thành công.
                        </div>";

    }
    if($_SESSION['alert']=="emailexists")
    {
        echo "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Xin lỗi!</strong> Email bạn đã tồn tại trên hệ thống.
                        </div>";

    }
    if($_SESSION['alert']=="regdone")
    {
        echo "<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Chúc mừng!</strong> Bạn đã đăng ký thành công. Hãy đăng nhập.
                        </div>";

    }

    if($_SESSION['alert']=="changeinfodone")
    {
        echo "<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Thông báo!</strong> Đã thay đổi thông tin thành công.
                        </div>";

    }

    if($_SESSION['alert']=="changepassdone")
    {
        echo "<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Thông báo!</strong> Đã thay đổi mật khẩu thành công.
                        </div>";

    }

    if($_SESSION['alert']=="changepassfail")
    {
        echo "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Xin lỗi!</strong> Mật khẩu bạn nhập chưa chính xác.
                        </div>";

    }

    if($_SESSION['alert']=="changepassre")
    {
        echo "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Xin lỗi!</strong> Nhập lại mật khẩu không khớp với mật khẩu mới.
                        </div>";

    }

    if($_SESSION['alert']=="cartclear")
    {
        echo "<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Thông báo!</strong> Đã làm trống giỏ hàng.
                        </div>";

    }
    if($_SESSION['alert']=="nocart")
    {
        echo "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Xin lỗi!</strong> Bạn chưa chọn sản phẩm.
                        </div>";

    }

    if($_SESSION['alert']=="dathangthanhcong")
    {
        echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Thành công!</strong> Đơn hàng của bạn đang được xử lý.
                        </div>";

    }

    if($_SESSION['alert']=="reseted")
    {
        echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Thành công!</strong> Vui lòng kiểm tra email của bạn.
                        </div>";

    }

    if($_SESSION['alert']=="resetfail")
    {
        echo "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Xin lỗi!</strong> Email của bạn không tồn tại trên hệ thống.
                        </div>";

    }
}
?>