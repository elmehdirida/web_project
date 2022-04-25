<?php
session_start();
if(!isset($_SESSION['etat']))
$_SESSION['etat']='OFF';
$_SESSION['location']="main";
 if(isset($_GET['logout']))
 {
   if($_GET['logout'])
   session_destroy(); 
   header("location:project.php");
 } 

include 'connection.php';
$sql1= "select idproduit,a.idarticle, nom_article,nom_mar,nom_prod,prix from article a,marque m ,produits p
where a.Idarticle=m.Idarticle
and m.idmarque=p.idmarque
order by rand() 
limit  28 ";
$sql2="select  * from article";
$sql3="select * from marque";
$sql4= "select a.Idarticle,Nom_mar from article a,marque m
where a.idarticle=m.idarticle";
$res1=$conn->query($sql1);
$res2=$conn->query($sql2);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./bootsrapp/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="./fa/css/font-awesome.min.css">
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./css/main.css">

    <title>PRINCIPALE</title>
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
<div class="mb-4 ">
      <nav class="navbar navbar-expand-lg fixed-top  navbar-light bg-light">
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
  </div>
 <div class="container-fluid  " > 
   <div class="row ">
     <div class="col-sm-2 bg-secondary mt-5" >
      <div class="collapse show " >
        
          <a href="" class="d-flex  pb-3 mb-3  text-decoration-none border-bottom">
            <span class="fs-5 link-dark m">Catégories</span>
          </a>
          
          <?php
      if($res2->num_rows>0)
{
      while($row2=$res2->fetch_assoc()){
            ?>
<ul class=" ps-0">
          <li class="mb-1">
              <button class="btn btn-toggle bg-primary rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#<?php echo $row2['nom_article']?>" >
              <?php echo $row2['nom_article']?>
              </button>
              <div class="collapse" id="<?php echo $row2['nom_article']?>">
                <div class="list-group text-start">
                <?php
                $res3=$conn->query($sql3);
      if($res3->num_rows>0)
{
      while($row3=$res3->fetch_assoc()){
        if($row3['Idarticle']==$row2['Idarticle']){
            ?>
            
                  <a onclick="hidd_main()" href="#list-<?php echo $row2['Idarticle'].$row3['Nom_mar']?>" class="list-group-item list-group-item-action" data-bs-toggle="list" aria-controls="list-<?php echo $row2['Idarticle'].$row3['Nom_mar']?>"><?php echo $row3['Nom_mar']?></a>
                  
                  <?php  } }}?>
                </div>


                
              </div>
            </li>
            
          
          <?php   }}?>
        </ul>
      </div>
      
     </div>
     <div class="col-sm-10 mt-5">
     <div class="tab-pane show active  " id="list-profile" > 
     <div id="demo-lar"  class="carousel slide"  data-bs-ride="carousel" >
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="caro1.jpg"  class=" d-block laro-img">
    </div>
    <div class="carousel-item">
      <img src="caro.jpg" class="d-block  laro-img">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo-lar" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo-lar" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<div class="container-fluid"   >
      <h4 class="mt-5">TOP PRODUIT</h4><hr>
      <div class="row">
          <?php
              $res1=$conn->query($sql1);

                if($res1->num_rows>0)
                {
                  while($row1=$res1->fetch_assoc()){
                    ?> 

                    <div class="col-sm-3 ">   
                    <div class="card m-1">
                        <form id="<?php  echo $row1["nom_prod"]?>" action="prod.php" method="post">
                          <input  type="hidden" name="prod"  value="<?php  echo $row1["nom_prod"]?>">
                          <input   type="image" target="_blanck"  src="prod/<?php  echo $row1["nom_article"].'/'.$row1["nom_mar"].'/'.$row1["nom_prod"].'/'.$row1["nom_prod"];?>.jpg" width="100%" height="100%">
                        </form>
                        <div>
                        <?php  echo $row1["nom_prod"] ?>
                        </div>
                        <div><h4><?php  echo "Prix ". $row1["prix"]." DH" ?></h4>  
                        </div>
                      </div>
                           </div>
                              <?php   }}?> 
    
          </div>

       </div>
     </div>
                             <div class="tab-content">

