<?php 
   session_start();
   include "db_conn.php";
    ?>
<!DOCTYPE html>

<head>
   
   <title>events</title>

  
  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">Artem</a>

   <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="events.php">Events</a>
      <a href="wishlist.php">favoris</a>
      <a href="logout.php" >Logout</a>                               

   </nav>

   
</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg.1.gif) no-repeat">
   
</div>

<!-- packages section starts  -->

<section class="events">

   <h1 class="heading-title"> events this decade</h1>

   <div class="box-container">
   <?php 
                 //Nous allons afficher tous les produits ajouté :
                   //connexion à la base de données
                   $con = mysqli_connect("localhost","root","","events");
                   $req3 = mysqli_query($con , "SELECT * FROM evenementapp");
                   if(mysqli_num_rows($req3) == 0){
                      //si la base de donnée ne contient aucun produit , alors affichons :
                      echo " Aucun produit trouvé";
                   }else {//si oui
                       while($row = mysqli_fetch_assoc($req3)){
                           //affichons les informations
                           echo ' 
                           <div class="box">
                           <div class="image">
                              <img src="images-produits/'.$row['image'].'" alt="">
                           </div><br><br><br>
                           <div class="content">
                              <h3>'.$row['nom'].'</h3>
                               <p> '.$row['localisation'].' </p>
                               <a href="addtowishlist.php?id='.$row['id'].'" class="btn">Favoris</a>                           </div>
                        </div>
                           ';
                       }
                   }

                ?>
      

   </div>


</section>

<!-- footer section ends -->











</body>
</html>