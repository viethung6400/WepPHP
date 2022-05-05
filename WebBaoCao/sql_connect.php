<?php

const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "Quanlydathang";

//Thao tác đăng xuất
if($_GET!=null){
    if(isset($_GET['sign_out'])){
        sign_out();
        die;
    }
}

//Hàm đăng xuất
function sign_out()
{
    session_start();
    session_destroy();

    header("Location: index.php");
}
//Tao ket noi voi csdl
$connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
//Kiem tra ket noi
if ($connect->connect_error) {
    var_dump($connect->connect_error);
    die();
}
//Thực thi lệnh sql trả về 1 mảng hai chiều
function execute_data($sql, $connect)
{
    $result = mysqli_query($connect, $sql);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    return $data;
}
//Thự thi lệnh sql trả về 1 dòng
function execute_row($sql, $connect)
{
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

//Lấy loại hàng của hàng hóa
function loaihang($id, $connect)
{
    $sql = "select * from LoaiHangHoa where MaLoaiHang='" . $id . "';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['TenLoaiHang'];
}
//Lấy loại hàng của hàng hóa
function layloaihang($connect)
{
    $sql = "select * from LoaiHangHoa ;";
    $data = execute_data($sql, $connect);
    return $data;
}
//Chuyển tiền thành chuỗi có dấu chấm 10.000 đ
function chuyentien($tien)
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
//Tổng tiền đặt hàng của đơn hàng
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
//Lấy giá của 1 hàng hóa
function giahang($id, $connect)
{

    $sql = "select * from HangHoa where MSHH='" . $id . "';";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['Gia'];
}
//Lấy số lượng còn lại của của 1 hàng hóa
function soluonghanghoa($id, $connect)
{
    $sql = "select * from HangHoa where MSHH='" . $id . "';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['SoLuongHang'];
}
//Lấy thông tin khách hàng với MSKH
function khachhang($id, $connect)
{
    $sql = "select * from KHACHHANG where MSKH='" . $id . "';";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
//Lấy địa chỉ khách hàng
function diachikhachhang($id, $connect)
{
    $sql = "select * from DiaChiKH where MSKH='" . $id . "';";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row == null)
        return 'null';
    return $row['DiaChi'];
}
//Lấy giỏ hàng của khách hàng có trạng thái chưa đặt
function giohang($kh, $connect)
{
    $sql = "select * from ChiTietDatHang 
        where SoDonDH = (select SoDonDH from DatHang 
        where MSKH=" . $kh . " and 
        TrangThai='Chưa đặt');";
    $ctdh = execute_data($sql, $connect);
    return $ctdh;
}
//Lấy tên hàng từ mã hàng
function tenhang($mshh, $connect)
{
    $sql = "select * from HangHoa where MSHH=" . $mshh . ";";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row == null)
        return 'null';
    return $row['TenHH'];
}
//Lấy những đơn hàng chưa xác nhận
function nhungdonhangchuaxacnhan($connect)
{
    $sql = "select * from DatHang 
        where TrangThai = 'Chờ xác nhận';";
    $data = execute_data($sql, $connect);
    return $data;
}
//Lấy những đơn hàng của khách hàng
function laydonhang($kh, $connect)
{
    $sql = "select * from DatHang where MSKH = " . $kh . ";";
    $data = execute_data($sql, $connect);
    return $data;
}
//Lấy trạng thái đơn hàng
function laytrangthaidonhang($sodon, $connect)
{
    $sql = "select * from DatHang where SoDonDH = " . $sodon . ";";
    $row = execute_row($sql, $connect);
    return $row['TrangThai'];
}
//Lấy chi tiết đăt hàng của đơn đặt hàng theo SoDonDH
function chitietdathang($sodondh, $connect)
{
    $sql = "select * from ChiTietDatHang 
        where SoDonDH = " . $sodondh . ";";
    $data = execute_data($sql, $connect);
    return $data;
}
//Lấy hàng hóa từ mã số hàng hóa
function hanghoa($id, $connect)
{
    $sql = "select * from HangHoa where MSHH='" . $id . "';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
//Trừ số lượng hàng trong bảng hàng hóa so với chi tiết hóa đơn
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
//Chuyển trạng thái xác nhận đơn hàng
function xacnhandonhang($sodon, $nv, $connect)
{
    trusoluonghang($sodon, $connect);
    $sql = "update DatHang set TrangThai='Đã xác nhận',MSNV=" . $nv . " where SoDonDH = " . $sodon . ";";
    mysqli_query($connect, $sql);
}
//Cộng số lượng hàng đã hủy vào kho 
function congsoluonghang($sodon, $connect)
{
    $data = chitietdathang($sodon, $connect);
    for ($i = 0; $i < count($data); $i++) {
        $conlai = soluonghanghoa($data[$i]['MSHH'], $connect);
        $sl = $data[$i]['SoLuong'];
        $cong = $conlai + $sl;
        $sql = "UPDATE HangHoa SET SoLuongHang=" . $cong . " where MSHH=" . $data[$i]['MSHH'] . ";";
        mysqli_query($connect, $sql);
    }
}
//Chuyển trạng thái hủy đơn hàng
function huydonhang($sodon, $nv, $connect)
{
    $sql = "update DatHang set TrangThai='Đã hủy',MSNV=" . $nv . " where SoDonDH = " . $sodon . ";";
    mysqli_query($connect, $sql);
}
//Chuyển trạng thái hủy đơn hàng
function huydonhang_khachhang($sodon, $connect)
{
    $sql = "update DatHang set TrangThai='Đã hủy' where SoDonDH = " . $sodon . ";";
    mysqli_query($connect, $sql);
}
//Chuyển trạng thái hủy đơn hàng đã xác nhận cộng số hàng vào kho
function huydonhang_khachhang_daxacnhan($sodon, $connect)
{
    congsoluonghang($sodon, $connect);
    $sql = "update DatHang set TrangThai='Đã hủy' where SoDonDH = " . $sodon . ";";
    mysqli_query($connect, $sql);
}
//Lấy tên nhân viên từ mã nhân viên
function tennhanvien($id, $connect)
{
    $sql = "select * from NhanVien where MSNV=" . $id . ";";
    $result = mysqli_query($connect, $sql);
    if ($result == null)
        return "";
    $row = mysqli_fetch_array($result);
    return $row['HoTenNV'];
}
//Lấy thông tin nhân viên từ mã nhân viên
function nhanvien($id, $connect)
{
    $sql = "select * from NhanVien where MSNV=" . $id . ";";
    $result = mysqli_query($connect, $sql);
    if ($result == null)
        return "";
    $row = mysqli_fetch_array($result);
    return $row;
}
//Lấy tên khách hàng từ mã khách hàng
function tenkhachhang($id, $connect)
{
    $sql = "select * from KhachHang where MSKH=" . $id . ";";
    $result = mysqli_query($connect, $sql);
    if ($result == null)
        return "";
    $row = mysqli_fetch_array($result);
    return $row['HoTenKH'];
}
//Lấy số lượng của chi tiết đặt hàng

//Kiểm tra còn hàng không
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
//Chèn option vào loại hàng có giá chị select
function optionloaihang_select($select, $connect)
{
    $data = layloaihang($connect);
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['MaLoaiHang'] == $select)
            echo '
        <option value="' . $data[$i]['MaLoaiHang'] . '" selected>' . $data[$i]['TenLoaiHang'] . '</option>
        ';
        else
            echo '
        <option value="' . $data[$i]['MaLoaiHang'] . '">' . $data[$i]['TenLoaiHang'] . '</option>
        ';
    }
}
