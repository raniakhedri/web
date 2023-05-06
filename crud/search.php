<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Get the search criteria and value from the URL parameters
$criteria = isset($_GET['criteria']) ? $_GET['criteria'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL statement and get the record(s) from the contacts table with the specified criteria and search value
$stmt = $pdo->prepare("SELECT * FROM pubs WHERE $criteria LIKE ?");
$stmt->execute(["%$search%"]);
$pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Search')?>

<div class="content update">
    <h2>Résultat de recherche</h2>
    <?php if ($pubs): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Nom utilisateur</th>
                    <th>Type</th>
                    <th>Date de publication</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pubs as $pub): ?>
                <tr>
                    <td><?=$pub['id']?></td>
                    <td><?=$pub['nom']?></td>
                    <td><?=$pub['email']?></td>
                    <td><?=$pub['nomut']?></td>
                    <td><?=$pub['type']?></td>
                    <td><?=date('d/m/Y', strtotime($pub['datep']))?></td>
                    <td class="actions">
                        <a href="update.php?id=<?=$pub['id']?>" class="edit"><i class="fas fa-pen"></i></a>
                        <a href="delete.php?id=<?=$pub['id']?>" class="trash"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune publication trouvée avec cet ID.</p>
    <?php endif; ?>
</div>
<style>
.table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    font-size: 14px;
}

.table th,
.table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: center;
}

.table td {
    font-weight: normal;
}

.table td.actions {
    display: flex;
    justify-content: center;
}

.table td.actions a {
    display: inline-block;
    margin: 0 5px;
    color: #333;
    transition: all 0.3s ease;
}

.table td.actions a:hover {
    color: #ff0000;
}

.edit {
    color: #00aa00;
}

.trash {
    color: #aa0000;
}
</style>

<?=template_footer()?>
