<?php
$servername="localhost";
$username="root";
$password="RIDA10";
$dbname="vente";
$conn= new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
die("connection error".$connect_error);
}
?>