<?php
              $res4=$conn->query($sql4);

                if($res4->num_rows>0)
                {
                  while($row4=$res4->fetch_assoc()){
                    ?> 
      <div class="tab-pane fade " id="list-<?php echo $row4['Idarticle'].$row4['Nom_mar']?>" >

      
<div class="container-fluid"   >
      <h4 class="mt-5"><?php echo $row4['Nom_mar']?></h4><hr>
      <div class="row">
          <?php

$sql5= "select idproduit,a.idarticle, nom_article,m.nom_mar,p.nom_prod,prix from article a,marque m ,produits p
where a.Idarticle=m.Idarticle
and m.idmarque=p.idmarque
and a.Idarticle='".$row4['Idarticle']."'
and m.Nom_mar='".$row4['Nom_mar']."'";
              $res1=$conn->query($sql5);

                if($res1->num_rows>0)
                {
                  while($row1=$res1->fetch_assoc()){
                    ?> 

                    <div class="col-sm-3 ">   
                    <div class="card m-1">
                        <form id="<?php  echo $row1["nom_prod"]?>" action="prod.php" method="post">
                          <input  type="hidden" name="prod"  value="<?php  echo $row1["nom_prod"]?>">
                          <input  type="image" target="_blanck" src="prod/<?php  echo $row1["nom_article"].'/'.$row1["nom_mar"].'/'.$row1["nom_prod"].'/'.$row1["nom_prod"];?>.jpg" width="100%" height="100%">
                        </form>
                        <div>
                        <?php  echo $row1["nom_prod"] ?>
                        </div>
                        <div><h4><?php  echo "Prix ". $row1["prix"]." DH" ?></h4>  
                        </div>
                      </div>
                           </div>
                              <?php   }}?> 
    
          </div>

       </div>
</div>


 <?php   }}?>
 </div>
 <div class="container bg-light mt-5">
          <div clas="m-auto" style="font-size:60px; text-align: center;" >
                TRNEDING BRANDS  
          </div>
          <div class=" row mt-5">
                    <div class="col-2 m-3">
                            <img src="kalenji.jpg" height="60px" width="100px">
                    </div>
                    <div class="col-2 m-3">
                            <img src="solognac.jpg" height="60px" width="100px">
                    </div><div class="col-2 m-3">
                            <img src="artingo.jpg" height="60px" width="100px">
                    </div><div class="col-2 m-3">
                            <img src="kipsta.jpg" height="60px" width="100px">
                    </div><div class="col-2 m-3">
                            <img src="quechua.jpg" height="60px" width="100px">
                    </div><div class="col-2 m-3">
                            <img src="newfeel.jpg" height="60px" width="100px">
                    </div><div class="col-2 m-3">
                            <img src="domyos.jpg" height="60px" width="100px">
                    </div><div class="col-2 m-3">
                            <img src="nyamba.jpg" height="60px" width="100px">
                    </div>
           

          </div>

      </div>


      </div>
      </div>
      </div>
      
      <footer style="background-color: #eee6d3;">
    <div class="container-fluid my-5">
      <div class="row ">
        <div class="col-sm-6 mt-5 ">
          <h5 class="mb-3 text-dark">HELP & INFORMATION</h5>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
            voluptatem veniam, est atque cumque eum delectus sint!
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
          <h5 class="mb-1 text-dark">OPENING STORE HOURS</h5>
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
var x ="<?php echo $_SESSION['etat']?>";
        if(x != "OFF")
  {
    document.getElementById('conn').hidden=true;
    document.getElementById('insc').hidden=true;
    document.getElementById('deco').hidden=false;
  }
  else  {
    document.getElementById('conn').hidden=false;
    document.getElementById('insc').hidden=false;
    document.getElementById('deco').hidden=true;

  }
  function deconnexion() {
  }
  function hidd_main() {
    document.getElementById("list-profile").hidden=true;
    
  }
 
        </script>

</body>
</html>