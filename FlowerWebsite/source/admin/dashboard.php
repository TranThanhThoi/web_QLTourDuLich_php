<div style="width: 100%;">
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="circle-tile">
            <a href="#">
                <div class="circle-tile-heading green">
                    <i class="fa fa-money fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content green">
                <div class="circle-tile-description text-faded">
                    Doanh thu
                </div>
                <div class="circle-tile-number text-faded">
                    <?php
                    $qr = "select sum(thanhtien) as tongthu from hoadon where month(ngay_hd) = month(now())";
                    if($kq = mysqli_query($con, $qr))
                        $row = mysqli_fetch_array($kq);
                        echo number_format($row['tongthu']);
                    ?> Đ
                </div>
                <a href="?p=thong-ke" class="circle-tile-footer">Thông tin thêm <i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="circle-tile">
            <a href="#">
                <div class="circle-tile-heading purple">
                    <i class="fa fa-user fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content purple">
                <div class="circle-tile-description text-faded">
                    Thành viên mới
                </div>
                <div class="circle-tile-number text-faded">
                    <?php
                    $qr = "select count(*) as tv from khachhang";
                    if($kq = mysqli_query($con, $qr))
                        $row = mysqli_fetch_array($kq);
                    echo number_format($row['tv']);
                    ?>
                </div>
                <a href="?p=khach-hang" class="circle-tile-footer">Thông tin thêm <i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="circle-tile">
            <a href="#">
                <div class="circle-tile-heading blue">
                    <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content blue">
                <div class="circle-tile-description text-faded">
                    Đơn hàng mới
                </div>
                <div class="circle-tile-number text-faded">
                    <?php
                    $qr = "select count(*) as hd from hoadon";
                    if($kq = mysqli_query($con, $qr))
                        $row = mysqli_fetch_array($kq);
                    echo number_format($row['hd']);
                    ?>
                </div>
                <a href="?p=ban-hang" class="circle-tile-footer">Thông tin thêm <i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="circle-tile">
            <a href="#">
                <div class="circle-tile-heading orange">
                    <i class="fa fa-inbox fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content orange">
                <div class="circle-tile-description text-faded">
                    Email
                </div>
                <div class="circle-tile-number text-faded">
                    500
                </div>
                <a href="#" class="circle-tile-footer">Thông tin thêm <i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
<div style="max-width: 60%; max-height: 500px; float: left;">
    <canvas id="myChart" width="900" height="500"></canvas>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                datasets: [{
                    label: '# Tổng chi',
                    data: [12, 19, 3, 5, 2, 3, 3, 5, 6, 7, 8 ,11],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }, {
                    label: '# Tổng thu',
                    data: [15, 26, 7, 10, 6, 8, 9, 11, 13, 11, 12 ,16],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]

            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
</div>
<div style="max-width: 40%; max-height: 500px; float: left;">
    <canvas id="myChart1" width="600" height="500"></canvas>
    <script>
        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ["Đơn hàng thành công", "Đơn hàng thất bại", "Đơn hàng đang xử lý", "Đơn hàng"],
                datasets: [{
                    label: '# Tổng chi',
                    data: [20, 19, 11, 50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]

            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
</div>