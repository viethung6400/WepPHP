<?php
session_start();

require_once("sql_connect.php");
if (!isset($_SESSION['IDKHACHHANG'])) {
    header("Location: login.php");
    die();
}
//Cập nhật số lượng
if (isset($_POST['soluong']) && isset($_POST['sanpham']) && isset($_POST['sodondh'])) {
    $sl = $_POST['soluong'];
    $sp = $_POST['sanpham'];
    $sodon = $_POST['sodondh'];
    $gia = giahang($sp, $connect); //Lấy giá của mặt hàng

    $sql = "update ChiTietDatHang set SoLuong = " . $sl . ",GiaDatHang=" . $gia * $sl . " where MSHH = " . $sp . " and SoDonDH = " . $sodon . " ;";
    mysqli_query($connect, $sql);
    $connect->close();
    die;
}
//Xóa 1 sản phẩm trong đơn đặt hàng
if (isset($_POST['sanpham']) && isset($_POST['sodondh'])) {
    $sp = $_POST['sanpham'];
    $sodon = $_POST['sodondh'];

    $sql = "delete from ChiTietDatHang where MSHH = " . $sp . " and SoDonDH = " . $sodon . " ;";
    mysqli_query($connect, $sql);
    $connect->close();
    die;
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Giỏ hàng</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/sanpham.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        function giam(sodon, mshh, sl) {
            intsl = sl;
            if (intsl > 1)
                intsl = intsl - 1;
            sl = intsl;
            $.post('giohang.php', {
                'soluong': sl,
                'sanpham': mshh,
                'sodondh': sodon
            }, function(data) {
                location.reload();
            });
        }

        function tang(sodon, mshh, sl) {
            intsl = sl;
            intsl = intsl + 1;
            sl = intsl;
            $.post('giohang.php', {
                'soluong': sl,
                'sanpham': mshh,
                'sodondh': sodon
            }, function(data) {
                location.reload();
            });
        }

        function xoa(sodon, mshh) {
            $.post('giohang.php', {
                'sanpham': mshh,
                'sodondh': sodon
            }, function(data) {
                location.reload();
            });
        }
    </script>
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
                    <form action="index.php" method="GET" class="search">
                        <input name="search-sp" type="text" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" class="search-btn"><i class="fas fa-search iconwhite"></i></button>
                    </form>
                </div>
                <div class="giohang keochuot">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Giỏ hàng</p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="row div_giohang">
            <h1 class="div_giohang_tieude">GIỎ HÀNG </h1>
            <table class="table_giohang">
                <tr class="trtieude">
                    <th></th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th></th>
                </tr>
                <?php
                $tongsotien = 0;
                $so_don_dh = -1;
                if (isset($_SESSION['IDKHACHHANG'])) {
                    $kh = $_SESSION['IDKHACHHANG'];

                    $ctdh = giohang($kh, $connect);

                    for ($i = 0; $i < count($ctdh); $i++) {
                        $so_don_dh = $ctdh[$i]['SoDonDH'];

                        $select = "select * from HangHoa where MSHH=" . $ctdh[$i]['MSHH'] . " ;";
                        $row = execute_row($select, $connect);

                        $tongtien = $ctdh[$i]['SoLuong'] * $row['Gia'];
                        $tongsotien += $tongtien;

                        echo '
                    <tr>
                    <td class="td1"><img class="giohang_image" src="' . $row['Hinh'] . '" alt="Hinh"></td>
                    <td class="td2"><p>' . $row['TenHH'] . '</p></td>
                    <td class="td3"><p>' . chuyentien($row['Gia']) . ' đ</p></td>
                    <td class="td4">
                        <div class="sl" style="display: inline;">
                            <button onclick="giam(' . $ctdh[$i]['SoDonDH'] . ',' . $ctdh[$i]['MSHH'] . ',' . $ctdh[$i]['SoLuong'] . ');">-</button>
                            <input readonly type="text" value="' . $ctdh[$i]['SoLuong'] . '" name="soluong" id="soluong">
                            <button onclick="tang(' . $ctdh[$i]['SoDonDH'] . ',' . $ctdh[$i]['MSHH'] . ',' . $ctdh[$i]['SoLuong'] . ');">+</button>
                        </div>
                    </td>
                    <td class="td5"><p>' . chuyentien($tongtien) . ' đ</p></td>
                    <td class="td6"><button class="btn_xoa" onclick="xoa(' . $ctdh[$i]['SoDonDH'] . ',' . $ctdh[$i]['MSHH'] . ');"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>';
                    }
                    $connect->close();
                }
                ?>
            </table>
        </div>
    </section>
    <div class="chotdon">
        <form action="xacnhandathang.php" id="form_chotdon" method="GET">
            <?php
            try {
                echo '
                <p>Tổng đơn hàng: ' . chuyentien($tongsotien) . ' đ</p>
                <button name="sodon" value="' . $so_don_dh . '" type="submit">ĐẶT HÀNG</button>';
            } catch (Exception) {
                echo '
                <p>Tổng đơn hàng: 0 đ</p>
                <button name="sodon" value="0" type="submit">ĐẶT HÀNG</button>';
            }
            ?>
        </form>
    </div>
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