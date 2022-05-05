<?php
if (($_POST != null) && isset($_GET['id'])) {

    require_once("sql_connect.php");

    $ma = $_GET['id'];
    $name = $_POST['ten'];

    $sql = "update LoaiHangHoa set 
            TenLoaiHang='" . $name . "'
            where MaLoaiHang=" . $ma . ";";
    mysqli_query($connect, $sql);
    $connect->close();
    header("Location: loaihang.php");
    die();
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Sửa loại hàng hóa</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/formadmin.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <!-------Header-------->
    <header>
        <div class="h-top">
            <div class="row">
                <nav class="h-topleft">
                    <a href="index.php"><img id="logo" src="ima/logo_bird.gif" alt="logo"></a>
                    <h2>Administration</h2>
                </nav>
                <nav class="h-topright">
                    <a class="tiede keochuot" href="#"><i class="fas fa-question-circle iconwhite">
                            <p>Hỗ trợ</p>
                        </i></a>
                    <a class="tiede keochuot" href="index.php"><i class="fas fa-home iconwhite">
                            <p>Trang chủ</p>
                        </i></a>
                    <a class="tiede keochuot" href="taikhoan_nv.php"><i class="far fa-user-circle iconwhite">
                            <p>Tài khoản</p>
                        </i></a>
                    <a class="tiede keochuot" href="sql_connect.php?sign_out=1"><i class="fas fa-sign-out-alt"><p>Đăng xuất</p></i></a>
                </nav>
            </div>
        </div>
    </header>
    <section id="admin-section">
        <div id="bar" name="bar">
            <ul class="bar-ul">
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-shopping-basket"></i><b>Hàng hóa</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="ds_hang.php">- Xem kho</a></li>
                            <li class="usecase"><a class="keochuot" href="themhang.php">- Thêm sản phẩm</a></li>
                            <li class="usecase"><a class="keochuot" href="loaihang.php">- Loại hàng</a></li>
                            <li class="usecase"><a class="keochuot" href="ds_hoadon.php">- Duyệt hóa đơn</a></li>
                        </ul>
                    </div>
                </li>
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-user-edit"></i><b>Khách hàng</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="danhsachkhachhang.php">- Xem danh sách khách hàng</a></li>
                        </ul>
                    </div>
                </li>
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-address-book"></i><b>Nhân viên</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="danhsachnhanvien.php">- Xem danh sách nhân viên</a></li>
                     
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="work" style="padding-left: 40px;">
            <form action="" method="POST">
                <h2>Sửa đổi loại hàng</h2>
                <?php
                if (isset($_GET['id'])) {

                    require_once("sql_connect.php");
                    $ma = $_GET['id'];
                    $sql = 'select * from LoaiHangHoa where MaLoaiHang = ' . $ma . ';';
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $connect->close();
                    if($row == null){
                        header("Location: loaihang.php");
                        die();
                    }

                    echo '
                    <p>Mã loại hàng </p><input name="ma" value="' . $row['MaLoaiHang'] . '" type="text" disabled="true">
                    <p>Tên loại hàng hóa </p><input name="ten" value="' . $row['TenLoaiHang'] . '" type="text"><br>
                    <button class="from-btn" type="submit">Xác nhận</button>';
                }
                ?>
                <a href="loaihang.php" class="form-a-btn">Hủy bỏ</a>
            </form>
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