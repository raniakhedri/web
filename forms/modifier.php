<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

        //connexion à la base de donnée
require 'bd.php';


//on récupère le id dans le lien
$id = $_GET['id'];

//requête pour afficher les infos d'un employé
$stmt = $pdo->prepare("SELECT * FROM reservation WHERE id = :id");
$stmt->execute(['id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the form has been submitted
if(isset($_POST['button'])){
    // Extraction des informations envoyées dans des variables par la méthode POST
    extract($_POST);
    // Vérifier que tous les champs ont été remplis
    if(isset($nom) && isset($email) && isset($tel) && isset($event) && isset($name_account)){
        // Requête de modification
        $stmt = $pdo->prepare("UPDATE reservation SET nom = :nom, email = :email, tel = :tel, name_account= :name_account, event = :event WHERE id = :id");
        $stmt->execute(['nom' => $nom, 'email' => $email, 'tel' => $tel, 'name_account' =>$name_account, 'event' => $event, 'id' => $id]);

        if($stmt){
            // Si la requête a été effectuée avec succès, on fait une redirection
            header("location: tables.php");
        } else {
            // Si non
            $message = "Employé non modifié";
        }
    } else {
        // Si non
        $message = "Veuillez remplir tous les champs !";
    }
}

    
    ?>

    <div class="form">
        <a href="tables.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier le client : <?=$row['nom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>"pattern="[a-zA-Z]+"
                required>
            <label>email</label>
            <input type="email" name="email" value="<?=$row['email']?>" data-rule="email">
            <label>phone</label>
            <input type="text" name="tel" value="<?=$row['tel']?>" data-rule="minlen:8"
                data-msg="Please enter at least 8 digits" maxlength="8" pattern="\d{8}" required>


            <label>name account</label>
            <input type="text" name="name_account" value="<?=$row['name_account']?>" pattern="[a-zA-Z]+" required>

   
<label>event</label>
<select name="event" value="<?=$row['event']?>">
    <?php
    $menuItems = file_get_contents('../index.html'); // Load the contents of index.html
    preg_match_all('/<a\s+href="#(\d+)"\s*id="(\d+)"[^>]*>(.*?)<\/a>/s', $menuItems, $matches, PREG_SET_ORDER); // Extract the menu items using a regular expression

    foreach ($matches as $match) {
        $id = $match[1];
        $text = $match[3];
        echo "<option value=\"$text\" " . ($row['event'] == $id ? 'selected' : '') . ">$text</option>"; // Output each menu item as an option
    }
    ?>
</select>









             











            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>