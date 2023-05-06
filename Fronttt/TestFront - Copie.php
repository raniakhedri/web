  <!DOCTYPE html>
  <html>
    <head>
      <title>Events News Forum</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="frontc.css">
      <style>
        
        
        
        
        
        
        
      </style>
    </head>
    <body>
      <div class="header">
        <a href="C:/Users/ilyes/OneDrive/Bureau/project web/index.html">
          <img src="logo.png" alt="Events News Forum">
        </a>
        <h1>Forum et nouveautées</h1>
      </div>
      <div class="events-container">
        <!-- Ad spot in top right corner -->
        <div class="ad-container">
          <a href="https://www.example.com">
            <img src="advertisement.jpg" alt="Advertisement" width="100%" height="100%">
          </a>
        </div>
        <div class="news-container">
          <div class="news-story">
          
            <h2>Festival International de Carthage</h2>
          <a href="carthage-festival.html">
            <img src="125.jpg" alt="Photo de performeurs au Festival International de Carthage" height="200" width="300">
          </a>
          <p>Détails : Le Festival International de Carthage est l'un des plus grands événements à venir en Tunisie, qui aura lieu cet été. Le festival est une célébration de la musique, du théâtre et de la danse, et attire des artistes et des spectateurs du monde entier. C'est une excellente occasion de découvrir la riche culture et l'histoire de la Tunisie.</p>
        </div>
        <p id="currentDateTime"></p>
    
        
        <div class="news-story">
          <h2>Visite Privée à Kairouan, El Jem & Monastir avec Déjeuner depuis Hammamet maintenant disponible</h2>
          <a href="eljem-championship.html">
            <img src="124.jpg" alt="Photo de joueurs de handball en action" height="200" width="300">
          </a>
          <p>Détails : Depuis votre Hôtel vers la ville de Kairouan la quatrième ville sainte de l’Islam et capitale spirituelle de la Tunisie. Vous visiterez la grande mosquée qui est le plus ancien édifice religieux de l'Occident musulman Par la suite vous aurez du temps libre dans la médina de Kairouan. Puis El Djem l'ancienne cité de Thysdrus, l'une des plus prospères de l'Afrique romaine pour la visite de son amphithéâtre et finir l’excursion par Monastir ancienne ville punique puis romaine de Ruspina.</p>
        </div>
        
        <div class="news-story">
          <h2>Excursion Privée à Testour, Dougga et Bulla Regia depuis Tunis .</h2>
          <a href="economic-forum.html">
            <img src="126.jpg" alt="Photo de dirigeants d'entreprise au Forum Économique de la Tunisie" height="200" width="300">
          </a>  
          <p>Détails : Pour les amateurs d’archéologie et de l’histoire antique de la Tunisie Avec nous vous pouvez découvrir deux sites archéologiques d’exception, Dougga et Bulla Regia. Le premier arrêt de notre excursion est la visite de Testour, ce village a été fondé par le peuple maure au début du XVIIe siècle. Nous ferons un tour panoramique de la ville, de la célèbre mosquée au beau minaret orné d'une horloge dont les aiguilles tournent dans le sens inverse d'une montre. Ensuite, nous continuerons vers Dougga, l'ancienne ville romaine de Thugga. Nous apprécierons la visite des belles ruines merveilleusement conservées si vous êtes passionné d'histoire et d'art : le théâtre, le capitole, le forum, les thermes, les maisons, la place de la rose des vents, l'arc de triomphe, le Libyco- Mausolée punique Puis vous visiterez Bulla Régia . Ce site archéologique est célèbre ses édifices religieux : le capitole, le temple d’Apollon, les deux basiliques chrétiennes, et l’église d’Alexander.</p>
        </div>
      
        </div>
    



        
      

  <link rel="stylesheet" href="frontc.css">
      

      <div class="my-form-wrapper">
        <form action="http://localhost/ProjetWeb/crud/comm.php" method="POST">
          <label for="nom">Nom</label>
          <input type="text" name="nom" placeholder="John Doe" id="nom">
          <label for="email">Email</label>
          <input type="text" name="email" placeholder="johndoe@example.com" id="email">
          <label for="type">Commentaire</label>
          <input type="text" name="type" placeholder="Commentaire" id="type">
          <input type="submit" value="Create">
      </form>
      </div>
  
      <section id="mySection">
      <?php
      $host = 'localhost';
      $dbname = 'phpcrud';
      $username = 'root';
      $password = '';
      
      try {
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
// Retrieve pubs from database
$stmt = $pdo->prepare('SELECT nom, type, datep FROM pubs ORDER BY datep DESC');
$stmt->execute();
$pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
.post {
  display: flex;
  flex-direction: column;
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 20px;
}

.post h2 {
  margin-top: 0;
}

.post img {
  width: 50px;
  height: 50px;
  margin-right: 10px;
  border-radius: 50%;
}

.comment {
  display: flex;
  align-items: flex-start;
  margin-bottom: 80px;
}

.comment-details {
  flex: 1;
}

.comment h3 {
  margin-top: 0;
  margin-bottom: 5px;
}

.comment p {
  margin-bottom: 5px;
}

.comment .date {
  font-style: italic;
  font-size: 0.8em;
}
</style>

<div class="post">
  <?php function getUserByNom($nom) {
  // Replace with your own database credentials
  $dbHost = "localhost";
  $dbName = "phpcrud";
  $dbUser = "root";
  $dbPass = "";

  try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute query to fetch user data by nom
    $stmt = $pdo->prepare("SELECT * FROM user WHERE nom = :nom");
    $stmt->bindParam(":nom", $nom);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
  } catch(PDOException $e) {
    // Handle database connection errors
    echo "Database connection failed: " . $e->getMessage();
    return null;
  }
} ?>
 <div class="post">
  <h2>Derniers commentaires</h2>
  <style>
    /* Add styles for the reply overlay */
    .reply-overlay {
      position: absolute;
      top: 0;
      left: 0;
      display: none;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }
    .comment:hover .reply-container {
  display: flex;
}

