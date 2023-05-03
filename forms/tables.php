<?php
session_start();

require 'bd.php';
require 'bd1.php';
include  "../Model/client.php";
include  "../Controller/ClientC.php";

$clientc= new ClientC();
$liste=$clientc->afficherClients();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="../dist/styles.css">
    <link rel="stylesheet" href="../dist/all.css">
    
    <title>DisTunis</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
               
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <div class="flex">

                </div>
                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="index.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                   
                   
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="tables.html"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tables
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="mail.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Maill
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                   
                   
                    <li class="w-full h-full py-3 px-2">
                        <a href="#"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="far fa-file float-left mx-2"></i>
                            Pages
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="list-reset -mx-2 bg-white-medium-dark">
                            <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="login.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Login Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="register.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Register Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="404.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    404 Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Horizontal form-->
                      
                        <!--/Horizontal form-->

                        <!--Underline form-->
                    
                        <!--/Underline form-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div style="display: flex; align-items: center;  margin-left: 20px;">





                            <form method="POST" action="">
                        <label for="Recherche">Recherche</label>
                        <input class="border px-4 py-2" type="text" style="margin-right: 10px;" name="search" id="search">
                        <select
                            class="block appearance-none w-30 bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" name="category" id="category">
                        <option value="id">ID</option>
                        <option value="nom">Name</option>
                        <option value="age">Age</option>
                        </select>
                          <button type="submit" name="submit">Search</button>
</form>
<form action="pdf.php" method="POST">
    <button type="submit" name="pdf_bt" >PDF</button>
</form>
                    </div>
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Les Clients
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/6 px-4 py-2">Nom</th>
                                        <th class="border w-1/5 px-4 py-2">Localisation</th>
                                        <th class="border w-1/7 px-4 py-2">telephone</th>
                                        <th class="border w-1/6 px-4 py-2">name account</th>
                                        <th class="border w-1/4 px-4 py-2">Status</th>
                                        <th class="border w-1/7 px-4 py-2">Actions</th>
                                      </tr>
                                      <?php 
                   
                    //inclure la page de connexion
                
                if ($row=$liste->rowCount() == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ; }
                    elseif(isset($_POST['submit'])){
  // Get the search term and category from the input boxes
  $search_term = $_POST['search'];
  $search_category = $_POST['category'];
$clientc1= new ClientC();
$rows = $clientc1->recupererClient($search_term);







foreach ($rows as $row1) {     
                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td class="border px-4 py-2"><?php echo $row1['nom']; ?></td>
                                            
                                            <td class="border px-4 py-2"><?php echo $row1['email']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row1['tel']; ?></td>

                                            <td class="border px-4 py-2"><?php echo $row1['name_account']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row1['event']; ?></td>


                                           
                                            
                                            <td class="border px-4 py-2">
                     <a class=" bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="modaleC.php?id=<?=$row1['id']?>">
                                                        <i class="edit-trigger modal-trigger fas fa-eye" data-modal='centeredModal'  ></i></a>


                                                        
                                                        
                                                    
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="modifier.php?id=<?=$row1['id']?>">
                                                        <i class="modal-trigger  fas fa-edit" data-modal='centeredFormModal'></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="supprimer.php?id=<?=$row1['id']?>">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                      <?php
                                            }
                                        
                                        ?>



























 <?php
                    
                }else {
                   
                   
                   //si non , affichons la liste de tous les employés
                    
while($row=$liste->fetch()){
     
                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td class="border px-4 py-2"><?php echo $row['nom']; ?></td>
                                            
                                            <td class="border px-4 py-2"><?php echo $row['email']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['tel']; ?></td>

                                            <td class="border px-4 py-2"><?php echo $row['name_account']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['event']; ?></td>


                                           
                                            
                                            <td class="border px-4 py-2">
                     <a class=" bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="modaleC.php?id=<?=$row['id']?>">
                                                        <i class="edit-trigger modal-trigger fas fa-eye" data-modal='centeredModal'  ></i></a>


                                                        
                                                        
                                                    
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="modifier.php?id=<?=$row['id']?>">
                                                        <i class="modal-trigger  fas fa-edit" data-modal='centeredFormModal'></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="supprimer.php?id=<?=$row['id']?>">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                      <?php
                                            }
                                        }
                                        ?> 
                                    
                                </table>
                               
                            </div>
                            
                        </div>
                        
                    </div>
                    

                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->
        

    </div>

</div>




<script src="../main.js"></script>

</body>

</html>