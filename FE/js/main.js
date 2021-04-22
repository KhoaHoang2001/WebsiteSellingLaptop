var validate = new Validation();

function DomID(id) {
  var element = document.getElementById(id);
  return element;
}


function DangNhap() {
  var tenDangNhap = DomID("tenDangNhap").value;
  var matKhau = DomID("matKhau").value;

  if (KiemTraDauVaoRong("tenDangNhap", tenDangNhap) == true) {
      console.log("erro");
  }
  if (KiemTraDauVaoRong("matKhau", matKhau) == true) {
  }
}

function KiemTraDauVaoRong(ID, value) {
  if (validate.KiemTraRong(value) == true) {
      DomID(ID).style.borderColor = "red";
      DomID(ID).placeholder = "Không được rỗng";
      return true;
  }
  else{
    DomID(ID).style.borderColor = "";
    return false;
  }
}