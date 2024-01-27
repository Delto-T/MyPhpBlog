<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdn.tiny.cloud/1/8fi46sgkjoyp15w48irfaq8s6a6qx589gymxzztjq704r6l9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });
        </script>


        <title><?= $title ?> | Japan Trip</title>
        <link rel="shortcut icon" href="public/assets/shortCutIcon/fuji.png" type="image/jpeg"/>
        <link rel="stylesheet" href="public/style/default.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body class="min-vh-100">

        <header class="w-100">
            <nav class="navbar navbar-dark navbar-expand-md bg-danger w-100">
                <div class="container">

                    <div class="navbar-brand text-light">
                        <img src="public/assets/image/map.png" alt="maneki-neko" width="30px">
                        Japan Trip
                    </div>

                    <div class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#monMenueDeroulant">
                        <span class="navbar-toggler-icon"></span>
                    </div>

                    <div class="collapse navbar-collapse d-md-flex flex-column justify-content-center align-items-start" id="monMenueDeroulant">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                                <a href="index.php?page=accueil" class="nav-link active">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=articles" class="nav-link">Articles</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li> 
                            <?php // Connecté
                                if(isset($_SESSION['connect']) && $_SESSION['connect']){ ?>
                                    <li class="nav-item">
                                        <a href="index.php?page=userDisplay" class="nav-link">Mes informations</a>
                                    </li> 
                            <?php
                             }?>                           
                            <li>
                            <?php
                            if(!empty($_SESSION['connect']) && $_SESSION['connect'] ){ ?>
                                <a href="index.php?page=deconnection" class="btn btn-outline-light">Deconnexion</a>  
                            <?php }else{ ?>
                                <a href="index.php?page=connection" class="btn btn-outline-light">Connexion</a>
                            <?php } ?>
                            </li>
                        </ul>
                    </div>  
                </div>
            </nav>
        </header>

        <main class="flex-grow-1 container h-100 py-4">
            <?php//CONTENU ?>
            <?= $content ?>
        </main>




        <footer class="border-top border-danger w-100 align-self-end">
            <p class="container text-danger">
                ©Japan Trip
                <img src="public/assets/image/maneki-neko.png" alt="maneki-neko" width="20px">
            </p>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>


</html>