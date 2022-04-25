<?php
include 'connection.php';
$id=$_POST['id'];
$rida="select stock,lc.idproduit,lc.quantite
from produits p , commande cm ,marque m,lignedecommandes lc
where cm.idcommande=lc.idcommande
and lc.idproduit=p.idproduit
and p.idmarque=m.idmarque
and cm.idcommande='".$id."'";
$amal=$conn->query($rida);

if($amal->num_rows>0)
{
      while($row1=$amal->fetch_assoc()){
          $qtt=$row1["quantite"];
          $sql3=("UPDATE produits SET stock=stock-'".$qtt."'  WHERE idproduit='".$row1["idproduit"]."'" );
            $conn->query($sql3);
          if ($_POST['sub']=='Accepter') 
          {
            $sql1=("UPDATE commande SET statut='valide' where idcommande='".$id."'");
            if($conn->query($sql1))
            header("location: gest.php");
    }
    elseif ($_POST['sub']=='Refuse') {
        $sql2="DELETE FROM  commande WHERE idcommande='".$id."'";

        if($conn->query($sql2))
        header("location: gest.php");

       }
      }}




    
?>