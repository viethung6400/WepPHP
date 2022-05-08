<?php
//  session_start();
 require_once("Show.php");
 if(isset($_GET['id']) && isset($_POST['soluong'])){

    if(!isset($_SESSION['IDKHACHHANG'])){
        $smg= 'Vui lòng đăng nhập nếu muốn mua hàng';
        alert($smg) ;
        // die;
    }

    $sale = 0;
    if(isset($_SESSION['giamgia'])){
        $sale = $_SESSION['giamgia'];
    }

    $sp = $_GET['id'];
    if(isset($_SESSION['IDKHACHHANG'])){
        $kh = $_SESSION['IDKHACHHANG'];
        $connect = new mysqli('localhost','root', '', 'quanlydathang');
        $s = "select * from HangHoa where MSHH = " . $sp .";";
        $result = mysqli_query($connect, $s);
        $row = mysqli_fetch_assoc($result);
        $price_product = $row['Gia'];

        $sql = "select * from DatHang where MSKH = " . $kh ." and TrangThai = 'Chưa đặt';";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if($row == null){
            $str = "insert into DatHang(MSKH,MSNV,NgayDH,NgayGH,TrangThai) values(".$kh.",null,null,null,'Chưa đặt');" ;
            mysqli_query($connect,$str);
        }

        $sql = "select * from DatHang where MSKH = " . $kh ." and TrangThai = 'Chưa đặt';";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);

        if($row != null){
            $soDH = $row['SoDonDH'];
            $insert = "insert into ChiTietDatHang values(".$soDH.",".$sp.",1,".$price_product.",".$sale.");";
            try{
                mysqli_query($connect,$insert);
                alert('Đã thêm 1 sản phẩm vào giỏ hàng');
            }
            catch(Exception $e){
                alert('Sản phẩm này đã có trong giỏ hàng');
            }
        }
        $connect->close();
    }
    // die;
}
?>


<html>
    <head>
        <title><?php
                $connect = new mysqli('localhost','root', '', 'quanlydathang');
                if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                  $result = mysqli_query($connect,$query);
                  while ($row = mysqli_fetch_array($result)) {
                    echo $row['TenHH'];
                    
                  }
                } 
                
                         
        ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="./Style.css">
        <style>
            .Container-dathang{
                margin: 0;
                margin-top: 170px;
                height: auto;

            }
            body{
                background-color: rgb(218, 218, 218);
            }
            .container-section{
                margin-left: 10%;
                margin-right: 10%;
                display: flex;
                margin-bottom: 20px;
                padding: 30px;
                height: auto;
                background-color: white;
            }
            .item-image .image{
                width: 380px;
                height: 380px;
                max-width: 500px;
                max-height: 500px;
            }
            .iteam-dathang{
                margin-left: 20px;
            }
            .item-type{
                display: flex;
                margin-bottom: 20px;
            }
            .label{
                color:grey;
            }
            .nd{
                margin-left: 10px;
            }
            .item-price{
                font-size: 30px;
                color: red;
                margin-bottom: 20px;
            }
            .item-count{
                color: grey;
                margin-bottom: 20px;
            }
            .item-count .b{
                color: black;
                border: none;
                background-color: white;
                margin: 0;
                font-weight: bold;
                width: 30px;
                text-align: center;
            }
            .btn-dathang{
                width: 150px;
                height: 40px;
                font-size: 17px;
                background-color: rgb(3, 209, 13);
                color: white;
                border-color: white;
                border-radius: 5px;
                border: solid 1px;
            }
            .btn-dathang:hover{
                cursor: pointer;
            }
            #ghichu{
                display: flex;
                flex-direction: column;
            }
            #ghichu .item-ndghichu{
                margin-left: 30px;
            }
        </style>
          
    </head>
    <body>  
        <header>
            <?php
                require_once("./Show.php");
                show_header();
            ?>
        </header>
        <div class="Container-dathang">
               <section class="container-section">
                     <?php 
                             $connect = new mysqli('localhost','root', '', 'quanlydathang');
                             if (isset($_GET['id'])) {
                               $id = $_GET['id'];
                               $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                               $result = mysqli_query($connect,$query);
                               while ($row = mysqli_fetch_array($result)) {
                                echo "<div class='item-image'><img src='".$row['Hinh']."' alt='' class='image'></div>";
                            }
                            }
                            
                             ?>
                     <form class="iteam-dathang" method="POST" action="">
                           <div class="item-name"><h2><?php
                                 $connect = new mysqli('localhost','root', '', 'quanlydathang');
                                 if (isset($_GET['id'])) {
                                   $id = $_GET['id'];
                                   $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                                   $result = mysqli_query($connect,$query);
                                   while ($row = mysqli_fetch_array($result)) {
                                    echo $row['TenHH'];
                                     }
                                }
                                
                                
                                ?></h2></div>
                           <div class="item-type"><div class="label">Loại:</div> <div class="nd"><?php
                                     $connect = new mysqli('localhost','root', '', 'quanlydathang');
                                     if (isset($_GET['id'])) {
                                       $id = $_GET['id'];
                                       $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                                       $result = mysqli_query($connect,$query);
                                       while ($row = mysqli_fetch_array($result)) {
                                        echo $row['TenLoaiHang'];
                                    }
                                    }
                                     
                                    
                           ?></div></div>
                           <div class="item-price"><?php
                                                                     $connect = new mysqli('localhost','root', '', 'quanlydathang');
                                                                     if (isset($_GET['id'])) {
                                                                       $id = $_GET['id'];
                                                                       $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                                                                       $result = mysqli_query($connect,$query);
                                                                       while ($row = mysqli_fetch_array($result)) {
                                                                          echo change_format($row['Gia'])."đ";
                                                                       }
                                                                    }  
                                                                    
                                                                ?> </div>
                           <div class="item-count">Cửa hàng còn <?php
                                                                     $connect = new mysqli('localhost','root', '', 'quanlydathang');
                                                                     if (isset($_GET['id'])) {
                                                                       $id = $_GET['id'];
                                                                       $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                                                                       $result = mysqli_query($connect,$query);
                                                                       while ($row = mysqli_fetch_array($result)) {

                                                                          echo "<input type='text' name='soluong' value='".$row['SoLuongHang']."'readonly Class='b'>";
                                                                       } 
                                                                    }
                                                                      
                                                                   
                                                                ?> sản phẩm</div>
                           <button class="btn-dathang" type="submit" >Mua Hàng</button>
                        </form>
               </section>
               <section class="container-section" id="ghichu"><h3 class="item-ghichu">GHI CHÚ</h3> 
                    <div class="item-ndghichu"><?php 
                             $connect = new mysqli('localhost','root', '', 'quanlydathang');
                             if (isset($_GET['id'])) {
                               $id = $_GET['id'];
                               $query = "SELECT * FROM hanghoa , loaihanghoa WHERE MSHH=".$id." and hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
                               $result = mysqli_query($connect,$query);
                               while ($row = mysqli_fetch_array($result)) {
                                echo $row['GhiChu'];
                               }
                            }
                            
                            
                    ?></div>
               </section>
               
                        </div>
        <div class="end">
            <?php
              show_end();
            ?>
        </div>
    </body>
</html>        

