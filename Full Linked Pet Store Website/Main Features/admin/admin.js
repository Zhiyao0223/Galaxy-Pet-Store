function toggleBox(selected) {
    displayArray = document.getElementsByClassName("category");

    for (let i = 0; i < displayArray.length; i++) {
        displayArray[i].style.display = "none";
    }
    displayArray[selected].style.display = "block";
}