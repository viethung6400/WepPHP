<?php
session_start();

require_once("sql_connect.php");

if (isset($_POST['id'])) {
    $manv = $_POST['id'];
    require_once("sql_connect.php");

    $sql = 'delete from NhanVien where MSNV = ' . $manv . ';';
    mysqli_query($connect, $sql);

    $connect->close();
    echo 'Xóa thành công';
    die;
} else {
    if (($_POST != null)) {
        if (isset($_POST['hoten'])) {
            $name = $_POST['hoten'];
            $pass = $_POST['password'];
            $cv = $_POST['chucvu'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];

            $sql = "insert into NhanVien(Password,HoTenNV,ChucVu,DiaChi,SoDienThoai) values(MD5('" . $pass . "'),'" . $name . "','" . $cv . "','" . $diachi . "','" . $sdt . "');";
            mysqli_query($connect, $sql);
            $connect->close();
            header("Location: danhsachnhanvien.php");
            die;
        }
    }
}


?>
<!DOCTYPE html>

<html>

<head>
    <title>Xem nhân viên</title>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/tablestyle.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="CSS/formadmin.css">
    <style>
        .msnv {
            width: 20px;
        }

        .form_add_nv {
            margin-left: 10px;
            width: 300px;
            background-color: white;
            padding-top: 10px;
            padding-left: 10px;
            padding-bottom: 30px;
        }

        .form_add_nv input {
            width: 270px;
        }

        .table-nut {
            width: 10px;
        }

        .search-btn {
            margin: 0px;
        }

        .search-btn:hover {
            color: var(--color-1);
            background-color: rgba(0, 0, 0, 0.0);
        }
    </style>
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
                    <a class="tiede keochuot" href="sql_connect.php?sign_out=1"><i class="fas fa-sign-out-alt">
                            <p>Đăng xuất</p>
                        </i></a>
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
                            <li class="usecase"><a class="keochuot" href="" style="color: var(--color-1);">- Xem danh sách nhân viên</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="work">
            <div class="search">
                <form action="" method="GET" class="search">
                    <input name="search" type="text" placeholder="Tìm tên nhân viên">
                    <button type="submit" class="search-btn"><i class="fas fa-search iconwhite"></i></button>
                </form>
            </div>
            <div class="edit">
                <table>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Họ và tên</th>
                        <th>Chức vụ</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>
                    <?php

                    $sql = "select * from NhanVien";
                    if (isset($_GET['search'])) {
                        $sql = "select * from NhanVien where `HoTenNV` LIKE '%" . $_GET['search'] . "%'";
                    }
                    $result = mysqli_query($connect, $sql);
                    $data = array();
                    while ($row = mysqli_fetch_array($result)) {
                        $data[] = $row;
                    }

                    for ($i = 0; $i < count($data); $i++) {
                        echo '<tr>
                            <td class="msnv">' . $data[$i]['MSNV'] . '</td>
                            <td>' . $data[$i]['HoTenNV'] . '</td>
                            <td>' . $data[$i]['ChucVu'] . '</td>
                            <td>' . $data[$i]['DiaChi'] . '</td>
                            <td>' . $data[$i]['SoDienThoai'] . '</td>
                            <td class="table-nut"><a href="suanhanvien.php?id=' . $data[$i]['MSNV'] . '">
                                <button class="btnUpdate"><i class="fas fa-pen"></i></button>
                            </a></td>
                            <td class="table-nut"><a href="">
                            <button class="btnDelete" onclick="deleteNV(' . $data[$i]['MSNV'] . ');"><i class="fas fa-ban"></i></button>
                            </a></td>
                        </tr>';
                    }
                    $connect->close();
                    ?>
                </table>
            </div>
        </div>
        <div class="add_nv">
            <form class="form_add_nv" action="" method="POST">
                <h2>Thêm mới nhân viên</h2>
                <p>Họ và tên </p><input name="hoten" type="text">
                <p>Password </p><input name="password" type="text">
                <p>Địa chỉ </p><input name="diachi" type="text">
                <p>Chức vụ </p><input name="chucvu" type="text">
                <p>Số điện thoại </p><input name="sdt" type="text"><br>
                <button class="from-btn" type="submit">Thêm nhân viên</button>
            </form>
        </div>
        <script type="text/javascript">
            function deleteNV(id) {
                option = confirm('Bạn có muốn xóa');
                if (!option) {
                    return;
                } else {
                    $.post('danhsachnhanvien.php', {
                        'id': id
                    }, function(data) {
                        alert(data);
                        location.reload();
                    });
                }
            }
        </script>
    </section>
    <!---------Footer-------------->
    <footer>
        <p>
            &copy; 2021 - Bùi Việt Anh - MSSV:B1805739
        </p>
    </footer>
</body>

</html>