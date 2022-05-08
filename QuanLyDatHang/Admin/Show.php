<?php
session_start();
function show_header()
{

if (isset($_SESSION['IDNHANVIEN'])) {
    echo "<div id='login' class='top'><a href='../Users/Index.php'><img id='logo'src='../img/logo_neymarsport.png'></a></div> ";
    echo "<div class='menu'>";
   
    echo "        <li><a href='../Users/Index.php'>Trang Chủ</a></li>";

    echo "       <li><a href='https://www.facebook.com/profile.php?id=100006225857328'>Facebook Shop</a></li>";

    echo "    </div>";
    
    echo" <div class='order'>";
    
    echo"    <li>";
    echo"        <a href='Show.php?logout=99' id='account-item'><i  class='account fas fa-user'> Đăng xuất</i></a>";
    echo"    </li>";
    echo"</div>";


}
else
{
    echo "<div id='login' class='top'><a href='../Users/Index.php'><img id='logo'src='../img/logo_neymarsport.png'></a></div> ";
    echo "<div class='menu'>";
   
    echo "        <li><a href='../Users/Index.php'>Trang Chủ</a></li>";
    
    echo "       <li><a href='https://www.facebook.com/profile.php?id=100006225857328'>Facebook Shop</a></li>";

    echo "    </div>";
    
    echo" <div class='order'>";
    echo"    <li>";
    echo"        <a href='Login_admin.php' id='account-item'><i  class='account fas fa-user'> Đăng nhập</i></a>";
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

function tongtiendohang($sodon, $connect)
{
    $sql = "select * from ChiTietDatHang where SoDonDH = " . $sodon . ";";
    $result = mysqli_query($connect, $sql);
    $tongtien = 0;
    while ($row = mysqli_fetch_array($result)) {
        $tongtien += $row['GiaDatHang'];
    }
    return $tongtien;
}

function loaihang($id, $connect)
{
    $sql = "select * from LoaiHangHoa where MaLoaiHang='" . $id . "';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['TenLoaiHang'];
}

function hanghoa($id, $connect)
{
    $sql = "select * from HangHoa where MSHH='" . $id . "';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function test_username()
{
   if(!empty($_POST)) 
   {
        $username = $_POST['SDT'];
        $conn=new mysqli("localhost","root","","quanlydathang");
        $sql="select * from NhanVien where SoDienThoai='$username'";
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
        $sql="select * from NhanVien where SoDienThoai='".$username."'";
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
            $sql="select * from NhanVien where SoDienThoai='$username' and Password='$pwd'";
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
                $_SESSION['IDNHANVIEN']=$account[0]['MSNV'];
                
                header("Location:Browse_bill.php");
            }
            
        }
    }

}

function logout()
{
    session_start();
    session_destroy();
    header("Location:Login_admin.php");
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
function execute_data($sql, $connect)
{
    $result = mysqli_query($connect, $sql);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    return $data;
}

function chitietdathang($sodondh, $connect)
{
    $sql = "select * from ChiTietDatHang 
        where SoDonDH = " . $sodondh . ";";
    $data = execute_data($sql, $connect);
    return $data;
}

function soluonghanghoa($id, $connect)
{
    $sql = "select * from HangHoa where MSHH='" . $id . "';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['SoLuongHang'];
}

function kiemtrasoluonghangkhidat($sodon, $connect)
{
    $chitiet = chitietdathang($sodon, $connect);

    for ($i = 0; $i < count($chitiet); $i++) {
        $sl = $chitiet[$i]['SoLuong'];
        $conlai = soluonghanghoa($chitiet[$i]['MSHH'], $connect);
        if ($sl > $conlai) {
            return false;
        }
    }
    return true;
}

function trusoluonghang($sodon, $connect)
{
    $data = chitietdathang($sodon, $connect);
    for ($i = 0; $i < count($data); $i++) {
        $conlai = soluonghanghoa($data[$i]['MSHH'], $connect);
        $sl = $data[$i]['SoLuong'];
        $hieu = $conlai - $sl;
        $sql = "UPDATE HangHoa SET SoLuongHang=" . $hieu . " where MSHH=" . $data[$i]['MSHH'] . ";";
        mysqli_query($connect, $sql);
    }
}

function nhungdonhangchuaxacnhan($connect)
{
    $sql = "select * from DatHang 
        where TrangThai = 'Chờ xác nhận';";
    $data = execute_data($sql, $connect);
    return $data;
}

function diachikhachhang($id, $connect)
{
    $sql = "select * from DiaChiKH where MSKH='" . $id . "';";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row == null)
        return 'null';
    return $row['DiaChi'];
}

function khachhang($id, $connect)
{
    $sql = "select * from KHACHHANG where MSKH='" . $id . "';";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function xacnhandonhang($sodon, $nv, $connect)
{
    trusoluonghang($sodon, $connect);
    $sql = "update DatHang set TrangThai='Đã xác nhận',MSNV=" . $nv . " where SoDonDH = " . $sodon . ";";
    mysqli_query($connect, $sql);
}

function huydonhang($sodon, $nv, $connect)
{
    $sql = "update DatHang set TrangThai='Đã hủy',MSNV=" . $nv . " where SoDonDH = " . $sodon . ";";
    mysqli_query($connect, $sql);
}