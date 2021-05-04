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
  if (KiemTraDauVaoRong("matKhau", matKhau) == true) {
    loi++;
  }
  if (KiemTraDauVaoRong("nhapLaiMatKhau", nhapLaiMatKhau) == true) {
    loi++;
  }
  //   if (KiemTraDauVaoRong("gioiTinh", gioiTinh) == true) {
  //     loi++;
  //   }
  /*if (KiemTraDauVaoRong("Email", email) == true) {
    loi++;
  } else {
    if (validate.KiemTraEmail(email)) {
      document.getElementById("Email").style.borderColor = "green";
    } else {
      document.getElementById("Email").style.borderColor = "red";
      loi++;
    }
  }
  if (KiemTraDauVaoRong("SDT", sdt) == true) {
    loi++;
  } else {
    if (validate.KiemTraSoDT(sdt)) {
      document.getElementById("SDT").style.borderColor = "green";
    } else {
      document.getElementById("SDT").style.borderColor = "red";
      loi++;
    }
  }
*/
  if (loi !=0) {
    return false;
  }else return true;
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

function sua_soluong(gia){
  var soluong;
  soluong=document.getElementById('soluong').value;
  document.getElementById('tien').innerHTML=soluong*gia;
 // document.getElementById('demo').innerHTML=currency_formatt(soluong*gia);
  
}

