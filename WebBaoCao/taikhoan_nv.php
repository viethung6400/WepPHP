<?php
session_start();
require_once("sql_connect.php");

if (!isset($_SESSION['TAIKHOAN'])) {
    header("Location: index.php");
    die();
}

$nv = $_SESSION['TAIKHOAN'];

$ten = "";
$diachi = "";
if (isset($_POST['ten']) && isset($_POST['diachi'])) {
    $ten = $_POST['ten'];
    $diachi = $_POST['diachi'];
    if ($ten != "" && $diachi != "") {

        $sql = "update NhanVien set HoTenNV='" . $ten . "',DiaChi='" . $diachi . "' 
        where MSNV=" . $nv . ";";
        mysqli_query($connect, $sql);
    }
}

?>
<!DOCTYPE html>

<html>

<head>
    <title>Tài khoản thông tin cá nhân</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="CSS/formadmin.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>
        form {
            background-color: white;
            width: 770px;
            padding: 70px;
            margin-bottom: 40px;
        }

        input {
            border: none;
            width: auto;
        }

        .td-btn {
            padding: 0;
            background-color: white;
            color: var(--color-3);
        }

        .td-btn:hover {
            color: var(--color-5);
            background-color: white;
        }
    </style>
</head>

<body>
    <!-------Header------->
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
                    <a class="tiede keochuot" href="login.php"><i class="far fa-user-circle iconwhite">
                            <p>Tài khoản</p>
                        </i></a>
                    <a class="tiede keochuot" href="sql_connect.php?sign_out=1">Đăng xuất</a>
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
                            <li class="usecase"><a class="keochuot" href="danhsachkhachhang.php">- Xem danh sách khách
                                    hàng</a></li>
                        </ul>
                    </div>
                </li>
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-address-book"></i><b>Nhân viên</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="danhsachnhanvien.php">- Xem danh sách nhân
                                    viên</a></li>
                      
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="work" class="white-work">

            <form action="" method="POST">
                <h2>THÔNG TIN CÁC NHÂN</h2>
                <?php
                $row = nhanvien($nv, $connect);
                echo '
                    <span>Mã nhân viên: </span><input name="msnv" type="text" value="' . $row['MSNV'] . '" disabled="true"><br>
                    <span>Tài khoản: </span><input name="sdt" type="text" value="' . $row['SoDienThoai'] . '" disabled="true"><br>
                    <span>Họ và tên: </span><input name="ten" type="text" value="' . $row['HoTenNV'] . '"><br>
                    <span>Chức vụ: </span><input name="chucvu" type="text" value="' . $row['ChucVu'] . '" disabled="true"><br>
                    <span>Địa chỉ: </span><input name="diachi" value="' . $row['DiaChi'] . '" type="text"><br>
                    <button class="from-btn" type="submit">Lưu thay đổi</button>
                    <a href="" class="form-a-btn">Hủy bỏ thay đổi</a>
                    </form>';
                $connect->close();
                ?>

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