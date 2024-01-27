
<?php
    $articleManager = new ArticleManager();

    $title = "Nouvel article";

    if(isset($_POST['title']) && isset($_POST['summary']) && isset($_POST['content']) && isset($_POST['imageLink'])){
        if (!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['imageLink'])){

            $title = htmlspecialchars($_POST['title']);
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $imageLink = htmlspecialchars($_POST['imageLink']);

            if(!empty($_POST['author'])){
                $author = htmlspecialchars($_POST['author']);
            }else{
                $author = 'Anonyme';
            }

            if(!empty($_POST['imageAlt'])){
                $imageAlt = htmlspecialchars($_POST['imageAlt']);
            }else{
                $imageAlt = "article's image";
            }
            
            if(isset($_POST['frontPage'])){
                $frontPage = htmlspecialchars($_POST['frontPage']);
            }else{
                $frontPage = 1;
            }
            
            $articleManager->addArticle($title,$summary,$content,$author,$frontPage,$imageLink,$imageAlt);

            header('location:index.php?page=articles');
            exit();
        }else{
            header('location:index.php?page=newArticle');
            exit();
        }
    }


    ob_start();
?>

<section class="d-flex flex-column justify-content-start align-items-center w-100"> 
    <img src="../public/assets/image/maneki-neko-newArticle.png" alt="maneki-neko" class="mb-3" style="width: 150px">
    <h1 class="h1">Nouvel article</h1>
    <p class="lead">Complez le formulaire suivant pour créer votre nouvel article</p> 

    <?php
        require('view/formForArticleView.php');
    ?>

</section>


<?php
    $content = ob_get_clean();

    require('base.php');
?>