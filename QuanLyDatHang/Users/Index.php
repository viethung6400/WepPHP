<html>
    <head>
        <title>Trang Chủ</title>
        <meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="Style.css">
        <link rel="stylesheet"  href="./fontawesome/css/all.min.css">
    </head>
    <body>
        <header>
         <?php
             require_once("./Show.php");
             show_header();
         ?>
         
        </header>
        <section>
        
            <img class="img" src="../img/slideshow_1.jpg" alt="">
            <h1 style="text-align: center; color: black;" class="test_click">SẢN PHẨM NỔI BẬT</h1>
          <div class="container">
              <div class="item-img">
                  <a href="product-page.php?id=1"> <img class="img-product" alt="adidas X Ghosted .1 TF Superspectral - Shock Pink/Core Black/Screaming Orange" src="../img/adidasX_ghosted.jpg"></a><br>
                  <a href="product-page.php?id=1" class="context">adidas X Ghosted .1 TF Superspectral - Shock Pink/Core Black/Screaming Orange</a>
                <br>
                  <p>2.500.000</p>
              </div>
              <div class="item-img">
                <a href="product-page.php?id=2"> <img class="img-product" alt="" src="../img/nike14_4G.jpg"></a> <br>
                <a href="product-page.php?id=2" class="context"> Nike Mercurial Superfly 8 Academy TF Black x Prism - Black/Cyber Yellow/Off Noir</a>
                <p>3.500.000</p>
            </div>
            <div class="item-img">
                <a href="product-page.php?id=3"> <img class="img-product" alt="" src="../img/nike14_pro.jpg"></a><br>
                <a href="product-page.php?id=3" class="context"> Nike Mercurial Zoom Vapor 14 Pro TF Silver Safari - White/Black/Metallic Silver/Volt</a>
                <p>4.700.000</p>
            </div>
            <div class="item-img">
                <a href="product-page.php?id=3"> <img class="img-product" alt="" src="../img/adidas_salaIC.jpg"></a><br>
                <a href="product-page.php?id=3" class="context"> adidas Top Sala IC - Solar Yellow/Footwear White/Glow Blue</a>
                <p>5.500.000</p>
            </div>
          </div>
        </section>
        <div class="end">
            <?php
                   show_end();
            ?>

        </div>
        <script src="./test.js"> </script>
    </body>
</html>
