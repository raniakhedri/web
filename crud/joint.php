<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "phpcrud");

// Exécution de la requête
$result = mysqli_query($conn, "SELECT pubs.*, user.image
FROM user
LEFT JOIN autre_table ON pubs.nom = user.nom AND pubs.email = user.email");

// Récupération des résultats
while ($row = mysqli_fetch_assoc($result)) {
    // Utilisation des données
    echo $row["nom"] . " " . $row["email"] . " " . $row["image"];
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
