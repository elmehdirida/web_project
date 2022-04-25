var form = document.getElementById("form");

form.addEventListener("submit", formValidation);

function formValidation (event) {
    event.preventDefault()
 // Validation nom
    var nom = document.getElementById("fname");
    var nomValide = false;
    if(nom.value.length > 3) {
        nomValide = true;
    }
    if(nomValide) {
        document.getElementById("err_nom").style.display = "none";
    }else {
        document.getElementById("err_nom").style.display = "inline";
    }

    // Validation prenom
    var prenom = document.getElementById("lname")
    var prenomValide = false;
    if(prenom.value.length > 3) {
        prenomValide = true;
    }
    if(prenomValide) {
        document.getElementById("err_prenom").style.display = "none";
    }else {
        document.getElementById("err_prenom").style.display = "inline";
    }

    // Validation adresse
    var add = document.getElementById("adresse")
    var addValide = false;
    if(add.value.length >= 10) {
        addValide = true;
    }
    if(addValide) {
        document.getElementById("err_add").style.display = "none";
    }else {
        document.getElementById("err_add").style.display = "inline";
    }

    // Validation telephone
    var tele = document.getElementById("tel")
    var televalide = false;
    if(tele.value.length >9) {
        televalide = true;
    }
    if(televalide) {
        document.getElementById("err_tel").style.display = "none";
    }else {
        document.getElementById("err_tel").style.display = "inline";
    }

    // Validation password1
    var pass1 = document.getElementById("pass1")
    var passValide1 = false
    if(pass1.value.length >= 6) {
        passValide1 = true
    }
    if(passValide1) {
        document.getElementById("err_pass1").style.display = "none";
    }else {
        document.getElementById("err_pass1").style.display = "inline";
    }

    // Validation password2
    var pass2 = document.getElementById("pass2")
    var passValide2 = false
    if(pass2.value.length >= 6 && pass2.value==pass1.value) {
        passValide2 = true
    }
    if(passValide2) {
        document.getElementById("err_pass2").style.display = "none";
    }else {
        document.getElementById("err_pass2").style.display = "inline";
    }
    if( nomValide && prenomValide && addValide && televalide && passValide1 && passValide2 ) {
        alert("Inscription Avec succes !")
form.submit();    }

}