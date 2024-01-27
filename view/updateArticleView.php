
<?php
    $articleManager = new ArticleManager();

    $title = "Modifier l'article";

    if(isset($_POST['title']) && isset($_POST['summary']) && isset($_POST['content']) && isset($_POST['imageLink'])){

        $id = htmlspecialchars($_GET['id']);

        if (!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['imageLink']) && !empty($_GET['update'])){

            $title = htmlspecialchars($_POST['title']);
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $author = htmlspecialchars($_POST['author']);
            $imageLink = htmlspecialchars($_POST['imageLink']);
            $imageAlt = htmlspecialchars($_POST['imageAlt']);
            
            
            if(isset($_POST['frontPage'])){
                $frontPage = htmlspecialchars($_POST['frontPage']); 
            }else{
                $frontPage = 1;
            }
            

            if(isset($_GET['update']) && $_GET['update'] == true ){
                $articleManager->updateArticle($title,$summary,$content,$author,$frontPage,$imageLink,$imageAlt,$id);
                header('location:index.php?page=article&id='.$id);
                exit();
            }

        }else{
            header('location:index.php?page=updateArticle&id='.$id);
            exit();
        }
    }


    ob_start();
?>

<section class="d-flex flex-column justify-content-start align-items-center w-100"> 
    
    <h1 class="h1">Modification</h1>
    <p class="lead">Veuilliez modifier votre article</p> 

    <?php
            require('view/formForArticleView.php');
    ?>

</section>


<?php
    $content = ob_get_clean();

    require('base.php');
?>