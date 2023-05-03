<?php


require('fpdf185/fpdf.php');



if(isset($_POST['pdf_bt']))
{
    $pdf = new FPDF();
    
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(10,10,'ID',1,0,'C');
    $pdf->Cell(22,10,'nom',1,0,'C');
    $pdf->Cell(60,10,'email',1,0, 'C');
    $pdf->Cell(40,10,'name_account',1,0,'C');
        $pdf->Cell(60,10,'Telephone',1,1,'C');







 //inclure la page de connexion
                require 'bd.php';
                //requête pour afficher la liste des employés
                $stmt = $pdo->query("SELECT * FROM reservation");
               
                    //si non , affichons la liste de tous les employés
                    while($row=$stmt->fetch()){
            $pdf->Cell(10,10,$row['id'],1,0,'C');
            $pdf->Cell(22,10, $row['nom'],1,0,'C');
            $pdf->Cell(60,10, $row['email'],1,0,'C');
            $pdf->Cell(40,10, $row['name_account'] ,1,0,'C');
                    $pdf->Cell(60,10,$row['tel'],1,1,'C');


    }
  
   
    $pdf->Output();


}



?>