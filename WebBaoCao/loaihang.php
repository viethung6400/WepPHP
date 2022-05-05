<?php
session_start();
require_once("sql_connect.php");

if(isset($_GET['delete_loaihang'])){
    $m = $_GET['delete_loaihang'];

    $sql = 'delete from LoaiHangHoa where MaLoaiHang = '. $m.';';
    mysqli_query($connect,$sql);
    header("Location: loaihang.php");
}else{
    if ($_POST != null) {
        if(isset($_POST['ten'])){
            $name = $_POST['ten'];
    
            $sql = "insert into LoaiHangHoa(TenLoaiHang) 
            values('" . $name . "');";
            mysqli_query($connect, $sql);
        }
    }
}

?>
<!DOCTYPE html>

<html>

<head>
    <title>Xem loại hàng</title>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/tablestyle.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="CSS/formadmin.css">
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
                            <li class="usecase"><a class="keochuot" href="loaihang.php" style="color: var(--color-1);">- Loại hàng</a></li>
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
        <div id="work">
            <div class="edit">
                <h2>LOẠI HÀNG</h2>
                <table>
                    <tr>
                        <th  class="table-ma">Mã loại hàng</th>
                        <th>Tên loại hàng</th>
                    </tr>
                    <?php

                    $s = "select * from LoaiHangHoa";
                    $data = execute_data($s,$connect);

                    for ($i = 0; $i < count($data); $i++) {
                        echo '<tr>
                            <td>' . $data[$i]['MaLoaiHang'] . '</td>
                            <td>' . $data[$i]['TenLoaiHang'] . '</td>
                            <td class="table-nut"><a href="sualoaihang.php?id='.$data[$i]['MaLoaiHang'].'">
                                <button class="btnUpdate"><i class="fas fa-pen">Sửa</i></button>
                            </a></td>
                            <td class="table-nut"><a href="loaihang.php?delete_loaihang='.$data[$i]['MaLoaiHang'].'">
                            <button class="btnDelete" ><i class="fas fa-ban">Xóa</i></button>
                            </a></td>
                        </tr>';
                    }
                    $connect->close();
                    ?>
                </table>
            </div>
            <form action="" method="POST" style="margin-top: 20px;">
                <h2>Thêm mới loại hàng hóa</h2>
                <p>Tên loại hàng </p><input name="ten" type="text"><br>
                <button class="from-btn" type="submit">Thêm</button>
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