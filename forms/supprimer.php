<?php
include "../Controller/ClientC.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $clientC = new ClientC();
    $clientC->supprimerClient($id);
    header('Location: tables.php');
}

    //connexion à la base de donnée
    require 'bd1.php';
    //récupération de l'id dans le lien
    $id= $_GET['id'];
    //requête de suppression
    $stmt = $pdo1->prepare("DELETE FROM confirmation WHERE id = :id");
    $stmt->execute(['id' => $id]);
    //redirection vers la page index.php
    header("Location:tables.php");
?>

