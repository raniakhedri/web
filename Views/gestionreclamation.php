<?php
  // session_start();

	include '../Controller/AdherentC.php';
	$adherentC=new AdherentC();
	$listeAdherents=$adherentC->afficheradherents(); 
    
	include '../Controller/reponseC.php';
	$reponseC=new reponseC();
	$listereponses=$reponseC->afficherreponses(); 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    
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
                    <h1 class="text-white p-2">DisTunis</h1>
                </div>
               
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar"
            class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

            <ul class="list-reset flex flex-col">
                <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                    <a href="index.html"
                        class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-tachometer-alt float-left mx-2"></i>
                        Dashboard
                        <span><i class="fas fa-angle-right float-right"></i></span>
                    </a>
                </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="tables.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-table float-left mx-2"></i>
                    user management
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="mail.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fab fa-wpforms float-left mx-2"></i>
                    delivery management
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="gestionsformateurs.html"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-table float-left mx-2"></i>
                    training management
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a></li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                    <a href="gestionproduit.html"
                        class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-table float-left mx-2"></i>
                        product management
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a></li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="gestionreclamation.html"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            reclamation management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a></li>
           
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
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Reclamations
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                <thead>
				       <th class="border w-1/6 px-4 py-2">ID</th>
				       <th class="border w-1/6 px-4 py-2">Objet</th>
				         <th class="border w-1/6 px-4 py-2">Message</th>
				        <th class="border w-1/6 px-4 py-2">email</th>
                
            	       <th>Modifier</th>
				       <th>Supprimer</th>
                       <th>Repondre</th>

                        </thead>
			          <?php
				     foreach($listeAdherents as $reclamation){
			   ?>
		    	<tr>
				<td class="border w-1/6 px-4 py-2"> <?php echo $reclamation['id']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reclamation['nom']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reclamation['description']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reclamation['email']; ?></td>

              
				
				<td>
					<form method="POST" action="modifieradherent.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimeradherent.php?id=<?php echo $reclamation['id']; ?>">Supprimer</a>
				</td>
                <td>
					<a href="ajouterreponse.php?id=<?php echo $reclamation['id']; ?>">Repondre</a>
				</td>

			</tr>
			<?php
				}
			?>
                                </table>
                               
                            </div>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <input id="search-input" type="text" placeholder="Search...">


                                
                            </li>
                            
                        </div>

                    </div>

















                    
                   

                    <!--/Grid Form-->
                </div>






                <title>AJAX Search Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

<body>
    <br><br>





                <div class="reponse"></div>

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
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                               reponses                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                <thead>
				       <th class="border w-1/6 px-4 py-2">ID</th>
				       <th class="border w-1/6 px-4 py-2">ID Reclamation</th>
				         <th class="border w-1/6 px-4 py-2">Reponse</th>
                
            	       <th>Modifier</th>
				       <th>Supprimer</th>
                        </thead>
			          <?php
				     foreach($listereponses as $reponse){
			   ?>
		    	<tr>
				<td class="border w-1/6 px-4 py-2"> <?php echo $reponse['id']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reponse['id_reclamation']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reponse['texte']; ?></td>

              
				
				<td>
					<form method="POST" action="modifierreponse.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reponse['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerreponse.php?id=<?php echo $reponse['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
                                </table>
                               
                            </div>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <a href="reverso2/index.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fab fa-wpforms float-left mx-2"></i>
                                    check reclamation window on  the web site
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </div>
                        
                    </div>

















                    
                   

                    <!--/Grid Form-->
                </div>
                <div style="display: flex; align-items: center;  margin-left: 20px;">
                    <label for="Recherche">Search</label>
                    <input class="border px-4 py-2" type="text" style="margin-right: 10px;">
                    <button type="button" onclick="alert('Hello world!')">
                            <button style=" width: 70px; 
                            height: 30px;
                            border-radius: 15px;
                            background-color: rgb(233, 178, 59);
                            color: black;"> Search 
                            </button>
                        </button>

                    
                </div>      




















            </main>
            
            <!--/Main-->
        </div>
       
        
        

    </div>

</div>
<!-- Centered Modal -->
<div id='centeredModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    View trainers
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <p>
               Get to know your trainer !
            </p>
            <img src="ezlearn.jpg" alt="Trulli" width="500" height="333">
        </div>
    </div>
</div>
<!-- Centered With a Form Modal -->
<div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    Modify trainers
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-first-name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Name">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-first-name">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Email">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-last-name">
                            GENDER
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-last-name" type="text" placeholder="Male/Female">
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                        for="grid-first-name">
                        ID
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                        id="grid-first-name" type="text" placeholder="#ID">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                        for="grid-first-name">
                        Number
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                        id="grid-first-name" type="text" placeholder="12345">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                        for="grid-first-name">
                        New password
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                        id="grid-first-name" type="text" placeholder="Password">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
              
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                            for="grid-city">
                            City
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-city" type="text" placeholder="Albuquerque">
                    </div>
                  
                    
                </div>

                <div class="mt-5">
                    <button class='btn btn-primary bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Submit
                    </button>
                    <span
                        class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Close
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="./main.js"></script>

</body>

</html>