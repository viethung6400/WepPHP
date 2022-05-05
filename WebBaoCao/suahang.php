<?php
if (($_POST != null) && isset($_GET['id'])) {
    require_once("sql_connect.php");
    $tensp = $_POST['ten'];
    $quycach = $_POST['quycach'];
    $gia = $_POST['gia'];
    $sl = $_POST['sl'];
    $loai = $_POST['loaihang'];
    $ghichu = $_POST['ghichu'];

    $sql = "Update HangHoa set 
    TenHH='" . $tensp . "',
    QuyCach='" . $quycach . "',
    Gia=" . $gia . ",
    SoLuongHang=" . $sl . ",
    MaLoaiHang=" . $loai . ",
    GhiChu='" . $ghichu . "'
    where MSHH=" . $_GET['id'] . ";";
    mysqli_query($connect, $sql);

    if (isset($_FILES['image']) && $_FILES['image']['name']!="") {
        //Ghi file
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'Kích thước file không được lớn hơn 2MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "item/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }

        $sql = "Update HangHoa set Hinh='item/".$file_name."'
                where MSHH=" . $_GET['id'] . ";";

        mysqli_query($connect,$sql);
    }

    $connect->close();

    header("Location: ds_hang.php");
    die;
}

?>
<!DOCTYPE html>

<html>

<head>
    <title>Sửa thông tin sản phẩm</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" HREF="ima/logo_bird_icon.png">
    <link rel="stylesheet" href="CSS/formadmin.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>
        .anh {
            width: auto;
            height: auto;
            max-width: 300px;
            max-height: 300px;
        }
    </style>
</head>

<body>
    <!-------Header-------->
    <header>
        <div class="h-top">
            <div class="row">
                <nav class="h-topleft">
                    <a href="index.php"><img id="logo" src="ima/logo_bird.gif" alt="logo"></a>
                    <h2>Administration</h2>
                </nav>
                <nav class="h-topright">
                    <a class="tiede keochuot" href="#"><i class="fas fa-question-circle iconwhite">
                            <p>Hỗ trợ</p>
                        </i></a>
                    <a class="tiede keochuot" href="index.php"><i class="fas fa-home iconwhite">
                            <p>Trang chủ</p>
                        </i></a>
                    <a class="tiede keochuot" href="taikhoan_nv.php"><i class="far fa-user-circle iconwhite">
                            <p>Tài khoản</p>
                        </i></a>
                    <a class="tiede keochuot" href="sql_connect.php?sign_out=1"><i class="fas fa-sign-out-alt"><p>Đăng xuất</p></i></a>
                </nav>
            </div>
        </div>
    </header>
    <section id="admin-section">
        <div id="bar" name="bar">
            <ul class="bar-ul">
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-shopping-basket"></i><b>Hàng hóa</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="ds_hang.php">- Xem kho</a></li>
                            <li class="usecase"><a class="keochuot" href="themhang.php">- Thêm sản phẩm</a></li>
                            <li class="usecase"><a class="keochuot" href="loaihang.php">- Loại hàng</a></li>
                            <li class="usecase"><a class="keochuot" href="ds_hoadon.php">- Duyệt hóa đơn</a></li>
                        </ul>
                    </div>
                </li>
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-user-edit"></i><b>Khách hàng</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="danhsachkhachhang.php">- Xem danh sách khách hàng</a></li>
                        </ul>
                    </div>
                </li>
                <li class="bar-li">
                    <p class="li-tide"><i class="fas fa-address-book"></i><b>Nhân viên</b></p>
                    <div>
                        <ul>
                            <li class="usecase"><a class="keochuot" href="danhsachnhanvien.php">- Xem danh sách nhân viên</a></li>
                        
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="work" style="padding-left: 40px;">
            <form action="" method="POST" enctype="multipart/form-data">
                <h2>SỬA THÔNG TIN SẢN PHẨM</h2>
                <?php
                if (isset($_GET['id'])) {

                    require_once("sql_connect.php");

                    $mshh = $_GET['id'];
                    $sql = 'select * from HangHoa where MSHH = ' . $mshh . ';';
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_assoc($result);


                    if ($row == null) {
                        header("Location: ds_hang.php");
                        die();
                    }

                    echo '
                    <img class="anh" src="' . $row['Hinh'] . '" alt="Hinh">
                    <span>Update ảnh</span><input type="file" name="image">
                <p>Tên sảm phẩm </p><input name="ten" type="text" value="' . $row['TenHH'] . '">
                <p>Quy cách </p><textarea name="quycach" id="" cols="70" rows="20">' . $row['QuyCach'] . '</textarea><br>
                <span>Giá </span><input name="gia" type="text" style="width: 130px;" value="' . $row['Gia'] . '">
                <span>&nbsp; Số lượng </span><input name="sl" type="text" style="width: 100px;" value="' . $row['SoLuongHang'] . '">
                <hr>
                <p>Loại hàng </p><select name="loaihang" id="">';
                    optionloaihang_select($row['MaLoaiHang'], $connect);
                    echo '</select>
                <p>Ghi chú </p><textarea name="ghichu" id="" cols="70" rows="10">' . $row['GhiChu'] . '</textarea>
                <hr>
                <button class="from-btn" type="submit">LƯU THAY ĐỔI</button>';
                    $connect->close();
                }
                ?>
                <a href="ds_hang.php" class="form-a-btn">HỦY</a>
            </form>

        </div>
    </section>
    <!---------Footer-------------->
    <footer>
        <p>
            &copy; 2021 - Bùi Việt Anh - MSSV:B1805739
        </p>
    </footer>
</body>

</html>