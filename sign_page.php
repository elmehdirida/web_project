<?php session_start();
if(isset($_SESSION["existe"])){
 ?>
 <script>alert("email deja existe !!!")</script>
 <?php } ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Page d'inscription</title>
</head>
<body>
    <div class="container-fluid " >
        <form class="login_form " action="intro.php" method="post" id="form">
            <a href="project.php"><img  src="logo.png"   alt="sign up" width="200px" height="100px" ></a>
            <div class="form-group">
                <p style=" font-size: 30px;">
                      Sign up
                </p>
                <label for="fname" class="input_form">
                    <strong>
                        Nom
                    </strong>
                </label >
                <input id="fname" name="fname"  class="form-control" type="text"  placeholder="Entre Votre Nom">
                <span style="color:red;display:none;" id="err_nom"  >Entrer Un Nom Valide(+3 caractéres)</span><br>

                <label for="lname" class="input_form">
                  <strong>
                    Prenom
                  </strong>
              </label >
              <input id="lname" name="lname" class="form-control" type="text"  placeholder="Entre Votre Prenom" >
              <span style="color:red;display:none;" id="err_prenom"  >Entrer Un Prenom Valide(+3 caractéres)</span><br>

              <label for="adresse" class="input_form">
                <strong>
                  Adresse
                </strong>
            </label >
            <input id="adresse" name="adresse" class="form-control" type="text"  placeholder="Entre Votre Adresse" >
            <span style="color:red;display:none;" id="err_add"  >Entrer Une Adresse Valide</span><br>

            <label for="tel" class="input_form">
                <strong>
                  Telephone
                </strong>
            </label >
            <input id="tel" name="tel" class="form-control" type="tel"  placeholder="Entre Votre Telephone" >
            <span style="color:red;display:none;" id="err_tel"  >Numero Invalide</span><br>
                <label for="email" class="input_form">

                <strong>
                    Email
                </strong>  
                </label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter Votre Email">
                <span style="color:red;display:none;" id="err_email"  >Email Invalide</span><br>

                <label for="pass">
                <strong>
                    Password
                </strong> 
                </label>
                <input id="pass1" name="pass"  type="password" class="form-control"  placeholder="Entre Votre Password">
                <span style="color:red;display:none;" id="err_pass1"  >Entez Au moins 6 charactéres</span><br>

                <label for="pass2" class="input_form" >
                <strong >
                      Confirm password
                </strong> 
                </label>
                <input id="pass2" name="pass2"  type="password" class="form-control"  placeholder="Confirm Your Password">
                                <span style="color:red;display:none;" id="err_pass2"  >Entez Au moins 6 charactéres ou pas identiques</span><br>

             </div>
            
            <p><button type="submit" style="width: 100%;margin-top: 20px;font-family: sans-serif;padding: 15px;" class="btn btn-primary">Register</button></p>
            <p style="color: black;">OR</p>
            <p style="color: black;">Sign up with <a href="#"><i class="fa fa-facebook face"></i></a><a style="padding:5px;" href="#"><i style="background-color: #BB001B;" class="fa fa-google face"></i></a></p>
            <p style="color: gray; padding: 10px;">Already have an account ?<a style="color:black" class="pass" href="login_page.php"> Login</a></p>
          </form>
    </div>
</body>
<script>
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
    form.submit();    }

}
</script>
</html>