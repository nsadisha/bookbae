function validateregisterForm(_form){
    if(_form["contact"].value.length != 9){
        alert("Invalid phone number.\n\nHint: exclude 0 \nExample: 794586932")
        return false;
    }
    if(_form["password"].value.length < 8){
        alert("Password must have atleast 8 charactors!")
        return false;
    }
    if(_form["conpassword"].value != _form["password"].value){
        alert("Confirm password did not matched!")
        return false;
    }
    return true;
}