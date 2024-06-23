// Validate phone length
function phone_number() {
  var phone_number = document.getElementById("telephone").value;
  var isnum = /^\d+$/.test(phone_number);
  if (phone_number == "") {
    document.getElementById("telephone").style.border = "1px solid black";
    return false;
  } else if (isnum) {
    if (phone_number.length == 10 || phone_number.length == 11) {
      document.getElementById("telephone").style.border = "1px solid black";
      return true;
    } else {
      document.getElementById("telephone").style.border = "solid red";
      alert("Please enter a valid phone number");
    }
  } else {
    document.getElementById("telephone").style.border = "solid red";
    alert("Please enter a valid phone number");
  }
  return false;
}

// Validate booking date
function booking() {
  var booking = document.getElementById("booking_date").value;

  if (booking == "") {
    return;
  }
  var today = new Date();
  var currentYear = today.getFullYear();
  var currentMonth = today.getMonth() + 1;
  var currentDay = today.getDate();

  date = booking.split("-");
  const d = new Date(booking);
  var day = d.getDay();
  if (day == "0") {
    alert("We are closed on Sunday!");
    document.getElementById("booking_date").value = "";
    return;
  }

  if (date[0] >= currentYear) {
    if (date[1] >= currentMonth) {
      if (date[1] == currentMonth) {
        if (date[2] > currentDay) {
          return;
        } else if (date[2] == currentDay) {
          alert("Booking need 1 day prior notice. Please select another date.");
          return;
        }
      } else {
        return;
      }
    }
  }

  alert("Error: Invalid Booking Date.");
  document.getElementById("booking_date").value = "";
}

// Validate booking hour
function hour() {
  var time = document.getElementById("bookingTime").value;
  var new_time = time.split(":");
  var booking = document.getElementById("booking_date").value;

  const d = new Date(booking);
  var day = d.getDay();
  if (day == "6") {
    if (new_time[0] >= 10 && new_time[0] < 15) {
      return;
    }
  } else if (new_time[0] >= 9 && new_time[0] < 18) {
    return;
  }

  alert("Error: Invalid Booking Hour.");
  document.getElementById("bookingTime").value = "";
}
