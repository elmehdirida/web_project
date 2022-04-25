<?php 
session_start();
if($_SESSION['etat']=='ON'){
    header('location:project.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Page</title>
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container-fluid c1">
        <form class="login_form" action="users_login.php" method="post" id="form">
            <div class="form-group">
                <a  href="project.php"><img  src="logo.png"  class="rounded"  alt="sign up" width="200px" height="100px" ></a>
                <p style=" font-size: 30px;">
                    <strong>
                        Login 
                    </strong> 
             
                </p>
                <label for="email" class="input_form" >
                     <strong>
                        E-mail
                     </strong> 
                </label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter Votre E-mail" style="padding: 15px;" required>
           </div>
            <div class="form-group">
              <label class="input_form">
                 <strong>
                      Password
                 </strong> 
              </label>
              <input name="pass" style="padding: 15px;"  id="pass" type="password" class="form-control"  placeholder="Enter your password" >
              <span style="color:red;display:none;" id="err_pass"  >password Invalide Entez Au moins 6 charactéres</span><br>
            </div>
            
            <input type="submit" value="Login" style="width: 100%;margin-top: 20px;font-family: sans-serif;padding: 15px;" class="btn btn-primary"></input>
            <p class="password" ><a class="pass" href="#">Forgot Password?</a></p><p style="color: gray;">OR</p>
            <p style="color: gray;">Login with <a href="#"><i class="fa fa-facebook face"></i></a><a style="padding:5px;" href="#"><i style="background-color: #BB001B;" class="fa fa-google face"></i></a></p>
            <p style="color: gray; padding: 10px;">Don't have an account ?<a style="color:black" class="pass" href="//localhost/project/sign_page.php"> Register</a></p>
          </form>
    </div>  
</body>
<script>
    var form = document.getElementById("form");

form.addEventListener("submit", formValidation);

function formValidation (event) {
    event.preventDefault()
    var pass = document.getElementById("pass")
    var passValide = false
    if(pass.value.length >= 6) {
        passValide = true
    }
    if(passValide) {
        document.getElementById("err_pass").style.display = "none";
    }else {
        document.getElementById("err_pass").style.display = "inline";
    }
     if(passValide)
     
    form.submit(); 
   }

</script>
</html>