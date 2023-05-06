<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;
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

    // Set the response headers to download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="pubs.xlsx"');
    header('Cache-Control: max-age=0');

    // Save the Excel file to the output buffer and output it to the browser
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');
    exit();
}
?>
<?=template_header('Read')?>

<div class="content read">
    <h2>Gestion des publications</h2>
    <a href="create.php" class="create-contact">Creer publication</a>
    <!-- search form -->
    <div class="search">
        <form action="search.php" method="get">
            <label for="criteria">Choisir un critère de recherche:</label>
            <select id="criteria" name="criteria">
                <option value="id">ID</option>
                <option value="nom">Nom</option>
                <option value="email">Email</option>
                <option value="nomut">Nom d'utilisateur</option>
                <option value="datep">Date de publication</option>
            </select>
            <label for="search">Rechercher:</label>
            <input type="text" id="search" name="search">
            <button type="submit">Rechercher</button>
        </form>
        <a href="stats.php" class="stats">S</a>

    </div>
    <!-- table -->
    <table id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Date de publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pubs as $pub): ?>
            <tr>
                <td><?= $pub['id'] ?></td>
                <td><?= $pub['nom'] ?></td>
                <td><?= $pub['email'] ?></td>
                <td><?= $pub['nomut'] ?></td>
                <td><?= $pub['type'] ?></td>
                <td><?= $pub['datep'] ?></td>
                <td class="actions">
                    <a href="update.php?id=<?= $pub['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?= $pub['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="read.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_pub): ?>
        <a href="read.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.8/xlsx.full.min.js"></script>
<script>
function exportToExcel(tableId, filename = ''){
  var downloadLink;
  var dataType = 'application/vnd.ms-excel';
  var tableSelect = document.getElementById(tableId);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

  // Specify file name
  filename = filename?filename+'.xlsx':'excel_data.xlsx';

  // Create download link element
  downloadLink = document.createElement("a");

  document.body.appendChild(downloadLink);

  if(navigator.msSaveOrOpenBlob){
      var blob = new Blob(['\ufeff', tableHTML], {
          type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
  }else{
      // Create a link to the file
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

      // Setting the file name
      downloadLink.download = filename;

      //triggering the function
      downloadLink.click();
  }
}
</script>

<button class="export-btn" onclick="exportToExcel('myTable', 'GenerationExcel')" >Exporter en Excel</button>
<button class="export-btn" onclick="window.location.href='pdf.php'">Exporter en pdf</button>



<style>
.export-btn {
  background-color: #4CAF50; /* Green background */
  border: none; /* Remove border */
  color: white; /* White text */
  padding: 10px 20px; /* Add padding */
  text-align: center; /* Center text */
  text-decoration: none; /* Remove underline */
  display: inline-block; /* Make it inline */
  font-size: 16px; /* Increase font size */
  margin: 10px; /* Add margin */
  cursor: pointer; /* Add cursor pointer */
}
</style>
<a href="affifi.php" class="link" style="float:right;">Voir toutes les reponses</a>

<style>
	.link {
		font-size: 25px;
		color: #4CAF50;
		text-decoration: none;
	}
	.link:hover {
		text-decoration: underline;
	}
</style>