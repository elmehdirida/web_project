<?php  
session_start();
include 'connection.php';
if(!isset($_SESSION['c_id']))
{
    header("location:sign_page.php");
}
else {
$date=date('Y-m-d');
$sql="INSERT into commande (idclient,datecommande,statut) values ('".$_SESSION['c_id']."','$date','en attendre')";
              $conn->query($sql);
$sql1="SELECT max(idcommande) as id from commande where idclient='".$_SESSION['c_id']."'";
    $sql2 ="select * from produits";            
        $res1=$conn->query($sql1);
            if($res1->num_rows>0)
            {
              while($row1=$res1->fetch_assoc()){
                    $idcommande=$row1['id'];
              }
            }
       $res2=$conn->query($sql2);
            if($res2->num_rows>0)
            {
              while($row2=$res2->fetch_assoc()){
                foreach($_COOKIE as $key => $val){
                    if($row2["nom_prod"]==$key){
                      $sql3="select idproduit from produits where nom_prod='".$key."'";
                      $res3=$conn->query($sql3);
                      if($res3->num_rows>0)
                      {
                        while($row3=$res3->fetch_assoc()){
                              $idproduit=$row3['idproduit'];
                        }
                      }
                      $sql4="INSERT into lignedecommandes(idcommande,idproduit,quantite) values ('$idcommande','$idproduit','$val')";
                      $conn->query($sql4);
                      setcookie($key,'');

                      }
}
}
}

header("location:project.php");
}
         
                              
?>