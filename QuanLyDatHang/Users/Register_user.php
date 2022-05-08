<?php
    
require_once("./Show.php");

register();
function register()
{
    if (!empty($_POST)) {
        $sdt = $_POST['SDT'];
        $pw = $_POST['password'];
        $name = $_POST['Ho'];
        $congty = $_POST['Ten'];
        $e = $_POST['Email'];

        $kt = true;
        if ($sdt == "" || $pw == "" || $name == "") {
            $kt = false;
        }

        if ($kt) {
            $connect = new mysqli('localhost','root', '', 'quanlydathang');

            $query = "INSERT INTO KhachHang(Password,HoTenKH,TenCongTy,SoDienThoai,Email) values(MD5('" . $pw . "'),'" . $name . "','$congty','$sdt','" . $e . "');";
            mysqli_query($connect, $query);
            $que = "SELECT * FROM KhachHang Where SoDienThoai='" . $sdt . "';";
            $result = mysqli_query($connect, $que);
            $row = mysqli_fetch_array($result, 1);
           
            $connect->close();

            if ($row!=null) {
                header("Location: Login_user.php");
                die();
            }
        }

        
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Đăng Ký Tài Khoản</title>
	<meta http-equiv="content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./Style.css">
	<style>
	    
		body{
		    background-color: white;
			padding: 0; 
			width:100% ;
			margin:0;
		}
        header{
            justify-content: space-around;
        }
		.div-form{
		    margin:0px  10em;
			margin-top: 5em;
			background-color:rgb(233, 233, 233);
			padding-left: 20px;
			padding-right: 20px;
			border-radius: 10px;
		}
        .form-label{
			min-width: 50px;
            font-style: italic;
            
		}
        input{
			flex: 1;
			border-radius: 5px;
            margin-bottom: 20px;
		}
		form{
			display: flex;
			flex-direction: column;
		}
        .chudo{
			color: red;
		}
		#btn-submit{
			background-color: rgb(87, 255, 65);
			width: 100px;
			height: 30px;	
		
		}
        #btn-submit:hover{
			background-color: rgb(80, 250, 60);
			cursor: pointer;
		}
		.item{
			margin-top: 30px;
		}
		.item a:hover{
			color: rgb(238, 255, 85);
		}
        h2{
            font-weight: normal;
        }
	</style>	
	<script >   
	function check_kitu(bien) {
    var str = String(bien.value);
    if ((str.charCodeAt(0) >= 65 && str.charCodeAt(0) <= 90) || (str.charCodeAt(0) >= 97 && str.charCodeAt(0) <= 122)) {
        for (i = 0; i < str.length; i++) {
            if (str.charAt(i) == " ")
                return false;
        }
        return true;
    } else return false;
}
function ktMatKhau(bien) {
    var str = String(bien.value);
    if (str.length > 7) return true;
    else return false;
}
function check_Name() {
    tenDN = document.forms[0].SDT;
    idP = "tendnP";
    if (ktChuaKyTu(tenDN)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        check_pwd();
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthi(tenDN, 'Tên đăng nhập không được có khoảng trống và phải bắt đầu bằng một ký tự.', idP);
        }
        check_pwd();
        return false;
    }
}
function check_pwd() {
    tenBien = document.forms[0].password;
    idP = "matkhauP";
    if (ktMatKhau(tenBien)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        check_repwd();
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthi(tenBien, 'Mật khẩu có ít nhất 8 ký tự.', idP);
        }
        check_repwd();
        return false;
    }
}
function check_repwd() {
    var tenBien = document.forms[0].repassword;
    idP = "matkhaulaiP";
    if (String(tenBien.value) == String(document.forms[0].password.value)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthi(tenBien, 'Mật khẩu không khớp', idP);
        }
        return false;
    }
}

function ktEmail(the_email) {
    var at = the_email.indexOf("@");
    var dot = the_email.lastIndexOf(".");
    var space = the_email.indexOf(" ");

    if ((at != -1) && 
        (at != 0) && 
        (dot != -1) && 
        (dot > at + 1) && (dot < the_email.length - 1) 
        && (space == -1)) 
    {
        return true;
    } else {
        return false;
    }
}
function check_Email() {
    var tenBien = document.forms[0].Email;
    str = String(tenBien.value);
    idP = "emailP";
    if (ktEmail(str)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthi(tenBien, 'Email Không hợp lệ.', idP);
        }
        return false;
    }
}
function check_SDT() {
    var tenBien = document.forms[0].SDT;
    var str = String(tenBien.value);
    idP = "sdtP";
    if (str.length >= 8 && str.length <= 12) {
        for (i = 0; i < str.length; i++) {
            if (str.charCodeAt(i) < 48 || str.charCodeAt(i) > 57) {
                if (document.getElementById(idP) == null) {
                    hienthi(tenBien, 'Số điện thoại không hợp lệ', idP);
                }
                return false;
            }
        }
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthi(tenBien, 'Số điện thoại không hợp lệ', idP);
        }
        return false;
    }
}
function hienthi(nodeinput, thongbao, getid) {
    thep = document.createElement("p");
    tb = document.createTextNode(thongbao);
    thep.appendChild(tb);
    thep.setAttribute("class", "chudo");
    thep.setAttribute("id", getid);
    document.forms[0].insertBefore(thep, nodeinput.nextSibling);
}

	</script>
    </head>
	<body>
	<header>
	    <div id='login' class='top'><a href='Index.php'><img id='logo'src='../img/logo_neymarsport.png'></a></div>  
        <li class="item"><a href='Index.php'>Trang Chủ</a></li>
		<li class="item"><a href='https://www.facebook.com/profile.php?id=100006225857328'>Facebook Shop</a></li>
		<li class="item" style="margin-right: 100px;"><a href='Login_user.php' ><i  class='account fas fa-user'> Đăng nhập</i></a>
                                                      <a href=''><i class='cart fas fa-shopping-cart'></i></a>
        </li>
    </header>
	<div class="div-form" >
	    <br>
		<h2 style="text-align: center" ><b>ĐĂNG KÝ TÀI KHOẢN</b></h1><br><br>
		<form name="form1" method="POST" >
		<label class="form-label">SDT(*)</label><input Name="SDT" type="text" value="" onblur="check_SDT()" placeholder="Nhập Số điện thoại"> <br>
		<label class="form-label">Password(*)</label><input Name="password" type="password" value="" onblur="check_pwd()" placeholder="Nhập Password"> <br>
		<label class="form-label">Nhập lại Password(*)</label><input Name="repassword" type="password" value="" onblur="check_repwd()" placeholder="Nhập lại Password"> <br>
		<label class="form-label">Họ tên(*)</label><input Name="Ho" type="text" value=""  placeholder="Nhập họ tên của bạn"> <br>
		<label class="form-label">Tên công ty(*)</label><input Name="Ten" type="text" value="" placeholder="Nhập tên công ty của bạn"> <br>
		<label class="form-label">Email(*)</label><input Name="Email" type="email" value="" onblur="check_Email()" placeholder="Nhập Email"> <br>
		
		<p style="text-align:right"><input Name="btn-submit" type="submit" value="Đăng Ký"  id="btn-submit" ></p>	
        </form>
	  </div>
	  <div class="end">
            <?php
              show_end();
            ?>
        </div>
	</body>
</html>
