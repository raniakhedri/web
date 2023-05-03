



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template" />
    <meta property="og:title" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template" />
    <meta property="og:description" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template" />
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no">


    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="../dist/styles.css">
    <link rel="stylesheet" href="../dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | Tailwind Admin</title>

</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <header class="bg-nav">
                <div class="flex justify-between">
                    <div class="p-1 mx-3 inline-flex items-center">
                        <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                        <h1 class="text-white p-2">Logo</h1>
                    </div>
                    <div class="p-1 flex flex-row items-center">
                        <a href="https://github.com/tailwindadmin/admin"
                            class="text-white p-2 mr-2 no-underline hidden md:block lg:block"></a>



                        <a href="#" onclick="profileToggle()"
                            class="text-white p-2 no-underline hidden md:block lg:block"></a>
                        <div id="ProfileDropDown"
                            class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My
                                        account</a></li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a>
                                </li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->

                <!--/Sidebar-->
                <main class="bg-white-500 flex-1 p-3 overflow-hidden">


                    <div class="row page-titles">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Email</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Inbox</a></li>
                        </ol>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="email-left-box px-0 mb-3">
                                        <div class="p-0">
                                            <a href="email-compose.html" class="btn btn-primary btn-block">Compose</a>
                                        </div>
                                        <div class="mail-list rounded mt-4">
                                            <a href="mail.html" class="list-group-item active"><i
                                                    class="fa fa-inbox font-18 align-middle me-2"></i> Inbox <span
                                                    class="badge badge-primary badge-sm float-end">198</span> </a>
                                            <a href="javascript:void()" class="list-group-item"><i
                                                    class="fa fa-paper-plane font-18 align-middle me-2"></i>Sent</a> <a
                                                href="javascript:void()" class="list-group-item"><i
                                                    class="fa fa-star font-18 align-middle me-2"></i>Important <span
                                                    class="badge badge-danger text-white badge-sm float-end">47</span>
                                            </a>
                                            <a href="javascript:void()" class="list-group-item"><i
                                                    class="mdi mdi-file-document-box font-18 align-middle me-2"></i>Draft</a><a
                                                href="javascript:void()" class="list-group-item"><i
                                                    class="fa fa-trash font-18 align-middle me-2"></i>Trash</a>
                                        </div>
                                        <div class="mail-list rounded overflow-hidden mt-4">
                                            <div class="intro-title d-flex justify-content-between my-0">
                                                <h5>Categories</h5>
                                                <i class="icon-arrow-down" aria-hidden="true"></i>
                                            </div>
                                            <a href="mail.html" class="list-group-item"><span class="icon-warning"><i
                                                        class="fa fa-circle" aria-hidden="true"></i></span>
                                                Work </a>
                                            <a href="mail.html" class="list-group-item"><span class="icon-primary"><i
                                                        class="fa fa-circle" aria-hidden="true"></i></span>
                                                Private </a>
                                            <a href="mail.html" class="list-group-item"><span class="icon-success"><i
                                                        class="fa fa-circle" aria-hidden="true"></i></span>
                                                Support </a>
                                            <a href="mail.html" class="list-group-item"><span class="icon-dpink"><i
                                                        class="fa fa-circle" aria-hidden="true"></i></span>
                                                Social </a>
                                        </div>
                                    </div>
                                    <div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
                                        <div role="toolbar" class="toolbar ms-1 ms-sm-0">
                                            <div class="btn-group mb-1">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </div>
                                            <div class="btn-group mb-1">
                                                <button class="btn btn-primary light px-3" type="button"><i
                                                        class="ti-reload"></i>
                                                </button>
                                            </div>
                                            <div class="btn-group mb-1">
                                                <button aria-expanded="false" data-bs-toggle="dropdown"
                                                    class="btn btn-primary px-3 light dropdown-toggle"
                                                    type="button">More <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu"> <a href="javascript: void(0);"
                                                        class="dropdown-item">Mark as Unread</a> <a
                                                        href="javascript: void(0);" class="dropdown-item">Add to
                                                        Tasks</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Add Star</a> <a
                                                        href="javascript: void(0);" class="dropdown-item">Mute</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="email-list mt-3">
                               <?php 
                //inclure la page de connexion
                $id = $_GET['id'];
                require 'bd.php';
                 require 'bd1.php';
                  require 'bd2.php';
                //requête pour afficher la liste des employés
                $stmt1 = $pdo2->query("SELECT * FROM reservation.confirmationwin where id_resw = '$id'");
                $stmt = $pdo->query("SELECT * FROM reservation.confirmation where id_res = '$id'");
                if(($stmt->rowCount() == 0)&&($stmt1->rowCount() ==0)){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore des emails !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=$stmt->fetch()){
                        ?>
                                            <div class="message">
                                                <div>
                                                    <div class="d-flex message-single">
                                                        <div class="ps-1 align-self-center">
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="checkbox2">
                                                                <label class="form-check-label" for="checkbox2"></label>
                                                            </div>
                                                        </div>
                                                        <div class="ms-2">
                                                            <button class="border-0 bg-transparent align-middle p-0"><i
                                                                    class="fa fa-star" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <a href="" class="col-mail col-mail-2">
                                                        <div class="subject"><?php echo $row['subject']; ?></div>
                                                        <div class="date">11:49 am</div>
                                                    </a>
                                                </div>
                                            </div>
                                              <?php
                                            }
                                        ?> 
                               <?php  while($row1=$stmt1->fetch()){ ?>
                                              <div class="message">
                                                <div>
                                                    <div class="d-flex message-single">
                                                        <div class="ps-1 align-self-center">
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="checkbox2">
                                                                <label class="form-check-label" for="checkbox2"></label>
                                                            </div>
                                                        </div>
                                                        <div class="ms-2">
                                                            <button class="border-0 bg-transparent align-middle p-0"><i
                                                                    class="fa fa-star" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <a href="" class="col-mail col-mail-2">
                                                        <div class="subject"><?php echo $row1['subjectw']; ?> CLICK!</div>
                                                        
                                                        <div class="date">11:49 am</div>
                                                    </a>
                                                </div>
                                            </div>
                                             <?php
                                            }}
                                        ?> 
                                            
                                           

                                            <!-- panel -->
                                            <div class="row mt-4">
                                                <div class="col-12 ps-3">
                                                    <nav>
                                                        <ul
                                                            class="pagination pagination-gutter pagination-primary pagination-sm no-bg">
                                                            <li class="page-item page-indicator"><a class="page-link"
                                                                    href="javascript:void()"><i
                                                                        class="la la-angle-left"></i></a></li>
                                                            <li class="page-item "><a class="page-link"
                                                                    href="javascript:void()">1</a>
                                                            </li>
                                                            <li class="page-item active"><a class="page-link"
                                                                    href="javascript:void()">2</a></li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="javascript:void()">3</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="javascript:void()">4</a>
                                                            </li>
                                                            <li class="page-item page-indicator"><a class="page-link"
                                                                    href="javascript:void()"><i
                                                                        class="la la-angle-right"></i></a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </main>


                <!--/Main-->
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; DisTunis</div>
                <div class="flex flex-1 mx-auto">Par: <a href="https://themewagon.com/" target=" _blank"> Elli howa</a>
                </div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="./main.js"></script>
</body>



</html>