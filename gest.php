<?php
include 'connection.php';
session_start();
if(isset($_GET['logout']))
{
  if($_GET['logout'])
  session_destroy(); 
  header("location:project.php");
}  
$_SESSION["location"]="gest";
$rida="select cm.idclient ,cm.idcommande ,nom_prod , Nom_mar ,quantite , prix,stock
from produits p , commande cm ,marque m,lignedecommandes lc
where cm.idcommande=lc.idcommande
and lc.idproduit=p.idproduit
and p.idmarque=m.idmarque";
$rida2="select count(idlignedecommande) as num ,idcommande 
from lignedecommandes as  lc
group by idcommande";
$rida3="select u.idclient,cm.idcommande,statut from users u, commande cm
where u.idclient=cm.idclient";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./css/gest.css">
    
</head>
<body>
  <div class="Z">
      <strong><em> <h1>FARM</h1></em></strong>
      <a id="deco" style="float:left " href="?logout=1" class="badge bg-danger" >Deconnexion</a>
    </div>
<div class="y"> 
   <p><h1> les commandes</h1></p>
</div>
<div class="yy"> 
<table  width=100%  class="q">
   <tr>    <th bgcolor="gray">validation</th>
 <th bgcolor="gray">num commande</th>
    <th bgcolor="gray">num client</th>
    <th  bgcolor="gray">nom produit</th>
    <th bgcolor="gray" >la marque</th>
    <th bgcolor="gray">quantite</th>
    <th bgcolor="gray">stock</th>
    <th bgcolor="gray">prix</th>
</tr>     
    <?php
  $amal2=$conn->query($rida2);
  $amal3=$conn->query($rida3);
  

  if($amal2->num_rows>0){
    while($row2=$amal2->fetch_assoc()){ 
        
    while($row3=$amal3->fetch_assoc()){
        if($row3['idcommande']==$row2['idcommande']){
            $idclient=$row3['idclient'];
            break;
        }

    }?>
        <tr>
        <td rowspan="<?php echo $row2['num'];?>">
        <?php if($row3['statut']=='valide')
       {echo "Valide";} 
        else{?>

    <form action="ges1.php" method="post">
    <input  type="hidden" name="id"  value="<?php echo $row2["idcommande"]?>">
    <input type="submit"  value="Accepter" name="sub">
    <input type="submit"  value="Refuse" name="sub" id="sub">
    </form>        
    </td>
    <?php } ?>  
    <td  rowspan="<?php echo $row2['num'];?>"> <?php echo $row2['idcommande'];?></td> 
    <td  rowspan="<?php echo $row2['num'];?>"> <?php echo $idclient?></td>
    
    <?php
  $amal=$conn->query($rida);
if($amal->num_rows>0)
{
      while($row1=$amal->fetch_assoc()){
          if($row2['idcommande']==$row1['idcommande']){
?>
    <td> <?php echo $row1['nom_prod'];?></td>
    <td> <?php echo $row1['Nom_mar'];?></td>
    <td> <?php echo $row1['quantite'];?></td>
    <td> <?php echo $row1['stock'];?></td>
    <td> <?php echo $row1['prix'];?></td>  
</tr><?php
      }}
      ?> 
<?php
      }}}
      ?>  
      </table>
</div>
  </div>
  <script>
  
  </script>
</body>
</html>