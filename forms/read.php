<?php
session_start();


include  "../Model/client.php";
include  "../Controller/ClientC.php";

$clientc= new ClientC();
$liste=$clientc->afficherClients();

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
                <th>phone</th>
                <th>name account</th>
                <th>event</th>
                <th>Modifier</th>
                <th>Supprimer</th>
                <th>Confirmation</th>
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
                            <td><?php echo $row['tel']; ?></td>
                            <td><?php echo $row['name_account']; ?></td>
                            <td><?php echo $row['event']; ?></td>
                                            
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>">Modifier</a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>">Supprimer</a></td>
                            <td><a href="confirmation.php?id=<?=$row['id']?>">Confirmation</a></td>
                        </tr>
                      <?php
                                            }}
                                        ?>   
        </table>
    </div>
</body>
</html>
