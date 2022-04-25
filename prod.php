<?php 
session_start();
$_SESSION['location']="prod";
include"connection.php";
if(isset($_POST["prod"])){
if(!isset($_SESSION[$_POST["prod"]])){
    $_SESSION['prod']=$_POST["prod"];
}}
if(isset($_GET['logout']))
{
  if($_GET['logout'])
  session_destroy(); 
  header("location:project.php");
} 
$sql="select description,idproduit, nom_article,nom_mar,nom_prod,prix from article a,marque m ,produits p
where a.idarticle=m.idarticle
and m.idmarque=p.idmarque and
 nom_prod='".$_SESSION['prod']."'";
?>
<!DOCTYPE html>
    <html lang="fr">
  <head>
    <meta charset="UTF-8">
   
    <title>Article</title>
    <script src="./bootsrapp/js/bootstrap.bundle.min.js"></script>
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./fa/css/font-awesome.min.css">

    <style>
      .comments-title {
    font-size: 30px;
    margin-bottom: 30px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
    border-radius: 50%;

}

.ava-comment {
    width: 60px;
    height: 60px;
}

.comment-content {
    margin-left: 80px;
}
.comment-name{
  font-size: 30px;
}

.comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}
.comment-time {
      text-align: right;

    font-size: 16px;
    color: #b4b7c1;
}
.comment-text {
    font-size: 13px;
    line-height: 18px;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding:20px;
}
.panier{
    border-width: 2px;
    border-color: orange;
    border-radius: 10px;
    border-style: solid;
    font-size: 20px;
    font-family:cursive;
    cursor: pointer;
    padding: 5px;
    width: 200px;
    height: 50px;
    background-color: orange;
    }
     .imag {
margin:auto;      
display :block;
  border: 4px solid; ;
    width: 120px;
      height: 100px;
      margin-bottom:18px ;

    }
    .imag:hover{
        border: 2px dashed black ;
    }

    .image-center{
        width: 200px;
        height: 200px;
        margin-top:60px ;
    }
   
    .card img{
      margin:auto;
      width:100%;
    }
   
   
    body{
        margin-top: 10px;
    }
form label{
    font-size: 25px;
}  
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }
  
  .review-form {
    width: 400px;
    padding: 20px;
    margin: 40px;
    border: 1px solid #d8d8d8;
  }
  
  .review-form input {
    width: 100%;  
    height: 25px;
    margin-bottom: 20px;
  }
  
  textarea {
    width: 100%;
    height: 60px;
    border-radius: 10px;

  }

    </style>
   </head>

  <body class="bg-light"> 
    <!-- Modal -->
<div class="modal fade" id="panier">
  <div class="modal-dialog">
    <div class="modal-content">
      <iframe src="panier.php" width="100%" height="700"></iframe>
  </div>
