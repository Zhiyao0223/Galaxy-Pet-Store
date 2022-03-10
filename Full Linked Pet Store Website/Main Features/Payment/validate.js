// Validate zipcode length
function zipcode()
{
    var zipcode = document.getElementById("zip").value;
    var isnum = /^\d+$/.test(zipcode);
    if (zipcode == "") {
        document.getElementById("zip").style.border = "";
        return;
    }
    else if (isnum) {
        if (zipcode.length == 5) {
            document.getElementById("zip").style.border = "";
            return;
        }
        else {
            document.getElementById("zip").style.border = "solid red";
          }
    }
    else {
        document.getElementById("zip").style.border = "solid red";
    }
    alert("Please enter a valid zipcode !");
}

// Validate credit card number length
function creditnum()
{
    var creditnum = document.getElementById("ccnum").value;
    var isnum = /^\d+$/.test(creditnum);
    if (creditnum == "") {
        document.getElementById("ccnum").style.border = "";
        return;
    }
    else if (isnum) {
        if (creditnum.length == 16) {
            document.getElementById("ccnum").style.border = "";
            return;
        }
        else {
            document.getElementById("ccnum").style.border = "solid red";
          }
    }
    else {
        document.getElementById("ccnum").style.border = "solid red";
    }
    alert("Please enter a valid credit card number !");
}


// Validate expiry date
function expiry(value)
{
    if (value.length > 3) {
        var newvalue = value.substring(0,2) + value.substring(3);
    }
    else if (value.length == 3) {
        return;
    }
    else {
        newvalue = value;
    }
    var isnum = /^\d+$/.test(newvalue);
    if (value == "") {
        return false;
    }
    if (isnum) {
        if (value.length == 2) {
            var expiry = value.concat("/");
            document.getElementById("expdate").value = expiry;
        }
        else if (value.length == 5) {
            document.getElementById("expdate").style.border = "";
            return true;
        }
    }
    else {
        document.getElementById("expdate").style.border = "solid red";
        alert("Please enter a valid expiry date !")
        return false;
    }
}


// Validate cvv length
function cardverification()
{
    var cvv = document.getElementById("cvv").value;
    var isnum = /^\d+$/.test(cvv);
    if (cvv == "") {
        document.getElementById("cvv").style.border = "";
        return;
    }
    else if (isnum) {
        if (cvv.length == 3) {
            document.getElementById("cvv").style.border = "";
            return;
        }
        else {
            document.getElementById("cvv").style.border = "solid red";
          }
    }
    else {
        document.getElementById("cvv").style.border = "solid red";
    }
    alert("Please enter a valid cvv !");
}


// Submit form
function click() 
{   
    value = document.getElementById("expdate").value;
    expstatus = expiry(value);

    alert(expstatus)
    if (expstatus == true) {
        return true;
    }
    else {
        return false;
    }
}