document.forms['filterFeature'].onreset = filterBox();

// All filter function
// Spoiler: it is uneffective to the performance and yet could not think and create a better algorithm for this feature.

function filterBox() {
    var table, tr, tmpSearchName,searchName, genderArray, gender, breedArray, range, priceMin, priceMax;
    const displayArray = [], breed = [], newRange = [], tmpBreed= [];
    table = document.getElementById("tableDesign");
    tr = table.getElementsByTagName("tr");

    // Reset every row to visible
    for (r = 0; r < tr.length; r++) {
        displayArray.push(r);
        tr[r].style.display = "none";
    }

    // Filter for name
    tmpSearchName = document.getElementById("searchBox").value;
    searchName = tmpSearchName.toLowerCase();
    
    // Filter for Gender
    genderArray = document.getElementsByName("gender");
    for (l = 0; l < genderArray.length; l++) {
        if (genderArray[l].checked == true) {
            gender = genderArray[l].value;
            break;
        }
    }

    // Filter by price range
    range = document.getElementsByName("priceRange");
    newRange.push(range[0].value);
    newRange.push(range[1].value);

    // Filter Breed (Exclue for bird.html coz no breed available)
    currentPage = window.location.href;

    if (!currentPage.includes("bird.html")) {
        breedArray = document.getElementsByName("breed");
        for (l = 0; l < breedArray.length; l++) {
            if (breedArray[l].checked == true) {
                breed.push(breedArray[l].id);
            }
        }
    }
    
    // The complex start here
    if (!currentPage.includes("bird.html")) {
        if (breed != "") {
            for (b = 0; b < breed.length; b++) {
                for (i = 0; i < displayArray.length; i++) {
                    item = displayArray[i];
                    td = tr[item].getElementsByTagName("td")[1];
                    textValue = td.getElementsByTagName("a")[0].id;
                    
                    if (textValue == breed[b]) {
                        tmpBreed.push(i)          
                    }
                }
            }
            displayArray.splice(0, displayArray.length);
            for (item = 0; item < tmpBreed.length; item++) {
                displayArray.push(tmpBreed[item]);
            }
        }
    }
    
    // Search box Filter
    if (searchName != "") {
        for (i = (displayArray.length)-1; i > -1; i--) {
            item = displayArray[i];
            td = tr[item].getElementsByTagName("td")[1];
            textValue = td.getElementsByTagName("a")[0].innerHTML;
            if (textValue) {
                index = textValue.indexOf("(");
                new_td = textValue.slice(0, index).toLowerCase();
                if (new_td.includes(searchName) == false) {
                    displayArray.splice(i, 1);
                } 
            }
        }
    } 

    // Gender filter
    if (gender != "") {
        if (gender != "both") {
            for (i = (displayArray.length)-1; i > -1; i--) {
                item = displayArray[i];
                td = tr[item].getElementsByTagName("td")[1];
                textValue = td.getElementsByTagName("a")[0].innerHTML;
    
                if (textValue) {
                    index = textValue.indexOf("(");
                    new_td = textValue.charAt(index + 1);
                    if (new_td != gender) {
                        displayArray.splice(i, 1);           
                    }
                }
            }
        }
    }

    // Price filter
    if (newRange[0] != "" || newRange[1] != "") {
        if (newRange[0] == "") {
            priceMin = false;
        }
        if (newRange[1] == "") {
            priceMax = false;
        }

        for (i = (displayArray.length)-1; i > -1; i--) {
            item = displayArray[i];
            td = tr[item].getElementsByTagName("td")[1];
            textValue = td.getElementsByClassName("price")[0].innerHTML;

            if (textValue) {
                index = textValue.indexOf("M");
                new_td = Number(textValue.slice(index+1));

                if (priceMin != false) {
                    if (new_td < Number(newRange[0])) {
                        displayArray.splice(i, 1);           
                    }
                }
                if (priceMax != false) {
                    if (new_td > Number(newRange[1])) {
                        displayArray.splice(i, 1);
                    }
                }
            }
        }
    }

    // Display Visible Rows
    for (i = 0; i < tr.length; i++) {
        for (r = 0; r < displayArray.length; r++) {
            if (displayArray[r] == i) {
                tr[i].style.display = "";
            }
        }
    }
}


// Sort Price
function sortPrice(option) {
    var table, tr, tmpTable, swap, shouldSwap, x, y, price_x, price_y;
    table = document.getElementById("tableDesign");
    swap = true;

    while (swap) {
        swap = false;
        tmpTable = table;
        tr = tmpTable.getElementsByTagName("tr");

        for (i = 0; i < (tr.length-1); i++) {
            shouldSwap = false;

            x = tr[i].getElementsByTagName("td")[1];
            price_x = x.getElementsByClassName("price")[0].innerHTML;       
            y = tr[i+1].getElementsByTagName("td")[1];
            price_y = y.getElementsByClassName("price")[0].innerHTML;

            if (price_y > price_x && option == "highLow") {
                shouldSwap = true;
                break;
            }
            else if (price_x > price_y && option == "lowHigh") {
                shouldSwap = true;
                break;
            }
        }

        if (shouldSwap == true) {
            tr[i].parentNode.insertBefore(tr[i + 1], tr[i]);
            swap = true;
        }
    }
} 
