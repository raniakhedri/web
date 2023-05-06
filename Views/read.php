<?php
session_start();


include  "../Model/Pub.php";
include  "../Controller/PubC.php";

$pubc= new PubC();
$liste=$pubc->afficherpubs();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>email</th>
                <th>Nom Utilisateur</th>
                <th>Type</th>
                <th>Date Publication</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                   
                    //inclure la page de connexion
                
                if($row=$liste->rowCount() == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                   
                   
                   //si non , affichons la liste de tous les employés
                    
while($row=$liste->fetch()){
                        ?>
                         <tr>
                          <td><?php echo $row['nom']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                           <td><?php echo $row['nomut']; ?></td>
                          <td><?php echo $row['type']; ?></td>
                          <td><?php echo $row['datep']; ?></td>
                                            
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>">Modifier</a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>">Supprimer</a></td>
                        </tr>
                      <?php
                                            }}
                                        ?>   
        </table>
    </div>
</body>
</html>
