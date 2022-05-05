<?php
session_start();
require_once("sql_connect.php");

if (!isset($_SESSION['TAIKHOAN'])) {
    header("Location: index.php");
    die();
}

$nv = $_SESSION['TAIKHOAN'];

if (isset($_GET['sodon'])) {
    $sodon = $_GET['sodon'];
    if(kiemtrasoluonghangkhidat($sodon,$connect)){
        xacnhandonhang($sodon,$nv,$connect);}
    else
        echo 'Đã hết hàng không thể đặt';
    die();
}
if (isset($_GET['sodonhuy'])) {
    $sodon = $_GET['sodonhuy'];
    huydonhang($sodon,$nv,$connect);
    echo 'Đã hủy đơn thành công';
    die();
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Danh sách đặt hàng</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="CSS/donhang.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        function xacnhan(sodon) {
            $.get('ds_hoadon.php', {
                'sodon': sodon
            }, function(data) {
                if(data.length>2){
                    alert(data);
                }     
                location.reload();
            });
        }
        function huydonhang(sodon) {
            $.get('ds_hoadon.php', {
                'sodonhuy': sodon
            }, function(data) {
                alert(data);
                location.reload();
            });
        }
    </script>

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
                            <li class="usecase"><a class="keochuot" href="ds_hoadon.php" style="color: var(--color-1);">- Duyệt hóa đơn</a></li>
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
        <div id="work" style="background-color: rgba(205, 225, 243, 0);">
            <div class="div_donhang">
                <?php
                $donhang = nhungdonhangchuaxacnhan($connect);

                for ($i = 0; $i < count($donhang); $i++) {
                    $khachhang = khachhang($donhang[$i]['MSKH'], $connect);
                    if ($khachhang == null) {
                        continue;
                    }
                    echo '
                <div class="donhang">
                    <div class="khachhang">
                        <div class="khachhang_left">
                            <h4><i class="fas fa-user-circle"></i>' . $khachhang['HoTenKH'] . '</h4>
                            <span><i class="fas fa-phone-square"></i>' . $khachhang['SoDienThoai'] . '</span>
                        </div>
                        <div class="khachhang_right">
                            <span><i class="fas fa-shipping-fast"></i>' . diachikhachhang($khachhang['MSKH'], $connect) . ' |</span>
                            <p>CHƯA XÁC NHẬN</p>
                        </div>
                    </div>';

                    $chitiet = chitietdathang($donhang[$i]['SoDonDH'], $connect);

                    for ($j = 0; $j < count($chitiet); $j++) {

                        $hh = hanghoa($chitiet[$j]['MSHH'], $connect);
                        if ($hh == null)
                            continue;
                        echo '
                    <div class="chitietdathang">
                        <div class="info">
                            <div class="info-ima">
                                <img src="' . $hh['Hinh'] . '" alt="photo">
                            </div>
                            <div class="detail">
                                <span>' . $hh['TenHH'] . '</span>
                                <p class="loaihang">' . loaihang($hh['MaLoaiHang'], $connect) . '</p>
                                <p class="sl">x ' . $chitiet[$j]['SoLuong'] . ' 
                                <span class="loaihang"> - Sản phẩm còn: '.soluonghanghoa($hh['MSHH'], $connect).'</span>
                                </p>
                            </div>
                        </div>
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
                        <span>Ngày ĐH:'.$donhang[$i]['NgayDH'].'
                        <br><span>Số Đơn: '.$donhang[$i]['SoDonDH'].'</span></span>
                        <div>
                            <button class="xacnhan" value="' . $donhang[$i]['SoDonDH'] . '" onclick="xacnhan(' . $donhang[$i]['SoDonDH'] . ');">XÁC NHẬN</button>
                            <button class="huy" value="' . $donhang[$i]['SoDonDH'] . '" onclick="huydonhang(' . $donhang[$i]['SoDonDH'] . ');">HỦY ĐƠN</button>
                        </div>
                    </div>
                </div>';
                }
                $connect->close();
                ?>
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