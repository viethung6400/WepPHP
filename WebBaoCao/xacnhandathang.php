<?php
session_start();
if (!isset($_SESSION['IDKHACHHANG'])) {
    header("Location: index.php");
    die();
}
$sodon = 0;
if (isset($_GET['sodon'])) {
    $sodon = $_GET['sodon'];
}

$kh = $_SESSION['IDKHACHHANG'];
require_once("sql_connect.php");

//Cập nhật địa chỉ
if (isset($_POST['diachi'])) {
    $diachi = $_POST['diachi'];
    if (diachikhachhang($kh, $connect) == 'null') {
        $sql = "insert into DiaChiKH(DiaChi,MSKH) values('" . $diachi . "'," . $kh . ");";
        mysqli_query($connect, $sql);
    } else {
        $sql = "update DiaChiKH set DiaChi='" . $diachi . "' where MSKH=" . $kh . ";";
        mysqli_query($connect, $sql);
    }
}
//Nhấn nút Đặt hàng
if (isset($_GET['dathang'])) {
    $sodon = $_GET['dathang'];
    if (strlen(diachikhachhang($kh, $connect)) > 5) {
        echo 'Dat hang: ' . $_GET['dathang'];
        $sodon = $_GET['dathang'];
        require_once("sql_connect.php");
        $sql = "update DatHang set TrangThai='Chờ xác nhận',NgayDH=CURRENT_DATE where SoDonDH = " . $sodon . ";";
        mysqli_query($connect, $sql);
        $connect->close();
        header("Location: index.php");
        die();
    } else {
        echo '
        <script>
        alert("Xin hãy nhập địa chỉ");
        </script>';
        header("Location: xacnhandathang.php?sodon=" . $sodon);
        die();
    }
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Xác nhận đặt hàng</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="CSS/formadmin.css">
</head>

<body>
    <!----Menu----->
    <div id="turn-on-menu">
        <img src="ima/btnDanhmuc.gif" alt="#" style="position:fixed; top: 50%;">
        <div id="menu" name="menu">
            <div class="menu-tide"><i class="fas fa-bars iconwhite"></i>
                <h4 style="color: white; display: inline;">Danh mục sản phẩm</h4>
            </div>
            <ul class="menu-ul">
                <li>
                    <a href="#"><i class="fas fa-tshirt"></i>Thời trang - Phụ kiện</a>
                    <div class="subli" style="background-color: rgb(230, 230, 230);">
                        <div class="subli-div">
                            <h5 style="text-align: center; margin-top: 8px; margin-bottom: 6px;">Thời trang nữ</h5>
                            <ul>
                                <li><a href="#">Áo Croptop nữ</a></li>
                                <li><a href="#">Váy</a></li>
                                <li><a href="#">Đầm</a></li>
                                <li><a href="#">Vớ nữ</a></li>
                                <li><a href="#">Túi xách nữ</a></li>
                            </ul>
                        </div>
                        <div class="subli-div">
                            <h5 style="text-align: center; margin-top: 8px; margin-bottom: 6px;">Thời trang nam</h5>
                            <ul>
                                <li><a href="#">Áo khoác nam</a></li>
                                <li><a href="#">Áo sơ mi nam</a></li>
                                <li><a href="#">Quần nam</a></li>
                                <li><a href="#">Nón kết</a></li>
                                <li><a href="#">Túi đeo chéo</a></li>
                                <li><a href="#">Giày thể thao</a></li>
                            </ul>
                            <h5 style="text-align: center; margin-top: 8px; margin-bottom: 6px;">Áo cặp</h5>
                            <ul>
                                <li><a href="#">Áo khoác</a></li>
                                <li><a href="#">Áo thung</a></li>
                                <li><a href="#">Nón</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="#"><i class="fas fa-bed"></i>Nhà cửa đời sống</a></li>
                <li><a href="#"><i class="fas fa-tv"></i>Điện tử - Điện lạnh</a></li>
                <li><a href="#"><i class="fas fa-mobile-alt"></i>Điện thoạt - Máy tính bảng</a></li>
                <li><a href="#"><i class="fas fa-motorcycle"></i>Xe máy, ô tô, xe đạp</a></li>
                <li><a href="#"><i class="fas fa-credit-card"></i>Voucher - Thẻ cào</a></li>
                <li><a href="#"><i class="fas fa-bed"></i>Nhà cửa đời sống</a></li>
                <li><a href="#"><i class="fas fa-tv"></i>Điện tử - Điện lạnh</a></li>
                <li><a href="#"><i class="fas fa-mobile-alt"></i>Điện thoạt - Máy tính bảng</a></li>
                <li><a href="#"><i class="fas fa-motorcycle"></i>Xe máy, ô tô, xe đạp</a></li>
                <li><a href="#"><i class="fas fa-credit-card"></i>Voucher - Thẻ cào</a></li>
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
                    <form action="index.php" method="GET" class="search">
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
    <section>
        <div id="work" class="work_diachi row">
            <?php
            $row = khachhang($kh, $connect);

            echo '
            <div class="div_diachi">
                <form action="" method="POST" id="form_diachi">
                    <h2>ĐỊA CHỈ</h2>
                    <p>Địa chỉ giao hàng(*) </p><input name="diachi" type="text" value="' . diachikhachhang($kh, $connect) . '"><br>
                    <button class="from-btn" type="submit">CẬP NHẬT ĐỊA CHỈ</button>
                </form>
            </div>
            <form action="" method="GET" id="form_xacnhandathang">
                <h2>ĐẶT HÀNG</h2>';

            echo '
                <div class="khachhang">
                    <h4>Khách hàng: ' . $row['HoTenKH'] . '</h4>
                    <p>SĐT: ' . $row['SoDienThoai'] . '</p>
                    <p>Địa chỉ: ' . diachikhachhang($kh, $connect) . '</p>
                </div>';

            $data = giohang($kh, $connect);
            for ($i = 0; $i < count($data); $i++) {
                echo '
            <div class="cacmathang">
                <p class="tenhang">Tên hàng: ' . tenhang($data[$i]['MSHH'], $connect) . '</p>
                <div>
                    <p>Số lượng: ' . $data[$i]['SoLuong'] . '</p>
                    <p>Giá: ' . chuyentien($data[$i]['GiaDatHang']) . 'đ</p>
                </div>
            </div>';
            }
            $tongtien = tongtiendohang($sodon, $connect);
            echo '
            <div class="tongtienthanhtoan">
                <h3>Tổng tiền: ' . chuyentien($tongtien) . 'đ</h3>
            </div>
            <button class="from-btn" type="submit" name="dathang" value="' . $sodon . '">ĐẶT HÀNG</button>
            </form>';
            $connect->close();
            ?>
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