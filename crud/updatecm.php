<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the pub id exists, for example update.php?id=1 will get the pub with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    // Check if POST variable "commentaire" exists, if not default the value to blank, basically the same for all variables
    $commentaire = isset($_POST['commentaire']) ? $_POST['commentaire'] : '';
    $datec = isset($_POST['datec']) ? $_POST['datec'] : date('Y-m-d H:i:s');
    $reponse = isset($_POST['reponse']) ? $_POST['reponse'] : '';
    $dater = isset($_POST['dater']) ? $_POST['dater'] : date('Y-m-d H:i:s');


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
	<h2>Update commentaire #<?=$pub['id']?></h2>
    <form action="update.php?id=<?=$pub['id']?>" method="post">
    <label for="id">ID</label>
        <label for="commentaire">Commentaire</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="commentaire" placeholder="John Doe" id="commentaire">
        <label for="datec">Datec</label>
        <label for="reponse">Reponse</label>
        <input type="datetime-local" name="datec" value="<?=date('Y-m-d\TH:i')?>" id="datec">
        <input type="text" name="reponse" placeholder="" id="reponse">
        <label for="dater">Dater</label>
        <input type="datetime-local" name="dater" value="<?=date('Y-m-d\TH:i')?>" id="dater">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>