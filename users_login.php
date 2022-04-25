<?php 
session_start();

    if($_SESSION['etat']=='ON'){
        header('location:project.php');
}
else {
include "connection.php"; 
$email=$_POST['email'];
$pass=$_POST['pass'];
$count=0;
$sql1="select idclient,email,password,role from users";
    $res=$conn->query($sql1);
        if($res->num_rows>0)
            {
      while($row=$res->fetch_assoc()){
        if($row["email"]==$email && $row["password"]==$pass ){
                    $count+=1;
                    $_SESSION['c_id']=$row['idclient'];
                    $role=$row["role"];
        }
            }
        }
        if($count==0){
                    {          
                    $_SESSION['etat']="OFF";
                    header('location:login_page.php');
        }
        }
        else {            $_SESSION['etat']="ON";


            if($role=="user")
            {
                if($_SESSION["location"]=="main")            header('location:project.php');
                else if($_SESSION["location"]=="prod") header('location:prod.php');

            }
            else if($role=="admin")
            header('location:index.php');
            else if($role=="gestionnaire")
            header('location:gest.php');

        }
    }
?>