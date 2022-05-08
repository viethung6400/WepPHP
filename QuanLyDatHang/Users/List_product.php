<?php
  $connect = new mysqli('localhost','root', '', 'quanlydathang');
?>

<html>
    <head>
        <title><?php
             if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM LoaiHangHoa where MaLoaiHang = " . $id . ";";
                $result = mysqli_query($connect,$query);
                while ($row = mysqli_fetch_array($result)) {
                    echo $row['TenLoaiHang'];
                    
                  }
            } else {
               echo"Tất cả giày đá banh";
            }
        ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="./Style.css">
    </head>
    <body>  
        <header>
            <?php
                require_once("./Show.php");
                show_header();
            ?>
        </header>
        <section class="Container-item">
            <ul class="List-DMSP">
                <div class="DMSP">DANH MỤC SẢN PHẨM</div>
                <?php
                      
                      $sql = "select * from LoaiHangHoa ;";
                      $result = mysqli_query($connect, $sql);
                      
                      while ($row = mysqli_fetch_array($result)) {
                        echo " <li ><a href='List_product.php?id=".$row['MaLoaiHang']."'  style='color:black'>".$row['TenLoaiHang']."</a></li>";
                      }
                ?>
            </ul>
            <div class="List-SP">
                <?php
                
                $query = "SELECT * FROM HangHoa;";
                if (isset($_GET['search-product'])) {
                    $query = "SELECT * FROM `hanghoa` WHERE `TenHH` LIKE '%" . $_GET['search-product'] . "%'";
                    $result = mysqli_query($connect,$query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div class='item-img'>";
                            echo "<a href='product-page.php?id=".$row['MSHH']."'> <img class='img-product' alt='' src='".$row['Hinh']."'></a><br>";
                            echo " <a href='product-page.php?id=".$row['MSHH']."' class='context' >".$row['TenHH']."</a> <br>";
                            echo "<p>".change_format($row['Gia'])."</p></div>";
                            
                          }
                } else {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM HangHoa where MaLoaiHang = " . $id . ";";
                        $result = mysqli_query($connect,$query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div class='item-img'>";
                            echo "<a href='product-page.php?id=".$row['MSHH']."'> <img class='img-product' alt='' src='".$row['Hinh']."'></a><br>";
                            echo " <a href='product-page.php?id=".$row['MSHH']."' class='context' >".$row['TenHH']."</a> <br>";
                            echo "<p>".change_format($row['Gia'])."</p></div>";
                            
                          }
                    } else {
                        $query = "SELECT * FROM HangHoa;";
                        $result = mysqli_query($connect,$query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div class='item-img'>";
                            echo "<a href='product-page.php?id=".$row['MSHH']."'> <img class='img-product' alt='' src='".$row['Hinh']."'></a><br>";
                            echo " <a href='product-page.php?id=".$row['MSHH']."' class='context' >".$row['TenHH']."</a> <br>";
                            echo "<p>".change_format($row['Gia'])."</p></div>";
                            
                          }
                    }
                }
       

                ?>

            </div>
        </section>
        <div class="end">
            <?php
              show_end();
            ?>
        </div>
    </body>
</html>