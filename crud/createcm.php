<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : 50;
    // Check if POST variable "commentaire" exists, if not default the value to blank, basically the same for all variables
    $commentaire = isset($_POST['commentaire']) ? $_POST['commentaire'] : '';
    $datec = isset($_POST['datec']) ? $_POST['datec'] : date('Y-m-d H:i:s');
    $reponse = isset($_POST['reponse']) ? $_POST['reponse'] : '';
    $dater = isset($_POST['dater']) ? $_POST['dater'] : date('Y-m-d H:i:s');
            
    // Insert new record into the contactsss table
    $stmt = $pdo->prepare('INSERT INTO forum VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $commentaire, $datec, $reponse, $dater]);
    // Output message
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Create')?>

<div class="content update">
    <var>i=0;</var>
	<h2>Create</h2>
    <form action="createcm.php" method="POST">
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
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>