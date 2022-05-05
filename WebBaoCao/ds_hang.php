<?php
require_once("sql_connect.php");
if(isset($_POST['mshh'])){
    $m = $_POST['mshh'];
    require_once("sql_connect.php");

    $sql = 'delete from HangHoa where MSHH = '. $m.';';
    mysqli_query($connect,$sql);

    
    $connect->close();
    echo 'Xóa thành công';
    die;
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>Quản lý - Hàng hóa</title>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/tablestyle.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>
        .anh {
            width: auto;
            height: auto;
            max-width: 70px;
            max-height: 70px;
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
                            <li class="usecase"><a class="keochuot" href="#" style="color: var(--color-1);">- Xem kho</a></li>
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
                            <li class="usecase"><a class="keochuot" href="danhsachnhanvien.php">- Xem danh sách nhân viên</a></li>
                            
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="work">
            <div class="search">
            <form action="ds_hang.php" method="GET" class="search">
                        <input name="search" type="text" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" class="search-btn"><i class="fas fa-search iconwhite"></i></button>
                    </form>
            </div>
            <div class="edit">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Loại hàng</th>
                        <th>Giá</th>
                        <th>SL</th>
                    </tr>
                    <?php

                    $sql = "select * from HangHoa";
                    if(isset($_GET['search'])){
                        $sql = "select * from HangHoa where `TenHH` LIKE '%".$_GET['search']."%'";
                    }
                    $result = mysqli_query($connect, $sql);
                    $data = array();
                    while ($row = mysqli_fetch_array($result, 1)) {
                        $data[] = $row;
                    }

                    for ($i = 0; $i < count($data); $i++) {
                        echo '<tr>
                            <td>' . $data[$i]['MSHH'] . '</td>
                            <td><img class="anh" src="' . $data[$i]['Hinh'] . '" alt="photo"></td>
                            <td>' . $data[$i]['TenHH'] . '</td>
                            <td>' . loaihang($data[$i]['MaLoaiHang'], $connect) . '</td>
                            <td>' . $data[$i]['Gia'] . '</td>
                            <td>' . $data[$i]['SoLuongHang'] . '</td>
                            <td class="table-nut"><a href="suahang.php?id=' . $data[$i]['MSHH'] . '">
                                <button class="btnUpdate"><i class="far fa-edit">Sửa</i></button>
                            </a></td>
                            <td class="table-nut"><a href="">
                            <button class="btnDelete" onclick="deleteNV(' . $data[$i]['MSHH'] . ');"><i class="fas fa-ban">Xóa</i></button>
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
                    $.post('ds_hang.php', {
                        'mshh': id
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