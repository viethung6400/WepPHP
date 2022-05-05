<?php
require_once("sql_connect.php");

if(isset($_POST['mskh'])){
    $mskh = $_POST['mskh'];
    require_once("sql_connect.php");

    $sql = 'delete from KhachHang where MSKH = '. $mskh.';';
    mysqli_query($connect,$sql);

    $connect->close();
    echo 'Xóa thành công';
    die;
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Quản lý - Khách hàng</title>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/tablestyle.css">
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
                            <li class="usecase"><a class="keochuot" href="danhsachkhachhang.php" style="color: var(--color-1);">- Xem danh sách khách
                                    hàng</a></li>
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
        <div id="work">
            <div class="search">
                <form action="" method="GET" class="search">
                    <input name="search" type="text" placeholder="Tìm tên khách hàng">
                    <button type="submit" class="search-btn"><i class="fas fa-search iconwhite"></i></button>
                </form>
            </div>
            <div class="edit">
                <table>
                    <tr>
                        <th>Mã khách hàng</th>
                        <th>Họ và tên</th>
                        <th>Tên công ty</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                    </tr>
                    <?php

                    $sql = "select * from KhachHang";
                    if (isset($_GET['search'])) {
                        $sql = "select * from KhachHang where `HoTenKH` LIKE '%" . $_GET['search'] . "%'";
                    }
                    $result = mysqli_query($connect, $sql);
                    $data = array();
                    while ($row = mysqli_fetch_array($result)) {
                        $data[] = $row;
                    }

                    for ($i = 0; $i < count($data); $i++) {
                        echo '<tr>
                            <td>' . $data[$i]['MSKH'] . '</td>
                            <td>' . $data[$i]['HoTenKH'] . '</td>
                            <td>' . $data[$i]['TenCongTy'] . '</td>
                            <td>' . $data[$i]['Email'] . '</td>
                            <td>' . $data[$i]['SoDienThoai'] . '</td>
                            <td>' . diachikhachhang($data[$i]['MSKH'], $connect) . '</td>
                            <td class="table-nut"><a href="">
                            <button class="btnDelete" onclick="deleteNV(' . $data[$i]['MSKH'] . ');"><i class="fas fa-ban">Xóa</i></button>
                            </a></td>
                        </tr>';
                    }
                    $connect->close();
                    ?>
                </table>
            </div>
        </div>
        <script type="text/javascript">
            function deleteNV(id) {
                option = confirm('Bạn có muốn xóa');
                if (!option) {
                    return;
                } else {
                    $.post('danhsachkhachhang.php', {
                        'mskh': id
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