<?php
session_start();
if (!isset($_SESSION['IDKHACHHANG'])) {
    header("Location: index.php");
    die();
}

require_once("sql_connect.php");

if (isset($_GET['sodonhuy'])) {
    $sodon = $_GET['sodonhuy'];
    huydonhang_khachhang($sodon, $connect);
    echo 'Bạn đã hủy số đơn: ' . $sodon;
    die();
}
if (isset($_GET['sdhuy_daxacnhan'])) {
    $sodon = $_GET['sdhuy_daxacnhan'];
    huydonhang_khachhang_daxacnhan($sodon, $connect);
    echo 'Bạn đã hủy số đơn: ' . $sodon;
    die();
}

$kh = $_SESSION['IDKHACHHANG'];
?>
<!DOCTYPE html>

<html>

<head>
    <title>Tài khoản - Đơn mua</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="CSS/donhang.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        function huydonhang(sodon) {
            $.get('taikhoan_kh.php', {
                'sodonhuy': sodon
            }, function(data) {
                alert(data)
                location.reload();
            });
        }

        function huydonhang_daxacnhan(sodon) {
            $.get('taikhoan_kh.php', {
                'sdhuy_daxacnhan': sodon
            }, function(data) {
                alert(data)
                location.reload();
            });
        }
    </script>
    <style>
        #taikhoan-section {
            display: flex;
            max-width: 1160px;
            margin: 0 auto;
        }

        .bar {
            margin-top: 70px;
            max-width: 200px;
            flex: 1;
        }

        .div-account {
            width: 140px;
            text-align: center;
            color: var(--color-1);
        }

        .div-account:hover {
            color: var(--color-3);
            cursor: pointer;
        }

        .div-account-icon {
            padding-left: 16px;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .div-account-name {
            width: 100%;
        }

        .work {
            margin-top: 40px;
        }

        .bar-ul {
            margin-left: 16px;
        }

        .bar-li {
            margin-top: 16px;
            margin-bottom: 16px;
        }

        .bar-li i {
            width: 22px;
            font-size: 24px;
        }

        .bar-li b {
            margin-left: 10px;
        }

        .li-tide {
            color: var(--color-5);
        }

        .li-tide:hover {
            color: var(--color-4);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-------Header------->
    <header>
        <div class="h-top">
            <div class="row">
                <?php
                if (isset($_SESSION['IDKHACHHANG'])) {
                    echo '
        <nav class="h-topleft">
            <a class="tiede keochuot" href="#"><i class="fas fa-question-circle iconwhite"><p>Hỗ trợ</p></i></a>
            <a class="tiede keochuot" href="adminlogin.php"><i class="fas fa-tasks iconwhite"><p>Quản lý</p></i></a>
        </nav>
        <nav class="h-topright">
            <a class="tiede keochuot" href="taikhoan_kh.php"><i class="far fa-user-circle iconwhite"><p>Tài khoản</p></i></a>
            <a class="tiede keochuot" href="sql_connect.php?sign_out=1"><i class="fas fa-sign-out-alt"><p>Đăng xuất</p></i></a>
        </nav>';
                } else {
                    echo '
        <nav class="h-topleft">
            <a class="tiede keochuot" href="#"><i class="fas fa-question-circle iconwhite"><p>Hỗ trợ</p></i></a>
            <a class="tiede keochuot" href="adminlogin.php"><i class="fas fa-tasks iconwhite"><p>Quản lý</p></i></a>
        </nav>
        <nav class="h-topright">
            <a class="tiede keochuot" href="login.php"><i class="fas fa-sign-in-alt iconwhite"><p>Đăng nhập</p></i></a>
            <a class="tiede keochuot" href="registration.php"><i class="fas fa-user-plus"><p>Đăng kí</p></i></a>
        </nav>';
                } ?>
            </div>
        </div>
        <div class="h-bottom">
            <div class="row">
                <a href="index.php"><img id="logo" src="ima/logo_bird.gif" alt="logo"></a>
                <div class="search">
                    <form #id="search" action="index.php" method="GET" class="search">
                        <input name="search-sp" type="text" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" class="search-btn" style="margin-top: 0px;"><i class="fas fa-search iconwhite"></i></button>
                    </form>
                </div>
                <div class="giohang keochuot"><a href="giohang.php">
                        <i class="iconwhite fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </header>
    <section id="taikhoan-section">
        <div id="bar" name="bar" class=bar>
            <div class="account">
                <div class="div-account">
                    <i class="fas fa-user-edit div-account-icon"></i>
                    <?php
                    $ten = tenkhachhang($kh, $connect);
                    echo '
                <p class="div-account-name">' . $ten . '</p>';
                    ?>
                </div>
            </div>
            <ul class="bar-ul">
                <li class="bar-li">
                    <a class="li-tide" style="color: var(--color-1);"><i class="fas fa-file-invoice-dollar"></i><b>Đơn mua</b></a>
                </li>
                <li class="bar-li">
                    <a href="thongtin_tk_kh.php" class="li-tide"><i class="fas fa-id-badge"></i><b>Tài khoản</b></a>
                </li>
                <li class="bar-li">
                    <a class="li-tide"><i class="fas fa-file-alt"></i><b>Còn nữa</b></a>
                </li>
            </ul>
        </div>
        <div id="work" class="work" style="background-color: rgba(205, 225, 243, 0);">
            <div class="div_donhang">
                <?php

                $donhang = laydonhang($kh, $connect);
                $khachhang = khachhang($kh, $connect);

                for ($i = count($donhang) - 1; $i >= 0; $i--) {

                    echo '
                <div class="donhang">
                    <div class="khachhang">
                        <div class="khachhang_left">
                        <h4>Số đơn: ' . $donhang[$i]['SoDonDH'] . '</h4>
                            <span>NV: ' . tennhanvien($donhang[$i]['MSNV'], $connect) . '</span>
                        </div>
                        <div class="khachhang_right">
                            <span><i class="fas fa-shipping-fast"></i>' . diachikhachhang($khachhang['MSKH'], $connect) . ' |</span>
                            <p>' . laytrangthaidonhang($donhang[$i]['SoDonDH'], $connect) . '</p>
                        </div>
                    </div>';

                    $chitiet = chitietdathang($donhang[$i]['SoDonDH'], $connect);

                    for ($j = 0; $j < count($chitiet); $j++) {

                        $hh = hanghoa($chitiet[$j]['MSHH'], $connect);
                        if ($hh == null)
                            continue;
                        echo '
                    <div class="chitietdathang">
                        <a href="info_sp.php?sp=' . $chitiet[$j]['MSHH'] . '" class="info">
                            <div class="info-ima">
                                <img src="' . $hh['Hinh'] . '" alt="photo">
                            </div>
                            <div class="detail">
                                <span>' . $hh['TenHH'] . '</span>
                                <p class="loaihang">' . loaihang($hh['MaLoaiHang'], $connect) . '</p>
                                <p class="sl">x ' . $chitiet[$j]['SoLuong'] . '</p>
                            </div>
                            </a>
                        <div class="gia">
                            <span>' . chuyentien($chitiet[$j]['GiaDatHang']) . 'đ</span>
                        </div>
                    </div>';
                    }

                    echo '
                    <div class="tongtien">
                        <span><i class="fas fa-hand-holding-usd"></i>Tổng số tiền: </span>
                        <h1>' . chuyentien(tongtiendohang($donhang[$i]['SoDonDH'], $connect)) . 'đ</h1>
                    </div>
                    <div class="nutxacnhan">
                        <span>Ngày ĐH: ' . $donhang[$i]['NgayDH'] . '
                        <br><span>Ngày ĐH: ' . $donhang[$i]['NgayGH'] . '</span></span>
                        <div>';
                    $tt = laytrangthaidonhang($donhang[$i]['SoDonDH'], $connect);
                    if ($tt == "Chờ xác nhận")
                        echo '<button class="xacnhan" value="' . $donhang[$i]['SoDonDH'] . '" onclick="huydonhang(' . $donhang[$i]['SoDonDH'] . ');">HỦY ĐƠN</button>';
                    if ($tt == "Đã xác nhận")
                        echo '<button class="xacnhan" value="' . $donhang[$i]['SoDonDH'] . '" onclick="huydonhang_daxacnhan(' . $donhang[$i]['SoDonDH'] . ');">HỦY ĐƠN</button>';
                    echo '
                        </div>
                    </div>
                </div>';
                }
                $connect->close();
                ?>
            </div>
        </div>
    </section>
    <!-------Fooder-Informaion---------->
    <section class="information">
        <div class="row">
            <div class="colinfo">
                <h5>CHĂM SÓC KHÁCH HÀNG</h5>
                <ul>
                    <li><a class="keochuot" href="#">Trung tâm trợ giúp</a></li>
                    <li><a class="keochuot" href="#">Shop blog</a></li>
                    <li><a class="keochuot" href="#">Shop mail</a></li>
                    <li><a class="keochuot" href="#">Hướng dẫn mua hàng</a></li>
                    <li><a class="keochuot" href="#">Hướng dẫn bán hàng</a></li>
                    <li><a class="keochuot" href="#">Thanh toán</a></li>
                    <li><a class="keochuot" href="#">Xu</a></li>
                    <li><a class="keochuot" href="#">Vận chuyển</a></li>
                    <li><a class="keochuot" href="#">Trả hàng & hoàn tiền</a></li>
                    <li><a class="keochuot" href="#">Chăm sóc khách hàng</a></li>
                    <li><a class="keochuot" href="#">Chính sách bảo hành</a></li>
                </ul>
            </div>
            <div class="colinfo">
                <h5>VỀ SHOP</h5>
                <ul>
                    <li><a class="keochuot" href="#">Giới thiệu về shop</a></li>
                    <li><a class="keochuot" href="#">Tuyển dụng</a></li>
                    <li><a class="keochuot" href="#">Điều khoản</a></li>
                    <li><a class="keochuot" href="#">Chính sách bảo mật</a></li>
                    <li><a class="keochuot" href="#">Chính hãng</a></li>
                    <li><a class="keochuot" href="#">Kênh người bán</a></li>
                    <li><a class="keochuot" href="#">Flash sales</a></li>
                    <li><a class="keochuot" href="#">Chương trình tiếp thị</a></li>
                    <li><a class="keochuot" href="#">Liên hệ với truyền thông</a></li>
                </ul>
            </div>
            <div class="colinfo">
                <h5>THANH TOÁN</h5>
                <p>
                    <img class="icon" src="ima/visa-2.svg" width="50" alt="#">
                    <img class="icon" src="ima/tra-gop-0.png" width="50" alt="#">
                    <img class="icon" src="ima/20201011055543!MoMo_Logo.png" width="50" alt="#">
                    <img class="icon" src="ima/ZaloPay-logo.png" width="50" alt="#">
                    <img class="icon" src="ima/tienmat.png" width="50" alt="#">
                </p>
            </div>
            <div class="colinfo">
                <h5>LIÊN KẾT</h5>
                <ul>
                    <li><i class="fab fa-facebook-square iconblack"></i><a class="keochuot" href="#">Facebook</a></li>
                    <li><i class="fab fa-instagram iconblack"></i><a class="keochuot" href="#">Instagram</a></li>
                    <li><i class="fab fa-youtube iconblack"></i><a class="keochuot" href="#">Youtube</a></li>
                </ul>
            </div>
            <div class="colinfo">
                <h5>TẢI ỨNG DỤNG</h5>
                <p>
                    <a href="#"><img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/appstore.png" width="134" alt=""></a>
                    <a href="#"><img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/playstore.png" width="134" alt=""></a>
                </p>
            </div>
        </div>
    </section>
    <!---------Footer-------------->
    <footer>
        <p>
            &copy; 2021 - Bùi Việt Anh - MSSV:B1805739
        </p>
    </footer>
</body>

</html>