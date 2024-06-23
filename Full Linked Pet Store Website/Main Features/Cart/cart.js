function test() {
  currentItem = document.getElementById("cartItemQuantity").value;
  currentItem = parseInt(currentItem);
  currentItem += 1;
  document.getElementById("cartItemQuantity").value = currentItem;
}

function changeQuantity(type, price, counter) {
  var quantity, new_quantity, total, subtotal, itemTotal;
  quantity = document.getElementsByClassName("number")[counter].value;
  quantity = parseInt(quantity);

  if (type == "add") {
    new_quantity = quantity + 1;
    document.getElementsByClassName("number")[counter].value = new_quantity;
  } else if (type == "sub") {
    if (quantity == 1) {
      alert("Please remove the item directly ~");
      return;
    } else {
      new_quantity = quantity - 1;
      document.getElementsByClassName("number")[counter].value = new_quantity;
    }
  } else {
    alert("Bug has been detected. Please contact admin ASAP.");
    return;
  }
  // Change amount bar
  total = (new_quantity * price).toFixed(2);
  document.getElementsByClassName("price")[counter].innerHTML = total;

  // Change Subtotal
  amount = document.getElementsByClassName("price");
  subtotal = parseFloat(0.0);
  for (let i = 0; i < amount.length; i++) {
    itemTotal = amount[i].innerHTML;
    itemTotal = parseFloat(itemTotal);
    subtotal += itemTotal;
  }
  document.getElementById("totalPrice").innerHTML = "RM " + subtotal.toFixed(2);
}

function checkOut() {
  var status = true;
  var boxArray = document.getElementsByName("tickBox[]");
  for (var l = 0; l < boxArray.length; l++) {
    if (boxArray[l].checked == true) {
      status = false;
      document.getElementById("cart").action = "../Payment/payment.php";
      location.href = "../Payment/payment.php";
      return true;
    }
  }
  if (status) {
    alert("No item selected for checkout");
    return false;
  }
}
