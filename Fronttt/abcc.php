<?php
$host = 'localhost';
$dbname = 'phpcrud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Calculate the current index based on the number of events already shown
    $current_index = isset($_GET['index']) ? intval($_GET['index']) : 0;

    // Fetch the next two events from the database
    $stmt = $pdo->prepare("SELECT * FROM evenement LIMIT :offset, 2");
    $stmt->bindParam(':offset', $current_index, PDO::PARAM_INT);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>

<style>
.events-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 1rem;
  padding: 0.4rem 0;
}

.event {
  display: flex;
  flex-direction: column;
  border: 1px solid darkgoldenrod;
  border-radius: 5px;
  padding: 1rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease-in-out;
  color: darkgoldenrod;
  background-color: rgba(12, 11, 9, 0.6);
}


.event:hover {
  transform: translateY(-5px);
}

.event img {
  width: 100%;
  height: auto;
  object-fit: cover;
  margin: 0;
  filter: grayscale(50%) brightness(90%);
  transition: filter 0.3s ease-in-out;
}

.event:hover img {
  filter: none;
}


.event h3 {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
  color: darkgoldenrod;
  text-align: center;
}

.event p {
  font-size: 0.9rem;
  line-height: 1.5;
  color: darkgoldenrod;
  text-align: center;
}

.next-button {
  margin-top: 1rem;
  text-align: center;
}

.next-button button {
  background-color: rgba(12, 11, 9, 0.6);
  color: darkgoldenrod;
  border: 1px solid darkgoldenrod;
  padding: 0.5rem 1rem;
  margin: 0 0.5rem;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  text-decoration: none;
}

.next-button button:hover {
  background-color: darkgoldenrod;
  color: black;
}
</style>

<div class="events-grid">
    <?php foreach ($events as $event): ?>
        <div class="event">
        <h3 style="font-style: italic;"><?= $event['titre'] ?></h3>

            <img src="<?= $event['image_path'] ?>" alt="<?= $event['titre'] ?>">
            <p><?= $event['description'] ?></p>
            <p><?= $event['date_debut'] ?> - <?= $event['date_fin'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div class="next-button">
    <button onclick="showPrevious()">↩</button>
    <button onclick="showNext()">↪</button>
</div>

<script>
    const events = document.querySelectorAll('.event');
    const nextButton = document.querySelector('.next-button');

    let currentEventIndex = 0;
    const numEventsToShow = 2;

    function showNext() {
        currentEventIndex += numEventsToShow;

        // Reload the page with the new index
        window.location.href = '?index=' + currentEventIndex;
    }
   
    function showPrevious() {
        currentEventIndex -= numEventsToShow;

        // Make sure the current index doesn't go below zero
        if (currentEventIndex < 0) {
            currentEventIndex = 0;
        }

        // Reload the page with the new index
        window.location.href = '?index=' + currentEventIndex;
    }
    // Hide all events except the first two
    for (let i = numEventsToShow; i < events.length; i++) {
        events[i].style.display = 'none';
    }

    // Show the next button only if there are more events to show
    if (<?= count($events) ?> < numEventsToShow) {
        nextButton.style.display = 'none';
    }
</script>
