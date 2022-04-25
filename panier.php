<?php
session_start();
ob_start();
if(isset($_POST["pan"])){
    if(!isset($_SESSION[$_POST["pan"]])){
        $_SESSION['pan']=$_POST['pan'];
        $_SESSION['qtt']=$_POST['qtt'];
    }
if(!isset($_COOKIE[$_SESSION['pan']])){
    setcookie($_SESSION['pan'],$_SESSION['qtt']);
    header("location: panier.php");
}
else 
setcookie($_SESSION['pan'],$_SESSION['qtt'] +intval($_COOKIE[$_SESSION['pan']]));
header("location: panier.php");
}
if(isset($_GET["delete"])){
    setcookie($_GET["delete"],"");
    header("location:panier.php");
}
include 'connection.php';
$sql ="select * from produits";
$total=0;
$count=0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./css/panier.css">
    <link rel="stylesheet" href="./fa/css/font-awesome.min.css">
</head>
<body>
<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
               
                        <h4><b>Shopping Cart</b></h4>
             </div>
            <?php
            $res=$conn->query($sql);
            if($res->num_rows>0)
            {
              while($row=$res->fetch_assoc()){
              foreach($_COOKIE as $key => $val)
            if($row["nom_prod"]==$key){
                $count++;
                $sql2="select  p.idproduit,nom_article,nom_mar,nom_prod,prix from article a,marque m ,produits p
                where a.idarticle=m.idarticle
                and m.idmarque=p.idmarque and
                 nom_prod='".$key."'";
                 $res2=$conn->query($sql2);
                 if($res2->num_rows>0)
                    {
                      while($row2=$res2->fetch_assoc()){
                          $total+=($row2["prix"]*$val);
                           if(isset($_POST[$row2["idproduit"]]))
                          {setcookie($_POST[$row2["nom_prod"]],$_POST[$row2["idproduit"]]);
                            header("location:panier.php");
  }
            

            ?>


            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img  src="prod/<?php  echo $row2["nom_article"].'/'.$row2["nom_mar"].'/'.$row2["nom_prod"].'/'.$row2["nom_prod"];?>.jpg"></div>
                    <div class="col">
                        <div class="row text-muted"><?php  echo $row2["nom_article"]?></div>
                        <div class="row"><?php  echo $row2["nom_prod"]?></div>
                    </div>
                    <div class="col"> 
                        <form method="post" action="panier.php" >
                        <input type="number"  style="width:40px;" min="1" name="<?php  echo $row2["idproduit"]?>"  value="<?php echo  $val ?>" >
                        <input type="hidden" name="<?php  echo $row2["nom_prod"]?>" value="<?php  echo $row2["nom_prod"]?>">
                        
                </div></form>
                        
                    <div class="col"><?php  echo $row2["prix"]." DH"?> </div>
                    <div class="col">
                     <form action="pannier.php" method="get">
                    <a href="panier.php?delete=<?php  echo $key?> " class="badge bg-danger" style="text-decoration:none;color:black;font-size:12px">Retirer</a> 
                       </form>
                    </div>
                </div>
            </div>
            <?php
            }            
            }
            }
            }}

            ?>
            <div class="back-to-shop"><a href="project.php">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5 class="text-center"><b >RESUME</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col text-center"><?php  echo $count." PRODUIT EN TOTALE "?></div>
            </div>
               
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">PRIX TOTALE</div>
                <div class="col text-right"><?php  echo $total." DH"?></div>
            </div> 
            <form action="commande.php" method="post">
                <button class="btn" type="submit">COMMANDER</button>
            </form>

        </div>
    </div>
</div>
<?php

if(isset($_SESSION["c_id"])){$commande="SELECT * from commande where idclient='".$_SESSION['c_id']."' ";
$sth=$conn->query($commande);
?>
<div class="col-md-4 summary">
            <div>
                <h5 class="text-center"><b >MES COMMANDES</b></h5>
            </div>
            <hr>
          
            <table border="2" cellpadding="4" >
	<thead>
		<tr>
			<th>Numero De commande</th>
			<th>Date de commande</th>
            <th>Statut</th>
           		</tr>
	</thead>
	
	<?php while($result = $sth->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $result['idcommande']; ?></td>
			<td><?php echo $result['datecommande']; ?></td>
            <td><?php echo $result['statut']; ?></td>
		</tr>
	<?php } ?>
</table>
        </div>
        <?php } ?>
</body>
<script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
} 
}
</script>
</html>
