<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "nom" exists, if not default the value to blank, basically the same for all variables
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nomut = isset($_POST['nomut']) ? $_POST['nomut'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $datep = isset($_POST['datep']) ? $_POST['datep'] : date('Y-m-d H:i:s');
            
    // Insert new record into the contactsss table
    $stmt = $pdo->prepare('INSERT INTO pubs VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nom, $email, $nomut, $type, $datep]);
    // Output message
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Create')?>

<div class="content update">
	<h2>Create</h2>
    <form action="create.php" method="POST">
        <label for="id">ID</label>
        <label for="nom">Nom</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="nom" placeholder="John Doe" id="nom">
        <label for="email">Email</label>
        <label for="nomut">Nom Utilisateur</label>
        <input type="text" name="email" placeholder="johndoe@example.com" id="email">
        <input type="text" name="nomut" placeholder="" id="nomut">
        <label for="type">Commentaire</label>
        <label for="datep">Date Publications</label>
        <input type="text" name="type" placeholder="Commentaire" id="type">
        <input type="datetime-local" name="datep" value="<?=date('Y-m-d\TH:i')?>" id="datep">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>