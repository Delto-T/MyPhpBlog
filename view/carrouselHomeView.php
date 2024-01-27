<?php
    $countSlide = 0;
    $numberOfFrontPagesArticles =  $requeteNumberOfFrontPageArticles->fetch();
    $numberOfFrontPagesArticles = $numberOfFrontPagesArticles['number'];
    $firstActiveSlide = false;
    $firstActiveIncator = false;

    // echo $countSlide. " ".$numberOfFrontPagesArticles;

    function firstSlideActive($firstActiveSlide){
        if(!$firstActiveSlide){
            $result = "active";
            return $result;
        }
    }

    function firstActiveIncator($firstActiveIncator){
        if(!$firstActiveIncator){
            $result = "active";
            return $result;
        }
    }
?>

<div class="carousel slide carousel-fade" data-bs-ride="carousel" id="monCarousel">
    <!--Liste pour sélectionner les slides -->
    <ul class="carousel-indicators" style="">
        <?php
         while($numberOfFrontPagesArticles > $countSlide) {
        ?>
            <li data-bs-target="#monCarousel" data-bs-slide-to="<?= $countSlide?>" class="<?= firstActiveIncator($firstActiveIncator)?>"></li>
           
        <?php 
          $countSlide =  $countSlide + 1;
          $firstActiveIncator = true;
        } 
        ?>
    </ul>


    <!-- Contenu du carousel -->
    <div class="carousel-inner">
        <!-- Slide -->
        <?php
        while($article = $requeteFrontPageArticles->fetch()) {
        ?>
            <div class="carousel-item <?= firstSlideActive($firstActiveSlide)?>" data-bs-interval="10000" >
                <a href="<?= "index.php?page=article&id=".$article['id'] ?>">
                    <img src=<?=$article['imageLink']?> alt=<?=$article['imageAlt']?> class="w-100 d-block">
                    <!-- Text sur une image dans le slide -->
                    <div class="carousel-caption text-start shadow p-2 rounded-3">
                        <h5><?=$article['title']?></h5>
                        <div><?=$article['summary']?></div>
                    </div>
                </a>
            </div>  
        <?php 
        $firstActiveSlide = true;
        } 
    ?>
    </div>
    <!-- Les contrôles du carousel -->
    <!-- Fleche précedent -->
    <a class="carousel-control-prev" href="#monCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>  <!-- pour l'icone -->
        <span class="visually-hidden">Précédent</span> <!-- Text si l'icone ne marche pas-->
    </a>
    <!-- Fleche Suivante -->
    <a class="carousel-control-next" href="#monCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>  <!-- pour l'icone -->
        <span class="visually-hidden">Suivant</span> <!-- Text si l'icone ne marche pas-->
    </a>
</div>


    
    
