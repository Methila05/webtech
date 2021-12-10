
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



function validTrainName() {
    if (document.getElementById("trainName").value == "") {
        document.getElementById("trainNameErr").innerHTML = "*Train Name cannot be blank";
        document.getElementById("trainName").style.borderColor = "red";
    } else if (document.getElementById("trainName").value.split(' ').length < 1) {
        document.getElementById("trainNameErr").innerHTML = "*Train name must be single words";
        document.getElementById("trainName").style.borderColor = "red";
    } else if (!document.getElementById("trainName").value.match(/^[A-Za-z ]*$/)) {
        document.getElementById("trainNameErr").innerHTML = "*For train name only upper/lower case letters and white spaces are allowed";
        document.getElementById("trainName").style.borderColor = "red";
    } else {
        document.getElementById("trainNameErr").innerHTML = "";
        document.getElementById("trainName").style.borderColor = "purple";
    }
}

function validTrainLocation(){
    if (document.getElementById("trainLocation").value == "") {
        document.getElementById("trainLocationErr").innerHTML = "*Location cannot be blank";
        document.getElementById("trainLocation").style.borderColor = "red";
    }
}



function validTrainFrom(){
    if (document.getElementById("trainFrom").value == "") {
        document.getElementById("fromErr").innerHTML = "*Please select a location";
        document.getElementById("trainFrom").style.borderColor = "red";
    }
}



function validTrainTo(){
    if (document.getElementById("trainTo").value == "") {
        document.getElementById("toErr").innerHTML = "*Please select a location";
        document.getElementById("trainTo").style.borderColor = "red";
    }
}