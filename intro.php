<?php
session_start();
include 'connection.php';
$name=$_POST["fname"];
$prenom=$_POST["lname"];
$adresse=$_POST["adresse"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$count=0;
$sql="SELECT * from users";
$res=$conn->query($sql);

if($res->num_rows>0)
{
      while($row=$res->fetch_assoc()){
        if($email==$row["email"]){
            $count++;
        }
      }}
      if($count==0){
          $sql2 = "insert into users (Nom,Prenom,Tel,email,adresse,password,role)
          values ('$name','$prenom','$tel','$email','$adresse','$pass','user')";
          $conn->query($sql2);
          header("Location: login_page.php");
      }else {
          $_SESSION['existe']="yes";
          header("Location: sign_page.php");

      }

$conn->close();
?>