</div>
  </div>
  <div class=" ">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light ">
          <div class="container-fluid">
              <a href="project.php" class="navbar-brand">FARM</a>
              <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                  <form class="d-flex">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" size="150">
                    <button class="btn btn-dark " id="search_btn" type="button">Rechercher</button></div>
                  </form>
                  <div class="navbar-nav ">
                      <a id="conn" href="login_page.php" class="nav-item nav-link border border-3" >Connexion</a>
                      <a id="insc" href="sign_page.php" class="nav-item nav-link border border-3 ">Inscription</a>
                      <a href="#cart" data-bs-toggle="modal" data-bs-target="#panier" ><i class="fa fa-shopping-cart fa-3x cart"></i>
                      </a>   
                       <a id="deco" href="?logout=1" class="nav-item nav-link" hidden >Deconnexion</a>
                       <a id="pan" href="panier.php" class="nav-item nav-link " >panier</a>


                  </div>
              </div>
          </div>
      </nav>
      



      <?php           
            $donnes=$conn->query($sql);
           while($ligne =$donnes->fetch_assoc()){
             $_SESSION['idp']=$ligne['idproduit'];
          ?>
    <div class="container-fluid  border border-3 mt-5" >
        <div class="row mt-5">
            <div class="col-sm-3 h-75">
              <img  id="img1" onmouseover="change(1)" class="imag"  src="prod/<?php  echo $ligne["nom_article"].'/'.$ligne["nom_mar"].'/'.$ligne["nom_prod"].'/'.$ligne["nom_prod"];?>.jpg">
              <img id="img2" onmouseover="change(2)"  class="imag" src="prod/<?php  echo $ligne["nom_article"].'/'.$ligne["nom_mar"].'/'.$ligne["nom_prod"].'/'."1";?>.jpg">
              <img id="img3" onmouseover="change(3)"  class="imag" src="prod/<?php  echo $ligne["nom_article"].'/'.$ligne["nom_mar"].'/'.$ligne["nom_prod"].'/'."2";?>.jpg">
              <img id="img4" onmouseover="change(4)"  class="imag" src="prod/<?php  echo $ligne["nom_article"].'/'.$ligne["nom_mar"].'/'.$ligne["nom_prod"].'/'."3";?>.jpg">
          </div>
        <div class="col-sm-4">
          <div  class="card h-100 "   style="width: 20rem ; "> 
        <img  id="img"  class=" card-img-top image-center h-75"  src="prod/<?php  echo $ligne["nom_article"].'/'.$ligne["nom_mar"].'/'.$ligne["nom_prod"].'/'.$ligne["nom_prod"];?>.jpg">
        <div class="card-body">
          <h3 style="font-size: 25px;" class="card-tittle badge bg-warning">Description</h3>
          <p class="card-text"><?php echo $ligne['description'];?></p>
        </div>
        </div>
        </div>
          <div class="col-sm-5 ">
      <h1><?php  echo $ligne["nom_prod"]?></h1><br>
      <h4>Prix</h4>
      <h4> <div class="badge bg-warning"><?php  echo $ligne["prix"]." "?>DH</div></h4>
      <h4>Taille :</h4><br>
      <form action="panier.php" method="post">
     <select name="taile">
         <option value="Small">SM</option>
         <option value="Meduim">MD</option> 
         <option value="Large">LG</option>
      </select>   <br>
     <h4>Quantite :</h4>  
     <div class="input-group">
  <a class="btn btn-outline bg-primary" onclick="change_qtt(0)" >-</a>
       <input  type="number"  name="qtt" readonly value="1" min="1" id="qtt" >
     <a class="btn btn-outline bg-primary" onclick="change_qtt(1)">+</a> 
</div>
     <br>
        <p><i class="fa fa-shopping-cart fa-3x"></i>

     <input type="hidden" name="pan" value="<?php  echo $_SESSION['prod']?>">
      <input class="panier" type="submit" value="Ajouter au pnaier"  >
    </form>
    <form action="pdf.php" method="post" id="pdf">
    <div>
    <input type="hidden" name="prod" value="<?php  echo $_SESSION['prod']?>">
      <a  onclick="document.getElementById('pdf').submit();"  class="badge bg-info" style="font-size:20px; text-decoration:none;cursor:pointer;">Telecharger Le fichier de description<i class="fa fa-download" ></i></a> 
    </div>
</form>
    </p>
</div>
      </div>
      </div>

      <?php }?>
  <!-- Affichage des commentaiers-->
  <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" >
  <li class="nav-item">
    <button class="nav-link active button2"  data-bs-toggle="pill" data-bs-target="#com" type="button"  >Comentaire</button>
  </li>
  <li class="nav-item" >
    <button class="nav-link button2"  data-bs-toggle="pill" data-bs-target="#add_com" type="button" >ajouter Comentaire</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active " id="com" >
    <div class="container">
        <?php
        $sql1="select count(*) as count from commentaire
        where idproduit='".$_SESSION['idp']."'";
        $res1=$conn->query($sql1);
        if($res1->num_rows>0){
       while($row1 =$res1->fetch_assoc()){
         $count=$row1["count"];
       }}
     $sql="select * from commentaire
      where idproduit='".$_SESSION['idp']."'";
        $donnes=$conn->query($sql);
        if($donnes->num_rows>0){?>
          <h1 class="comments-title">Commentaires (<?php echo $count; ?>)</h1>
          <?php

       while($ligne =$donnes->fetch_assoc()){
        ?>
        
        <div class="comment">
              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="img-comment">
          <div class="comment-content">
            
              <span class="comment-name"><?php echo $ligne['c_nom']; ?></span>
              <span class="comment-time">
                <i class="fa fa-clock-o"></i>
                <?php echo $ligne['datecmt']; ?>   
                 </span>
            <p class="comment-text">
            <?php echo $ligne['commentaire']; ?>
            </p>
          </div>
       </div>

      <?php 
      }}
      ?> 
      </div>
    </div>
  <div class="tab-pane fade" id="add_com"  >
    <form class="review-form" action="sub_com.php" method="post" >
      <p>
        <label for="name">Name:</label>
        <input  id="name" class="input_com" name="name">
      </p>
      <p>
        <label for="review">Review:</label>      
        <textarea id="review" name="review"></textarea>
      </p>
      <p>
        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
          <option value="5">5</option>
          <option value="4">4</option>
          <option value="3">3</option>
          <option value="2">2</option>
          <option value="1">1</option>
        </select>
      </p>
      <p>
      <input  type="hidden" name="id-prod"  value="<?php  echo $_SESSION['idp']?>">
        <input type="submit">  
      </p>    
  </form>
