<?php
  session_start();
  require_once("./Show.php");
  test_login(test_username(),test_password());
  
?>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./fontawesome/css/all.min.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="./Style.css">
        <Style>
            body{
                margin: 0;
            }
            Main{
                width: 80%;
                margin-top: 7em;
                margin-left: 10%;
                border: solid 1px black;
            }
            .form-login{
                align-content: center;
                width: 40%;
                margin-left: 30%;
                margin-top: 50px;
                border:  solid 1px rgb(233, 233, 233);
                padding: 20px;
            }
            .main-container{
                width: 100%;
                margin: 0;
                align-items: center;
                height: auto;
  
            }

            .form-control{
                width: 100%;
                height: 40px;
                margin-top: 10px;
                border-left: none;
                border-right: none;
                border-top: none;
                margin-bottom: 10px;
            }
            .btn{
                margin-top: 10px;
                width: 100%;
                height: 40px;
                color: white;
                font-weight: bold;
                border:  solid 1px white;
            }
            .btn:hover{
                cursor: pointer;
            }
            .form-group{
                width: 100%;
                
            }
            .btn-login{
                background-color: rgb(0, 180, 9);
            }
            .btn-register{
                background-color: red;
            }
            .label-login{
                border-bottom: solid 1px black;
                padding-bottom: 30px;
            }
            .label-login h2{
                margin-top:30px;
                margin-left: 30px;
                color: rgb(59, 59, 59);
            }
        </Style>
        <script>
            function register()
            {
                document.location.href="Register_user.php";
            }
        </script>
    </head>
    <body>
    <Header>
            <?php
               
                show_header();
            ?>
    </Header>
    <Main>
    
    <section class="label-login"><h2>ĐĂNG NHẬP</h2></section>
    <div class="main-container">
    <section class="form-container">
    <form action="" method="POST" class="form-login">
        <div class="form-group">
            
            <input type="text" class="form-control" id="SDT" placeholder="Nhập số điện thoại" name="SDT">
        </div>
        <i style="color:red">
        <?php
           
             
             $test=test_username();
             if($test==false) echo "Số điện thoại không tồn tại vui lòng nhập lại.";
             
        ?>
        </i>
        <div class="form-group">
            
            <input type="password" class="form-control" id="pwd" placeholder="Nhập password" name="pwd">
        </div>
        <i style="color:red">
        <?php
             $test=test_password();
             if($test==false) echo "Sai mật khẩu vui lòng nhập lại.";
        ?>
        </i>
        <br>
        <button type="submit" class="btn btn-login">Đăng Nhập</button> <br>
        <button type="button" class="btn btn-register" onclick="register()">Đăng Ký Tài Khoản</button>
    </form>
    </div>
    </section>
    
    </Main>
    <div class="end">
            <?php
              show_end();
            ?>
        </div>
    </body>
</html>




