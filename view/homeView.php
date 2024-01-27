<?php
    $title = "Accueil";

    ob_start();
?>

<section> 
    <?php if(isset($_GET['message']) && isset($_GET['success']) ){ 
        if($_GET['success'] == true){?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?=$_GET['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="visually-hidden">Fermer</span></button>
            </div>
    <?php 
        }
    } ?>



    <h1 class="h1">Bienvenue sur Japan Travel</h1>
    <p class="lead">Votre site favoris pour organiser votre voyage au Japon</p>
    
    <article class="mh-25">
        <?php require('carrouselHomeView.php'); ?>
    </article>

    <article class="h-50">
        <h3 class="mt-4">Nos derniers articles</h2>
        <?php require('lastestArticlesHomeView.php'); ?>
    </article>
    
</section>


<?php
    $content = ob_get_clean();

    require('base.php');
?>