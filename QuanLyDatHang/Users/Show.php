<?php
session_start();
function show_header()
{

if (isset($_SESSION['IDKHACHHANG'])) {
    echo "<div id='login' class='top'><a href='Index.php'><img id='logo'src='../img/logo_neymarsport.png'></a></div> ";
    echo "<div class='menu'>";
   
    echo "        <li><a href='Index.php'>Trang Chủ</a></li>";
    echo "       <li><a href='List_product.php'>Sản Phẩm</a>";
    echo "           <ul class='list'> ";
                          $connect = new mysqli('localhost','root', '', 'quanlydathang');
                          $sql = "select * from LoaiHangHoa ;";
                          $result = mysqli_query($connect, $sql);
                          
                          while ($row = mysqli_fetch_array($result)) {
                            echo " <li ><a href='List_product.php?id=".$row['MaLoaiHang']."'  style='color:black'>".$row['TenLoaiHang']."</a></li>";
                          }
    
                          $connect->close();
    echo "           </ul> ";
    echo "        </li>";
    echo "       <li><a href='https://www.facebook.com/profile.php?id=100006225857328'>Facebook Shop</a></li>";

    echo "    </div>";
    
    echo" <div class='order'>";
    echo" <form class='search-form' method='GET' action='List_product.php'>";
    echo"    <input name='search-product' type='text' class='search-input search' placeholder='Tìm kiếm...'><button type='submit' class='btn-search'><i id='search-btn' class='search-input fas fa-search'></i></button></form>";
    echo"    <li>";
    echo"        <a href='Show.php?logout=99' id='account-item'><i  class='account fas fa-user'> Đăng xuất</i></a>";
    echo"        <a href='product-cart.php' id='cart-item'><i class='cart fas fa-shopping-cart'></i></a>";
    echo"    </li>";
    echo"</div>";


}
else
{
    echo "<div id='login' class='top'><a href='Index.php'><img id='logo'src='../img/logo_neymarsport.png'></a></div> ";
    echo "<div class='menu'>";
   
    echo "        <li><a href='Index.php'>Trang Chủ</a></li>";
    echo "       <li><a href='List_product.php'>Sản Phẩm</a>";
    echo "           <ul class='list'> ";
                          $connect = new mysqli('localhost','root', '', 'quanlydathang');
                          $sql = "select * from LoaiHangHoa ;";
                          $result = mysqli_query($connect, $sql);
                          
                          while ($row = mysqli_fetch_array($result)) {
                            echo " <li ><a href='List_product.php?id=".$row['MaLoaiHang']."'  style='color:black'>".$row['TenLoaiHang']."</a></li>";
                          }
    
                          $connect->close();
    echo "           </ul> ";
    echo "        </li>";
    echo "       <li><a href='https://www.facebook.com/profile.php?id=100006225857328'>Facebook Shop</a></li>";

    echo "    </div>";
    
    echo" <div class='order'>";
    echo" <form class='search-form' method='GET' action='List_product.php'>";
    echo"    <input name='search-product' type='text' class='search-input search' placeholder='Tìm kiếm...'><button type='submit' class='btn-search'><i id='search-btn' class='search-input fas fa-search'></i></button></form>";
    echo"    <li>";
    echo"        <a href='Login_user.php' id='account-item'><i  class='account fas fa-user'> Đăng nhập</i></a>";
    echo"        <a href='product-cart.php' id='cart-item'><i class='cart fas fa-shopping-cart'></i></a>";
    echo"    </li>";
    echo"</div>";
    }   
}

function show_end()
{
echo"   <div class='info'>";
echo"               <p>Công ty TNHH NAYMARSPORT</p>";
echo"               <P>Liên hệ: 0366832544</P>";
echo"               <p>Địa chỉ: Trường đại học Cần Thơ</p>";
echo"               <a href='#'><img alt='' title='' src='../img/logo-chungnhan.png' width='150'></a>";
               
echo"            </div>";
echo"            <p style='text-align:center ; margin-bottom: 0px;color:white' class='text_end'>Thuộc bản quyền NEYMARSPORT</p>";
}


function change_format($tien)
{
    $str = "";
    while ($tien > 1000) {
        $r = "";
        $duoi = $tien % 1000;
        for ($y = 0; $y < 3; $y++) {
            $u = ($duoi % 10);
            $r = $u . $r;
            $duoi = (int)($duoi / 10);
        }
        $str = "." . $r . $str;
        $tien = (int)($tien / 1000);
    }
    $str = $tien . $str;
    return $str;
}

function test_username()
{
   if(!empty($_POST)) 
   {
        $username = $_POST['SDT'];
        $conn=new mysqli("localhost","root","","quanlydathang");
        $sql="select * from KhachHang where SoDienThoai='$username'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows>0)
        {
            
            $conn->close();
            return true;
        }
        else 
        {
            
            $conn->close();
            return false;
        }
    }
    else{
        
        return true;
    } 
}

function test_password()
{
    if(!empty($_POST)) {
        $username=$_POST['SDT'];
        $pwd=$_POST['pwd'];
        $conn=new mysqli("localhost","root","","quanlydathang");
        $sql="select * from KhachHang where SoDienThoai='".$username."'";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows>0)
        {
            while($row=mysqli_fetch_array($result,1))
            {
                if($row['Password']==md5($pwd)) 
                {
                    
                    $conn->close();
                    $result->free_result();
                    return true;
                } 
            }
            
            $result->free_result();
            $conn->close();
            return false;
            
        }
        else 
        {
            $result->free_result();
            $conn->close();
            return true;
        }
    }
    else
    {
       
        return true;
    }
}

function test_login($user,$p)
{
    if(!empty($_POST))
    {
        if($user==true && $p==true)
        {
            
            $username=$_POST['SDT'];
            $pwd=md5($_POST['pwd']);
            $conn=new mysqli("localhost","root","","quanlydathang");
            $sql="select * from KhachHang where SoDienThoai='$username' and Password='$pwd'";
            $results= mysqli_query($conn,$sql);
            $account =array();
            while($row=mysqli_fetch_array($results,1))
            {
                $account[]=$row;
            }
            $results->free_result();
            $conn->close();
            if($account != null && count($account)>0)
            {
                $_SESSION['IDKHACHHANG']=$account[0]['MSKH'];
                header("Location:Index.php");
            }
            
        }
    }

}

function logout()
{
    session_start();
    session_destroy();
    header("Location:Index.php");
}

if($_GET!=null){
    if(isset($_GET['logout'])){
        logout();
        die;
    }
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
