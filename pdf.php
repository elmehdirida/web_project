<?php
    
ob_end_clean();
session_start();
include"connection.php";
require('fpdf/fpdf.php');
$sql="select description,idproduit, nom_article,nom_mar,nom_prod,prix from article a,marque m ,produits p
where a.idarticle=m.idarticle
and m.idmarque=p.idmarque and
 nom_prod='".$_POST['prod']."'";
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  $x=$_POST['prod'];
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', );
$pdf->Cell(60,20,"Nom Du Produit : ".$x);

$donnes=$conn->query($sql);
while($ligne =$donnes->fetch_assoc()){
  $_SESSION['idp']=$ligne['idproduit'];
$img="prod/".$ligne["nom_article"].'/'.$ligne["nom_mar"].'/'.$ligne["nom_prod"].'/'.$ligne["nom_prod"].".jpg";
$pdf->Ln(120);
$pdf->Cell(60,20,"Description : ".$ligne['description']);
$pdf->Image($img,60,30,90,0,'JPG');
$pdf->Ln(12);
$pdf->Cell(60,20,"Prix Du Produit : ".$ligne['prix'] ." DH");
$pdf->Ln(12);
$pdf->Cell(60,20,"Marque Du Produit : ".$ligne['nom_mar']);
$pdf->Ln(12);
$pdf->Cell(60,20,"Type Du Produit : ".$ligne['nom_article']);

}
  
// return the generated output
$pdf->Output('D',$_POST['prod'].".pdf");
  
?>