<?php
   

    ob_start();

while($article = $requeteGetArticle->fetch()) {
    
    $title = $article['title'];
?>
    <section class="d-flex flex-column justify-content-start align-items-start "> 
        <div class="mt-5 mb-3">
            <h1 class="h1"><?=$article['title']?></h1>
            <p class="lead"><?=$article['summary']?></p>
        </div>

        <div class="w-100 text-center mb-4">
            <img src="<?=$article['imageLink']?>" alt="<?=$article['imageAlt']?>" class="card-img-top imagesArticle" style="max-width: 800px;">
        </div>
        <div>
            <p>
                <?=$article['content']?>
            </p>
            <p class="lead text-grey text-end">
                <?=$article['author']?> <?=$article['date']?>
            </p>
        </div>

        
        <?php // Partie Admin début
        if(isset($_SESSION['connect']) && $_SESSION['connect'] && isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
        
        <div>
            <a href="index.php?page=updateArticle&id=<?= $_GET['id']?>" class="btn btn-outline-danger m-4"><b>Modifier l'article</b></a>
            <button class="btn btn-danger m-4" data-bs-toggle="modal" data-bs-target="#supprimer"><b>Supprimer l'article</b></button>
        </div>

        <!-- Modale-->
        <div class="modal fade" id="supprimer" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Supprimer cet Article ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <span class="visually-hidden">Fermer</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="buton" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
                        <a href="index.php?page=deleteArticle&id=<?= $_GET['id']?>" type="button" class="btn btn-outline-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        // Partie Admin fin
        }
        ?>

        
    </section>

    
<?php
// Commentaires
require_once('commentsView.php');

}
    $content = ob_get_clean();

    require('base.php');
?>