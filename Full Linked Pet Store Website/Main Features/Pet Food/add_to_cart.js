function add() {
  currentItem = document.getElementById("cartItemQuantity").value;
  currentItem = parseInt(currentItem);
  currentItem += 1;
  document.getElementById("cartItemQuantity").value = currentItem;
}