</div>
</div>
<footer style="background-color: #eee6d3;">
    <div class="container-fluid my-5">
      <div class="row ">
        <div class="col-sm-6 mt-5 ">
          <h5 class="mb-3 text-dark">HELP & INFORMATION</h5>
          <p>
           Un site de vente en ligne realiser par :
           <ul>
             <li>El Mehdi Rida</li>
             <li>El guarrab  Amal</li>
             <li>El idrissi Meryem</li>
             <li>Dechraoui Fatima zehra</li>
           </ul> 
          </p>
        </div>
        <div class="col-sm-3  mt-5 ">
          <h5 class="mb-3 text-dark">ABOUT FARM</h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-1">
              <a href="#!" style="color: #4f4f4f;text-decoration:none;" >About us</a>
            </li>
            <li class="mb-1">
              <a href="#!" style="color: #4f4f4f;text-decoration:none;">Contact us</a>
            </li>
            <li class="mb-1">
              <a href="#!" style="color: #4f4f4f;text-decoration:none;">Sponsors</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-3  mt-5 ">
          <h5 class="mb-1 text-dark">OPENING HOURS</h5>
          <table class="table" style="border-color: #666;">
            <tbody>
              <tr>
                <td>Mon - Fri:</td>
                <td>8am - 9pm</td>
              </tr>
              <tr>
                <td>Sat - Sun:</td>
                <td>8am - 1am</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright: FARM
  </footer>


     <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
var x ="<?php echo $_SESSION['etat']?>";
        if(x != "OFF")
  {
    document.getElementById('conn').hidden=true;
    document.getElementById('insc').hidden=true;
    document.getElementById('deco').hidden=false;
    document.getElementById('prof').hidden=false;
  }
  else  {
    document.getElementById('conn').hidden=false;
    document.getElementById('insc').hidden=false;
    document.getElementById('deco').hidden=true;
    document.getElementById('prof').hidden=true;
  }
  function deconnexion() {
  }

function change(x){
  var img1=document.getElementById("img1").src;
  var img2=document.getElementById("img2").src;
  var img3=document.getElementById("img3").src;
  var img4=document.getElementById("img4").src;
  var main=document.getElementById("img");

  if(x==1){
    main.setAttribute('src',img1);
  }else if (x==2)
  {
    main.setAttribute('src',img2);

  }else if(x==3){
    main.setAttribute('src',img3);
  }
  else if(x==4){
    main.setAttribute('src',img4);

  }
}
function change_qtt(x) {
  var qtt=document.getElementById('qtt');
  var qttv=document.getElementById('qtt').value;
  if(x==1){
    qtt.value=parseInt(qttv)+1;
  }
  else if(x==0 && qtt.value >1 )
  {
    qtt.value=parseInt(qttv)-1;

  }
  
}

</script>
      </body>
      </html>