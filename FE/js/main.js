var validate = new Validation();

function DomID(id) {
  var element = document.getElementById(id);
  return element;
}

function DangKy() {
  var HoTen = DomID("HoTen").value;
  var tenDangNhap = DomID("tenDangNhap").value;
  var matKhau = DomID("matKhau").value;
  var nhapLaiMatKhau = DomID("nhapLaiMatKhau").value;
  //   var gioiTinh = DomID("gioiTinh").value;
  var email = DomID("Email").value;
  var sdt = DomID("SDT").value;
  var loi = 0;
  if (KiemTraDauVaoRong("HoTen", HoTen) == true) {
    loi++;
  }
  if (KiemTraDauVaoRong("tenDangNhap", tenDangNhap) == true) {
    loi++;
  }
  if (validate.KiemTraTaiKhoan(tenDangNhap) == false) {
    loi++;
    DomID("tenDangNhap").style.borderColor = "red";
    errorUsername.style.display = "block";
    errorUsername.innerHTML = "Bắt đầu bằng chữ cái<br> Độ dài từ 8 -> 20 ký tự";
  }
  else {
    DomID("tenDangNhap").style.borderColor = "green";
    errorUsername.style.display = "none";
  }
  if (KiemTraDauVaoRong("matKhau", matKhau) == true) {
    loi++;
  }
  if (validate.KiemTraMatKhau(matKhau) == false) {
    loi++;
    DomID("matKhau").style.borderColor = "red";
    errorPassword.style.display = "block";
    errorPassword.innerHTML = "Phải có chữ và số <br> Độ dài từ 6 -> 15 ký tự";
  }
  else {
    DomID("matKhau").style.borderColor = "green";
    errorPassword.style.display = "none";
  }
  if (KiemTraDauVaoRong("nhapLaiMatKhau", nhapLaiMatKhau) == true) {
    loi++;
  }
  if (matKhau == nhapLaiMatKhau) {
    errorConfirm.style.display = "none";
  }
  else {
    errorConfirm.style.display = "block";
    errorConfirm.innerHTML = "không trùng khớp";
    DomID("nhapLaiMatKhau").style.borderColor = "red";
    loi++;
  }
  //   if (KiemTraDauVaoRong("gioiTinh", gioiTinh) == true) {
  //     loi++;
  //   }

  if (validate.KiemTraRong(email) == true) {
  } else {
    if (validate.KiemTraEmail(email) == false) {
      document.getElementById("Email").value = "";
      document.getElementById("Email").placeholder = "Sai định dạng";
      loi++;
    }
  }

  if (validate.KiemTraRong(sdt) == true) {
  } else {
    if (validate.KiemTraSoDT(sdt) == false) {
      document.getElementById("SDT").value = "";
      document.getElementById("SDT").placeholder = "Sai định dạng";
      loi++;
    }
  }
  if (loi != 0) {
    return false;
  }
  else{
    return true;
  }
}

function DangNhap() {
  var tenDangNhap = DomID("tenDangNhap").value;
  var matKhau = DomID("matKhau").value;
  var loi = 0;
  if (KiemTraDauVaoRong("tenDangNhap", tenDangNhap) == true) {
    loi++;
  }
  if (KiemTraDauVaoRong("matKhau", matKhau) == true) {
    loi++;
  }
  
  if (loi != 0) {
    return false;
  }
  else{
    return true;
  }
}

function KiemTraDauVaoRong(ID, value) {
  if (validate.KiemTraRong(value) == true) {
    DomID(ID).style.borderColor = "red";
    DomID(ID).placeholder = "Nhập thông tin vào đây!";
    
    return true;
  } else {
    DomID(ID).style.borderColor = "green";
    return false;
  }
}


