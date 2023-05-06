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
    echo '<script>setTimeout(function() { window.location.href = "http://localhost/ProjetWeb/Fronttt/TestFront%20-%20Copie.php"; }, 50);</script>';
    $msg = 'Created Successfully!';
}
?>