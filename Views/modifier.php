<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the pub id exists, for example update.php?id=1 will get the pub with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $nomut = isset($_POST['nomut']) ? $_POST['nomut'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $datep = isset($_POST['datep']) ? $_POST['datep'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE pubs SET id = ?, nom = ?, email = ?, nomut = ?, type = ?, datep = ? WHERE id = ?');
        $stmt->execute([$id, $nom, $email, $nomut, $type, $datep, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the pub from the pubs table
    $stmt = $pdo->prepare('SELECT * FROM pubs WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $pub = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$pub) {
        exit('pub doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<?=template_header('Read')?>

<div class="content update">
	<h2>Update Pub #<?=$pub['id']?></h2>
    <form action="update.php?id=<?=$pub['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nom">nom</label>
        <input type="text" nom="id" placeholder="1" value="<?=$pub['id']?>" id="id">
        <input type="text" nom="nom" placeholder="John Doe" value="<?=$pub['nom']?>" id="nom">
        <label for="email">Email</label>
        <label for="nomut">nomut</label>
        <input type="text" nom="email" placeholder="johndoe@example.com" value="<?=$pub['email']?>" id="email">
        <input type="text" nom="nomut" placeholder="2025550143" value="<?=$pub['nomut']?>" id="nomut">
        <label for="type">type</label>
        <label for="datep">datep</label>
        <input type="text" nom="type" placeholder="Employee" value="<?=$pub['type']?>" id="type">
        <input type="datetime-local" nom="datep" value="<?=date('Y-m-d\TH:i', strtotime($pub['datep']))?>" id="datep">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>