<?php
    // session_start();
    require_once("./Show.php");
    if (!isset($_SESSION['IDKHACHHANG'])) {
        header("Location: Login_user.php");
        die();
    }
    $connect = new mysqli('localhost','root', '', 'quanlydathang');

    
    if(isset($_GET['action']) && isset($_GET['idhd']) && isset($_GET['mshh']))
    {
        
        if($_GET['action']=="update") {
            // var_dump($_POST);exit;
            if(isset($_POST['soluong']))
            {
                foreach($_POST['soluong'] as $id => $soluong)
                {
                    if($id==$_GET['mshh'] && !empty($_POST['soluong'][$id]))
                    {
                        // var_dump($soluong);exit;
                        $select = "select * from HangHoa where MSHH=" . $_GET['mshh'] . " ;";
                        $query=mysqli_query($connect,$select);
                        while ($row = mysqli_fetch_array($query)) {
                    
                        $price=$soluong*$row['Gia'];
                        if($soluong>0 && $soluong<=$row['SoLuongHang'])
                        {
                            $sql = "update ChiTietDatHang set SoLuong = " . $soluong . ",GiaDatHang=" . $price . " where MSHH = " . $_GET['mshh'] . " and SoDonDH = " . $_GET['idhd'] . " ;";
                            mysqli_query($connect,$sql);
                            
                        }
                        }
                    }
                }
            }
            
            header("Location: product-cart.php");
        }
        if($_GET['action']=="delete")   
        {
            $sql = "delete from ChiTietDatHang where MSHH = " . $_GET['mshh'] . " and SoDonDH = " . $_GET['idhd'] . " ;";
            mysqli_query($connect, $sql);
            header("Location: product-cart.php");
        }
    }
    if(isset($_GET['action']) && isset($_GET['idhd']))
    {
        if($_GET['action']=='dathang')
        {
            if (isset($_POST['diachi']) && !empty($_POST['diachi'])) {
                $diachi = $_POST['diachi'];
                $sql = "select * from DiaChiKH where MSKH='" . $_SESSION['IDKHACHHANG'] . "';";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row == null) {
                    $sql = "insert into DiaChiKH(DiaChi,MSKH) values('" . $diachi . "'," . $_SESSION['IDKHACHHANG'] . ");";
                    mysqli_query($connect, $sql);
                } else {
                    $sql = "update DiaChiKH set DiaChi='" . $diachi . "' where MSKH=" . $_SESSION['IDKHACHHANG'] . ";";
                    mysqli_query($connect, $sql);
                }
                // var_dump(strlen($row['DiaChi']));exit;
                if (strlen($row['DiaChi']) > 5) {
                    $sodon = $_GET['idhd'];
                    $sql = "update DatHang set TrangThai='Chờ xác nhận',NgayDH=CURRENT_DATE where SoDonDH = " . $sodon . ";";
                    mysqli_query($connect, $sql);
                    echo '
                    <script>
                    alert("Đặt hàng thành công");
                    document.location.href="Index.php";
                    </script>';
                } else {
                    echo '
                    <script>
                    alert("Xin hãy nhập địa chỉ cụ thể");
                    document.location.href="product-cart.php";
                    </script>';
                }
            }
        }
    }
    $connect->close();



?>

<html>
<head>
    <title>Chi tiết giỏ hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./Style.css">
    <style>
           .container-cart{
               height: auto;
               width: 100%;
               display: inline-flex;
               margin-top: 100px;
           }
           .container-itemCart{
               width: 50%;
               height: auto;
               margin: 20px;
           }
           .name-header{
               font-weight: bold;
               font-size: 24px;
           }
           .info-sp{
               border-top: solid 1px black;
               display: flex;
               margin-top: 20px;
           }
           .item-name{
               margin-top: 20px;
               margin-bottom: 20px;
           }
           .infor1-sp{
               width: 30%;
           }
           .infor1-sp img {
               width: auto;
               height: auto;
               max-width: 150px;
               max-height: 150px;
               margin-top: 10px;
               margin-bottom: 10px;
           }
           .infor1-sp a:hover{
               color: red;
           }
           .infor2-sp{
               width: 70%;
           }
           .infor2-sp input{
               width: 75%;
               height: 35px;
           }
           .infor2-sp .btn-update{
               width: 20%;
               height: 35px;
               background-color: white;
               border: solid 1px black;
           }
           .infor2-sp .btn-update:hover{
            background-color: black;
            color: white;
           }
           /* .infor2-sp button:hover a{
            color: white;
           } */
           .sum-price {
               border-top: solid 1px black;
               padding-top: 20px;
               padding-left: 20px;
           }
           .gia-sp{
               margin-top: 20px;
           }
           .form-input{
               display: flex;
               flex-direction: column;
               margin-top: 20px;
           }
           .form-input input{
               height: 35px;
           }
           #diachi{
               margin-top: 20px;
               height: 35px;
               width: 100%;

           }
           .form-dathang{
               margin: 30px;
           }
           #dathang{
               margin-top: 20px;
               height: 35px;
               width: 100%;
               background-color: rgb(0, 162, 202);
               color: white;
               border: solid 1px rgb(0, 162, 202);
               font-weight: bold;
           }
           #dathang:hover{
            background-color: rgb(0, 175, 219);
            cursor: pointer;
           }
    </style>
