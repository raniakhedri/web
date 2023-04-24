<?php
session_start();
  if(isset($_POST['btn-ajouter'])){
      //connexion à la base de données
      $con = mysqli_connect("localhost","root","","events");
      //recupération des données du formulaire
      $nom = $_POST['nom'];
      $localisation = $_POST['localisation'];
      $nb_places = $_POST['nb_places'];
      $genre = $_POST['genre'];
      $userid = $_SESSION['id'] ;


     
      if(!empty($nom) && !empty($localisation)){
          //verifier si le produit existe déjà dans la base de données
          $req1 = mysqli_query($con, "SELECT nom ,localisation FROM evenement WHERE nom ='$nom' AND localisation = '$localisation'");
          if(mysqli_num_rows($req1) > 0) {
              //si le produit existe déjà:
              $message = '<p style="color:red" >Le produit existe déjà</p>';
          }else {
              //sinon
              if(isset($_FILES['image'])){
                  //si une image a été télécharger:
                  $img_nom = $_FILES['image']['name']; //On récupère le nom de l'image 
                  $tmp_nom = $_FILES['image']['tmp_name']; //Nous définissons un nom temporaire
                  $time =time(); //On recupere l'heure actuelle
                  //On renomme l'image
                 
                  $nouveau_nom_img = $time.$img_nom ;
                  


                  //On déplace l'image dans le dossier images-produits

                  $deplacer_image = move_uploaded_file($tmp_nom,"images-produits/".$nouveau_nom_img) ;
                 


                  if($deplacer_image){
                      //si l'image a été déplacé :
                      //insérons le titre ,la description  et le nom de l'image dans la base de donnée 
                      $req2 = mysqli_query($con,"INSERT INTO evenement VALUES (NULL,'$nom','$localisation','$nb_places','$nouveau_nom_img','$genre','$userid')") ;
                       if($req2){
                           //si les informations ont été inséré dans la base de données
                           $message = '<p style="color:green">Produit ajouté ! </p>';
                           header('Location:afficherPendingEvent.php');
                       }else {
                           //si non
                           $message = '<p style="color:red ">Produit Non ajouté !</p>';
                       }
                  }

              }
          }
      }else {
          //si tous les champs ne sont pas remplie on a :
        $message = '<p style="color:red">Veuillez remplir tous les champs !</p>';
      }
  }


?>



<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
        <!-- Datatables css -->
<link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />

    </head>
 <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index_dash.php" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="logo.png" alt="" height="100">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index_dash.php" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar="">

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                
                                <span> Dashboards </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                <li>
                                        <a href="ajouterevent">Ajouter une event</a>
                                    </li>
                                    <li>
                                        <a href="afficherUserEvents.php">Mes events</a>
                                    </li>
                                    <li>
                                        <a href="afficherPendingEvent.php">Evenements en attente</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                       
                                  

                    <!-- Help Box -->
                    
                    <!-- end Help Box -->
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Ajouter l'evenement : </h4>
                                </div>
                            </div>
                        </div>
    <section class="input_add">
        <form action="" method="POST" enctype="multipart/form-data">
           <div class="message">
               <?php 
               if(isset($message)){
                   //si la variable message existe , on affiche le contenu de la variable
                   echo $message ;
               }

                   ?>
           </div>
            <div class="mb-3">
    <label for="simpleinput" class="form-label">Nom</label>
    <input type="text" name="nom" id="simpleinput" class="form-control">
            </div>
            <div class="mb-3">
    <label for="example-textarea"  class="form-label">localisation</label>
    <input type="text" name="localisation" id="simpleinput" class="form-control">
</div>
        

 <div class="mb-3">
    <label for="simpleinput" class="form-label">Nombre de places :</label>
    <input type="text" name="nb_places" id="simpleinput" class="form-control">
            </div>
            
           

            <div class="mb-3">
    <label for="example-fileinput" class="form-label">L'image du produit </label>
    <input type="file" id="example-fileinput" class="form-control" name="image">
</div>
<div class="mb-3">
    <label for="example-select" class="form-label">genre</label>
    <select class="form-select" id="example-select" name="genre">
    <?php 
                 //Nous allons afficher tous les produits ajouté :
                   //connexion à la base de données
                   $con = mysqli_connect("localhost","root","","events");
                   $req3 = mysqli_query($con , "SELECT * FROM genre");
                   if(mysqli_num_rows($req3) == 0){
                      //si la base de donnée ne contient aucun produit , alors affichons :
                      echo " Aucun produit trouvé";
                   }else {//si oui
                       while($row = mysqli_fetch_assoc($req3)){
                           //affichons les informations
                           echo '   <option>'.$row['nom'].'</option>
                             ';
                       }
                   }

                ?>
       
    </select>
</div>
 
            <input type="submit" value="Ajouter" name="btn-ajouter">

            <a class="btn-liste-prod" href="index_dash.php"> Liste des produits</a>
        </form>
    </section>
               <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar="">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1">

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1">
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1">
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>
        

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->
        
        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->
        <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
    </body>
</html>
</body>
</html>