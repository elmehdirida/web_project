<?php
    include "connection.php"; 
	// initialize variables
	$name = "";
	$stock = "";
    $prix = "";
    $taille = "";
    $desc = "";
	$id = 0;
    $nom_mar="";
	$update = false;
     
	if(isset($_POST['enregistrer'])) {  
		$name = $_POST['name'];
		$stock = $_POST['stock'];
        $prix = $_POST['prix'];
        $desc = $_POST['desc'];
        $ $nom_mar = $_POST['mar'];
        if(!empty($name) and !empty($stock) and !empty($prix) and !empty($taille) and !empty($desc) and !empty($nom_mar) )
        {
        $sql = "INSERT INTO produits (idmarque,nom_prod, stock, prix, taile,description)
         VALUES ('$idm','$name', '$stock', '$prix', '$taille', '$desc')";
       
       
            $sth = $conn->query($sql);
          
        }
		header('location: index.php');
        

	}

    if (isset($_POST['update'])) {
        $id = $_POST['idproduit'];
        $name = $_POST['name'];
		$stock = $_POST['stock'];
        $prix = $_POST['prix'];
        $taille = $_POST['taille'];
        $desc = $_POST['desc'];
        


        $sql = "UPDATE produits SET nom_prod='$name', stock='$stock', prix='$prix', taile='$taille', description='$desc' WHERE idproduit=$id";
            $sth = $conn->query($sql);
      
		header('location: index.php');
    }


    if (isset($_GET['suprimer'])) {
        $id = $_GET['suprimer'];
        $sql =  "DELETE FROM produits WHERE idproduit=$id";
        $sth = $conn->query($sql);

        header('location: index.php');
    }
    if (isset($_GET['suprimer1'])) {
        $id = $_GET['suprimer1'];
        $sql1 =  "DELETE FROM users WHERE idclient=$id";
        $sth1 = $conn->query($sql1);
        header('location: index.php');
    }

    if (isset($_GET['suprimer2'])) {
        $id = $_GET['suprimer2'];
        $sql1 =  "DELETE FROM users WHERE idclient=$id";
        $sth1 = $conn->query($sql1);
        header('location: index.php');
    }


?>