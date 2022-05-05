function ktChuaKyTu(bien) {
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
function checkName() {
    tenDN = document.forms[0].textboxTenTK;
    idP = "tendnP";
    if (ktChuaKyTu(tenDN)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        checkMatKhau();
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthiTB(tenDN, 'Tên đăng nhập không được có khoảng trống và phải bắt đầu bằng một ký tự.', idP);
        }
        checkMatKhau();
        return false;
    }
}
function checkMatKhau() {
    tenBien = document.forms[0].textboxPW;
    idP = "matkhauP";
    if (ktMatKhau(tenBien)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        checkLaiMatKhau();
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthiTB(tenBien, 'Mật khẩu có ít nhất 8 ký tự.', idP);
        }
        checkLaiMatKhau();
        return false;
    }
}
function checkLaiMatKhau() {
    var tenBien = document.forms[0].textboxRePW;
    idP = "matkhaulaiP";
    if (String(tenBien.value) == String(document.forms[0].textboxPW.value)) {
        if (document.getElementById(idP) != null) {
            document.getElementById(idP).remove();
        }
        return true;
    }
    else {
        if (document.getElementById(idP) == null) {
            hienthiTB(tenBien, 'Mật khẩu không khớp', idP);
        }
        return false;
    }
}
//16: 15 14 13 12 11 10 9 8 7 6.
function ktEmail(the_email) {
    var at = the_email.indexOf("@");
    var dot = the_email.lastIndexOf(".");
    var space = the_email.indexOf(" ");

    if ((at != -1) && //có ký tự @
        (at != 0) && //ký tự @ không nằm ở vị trí đầu
        (dot != -1) && //có ký tự .
        (dot > at + 1) && (dot < the_email.length - 1) //phải có ký tự nằm giữa @ và . cuối cùng
        && (space == -1)) //không có khoẳng trắng 
    {
        return true;
    } else {
        return false;
    }
}
function checkEmail() {
    var tenBien = document.forms[0].textboxEmail;
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
            hienthiTB(tenBien, 'Email Không hợp lệ.', idP);
        }
        return false;
    }
}
function checkSDT() {
    var tenBien = document.forms[0].textboxSDT;
    var str = String(tenBien.value);
    idP = "sdtP";
    if (str.length >= 8 && str.length <= 12) {
        for (i = 0; i < str.length; i++) {
            if (str.charCodeAt(i) < 48 || str.charCodeAt(i) > 57) {
                if (document.getElementById(idP) == null) {
                    hienthiTB(tenBien, 'Số điện thoại không hợp lệ', idP);
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
            hienthiTB(tenBien, 'Số điện thoại không hợp lệ', idP);
        }
        return false;
    }
}
function hienthiTB(nodeinput, thongbao, getid) {
    thep = document.createElement("p");
    tb = document.createTextNode(thongbao);
    thep.appendChild(tb);
    thep.setAttribute("class", "chudo");// Class chudo được định nghĩa trong thẻ style
    thep.setAttribute("id", getid);
    document.forms[0].insertBefore(thep, nodeinput.nextSibling);
}
function checkFormButton() {
    var kt = true;
    if (document.forms[0].textboxPW.value.length == 0 ||
        document.forms[0].textboxRePW.value.length == 0 ||
        document.forms[0].textboxHoTen.value.length == 0 ||
        document.forms[0].textboxEmail.value.length == 0 ||
        document.forms[0].textboxSDT.value.length == 0) {
        kt = false;
    }

    if (!checkMatKhau()) kt = false;
    if (!checkLaiMatKhau()) kt = false;
    if (!checkEmail()) kt = false;
    if (!checkSDT()) kt = false;

    if (kt) {
        alert("Đăng ký thành công." + bien.value);
    } else {
        alert("Lỗi dữ liệu không hợp lệ.");
    }
}