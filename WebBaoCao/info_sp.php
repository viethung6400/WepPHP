<?php
session_start();

require_once("sql_connect.php");


if(isset($_GET['sanpham']) && isset($_GET['soluong'])){

    if(!isset($_SESSION['IDKHACHHANG'])){
        echo 'Vui lòng đăng nhập';
        die;
    }

    $giamgia = 0;
    if(isset($_SESSION['giamgia'])){
        $giamgia = $_SESSION['giamgia'];
    }

    $sp = $_GET['sanpham'];
    $sl = $_GET['soluong'];

    setcookie('sanpham',$sp, time() + 24*60*60,"/");
    setcookie('soluong',$sl, time() + 24*60*60,"/");

    if(isset($_SESSION['IDKHACHHANG'])){
        $kh = $_SESSION['IDKHACHHANG'];

        $s = "select * from HangHoa where MSHH = " . $sp .";";
        $r = execute_row($s,$connect);
        $gia = $r['Gia'];
        $gia = $gia*$sl;
        

        $sql = "select * from DatHang where MSKH = " . $kh ." and TrangThai = 'Chưa đặt';";
        $row = execute_row($sql,$connect);

        if($row == null){
            $cre = "insert into DatHang(MSKH,MSNV,NgayDH,NgayGH,TrangThai) values(".$kh.",null,null,null,'Chưa đặt');" ;
            mysqli_query($connect,$cre);
        }

        $sql = "select * from DatHang where MSKH = " . $kh ." and TrangThai = 'Chưa đặt';";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);

        if($row != null){
            $soDH = $row['SoDonDH'];
            $insert = "insert into ChiTietDatHang values(".$soDH.",".$sp.",".$sl.",".$gia.",".$giamgia.");";
            try{
                mysqli_query($connect,$insert);
                echo 'Đã thêm vào giỏ';
            }
            catch(Exception $e){
                echo 'Bạn đã thêm mặt hàng này rồi';
            }
        }
        $connect->close();
    }
    die;
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Shop - sản phẩm</title>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="CSS/sanpham.css">
    <script type="text/javascript">
        function giam() {
            sl = document.getElementById('soluong');
            intsl = Number(sl.value);
            if (intsl > 1)
                intsl = intsl - 1;
            sl.value = intsl;
        }

        function tang() {
            sl = document.getElementById('soluong');
            intsl = Number(sl.value);
            intsl = intsl + 1;
            sl.value = intsl;
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
                <div class="giohang keochuot"><a href="giohang.php">
                        <i class="iconwhite fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </header>
    <?php
    if (isset($_GET['sp'])) {

        $sp = $_GET['sp'];
        $sql = "select * from HangHoa where MSHH = " . $sp . ";";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        if ($row == null) {
            header("location: index.php");
            die();
        }
        $sl = 1;

        echo '
    <section class="detail_sp">
        <div class="row khung_sp">
            <div class="sp_dathang">
                <div>
                    <img class="sp_image" src="' . $row['Hinh'] . '" alt="Item">
                </div>
                <div class="info_dathang">
                    <h2>' . $row['TenHH'] . '</h2>
                    <div class="loai">
                        <p>Loại: <a class="aloai" href="">' . loaihang($row['MaLoaiHang'], $connect) . '</a></p>
                    </div>
                    <div class="gia">
                        <p>' . chuyentien($row['Gia']) . ' đ</p>
                    </div>
                    <div>
                        <p>Số lượng</p>
                        <div class="sl" style="display: inline;">
                            <button onclick="giam();">-</button>
                            <input readonly type="text" value="' . $sl . '" name="soluong" id="soluong">
                            <button onclick="tang();">+</button>
                        </div>
                        <p>Có sẵn <b class="sl-conlai">' . $row['SoLuongHang'] . '</b> sản phẩm</p>
                    </div>
                    <div class="nut-dathang">';

                        if(soluonghanghoa($row['MSHH'],$connect)==0){
                            echo '
                            <button id="btnDH" type="submit" value="' . $sp . '" onclick="dathang()" disabled="disabled" style="background-color: var(--color-4);">
                            ĐẶT HÀNG
                        </button>
                            ';
                        }else
                        echo'<button id="btnDH" type="submit" value="' . $sp . '" onclick="dathang()">
                            ĐẶT HÀNG
                        </button>';


                    echo '</div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="chitiet row">
            <h3>THÔNG TIN CHI TIẾT</h3>
            <p>' . $row['QuyCach'] . '</p>
        </div>
        <div class="chitiet row">
            <h3>GHI CHÚ</h3>
            <p>' . $row['GhiChu'] . '</p>
        </div>
    </section>';
        $connect->close();
    }
    ?>
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
    <script type="text/javascript">
        function dathang() {
            sl = document.getElementById("soluong").value;
            sp = document.getElementById("btnDH").value;
            $.get('info_sp.php', {
                'soluong': sl,
                'sanpham': sp
            }, function(data) {
                alert(data);
                location.reload();
            });
        }
    </script>
</body>

</html>