<?php
include '../../Controller/projet.php';
include_once '../../Model/user.php';
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Distunis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./apple-touch-icon.png" rel="icon">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v3.10.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="front/website-menu-03/fonts/icomoon/style.css">

  <link rel="stylesheet" href="front/website-menu-03/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="front/website-menu-03/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="front/website-menu-03/css/style.css">

</head>
<style>
  #hero {
    width: 100%;
    height: 100vh;
    background: url("bg.png") top center;
    background-size: cover;
    position: relative;
    padding: 0;
  }

  .notification {
    color: white;
    text-decoration: none;
    padding: 5px 61px;
    position: relative;
    display: inline-block;
    border-radius: 30px;
  }

  .notification:hover {
    border: solid red;
    color: white;
  }

  .notification .badge {
    position: absolute;
    top: -10px;
    right: -10px;
    padding: 5px 10px;
    border-radius: 50%;
    background: red;
    color: white;
  }
</style>

<body>

  <?php
  $liste = null;
  if (isset($_SESSION["res"])) {
    $userC = new userC();
    $liste = $userC->vérifierEmail($_SESSION["res"]);
    echo '<header class="site-navbar" role="banner">

                <div class="container">
                
                  <div class="row align-items-center">
                
                    <div class="col-11 col-xl-2">
                      <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">Distunis</a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                      <nav class="site-navigation position-relative text-right" role="navigation">
                
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                          <li><a href="listings.html"><span>Mon compte</span></a></li>
                          <li><a href="about.html"><span>Achat</span></a></li>
                          <li><a href="blog.html"><span>Blog</span></a></li>
                          <li><a
                              href="http://localhost/integration/user/VIEWS/front/ajouterAdherent.php"><span>Reclamation</span></a>
                          </li>
                          <li><a
                          href="./profil.php"><span>Sécurité</span></a>
                           </li>
                          <a href="http://localhost/integration/reclamation/Views/notification.php" class="notification">
                            <span>Notifications</span>
                            <span class="badge">0</span>
                          </a>
                      '
      ?>
    <li>
      <a href="logout.php" class="log">
        <?php

        echo 'logout';
        ?>
      </a>
    </li>
    </ul>
    </nav>
    </div>


    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
        class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

    </div>

    </div>


    </header>
    <?php

  } else {
    echo ' 
    <style>
  #hero {
    width: 100%;
    height: 100vh;
    background: url("hero-bg.png") top center;
    background-size: cover;
    position: relative;
    padding: 0;
  }
