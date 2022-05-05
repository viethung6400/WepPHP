<?php
session_start();
require_once("sql_connect.php");
?>
<!DOCTYPE html>

<html>

<head>
    <title>Shop bán hàng</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <!----Menu----->
    <div id="turn-on-menu">
        <img src="ima/btnDanhmuc.gif" alt="#" style="position:fixed; top: 50%;">
        <div id="menu" name="menu">
            <div class="menu-tide"><i class="fas fa-bars iconwhite"></i>
                <h4 style="color: white; display: inline;">Danh mục sản phẩm</h4>
            </div>
            <ul class="menu-ul"><?php
                                $loaihang = layloaihang($connect);
                                for ($i = 0; $i < count($loaihang); $i++) {
                                    echo '
                <li><a href="index.php?sp=' . $loaihang[$i]['MaLoaiHang'] . '"><i class="fas fa-splotch"></i>' . $loaihang[$i]['TenLoaiHang'] . '</a></li>';
                                }
                                ?>
            </ul>
        </div>
    </div>
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
                    <form action="" method="GET" class="search">
                        <input name="search-sp" type="text" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" class="search-btn"><i class="fas fa-search iconwhite"></i></button>
                    </form>
                </div>
                <div class="giohang keochuot"><a href="giohang.php">
                        <i class="iconwhite fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </header>
    <!----------Shopping-1--------------->
    <section class="shopping-1">
        <div class="row">
            <div id="section-shop1">
                <?php

                $query = "SELECT * FROM HangHoa;";
                if (isset($_GET['search-sp'])) {
                    $query = "SELECT * FROM `hanghoa` WHERE `TenHH` LIKE '%" . $_GET['search-sp'] . "%'";
                    echo '<div class="shop1-header">
                            <p class="tide-muc"><strong>Tìm kiếm: ' . $_GET['search-sp'] . '</strong></p>
                            </div>';
                } else {
                    if (isset($_GET['sp'])) {
                        $sp = $_GET['sp'];
                        $query = "SELECT * FROM HangHoa where MaLoaiHang = " . $sp . ";";
                        echo '<div class="shop1-header">
                            <p class="tide-muc"><strong>' . loaihang($sp, $connect) . '</strong></p>
                            </div>';
                    } else {
                        echo '<div class="shop1-header">
                            <p class="tide-muc"><strong>SẢN PHẨM HOT</strong></p>
                            </div>';
                    }
                }

                echo '<div class="shop1-list">';

                $result = mysqli_query($connect, $query);
                $data = array();
                while ($row = mysqli_fetch_array($result, 1)) {
                    $data[] = $row;
                }

                for ($i = 0; $i < count($data); $i++) {
                    $t = chuyentien($data[$i]['Gia']);
                    echo '
                            <div class="sp">
                                <a href="info_sp.php?sp=' . $data[$i]['MSHH'] . '">
                                    <div class="hinh"><img src="' . $data[$i]['Hinh'] . '" alt="SP"></div>
                                    <div class="infor">
                                        <div class="tensp">
                                            <p>' . $data[$i]['TenHH'] . '</p>
                                        </div>
                                        <span>
                                            <div class="tien-div">
                                                <p>' . $t . '</p>
                                                <p class="donvi">đ</p>
                                            </div>
                                            <div class="giam-div">Sale</div>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            ';
                }
                $connect->close();
                ?>
                <!--<div class="sp spxemthem"><button class="spbtn">XEM THÊM</button></div>-->
            </div>
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