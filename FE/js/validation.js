var Validation = function () {
  var valid = true;
  valid =
    checkNull("HoTen", "error_HoTen") &
    checkNull("tenDangNhap", "error_tenDangNhap") &
    checkNull("matKhau", "error_matKhau") &
    checkNull("nhapLaiMatKhau", "error_nhapLaiMatKhau") &
    checkNull("SDT", "error_SDT") &
    checkNull("email", "error_email");
  if (!valid) {
    return false;
  }
  return true;

  var checkNull = function (idValue, idError) {
    var textInputNull = document.getElementById(idValue);
    if (textInputNull.value.trim() === "") {
      document.getElementById(idError).innerHTML = "not null";
      return false;
    } else {
      document.getElementById(idError).style.display = "none";
      return true;
    }
  };
  var checkText = function (selectorValue, selectorError) {
    var textInput = document.querySelector(selectorValue);
    var regexText = /^[A-Za-z ]+$/;

    if (regexText.test(textInput.value)) {
      document.querySelector(selectorError).innerHTML = "";
      document.querySelector(selectorError).style.display = "none";
      return true;
    } else {
      document.querySelector(selectorError).innerHTML = "wrong";
      document.querySelector(selectorError).style.display = "block";
    }
  };
  var checkPassword = function (selectorValue, selectorError) {
    var inputPassword = document.querySelector(selectorValue);
    if (
      inputPassword.value.length >= inputPassword.minLength &&
      inputPassword.value.length <= inputPassword.maxLength
    ) {
      document.querySelector(selectorError).innerHTML = "";
      document.querySelector(selectorError).style.display = "none";
      return true;
    } else {
      document.querySelector(selectorError).innerHTML = "error length";
      document.querySelector(selectorError).style.display = "block";
      return false;
    }
  };
  var checkPhoneNumber = function (selectorValue, selectorError) {
    var regexPhoneNumber = /^[0-9]+$/;
    var inputPhoneNumber = document.querySelector(selectorValue);
    if (
      regexPhoneNumber.test(inputPhoneNumber.value) &
      (inputPhoneNumber.value.length === 10)
    ) {
      document.querySelector(selectorError).innerHTML = "";
      document.querySelector(selectorError).style.display = "none";
      return true;
    } else {
      document.querySelector(selectorError).innerHTML = "Falsee";
      document.querySelector(selectorError).style.display = "block";
    }
  };
  var checkEmail = function (selectorValue, selectorError) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\ [[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var inputEmail = document.querySelector(selectorValue);
    if (regex.test(inputEmail.value)) {
      document.querySelector(selectorError).innerHTML = "";
      document.querySelector(selectorError).style.display = "none";
      return true;
    } else {
      document.querySelector(selectorError).innerHTML = "wrong email";
      document.querySelector(selectorError).style.display = "block";
      return false;
    }
  };
};
