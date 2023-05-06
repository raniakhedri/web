  <!DOCTYPE html>
  <html>
    <head>
      <title>Forum</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="frontc.css">
      <style>
        
        
        
        
        
        
        
      </style>
    </head>
    <body>
      
    <header id="header" class="fixed-top d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <div class="logo-container">
      <img src="./logo.png" class="logo">
    </div>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
        <li><a class="nav-link scrollto" href="#about">A propos de nous</a></li>
        <li><a class="nav-link scrollto" href="#menu">Evenements</a></li>
        <li><a class="nav-link scrollto" href="#events">Excursions</a></li>
        <li><a class="nav-link scrollto" href="#gallery">Sport</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        <li><a class="nav-link scrollto" href="Fronttt/TestFront - Copie.php">Forum</a></li>
      </ul>
    </nav>
    <a href="C:\Users\user\Desktop\project web\login\Login_v1\index.html" class="book-a-table-btn scrollto d-none d-lg-flex">Se connecter</a>
  </div>
</header>

<style>
  /* Add this CSS */
  .container-xl {
  display: flex;
  align-items: center;
}

.logo-container {
  margin-right: 150px;
}

#navbar {
  margin-left: 10px;
}

</style>











 
    



        
      

  <link rel="stylesheet" href="frontc.css">
  <style>
    h1 {
    font-family: "Helvetica Neue", Arial, sans-serif;
    font-weight: bold;
    font-size: 60px;
    color: #6E5B00;
    font-style: italic; 
    text-align: center;
    margin-top: 50px;
    letter-spacing: 2px;
    text-shadow: 2px 2px #444;
}

</style>

  <h1>Derniers Evenements</h1>
  <?php include 'abcc.php'; ?>

  <style>
  .dark-gold-btn {
    display: flex;
justify-content: center;
    background-color: rgba(12, 11, 9, 0.6);
  color: darkgoldenrod;
  border: 1px solid darkgoldenrod;
  padding: 0.5rem 1rem;
  margin: 0 0.5rem;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  text-decoration: none;
}
  }

  .dark-gold-btn:hover {
    background-color: #a4782e;
  }
</style>
  
<section id="book-a-table">
  <style>
   form {
    width: 50%; /* Updated grid width */
    max-width: 400px;
    margin: 100px auto;
    margin-top: 50px; /* Added margin top and bottom */
    text-align: center;
    background-color: rgba(12, 11, 9, 0.6);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
}


label {
    display: block;
    margin-bottom: 10px;
    text-align: center;
    font-style: italic;
    color: darkgoldenrod;
    font-size: 16px;
}

input[type=text], input[type=email], textarea {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
    background-color: #555;
    color: #fff;
    font-size: 16px;
}

input[type=text]:focus, input[type=email]:focus, textarea:focus {
    outline: none;
    background-color: #777;
}

textarea {
    resize: vertical;
    height: 120px;
    font-size: 16px;
}

input[type=submit] {
    background-color: #DAA520;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
    font-weight: bold;
}

input[type=submit]:hover {
    background-color: #B8860B;
}

  </style>
  <form action="http://localhost/ProjetWeb/crud/comm.php" method="POST">
    <label for="name">Nom et Prenom:</label>
    <input type="text" id="name" name="nom" placeholder="Entrez votre nom et prenom ici" required>
<label for="email">Email:</label>
<input type="email" id="email" name="email" placeholder="Entrez votre email ici" required>

<label for="comment">Commentaire:</label>
<textarea id="comment" name="type" placeholder="Entrez votre commentaire ici" required></textarea>

<input type="submit" value="Envoyer">
  </form>
</section>
<button id="toggle-form-btn" class="dark-gold-btn">Masquer</button>
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
  color:grey;
}

.comment p {
  margin-bottom: 5px;
  color:white;
}

.comment .date {
  font-style: italic;
  font-size: 0.8em;
}
</style>
<style>
.container {
  max-width: 800px;
  background-color: rgba(12, 11, 9, 0.6);
  margin: 0 auto;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}

.comment {
  position: relative;
  padding: 10px;
  margin-bottom: 10px;
  background-color: rgba(51, 51, 51, 0.8);

  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}

.profile-pic {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}

.comment-details h3 {
  margin: 0;
  color:grey;
  font-style:italic;
  font-size: 1.2rem;
}

.comment-details p {
  margin: 0;
  font-size: 1rem;
  color:white;
  font-style:italic;
}

.comment .date {
  font-size: 0.8rem;
  color: gray;
}

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

footer {
  margin-top: 20px;
  text-align: center;
  font-size: 0.8rem;
  color: gray;
}
</style>
<div class="container">
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
 <style>
    .form-control h2 {
        margin-bottom: 50px;
        font-style: italic;
        font-family: "Helvetica Neue", Arial, sans-serif;
    font-weight: bold;
    font-size: 60px;
    color: #6E5B00;
    text-align: center;
    letter-spacing: 2px;
    text-shadow: 2px 2px #444;
    }
</style>

<div class="form-control">
    <h2>Derniers commentaires</h2>
    <!-- Your comment section code here -->
</div>

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
<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggleFormBtn = document.getElementById('toggle-form-btn');
  const bookTableSection = document.getElementById('book-a-table');

  toggleFormBtn.addEventListener('click', function() {
    if (bookTableSection.style.display === 'none') {
      bookTableSection.style.display = 'block';
      toggleFormBtn.textContent = 'Masquer';
    } else {
      bookTableSection.style.display = 'none';
      toggleFormBtn.textContent = 'Montrer';
    }
  });
});
</script>

</html>