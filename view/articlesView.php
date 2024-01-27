<?php
    $title = "Articles";

    ob_start();
?>

<section> 
    <h1 class="h1">Vos articles by Japan Travel</h1>
    <p class="lead">Votre site favoris pour organiser votre voyage au Japon</p>

    <?php // Partie Admin début
        if(isset($_SESSION['connect']) && $_SESSION['connect'] && isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <a href="index.php?page=newArticle" class="btn btn-danger m-4"><b>Ajouter un article</b></a>
        <?php 
        // Partie Admin fin
        }?>
    
    <article class="">
        <div class="row mt-4 h-100 g-2">
            <?php while($article = $requeteGetArticles->fetch()) { 
                require('displayCardArticleView.php');
            } ?>
        </div>

    </article>
    
</section>


<?php
    $content = ob_get_clean();

    require('base.php');
?>