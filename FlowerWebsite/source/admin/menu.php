<style>
    .btn-width {
        width: 100%;
        margin-bottom: 5px;
        text-align: left;
        white-space : nowrap;
        overflow : hidden;
        text-overflow: ellipsis;
    }
</style>

<ul class="list-group" style="margin: 0 5px 0 0;">
    <li class="list-group-item text-center" style="background-color: #c4e3f3;">DANH MỤC</li>
    <li class="list-group-item">
        <div class="panel-group" id="accordion" style="word-wrap: break-word;  ">
            <form action="index.php" method="post">
            <a role="button" href="?p=dash-board" class="btn btn-default btn-lg btn-width" style="word-wrap: break-word;">
                <span class="glyphicon glyphicon-dashboard"></span> Bảng điều khiển</a>
            <a role="button" href="?p=nhan-vien" id="nhan-vien-btn" class="btn btn-default btn-lg btn-width" <?php if(!isset($_SESSION['admin'])) echo "disabled"; ?>>
                <span class="glyphicon glyphicon-eye-open"></span> Quản lý nhân viên</a>
            <a role="button" href="?p=khach-hang" class="btn btn-default btn-lg btn-width">
                <span class="glyphicon glyphicon-user"></span> Quản lý khách hàng</a>
            <a role="button" href="?p=hang-hoa" class="btn btn-default btn-lg btn-width">
                <span class="glyphicon glyphicon-briefcase"></span> Quản lý hàng hóa</a>
            <a role="button" href="?p=ban-hang" class="btn btn-default btn-lg btn-width">
                <span class="glyphicon glyphicon-tag"></span> Quản lý bán hàng</a>
            <a role="button" href="?p=nha-cung-cap" class="btn btn-default btn-lg btn-width">
                <span class="glyphicon glyphicon-book"></span> Quản lý nhà cung cấp</a>
            <a role="button" href="?p=khuyen-mai" class="btn btn-default btn-lg btn-width">
                <span class="glyphicon glyphicon-gift"></span> Khuyến mãi</a>
            <a role="button" href="?p=thong-ke" class="btn btn-default btn-lg btn-width">
                <span class="glyphicon glyphicon-equalizer"></span> Thống kê</a>
            </form>
        </div>
    </li>
</ul>