<?php

require_once("./Show.php");
$connect = new mysqli('localhost','root', '', 'quanlydathang');
if (!isset($_SESSION['IDNHANVIEN'])) {
    header("Location: Login_admin.php");
    die();
}

$nv = $_SESSION['IDNHANVIEN'];

if(isset($_GET['iddh']))
{
    if(isset($_POST['xđ']) && isset($_POST['xđ'])=="XacNhan"){
        $sodon = $_GET['iddh'];
    if(kiemtrasoluonghangkhidat($sodon,$connect)){
        xacnhandonhang($sodon,$nv,$connect);}
    else
        alert('Đã hết hàng không thể đặt');
    
    }
    if(isset($_POST['cancel']) && isset($_POST['cancel'])=="Huy"){
        $sodon = $_GET['iddh'];
        huydonhang($sodon,$nv,$connect);
       alert('Đã hủy đơn thành công');
    }
    header("Location: Browse_bill.php");
    die();
}

?>

<html>

<head>
    <title>Danh sách đặt hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./StyleAdmin.css">
    <link rel="stylesheet" href="../Users/fontawesome/css/all.css">
    <style>
        #admin-section{
            margin: 0;
            margin-top: 140px;
            width: 100%;
            height: auto;
            display: flex;
        }
        .khachhang{
            display: flex;
            justify-content: space-between;

        }
        .khachhang_right{
            right: 0;
        }
        .info-ima img{
            max-width: 70px;
            max-height: 70px;
            width: auto;
            height: auto;
        }
        .khachhang_left h4{
            margin-top: 0;
            margin-bottom: 16px;
        }
        .chitietdathang{
            width: auto;
            height: auto;
            display: flex;
            border-top: solid 1px rgb(116, 116, 116);
            
        }
        .info-dh{
            width: auto;
            display: flex;
        }
        .detail{
            width: 300px;
            margin-left: 75px;
        }
        .gia{
            
            align-self:  center;
        }
        .tongtien{
            display: flex;
            justify-content: flex-end;
            border-top: solid 1px rgb(116, 116, 116);
            border-bottom: solid 1px rgb(116, 116, 116);
            margin-bottom: 7px;
        }
        .tongtien span{
            margin-top: 18px;
            margin-right: 10px;
        }
        .tongtien h1{

            color: red;
        }
        #work{
            width: auto;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            font-size: 12px;
            margin-left: 300px
        }
        .nutxacnhan{
            display: flex;
            justify-content: space-between;
        }
        .nutxacnhan button {
            border: solid 1px black;
            background-color: white;
        }
        .nutxacnhan button:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }
        .donhang{
            margin-bottom: 30px;
            padding: 25px;
            background-color: blanchedalmond;
        }
    </style>
</head>

<body>
    <header>
    <?php
               
        show_header();
    ?>
    </header>
    <section id="admin-section">
        
           <ul class="List-DMSP">
                <div class="DMSP">HÀNG HÓA</div>
              
                <li ><a href='Browse_bill.php'  style='color:black'>Duyệt Hóa Đơn</a></li>
                <li ><a href=''  style='color:black'>Cập Nhật Sản Phẩm</a></li>
                <li ><a href=''  style='color:black'>Cập Nhật Loại Sản Phẩm</a></li>

            </ul>
    
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
                            <span><i class="fas fa-shipping-fast"></i>' . diachikhachhang($khachhang['MSKH'], $connect) . ' </span>
                            <p style="color:red">CHƯA XÁC NHẬN</p>
                        </div>
                    </div>';

                    $chitiet = chitietdathang($donhang[$i]['SoDonDH'], $connect);

                    for ($j = 0; $j < count($chitiet); $j++) {

                        $hh = hanghoa($chitiet[$j]['MSHH'], $connect);
                        if ($hh == null)
                            continue;
                        echo '
                    <div class="chitietdathang">
                        <div class="info-dh">
                            <div class="info-ima">
                                <img src="' . $hh['Hinh'] . '" alt="photo">
                            </div>
                            <div class="detail">
                                <span>' . $hh['TenHH'] . '</span>
                                <p class="loaihang">Loại: ' . loaihang($hh['MaLoaiHang'], $connect) . '</p>
                                <p class="sl">x ' . $chitiet[$j]['SoLuong'] . ' 
                                <span class="loaihang"> - Sản phẩm</span>
                                </p>
                            </div>
                        </div>
                        <div class="gia">
                            <span>' . change_format($chitiet[$j]['GiaDatHang']) . 'đ</span>
                        </div>
                    </div>';
                    }

                    echo '
                    <div class="tongtien">
                        <span><i class="fas fa-hand-holding-usd"></i>Tổng số tiền: </span>
                        <h1>' . change_format(tongtiendohang($donhang[$i]['SoDonDH'], $connect)) . 'đ</h1>
                    </div>
                    <div class="nutxacnhan">
                        <span>Ngày ĐH:'.$donhang[$i]['NgayDH'].'
                        <br><span>Số Đơn: '.$donhang[$i]['SoDonDH'].'</span></span>
                        <form action="Browse_bill.php?iddh='.$donhang[$i]['SoDonDH'].'" method="post">
                            <button class="xacnhan" value="XacNhan" name="xđ">XÁC NHẬN</button>
                            <button class="huy" value="Huy" name="cancel">HỦY ĐƠN</button>
                        </form>
                    </div>
                </div>';
                }
                $connect->close();
                ?>
            </div>
        </div>
    </section>
    <div class="end">
            <?php
              show_end();
            ?>
    </div>

</body>

</html>