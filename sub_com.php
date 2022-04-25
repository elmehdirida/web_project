<?php
include 'connection.php';
$name=$_POST["name"];
$review=$_POST["review"];
$rating=$_POST["rating"];
$idp=$_POST["id-prod"];
$date=date("Y-m-d H:i:s"); 
$sql = "insert into commentaire (idproduit,commentaire,rating,c_nom,datecmt)
 values ('$idp','$review','$rating','$name','$date')";
  
if ($conn->query($sql)) {
    header("Location: prod.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>