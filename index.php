<?php 
session_start();
if(isset($_GET['logout']))
{
  if($_GET['logout'])
  session_destroy(); 
  header("location:project.php");
}  
$_SESSION['location']="admin";

 include('server.php') ;

if (isset($_GET['modifier'])) {
    $id = $_GET['modifier'];
    $update = true;
    $sql = "SELECT * from produits 
    where  idproduit=$id";
    $qr = $conn->query($sql);
    while( $result0 = $qr->fetch_assoc()) {
                $idm = $result0['idmarque'];
    }
    $sq="SELECT Nom_mar from marque where idmarque=$idm ";
    $sqe=$conn->query($sq);
    while( $result = $sqe->fetch_assoc()) {
        $nom_mar=$result["Nom_mar"];

    }

    $qr = $conn->query($sql);
    while( $result2 = $qr->fetch_assoc()) {
        $name = $result2['nom_prod'];
        $prix = $result2['prix'];
        $stock = $result2['stock'];
        $taille = $result2['taile'];
        $desc = $result2['description'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style1.css">
    <link href="./bootsrapp/css/bootstrap.min.css" rel="stylesheet" >
	<title>Administrateur</title>
    
</head>
<body class=" bg-light">

<?php  
$sql = "SELECT * FROM produits";
$sth = $conn->query($sql);


$sql1 = "SELECT * FROM users where role='user'";
$sth1 = $conn->query($sql1);
$sql2 = "SELECT * FROM users where role='gestionnaire'";
$sth2 = $conn->query($sql2);

?>
<h1> <a id="deco" style="float:left " href="?logout=1" class="badge bg-danger" >Deconnexion</a> La gestion des Produites</h1>                        

<div class="container-fluid">
    <div class="row">
<div class=" col-sm-6 ">
    
<table border="2" >
	<thead>
		<tr>
			<th>Nom_produit</th>
			<th>Stock</th>
            <th>Prix</th>
            <th>Description</th>
           
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while($result = $sth->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $result['nom_prod']; ?></td>
			<td><?php echo $result['stock']; ?></td>
            <td><?php echo $result['prix']; ?></td>
            <td><?php echo $result['description']; ?></td>
			<td>
				<a href="index.php?modifier=<?php echo $result['idproduit']; ?>" class="modifier" >Modifier</a>
			</td>
			<td>
				<a href="server.php?suprimer=<?php echo $result['idproduit']; ?>" class="suprimer">Suprimer</a>
			</td>
		</tr>
	<?php } ?>
</table>
</div>


<div class="col-sm-6 ">
    
	<form method="post" action="server.php" >
    <fieldset class="f1">
         
     <input type="hidden" name="idproduit" value="<?php echo $id; ?>">
             <div class="input1">
                 <label>Nom_prod :</label>
                 <input type="text" name="name" value="<?php echo $name; ?>">
             </div>
             <div class="input1">
                 <label>Stock :</label>
                 <input type="number" name="stock" value="<?php echo $stock; ?>">
             </div>
             <div class="input1">
                 <label>Prix :</label>
                 <input type="number" name="prix"  value="<?php echo $prix; ?>">
             </div>
             <div class="input1">
                 <label>Description :</label>
                 <input type="text" name="desc" value="<?php echo $desc; ?>">
             </div>
             <div class="input1">
                 <label >nom_marque :</label>
                 <input type="text" name="mar" readonly value ="<?php echo $nom_mar; ?>">
             </div>
             <div class="input1">
             <?php if ($update == true): ?>
                <br>
                 <button class="btn" type="submit" name="update" style="background: #71b102;" >Modifier</button>
             <?php else: ?>
                <br>
                 <button class="btn" type="submit" name="enregistrer" >Enregistrer</button>
             <?php endif ?>
             </div>
    </fieldset>
         </form>
</div>
</div>
</div>
<h1> La gestion des utilisateurs</h1>
<ul>
    <li><h2>Client</h2></li>
    
<div >
    
<table border="2" class="table">
	<thead>
		<tr>
			<th class="text-black">Nom</th>
			<th class="text-black">Prenom</th>
            <th class="text-black">Tel</th>
            <th class="text-black">Email</th>
            <th class="text-black">Adresse</th>
            <th class="text-black">password</th>
			<th class="text-black" >Action</th>
		</tr>
	</thead>
	
	<?php while($result2 = $sth1->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $result2['Nom']; ?></td>
			<td><?php echo $result2['Prenom']; ?></td>
            <td><?php echo $result2['Tel']; ?></td>
            <td><?php echo $result2['email']; ?></td>
            <td><?php echo $result2['adresse']; ?></td>
            <td><?php echo $result2['password']; ?></td>
			<td>
				<a href="server.php?suprimer1=<?php echo $result2['idclient']; ?>" class="suprimer">Suprimer</a>
			</td>
		</tr>
	<?php } ?>
</table>
</div>
<li><h2>Gestionnaire</h2></li>

<div >
    
<table border="2" class="table bg-light">
	<thead>
		<tr>
			<th class="text-black">Nom</th>
			<th class="text-black">Prenom</th>
            <th class="text-black">Tel</th>
            <th class="text-black">Email</th>
            <th class="text-black">Adresse</th>
            <th class="text-black">password</th>
			<th class="text-black">Action</th>
		</tr>
	</thead>
	
	<?php while($result3 = $sth2->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $result3['Nom'];  ?></td>
			<td><?php echo $result3['Prenom']; ?></td>
            <td><?php echo $result3['Tel']; ?></td>
            <td><?php echo $result3['email']; ?></td>
            <td><?php echo $result3['adresse']; ?></td>
            <td><?php echo $result3['password']; ?></td>
			<td>
				<a href="server.php?suprimer2=<?php echo $result3['idclient']; ?>" class="suprimer">Suprimer</a>
			</td>
		</tr>
	<?php } ?>
   
</table>
</div>
</ul>
</body>
</html>