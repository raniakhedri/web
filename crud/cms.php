<?php
      $host = 'localhost';
      $dbname = 'phpcrud';
      $username = 'root';
      $password = '';
      
      try {
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
// Retrieve pubs from database
$stmt = $pdo->prepare('SELECT nom, type, datep FROM pubs ORDER BY datep DESC');
$stmt->execute();
$pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tbody>
        <?php foreach ($pubs as $pub): ?>
        <tr>
            <td><?= $pub['nom'] ?></td>
            <td><?= $pub['type'] ?></td>
            <td><?= $pub['datep'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="pagination">
    <?php if ($page > 1): ?>
    <a href="read.php?page=<?= $page-1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
    <?php endif; ?>
    <?php if ($page*$records_per_page < $num_pub): ?>
    <a href="read.php?page=<?= $page+1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
    <?php endif; ?>
</div>