<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Statistiques des publications</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    color: #333;
  }

  h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
  }

  table {
    border-collapse: collapse;
    margin-bottom: 40px; /* added margin */
    width: 80%;
    margin: 0 auto;
  }

  th,
  td {
    padding: 10px;
    border: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: center;
  }

  td {
    text-align: center;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  a {
  color: #333;
  text-decoration: none;
  border: 1px solid #333;
  padding: 10px 20px;
  border-radius: 5px;
  display: block; /* modified */
  text-align: center;
  margin: 0 auto; /* added */
  margin-top: 20px;
}


  a:hover {
    background-color: #333;
    color: #fff;
  }
</style>

</head>
<body>
    <h1>Statistiques des publications</h1>
    
    <?php
    include 'functions.php';
    // Connect to MySQL database
    $pdo = pdo_connect_mysql();

    // Get the total number of pubs
    $num_pub = $pdo->query('SELECT COUNT(*) FROM pubs')->fetchColumn();

    // Get the average number of publications per user
    $avg_pub_per_user = $pdo->query('SELECT COUNT(*) / COUNT(DISTINCT nomut) FROM pubs')->fetchColumn();

    // Get the most common publication type
    $most_common_type = $pdo->query('SELECT type, COUNT(*) as count FROM pubs GROUP BY type ORDER BY count DESC LIMIT 1')->fetch();

    // Get the date of the most recent publication
    $most_recent_pub_date = $pdo->query('SELECT MAX(datep) FROM pubs')->fetchColumn();
    ?>
    <table>
        <thead>
            <tr>
                <th>Statistique</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre total de publications</td>
                <td><?= $num_pub ?></td>
            </tr>
            <tr>
                <td>Nombre moyen de publications par utilisateur</td>
                <td><?= round($avg_pub_per_user, 2) ?></td>
            </tr>
            <tr>
                <td>Type de publication le plus commun</td>
                <td><?= $most_common_type['type'] ?> (<?= $most_common_type['count'] ?> publications)</td>
            </tr>
            <tr>
                <td>Date de la publication la plus récente</td>
                <td><?= $most_recent_pub_date ?></td>
            </tr>
        </tbody>
    </table>
    <a href="read.php">Retourner à la liste des publications</a>
</body>
</html>