</style>
    <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <img src="./logo.png" class="logo">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos de nous</a></li>
          <li><a class="nav-link scrollto" href="#menu">Evenements</a></li>
          <li><a class="nav-link scrollto" href="#events">Excursions</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallerie</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        
          
        <!-- End Header -->'
      ?>

    <a href="login.php" class="book-a-table-btn scrollto d-none d-lg-flex">login</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    </div>
    </header>
  <?php } ?>



  <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
      class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

  </div>

  </div>


  </header>






  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Bienvenue <span>
              <?php if ($liste == null) {
                echo 'à DisTunis  <h2>Votre guide partout ! </h2>';

              } else
                echo $liste['uname'];

              ?>
            </span></h1>

          <div class="btns">

          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in"
          data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=OtJVufo3IrA&t=249s" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->


    <!-- ======= Why Us Section ======= -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Evenements</h2>
          <p>Consultez les derniers événements</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Tout</li>
              <li data-filter=".filter-starters">Musique</li>
              <li data-filter=".filter-salads">Cinéma</li>
              <li data-filter=".filter-specialty">Theatre</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/lobster-bisque.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Spectacle El Ziara</a><span>30DT</span>
            </div>
            <div class="menu-ingredients">
              Samedi le 25 Mars 2023 , Carthage
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Evasion Aziz Jebali</a><span>40DT</span>
            </div>
            <div class="menu-ingredients">
              Vendredi le 7 Avril 2023 , Cité de la culture
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/cake.PNG" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">El Khnefess</a><span>29DT</span>
            </div>
            <div class="menu-ingredients">
              Samedi le 8 Avril 2023 , Hotel four seasons
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Asshab wala aaz</a><span>9DT</span>
            </div>
            <div class="menu-ingredients">
              Lundi le 27 Mars 2023 ,Ciné Jamil
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Big Bossa Wajiha Jendoubi</a><span>30DT</span>
            </div>
            <div class="menu-ingredients">
              Dimanche le 2 Avril 2023 ,Théatre municipal de Tunis
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Romeo et Juliette Orchestre symphonique Tunisien</a><span>15DT</span>
            </div>
            <div class="menu-ingredients">
              Jeudi le 16 février 2023 , Cité de la culture
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Sabbak el khir </a><span>13.5DT</span>
            </div>
            <div class="menu-ingredients">
              tout les jours ,Pathé tunis City et Azur City
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Al Badla</a><span>13.5DT</span>
            </div>
            <div class="menu-ingredients">
              tout les jours ,Pathé tunis City et Azur City </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Amine Radi expert comptable</a><span>60DT</span>
            </div>
            <div class="menu-ingredients">
              Vendredi le 10 Mars 2023 ,Théatre municipal de Tunis
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Top 5</h2>
          <p>Meilleurs espaces culturels à visiter</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cité de la culture Tunis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Théatre Municipal de Tunis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Cité des sciences de Tunis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pathé Tunis city</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Café culturel liber'thé</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cité de la culture Tunis</h3>

                    <p>La cité de la Culture est un espace qui invite à réfléchir sur un paysage culturel nouveau
                      offrant l’opportunité à tous les intellectuels d’y prendre part en participant à l’enrichissement
                      du patrimoine culturel national avec des œuvres magistrales et transcendantales », indique-t-il.
                      Le ministre a assuré, par ailleurs, que l’ouverture de la Cité de la Culture est « un grand
                      évènement historique et un grand rêve qui se réalise grâce aux sacrifices des employés et cadres
                      du ministère des Affaires culturelles et du ministère de l’Equipement et aux promesses tenues de
                      Mohamed Salah Arfaoui </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Théatre Municipal de Tunis</h3>

                    <p>Le Théâtre municipal de Tunis est le principal théâtre de Tunis et le plus célèbre des théâtres
                      de la Tunisie moderne. Construit dans le style Art nouveau sur l'avenue Jules-Ferry, il est
                      inauguré le 20 novembre 1902. Il est alors appelé Casino municipal de Tunis.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cité des sciences de Tunis</h3>

                    <p>La Cité des sciences à Tunis est un établissement tunisien spécialisé dans la diffusion de la
                      culture scientifique et technique à l'échelle nationale.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pathé Tunis city</h3>

                    <p>Pathé Tunis City, un multiplexe sur le site de Géant Tunis City, la meilleure expérience cinéma
                      jamais proposé en Tunisie. Moderne à la pointe de la technologie avec une programmation large et
                      tout public.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Café culturel liber'thé</h3>
                    <p>Liber'Thé est un pilier de la scène culturelle de Tunis, un lieu d'échanges intellectuel autour
                      des arts, de la culture et de la littérature...et un refuge pour les minorités, il a reçu Le Tanit
                      d’Or du meilleur espace culturel indépendant.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Excursions</h2>
          <p>Agissez maintenant, réalisez vos rêves
          </p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-birthday.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Excursion Kairaouan</h3>
                  <div class="price">
                    <p><span>59DT</span></p>
                  </div>
                  <p class="fst-italic">
                    Visitez dans une seule journée toutes les attractions historique de Kairouan Grande mosquée, les
                    bassins des Aghlabides, l’authentique Médina, La maison du Bey ancien gouverneur de Kairouan, Le
                    mausolée Sidi Sahbi et l'unique Bir Barouta. Plongez dans l'histoire de cette ville magique et
                    profitez des moments inoubliables...
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Première ville arabe d'Afrique du Nord, la ville a été un
                      important centre islamique de l'Afrique du Nord musulmane, l'Ifriqiya, jusqu'au xie siècle. Avec
                      sa médina et ses marchés organisés par corporations à la mode orientale, ses mosquées et autres
                      édifices religieux, Kairouan est inscrite depuis 1988 sur la liste du patrimoine mondial de
                      l'Unesco.
                    </li>

                  </ul>

                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-private.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Excursion Sidi Bou Said</h3>
                  <div class="price">
                    <p><span>90DT</span></p>
                  </div>
                  <p class="fst-italic">
                    Découvrez Sidi Bou Saïd, un village de renommée mondiale. Explorez ce lieu fascinant, riche en
                    histoire et symbolisme. Apprenez l’histoire de Carthage et visitez le cimetière américain.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> célèbre pour son architecture traditionnelle bleue et
                      blanche, ses rues pavées et sa vue sur la mer Méditerranée. Lors d'une excursion à Sidi Bou Said,
                      vous pourrez vous promener dans les rues pittoresques et découvrir les magnifiques portes
                      sculptées, les balcons en fer forgé et les murs blanchis à la chaux.
                    </li>

                  </ul>

                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-custom.jpeg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Excursion Matmata</h3>
                  <div class="price">
                    <p><span>99 DT</span></p>
                  </div>
                  <p class="fst-italic">
                    Êtes-vous un fan de Star Wars? Avez-vous déjà rêvé de visiter le décor de tournage de Star Wars,
                    tout en profitant d'un paysage à couper le souffle, qui a inspiré la planète Tatooine?
                  </p>

                  <p>
                    Eh bien, n'y
                    pensez plus! Dans cette visite de 3 jours, vous visiterez 3 des décors de tournage les plus
                    importants pour les films, y compris la ville de Mos Espa! Vous découvrirez les dunes du Sahara, les
                    habitations troglodytes de la ville de Matmata, et vous tomberez amoureux de la beauté de ce petit
                    pays d'Afri
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contactez nous </p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
          frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Emplacement:</h4>
                <p>Tunis,Rue habib bourguiba 535022</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Disponibilité:</h4>
                <p>
                  24/24 7/7
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Distunis.tn@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone:</h4>
                <p>+216 56 265 123</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Prenom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Chargement</div>
                <div class="error-message"></div>
                <div class="sent-message">Message envoyé,Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>DisTunis</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DisTunis</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>