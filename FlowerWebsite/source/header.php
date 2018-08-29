<div class="col-md-3">
    <a href="index.php"><img src="img/flowerface.png" /></a>
</div>

<div class="col-md-5" style="padding: 18px 0 0 0;">
    <form action="index.php?search" method="post">
        <div class="input-group" style="margin-bottom: 10px;">
            <input type="text" name="tim-kiem" class="form-control" placeholder="Tìm kiếm..." required>
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search" style="color: #ff3366;"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<div class="col-md-4" style="padding-top: 18px;">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal" style="margin-bottom: 10px;">
        <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng <span class="badge"><?php if(isset($_SESSION['list_products'])) {
            echo count($_SESSION['list_products']);
            } else echo '0'; ?></span>
    </button>
    <div class="dropdown pull-right">
        <?php
        if(isset($_SESSION['quyen']))
        {
            if($_SESSION['quyen']=="khach")
            {
                echo "<form action=\"index.php\" method=\"post\">
                        <button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#infoModal\">
                        <span class=\"glyphicon glyphicon-user\"></span> Thông tin
                        </button>
                        <button type=\"submit\" name=\"Destroyall\" class=\"btn btn-danger\">
                        <span class=\"glyphicon glyphicon-log-out\"></span> Đăng xuất
                        </button>
                        </form>";
            }
        }
        else {
            ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dangkyModal">
            <span class="glyphicon glyphicon-user"></span> Đăng ký
        </button>
        <button type="button" class="dropdown-toggle btn btn-danger" data-toggle="dropdown" style="background-color: #ff3366;">
            <span class="glyphicon glyphicon-log-in"></span> Đăng nhập
        </button>
        <?php require_once('login.php');
        }
        ?>
    </div>
</div>
<?php
require_once('cart.php');
require_once('signup.php');
require_once('info.php');
require_once('forgot_pass.php');
?>