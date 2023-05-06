<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : rand(1,1000);
    // Check if POST variable "nom" exists, if not default the value to blank, basically the same for all variables
    $id_pub = isset($_POST['id_pub']) ? $_POST['id_pub'] : rand(1,1000); // Get the ID of the post from the hidden input field
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
    $date_creation = isset($_POST['date_creation']) ? $_POST['date_creation'] : date('Y-m-d H:i:s');
  
    // Insert new record into the commentaires table with the ID of the post
    $stmt = $pdo->prepare('INSERT INTO commentaires (id, id_pub, nom, email, contenu, date_creation) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $id_pub, $nom, $email, $contenu, $date_creation]);
  
    // Output message
    echo '<script>setTimeout(function() { window.location.href = "http://localhost/ProjetWeb/Fronttt/TestFront%20-%20Copie.php"; }, 50);</script>';
    $msg = 'Created Successfully!';
  }
  
?>