.reply-container {
  position: absolute;
  display: none;
  top: 0;
  right: 0;
  width: 400px;
  height: 100%;
  max-height: calc(100% - 20px);
  padding: 10px;
  margin: 0;
  border: none;
  box-shadow: transparent;
  z-index: 999;
  overflow-y: auto;
  box-sizing: border-box;
}
.expand-btn {
  background-color: rgb(83, 66, 5);
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 50%;
  font-size: 0.75rem;
  padding: 0.2rem;
}

.expand-btn i {
  font-size: 20px;
  vertical-align: middle;
}



  </style>
  <?php foreach ($pubs as $pub): ?>
    <?php
      // Check if user exists with matching nom
      $user = getUserByNom($pub['nom']); // Replace getUserByNom() with your own function to fetch user data by nom
      $profilePic = "https://via.placeholder.com/50";
      if ($user && isset($user['image_path'])) {
        $profilePic = $user['image_path'];
      }
    ?>
    <div class="comment" style="position: relative;">
      <img class="profile-pic" src="<?= $profilePic ?>" alt="Profile Picture">
      <div class="comment-details">
        <h3><?= $pub['nom'] ?></h3>
        <p><?= $pub['type'] ?></p>
        <p class="date"><?= $pub['datep'] ?></p>
        
      </div>
      <div class="reply-overlay"></div> <!-- Add the overlay -->
      <div class="reply-container"> <!-- Add the reply container -->
      <form action="http://localhost/ProjetWeb/crud/repp.php" method="POST">
          <label for="nom">Nom</label>
          <input type="text" name="nom" placeholder="John Doe" id="nom">
          <label for="type">Reponse</label>
          <input type="text" name="type" placeholder="Commentaire" id="contenu">
          <input type="submit" value="Create">
          <button class="expand-btn">
  <i class="fa fa-expand"></i>
</button>
      </form>
      </div>
    </div>
    <?php
  // Handle form submission
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reponse = $_POST['contenu'];
    $pub_id = $pub['id_pub']; // Replace with the actual ID of the comment
    // Update the "commentaires" table with the new response
    function updateComment($id, $contenu) {
      $dsn = "mysql:host=localhost;dbname=phpcrud";
      $username = "root";
      $password = "";
    
      try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "UPDATE commentaires SET contenu = :contenu WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['contenu' => $contenu, 'id' => $id]);
    
        return true;
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
      }
    }
    
    updateComment($pub_id, $reponse); // Replace updateComment() with your own function to update the database
  }
?>
  <?php endforeach; ?>
  <script>
    // Get all the comment elements
    const comments = document.querySelectorAll('.comment');

    // Loop through all the comments and add mouseover and mouseout event listeners to each one
    comments.forEach(comment => {
      const overlay = comment.querySelector('.reply-overlay');
      const container = comment.querySelector('.reply-container');

      comment.addEventListener('mouseover', () => {
        overlay.style.display = 'block';
        container.style.display = 'block';
      });

      comment.addEventListener('mouseout', () => {
        overlay.style.display = 'none';
        container.style.display = 'none';

        
      });
    });
  </script>
</div>
<footer>
  <p>Distunis © 2023 
    <a href="mailto:ilyes.touil.1@gmail.com">Contactez-nous</a>
  </p>
</footer>
</body>
</html>