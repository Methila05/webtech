
function validEmail() {
    if (document.getElementById("email").value == "") {
        document.getElementById("emailErr").innerHTML = "*Email cannot be blank";
        document.getElementById("email").style.borderColor = "red";
    } else if (!document.getElementById("email").value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        document.getElementById("emailErr").innerHTML = "*Please enter a valid email address";
        document.getElementById("email").style.borderColor = "red";
    } else {
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "purple";
    }
}

function validPass() {
    if (document.getElementById("pass").value == "") {
        document.getElementById("passErr").innerHTML = "*Password cannot be blank";
        document.getElementById("pass").style.borderColor = "red";
    } else if (document.getElementById("pass").value.length < 5) {
        document.getElementById("passErr").innerHTML = "*Password must not be less than six (6) characters";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[A-Z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[a-z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[0-9]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else {
        document.getElementById("passErr").innerHTML = "";
        document.getElementById("pass").style.borderColor = "purple";
    }
}

function validConPass() {
    if (document.getElementById("conPass").value == "") {
        document.getElementById("conPassErr").innerHTML = "*Confirm Password cannot be blank";
        document.getElementById("conPass").style.borderColor = "red";
    } else if (document.getElementById("conPass").value != document.getElementById("pass").value) {
        document.getElementById("conPassErr").innerHTML = "*Password and confirm password does not match";
        document.getElementById("conPass").style.borderColor = "red";
    } else {
        document.getElementById("conPassErr").innerHTML = "";
        document.getElementById("conPass").style.borderColor = "purple";
    }
}



function validTicketId() {
    if (document.getElementById("ticketId").value == "") {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID cannot be blank";
        document.getElementById("ticketId").style.borderColor = "red";
    } else if (!document.getElementById("ticketId").value.match(/^[0-9]+$/)) {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID must contain only numbers";
        document.getElementById("ticketId").style.borderColor = "red";
    } else {
        document.getElementById("ticketIdErr").innerHTML = "";
        document.getElementById("ticketId").style.borderColor = "purple";
    }
}



function valiPlaneName() {
    if (document.getElementById("planeName").value == "") {
        document.getElementById("planeNameErr").innerHTML = "*Plane name cannot be blank";
        document.getElementById("planeName").style.borderColor = "red";
    } else if (document.getElementById("planeName").value.split(' ').length < 1) {
        document.getElementById("planeNameErr").innerHTML = "*Plane name must be single words";
        document.getElementById("planeName").style.borderColor = "red";
    } else if (!document.getElementById("planeName").value.match(/^[A-Za-z ]*$/)) {
        document.getElementById("planeNameErr").innerHTML = "*For plane name only upper/lower case letters and white spaces are allowed";
        document.getElementById("planeName").style.borderColor = "red";
    } else {
        document.getElementById("planeNameErr").innerHTML = "";
        document.getElementById("planeName").style.borderColor = "purple";
    }
}

function validPlaneLocation(){
    if (document.getElementById("planeLocation").value == "") {
        document.getElementById("planeLocationErr").innerHTML = "*Location cannot be blank";
        document.getElementById("planeLocation").style.borderColor = "red";
    }
}



function validPlaneFrom(){
    if (document.getElementById("planeFrom").value == "") {
        document.getElementById("fromErr").innerHTML = "*Please select a location";
        document.getElementById("planeFrom").style.borderColor = "red";
    }
}



function validPlaneTo(){
    if (document.getElementById("planeTo").value == "") {
        document.getElementById("toErr").innerHTML = "*Please select a location";
        document.getElementById("planeTo").style.borderColor = "red";
    }
}