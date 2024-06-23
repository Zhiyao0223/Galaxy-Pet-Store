// Display change only if phone num is filled
function checkBlank() {
  resetForms();
  var contact = document.getElementById("phone_num");
  var a = document.getElementsByClassName("confirmation");

  if (contact.value.length == 0) {
    contact.removeAttribute("readonly");
    a[2].style.display = "none";
  }
}

// Reset form
function resetForms() {
  document.getElementById("editProfile").reset();
}

// Toggle modal box
function verification(option, type) {
  var verifyModal = document.getElementById("verificationModal");
  var passModal = document.getElementById("passwordModal");

  if (option == "open") {
    if (type == "email") {
      verifyModal.style.display = "block";
    } else if (type == "pass") {
      passModal.style.display = "block";
    }
    document.getElementById("password").value = "";
  } else if (option == "close") {
    if (type == "email") {
      verifyModal.style.display = "none";
      document.getElementById("password").value = "";
    } else if (type == "pass") {
      passModal.style.display = "none";
      document.getElementById("oldPass").value = "";
      document.getElementById("newPass").value = "";
      document.getElementById("confirmPass").value = "";
    }
  } else {
    alert("An error has occured. Please try again");
  }
}

// Verify identity before modify
function checkPass(realPass) {
  var inputPass;
  inputPass = document.getElementById("password").value;
  if (realPass == inputPass) {
    document.getElementById("email").removeAttribute("readonly");
    alert("Verify Success");
    verification("close", "email");
    return;
  }
  alert("Invalid password. Please try again");
}

// Validate phone number
function phone_number() {
  var phone_number = document.getElementById("phone_num").value;
  var isnum = /^\d+$/.test(phone_number);
  if (phone_number == "") {
    document.getElementById("phone_num").style.border = "1px solid black";
    return true;
  } else if (isnum) {
    if (phone_number.length == 10 || phone_number.length == 11) {
      document.getElementById("phone_num").style.border = "1px solid black";
      return true;
    } else {
      document.getElementById("phone_num").style.border = "solid red";
    }
  } else {
    document.getElementById("phone_num").style.border = "solid red";
  }
  return false;
}

// Validate date
function validate_dob() {
  var date = document.getElementById("date").value;
  if (date != "") {
    var new_date = new Date(date);
    var currentDate = new Date();
    var diff_year = Math.ceil(
      (currentDate - new_date) / (1000 * 60 * 60 * 24 * 365)
    );

    if (diff_year < 7 && diff_year >= 0) {
      alert("Error: Too young to own an account.");
      document.getElementById("date").value = "";
      return false;
    } else if (diff_year < 0) {
      alert("Error: Invalid Date of Birth. Please try again.");
      document.getElementById("date").value = "";
      return false;
    }
    return true;
  }
}

// Validate again before submit form for editting
function validate() {
  phoneStatus = phone_number();
  dobStatus = validate_dob();

  if (phoneStatus == true && dobStatus == true) {
    alert("0");
  } else {
    alert("-1");
  }
}

function test() {
  alert("yet");
}