</head>
<body>
    <header>
            <?php
                show_header();
            ?>
    </header>
    <section class="container-cart">
                <?php 
                     $tongsotien = 0;
                     $connect = new mysqli('localhost','root', '', 'quanlydathang');
                     if (isset($_SESSION['IDKHACHHANG'])) {
                        $kh = $_SESSION['IDKHACHHANG'];
                        $sql = "select * from ChiTietDatHang 
                               where SoDonDH = (select SoDonDH from DatHang 
                               where MSKH=" . $kh . " and 
                               TrangThai='Chưa đặt');";
                        $result = mysqli_query($connect,$sql);
                        if($result->num_rows>0){
                            
                        
                               
                ?>
           <div class="container-itemCart">
                <div class="name-header">Chi tiết đơn hàng</div>
                <?php 
                    
                     while ($row = mysqli_fetch_array($result)) {    
                        $idhd= $row['SoDonDH'];
                        $select = "select * from HangHoa where MSHH=" . $row['MSHH'] . " ;";
                        $query=mysqli_query($connect,$select);
                        while ($link = mysqli_fetch_array($query)) {
                            $id_hh=$link['MSHH'];
                            $link_img=$link['Hinh'];
                            $tenhh=$link['TenHH'];
                            $slhh=$link['SoLuongHang'];
                        }    
                ?>
                <div class="info-sp">
                     <div class="infor1-sp">
                          <img src="<?=$link_img ?>" alt="">
                          <form action="product-cart.php?action=delete&idhd=<?=$row['SoDonDH'] ?>&mshh=<?=$row['MSHH'] ?>" method="POST"><a href="product-cart.php?action=delete&idhd=<?=$row['SoDonDH'] ?>&mshh=<?=$row['MSHH'] ?>">Xóa</a></form>
                          
                     </div>
                      <?php 
                          echo ' <div class="infor2-sp"> ' ;
                          echo '    <div class="item-name">'.$tenhh.'</div> ';
                          
                          echo '    <form method="POST" action="product-cart.php?action=update&idhd='.$row['SoDonDH'].'&mshh='.$row['MSHH'].'" > ';
                          echo '            <input type="number" name="soluong['.$id_hh.']" id="soluong" value="'.$row['SoLuong'].'" min="1" max="'.$slhh.'"> ';
                          echo '            <input type="submit" name="click-update" value="UPDATE" class="btn-update">';
                          echo '           <div class="gia-sp">= '.change_format($row['GiaDatHang']).' đ</div> ';
                                
                          echo '    </form> ';
                          echo ' </div>  ';
                      $tongsotien=$tongsotien+$row['GiaDatHang']; ?>
                </div>
                <?php  } ?>
                <div class="sum-price">Tổng: <?=change_format($tongsotien) ?> đ</div>
           </div>
           <?php $select = "select * from KhachHang where MSKH=" . $kh . " ;";
                 $query=mysqli_query($connect,$select);
                 while ($link = mysqli_fetch_array($query)) { ?>
           <div class="container-itemCart">
                <div class="name-header">Người mua/nhận hàng</div>
                <form action="product-cart.php?action=dathang&idhd=<?=$idhd ?>" method="POST" class="form-dathang">
                       <div class="form-input">
                            <label for="nguoinhan">Tên</label>
                            <input type="text" name="nguoinhan" id="nguoinhan" readonly value="<?=$link['HoTenKH']?>">
                       </div>
                       <div class="form-input">
                            <label for="sdt">Số điện thoại</label>
                            <input type="text" name="sdt" id="sdt" readonly value="<?=$link['SoDienThoai']?>">
                       </div> 
                       <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ nhận hàng"> <br>
                       <small ><i id="hinhthuc">Nhận hàng tại nhà/công ty/bưu điện</i></small> <br>
                       <button type="submit" id="dathang">Đặt Hàng</button>
                </form>
           </div>
           <?php } } else { ?>
            <h1 style="margin-top: 227px;">//Giỏ Hàng Rỗng</h1>
            <?php } } 
              $connect->close();
            ?>
    </section>
    <div class="end">
            <?php
              show_end();
            ?>
        </div>
</body>
</html>