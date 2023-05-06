<!DOCTYPE html>
<html>
<head>
	<title>Commentaires de la pub</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 50px;
		}
		label {
			margin-right: 10px;
			font-weight: bold;
		}
		input[type="text"] {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			width: 200px;
			margin-right: 10px;
		}
		button[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}
		button[type="submit"]:hover {
			background-color: #3e8e41;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,.1);
			border-radius: 5px;
			margin-top: 50px;
		}
		.post {
			background-color: #f2f2f2;
			padding: 20px;
			border-radius: 5px;
			margin-bottom: 20px;
		}
		.post h2 {
			font-size: 24px;
			margin-top: 0;
			margin-bottom: 10px;
		}
		.post p {
			font-size: 18px;
			line-height: 1.5;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<h1>Commentaires de la pub</h1>

	<div class="container">
		<form method="get" action="affifi.php">
		<canvas id="comments-chart"></canvas>
			<label for="id_pub">Entrez l'ID de la pub :</label>
			<input type="text" name="id_pub" id="id_pub">
			<button type="submit">Afficher les commentaires</button>
		</form>
		

		<?php
// Check if ID of the selected publication is set in the URL
if(isset($_GET['id_pub'])) {
	// Retrieve the ID of the selected publication from the URL
	$idPub = $_GET['id_pub'];

	// Connect to the database
	$db = new PDO('mysql:host=localhost;dbname=phpcrud', 'root', '');

	// Prepare the SQL query to retrieve all comments and publications corresponding to the given publication ID
	$sql = "SELECT *, commentaires.date_creation AS comment_date FROM pubs INNER JOIN commentaires ON pubs.id = commentaires.id_pub WHERE pubs.id = :id_pub";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id_pub', $idPub);
	$stmt->execute();

	// Retrieve the results of the query
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// Display the results
	$numComments = count($results);
	$oldestDate = null;
	$newestDate = null;
	foreach ($results as $result) {
		echo '<div class="post">';
		echo '<h2>' . $result['nom'] . '</h2>';
		echo '<p>' . $result['contenu'] . '</p>';
		echo '<p>Date: ' . $result['comment_date'] . '</p>';
		if ($oldestDate == null || $result['comment_date'] < $oldestDate) {
			$oldestDate = $result['comment_date'];
		}
		if ($newestDate == null || $result['comment_date'] > $newestDate) {
			$newestDate = $result['comment_date'];
		}
		echo '</div>';
	}
	echo '<p>Number of comments: ' . $numComments . '</p>';
	echo '<p>Oldest comment date: ' . $oldestDate . '</p>';
	echo '<p>Newest comment date: ' . $newestDate . '</p>';
}
?>
</div>
<script>
// Check if ID of the selected publication is set in the URL
if(isset($_GET['id_pub'])) {
	// Retrieve the ID of the selected publication from the URL
	$idPub = $_GET['id_pub'];

	// Connect to the database
	$db = new PDO('mysql:host=localhost;dbname=phpcrud', 'root', '');

	// Prepare the SQL query to retrieve all comments and publications corresponding to the given publication ID
	$sql = "SELECT id_post, COUNT(*) AS num_comments FROM commentaires WHERE id_post BETWEEN 1 AND 1000 GROUP BY id_post";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	// Retrieve the results of the query
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// Create the data array for the chart
	$data = array();
	for ($i = 1; $i <= 1000; $i++) {
		$data[$i] = 0;
	}
	foreach ($results as $result) {
		$data[$result['id_post']] = $result['num_comments'];
	}

	// Create the chart using Chart.js
	var ctx = document.getElementById('comments-chart').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: Object.keys(data),
			datasets: [{
				label: 'Number of comments',
				data: Object.values(data),
				backgroundColor: 'rgba(54, 162, 235, 0.5)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
}
</script>

</body>
</html>
