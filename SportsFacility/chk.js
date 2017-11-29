function valid() {
    var reObj = document.getElementById("#formSection");
    var UserName = reObj.User_name.value;
    var Password = reObj.User_password.value;
    var everythingOK = true;

    if (!validateName(UserName)) {
        alert("Error:Username was not entered.");
        everythingOK = false;
    }

    if (!validateName(Password)) {
        alert("Error: Please enter a password.");
        everythingOK = false;
    }

    if (everythingOK) {
        alert("Thank you!.\nLog in using your new information!");
        return true;
    }
    else
        return false;
}

function validateName(UserName) {
    var p = UserName.search(/^[-'\w\s]+$/);
    if (p == 0)
        return true;
    else
        return false;

}

function validateName(Password) {
    var p = Password.search(/^[-'\w\s]+$/);
    if (p == 0)
        return true;
    else
        return false;

}

