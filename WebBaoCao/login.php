<?php
session_start();
sign_in();
function sign_in()
{
    if (!empty($_POST)) {
        $tk = $_POST['textboxTK'];
        $mk = $_POST['textboxPW'];
        require_once("sql_connect.php");

        $query = "SELECT * FROM KhachHang Where SoDienThoai='" . $tk . "' and Password=MD5('" . $mk . "');";
        $result = mysqli_query($connect, $query);
        $data = array();
        while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
        }

        $connect->close();

        if ($data != null && count($data) > 0) {
            $_SESSION['IDKHACHHANG'] = $data[0]['MSKH'];
            header("Location: index.php");
        }
    }
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Đăng nhập - Shop</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON"  HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/fromstyle.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <!-------Header----------->
    <header>
        <div class="h-top">
            <div class="row">
                <nav class="h-topleft">
                    <a class="tiede keochuot" href="#"><i class="fas fa-question-circle iconwhite">
                            <p>Hỗ trợ</p>
                        </i></a>
                    <a class="tiede keochuot" href="adminlogin.php"><i class="fas fa-tasks iconwhite">
                            <p>Quản lý</p>
                        </i></a>
                </nav>
                <nav class="h-topright">
                    <a class="tiede keochuot" href="login.php"><i class="fas fa-sign-in-alt iconwhite">
                            <p>Đăng nhập</p>
                        </i></a>
                    <a class="tiede keochuot" href="registration.php"><i class="fas fa-user-plus"><p>Đăng kí</p></i></a>
                </nav>
            </div>
        </div>
        <div class="h-bottom">
            <div class="row">
                <a href="index.php"><img id="logo" src="ima/logo_bird.gif" alt="logo"></a>
            </div>
        </div>
    </header>
    <!-------From-login--------->
    <section id="login">
        <div>
            <H1 style="color: white; height: 70px; line-height: 70px;">Chào mừng bạn đến với Shop! Đăng nhập ngay.</H1>
            <form id="loginfrom" method="POST" action="">
                <H1 style="color: black; height: 70px; line-height: 70px;">Đăng nhập tại đây</H1>
                <p>Tên đăng nhập* </p><input placeholder="Nhập số điện thoại" name="textboxTK" type="text"><br>
                <p>Mật khẩu* </p><input placeholder="Password" name="textboxPW" type="password"><br>
                <div class="btnDiv">
                    <button id="btnDangNhap" value="Dang nhap" type="submit">Đăng nhập</button>
                    <a href="registration.php"><button id="btnDangKy"><a href="registration.php" style="color: white;">Đăng ký</a></button></a>
                </div>
            </form>
        </div>
    </section>
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
    <footer>
        <p>
            &copy; 2021 - Bùi Việt Anh - MSSV:B1805739
        </p>
    </footer>
</body>

</html>