<?php
include 'functions.php';

// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 20;
// Get the total number of pubs
$num_pub = $pdo->query('SELECT COUNT(*) FROM pubs')->fetchColumn();
// Prepare the SQL statement and get records from our pubs table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM pubs ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Export the pubs table to an Excel file
if (isset($_GET['export'])) {
    // Load the XLSX library
    require_once 'vendor/autoload.php';

    // Create a new workbook and worksheet
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $worksheet = $spreadsheet->getActiveSheet();

    // Set the worksheet header row
    $worksheet->setCellValue('A1', '#');
    $worksheet->setCellValue('B1', 'Name');
    $worksheet->setCellValue('C1', 'Email');
    $worksheet->setCellValue('D1', 'Nom d\'utilisateur');
    $worksheet->setCellValue('E1', 'Type');
    $worksheet->setCellValue('F1', 'Date de publication');

    // Set the worksheet data rows
    $row = 2;
    foreach ($pubs as $pub) {
        $worksheet->setCellValue('A' . $row, $pub['id']);
        $worksheet->setCellValue('B' . $row, $pub['nom']);
        $worksheet->setCellValue('C' . $row, $pub['email']);
        $worksheet->setCellValue('D' . $row, $pub['nomut']);
        $worksheet->setCellValue('E' . $row, $pub['type']);
        $worksheet->setCellValue('F' . $row, $pub['datep']);
        $row++;
    }


}




require('fpdf185/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(30,10,'Nom .',1,0,'C');
$pdf->Cell(70,10,'Email.',1,0,'C');
$pdf->Cell(90,10,'Commentaire.',1,1,'C');  


 foreach ($pubs as $pub){
$pdf->Cell(30,10, $pub['nom'],1,0,'C');
$pdf->Cell(70,10,$pub['email'],1,0,'C');
$pdf->Cell(90,10,$pub['type'],1,1,'C');

 }



$pdf->Output();
?>


