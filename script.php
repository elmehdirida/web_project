<?php 
include "connection.php"; 
 $sql0="delete from marque";
 $conn->query($sql0);      
$fille=scandir("prod",1);
    unset($fille[array_search('.', $fille, true)]);
    unset($fille[array_search('..', $fille, true)]);    
foreach ($fille as $arr)
{      
    $fille2=scandir('./prod/'.$arr);
    unset($fille2[array_search('.', $fille2, true)]);
    unset($fille2[array_search('..', $fille2, true)]);
    foreach($fille2 as $arr2){
        $sql2 = "select idarticle from article where 
 nom_article='$arr'";
        $row1= $conn->query($sql2);      
        while($res1 =$row1->fetch_assoc()){
            $article=$res1['idarticle'];
        }
        $sql4="insert into marque (idarticle,nom_mar,qtt_m) values ('$article','$arr2','0') ";

        $conn->query($sql4);
            $fille3=scandir('./prod/'.$arr.'/'.$arr2);
    unset($fille3[array_search('.', $fille3, true)]);
    unset($fille3[array_search('..', $fille3, true)]);
    foreach($fille3 as $arr3){
            $fille4=scandir('./prod/'.$arr.'/'.$arr2.'/'.$arr3);
    unset($fille4[array_search('.', $fille4, true)]);
    unset($fille4[array_search('..', $fille4, true)]);
    foreach($fille4 as $arr4){
        if($arr4!='1.jpg'&& $arr4!='2.jpg'&& $arr4!='3.jpg')

        {  $sql1 = "select idmarque from marque where 
            nom_mar='$arr2' and idarticle='$article'";
            $row2= $conn->query($sql1);      
            while($res1 =$row2->fetch_assoc()){
                $marque=$res1['idmarque'];
            }
            $prix=rand(100,400);
            $sql3 = "insert into produits(idmarque,nom_prod,stock,prix,taile,description)
 values ('$marque','$arr3','100','$prix','','$arr3')";
            $conn->query($sql3);
             


        }

    }

    }

    }


}

?>