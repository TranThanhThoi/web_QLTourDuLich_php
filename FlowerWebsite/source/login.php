<?php
if(isset($_POST['email'])&&isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sl="select * from khachhang where username='".$email."' and pass='".$password."'";
    $sl1="select * from nhanvien where username='".$email."' and pass='".$password."'";
    $kq=mysqli_query($con,$sl);
    $kq1=mysqli_query($con,$sl1);
    if(mysqli_num_rows($kq)>0)
    {
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['quyen']="khach";
        $_SESSION['alert']= "done";
        $_SESSION['last-time']= time();
        header("location:".$_SESSION['thisurl']."");
    }
    else if(mysqli_num_rows($kq1)>0)
    {
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['quyen']="nhanvien";
        if($email == 'admin')
            $_SESSION['admin'] = "vip";
        $_SESSION['alert']= "done";
        $_SESSION['last-time']= time();
        header("location:source/admin");
    }
    else {

        $_SESSION['alert']= "error";
        $_SESSION['last-time']= time();
        header("location:".$_SESSION['thisurl']."");
    }
}
?>

<ul id="login-dp" class="dropdown-menu">
    <li>
        <div class="row">
            <div class="col-md-12">
                <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <label class="sr-only" for="email">Email address</label>
                        <input type="text" class="form-control" id="Email" placeholder="Tên đăng nhập" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" placeholder="Mật khẩu" name="password" required>
                        <div class="help-block text-right"><a href="#" data-toggle="modal" data-target="#forgotModal" >Quên mật khẩu ?</a></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    </div>
                </form>
            </div>
            <div class="bottom text-center">
                Chưa có tài khoản ? <a href="#" data-toggle="modal" data-target="#dangkyModal"><b>Đăng ký</b></a>
            </div>
        </div>
    </li>
</ul>