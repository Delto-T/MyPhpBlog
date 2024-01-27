<?php
require_once('model/Comment.php');


function backToArticle($articleId){
    header('location:index.php?page=article&id='.$articleId);
    exit();
}

function getDateTime(){
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_TIME,['fr','fra','fr_FR']);
    $date = new DateTime();

    return $date->format('d M Y à H:i:s');
}

$update = false;

if(isset($requeteGetComment)){
    while($comment = $requeteGetComment->fetch()) {
        $commentToUpdate = new Comment($comment['id'],$comment['content'],$comment['idUser'],$comment['idArticle'],$comment['date']);
    }
    $update = true;
}

if(!empty($_POST['comment']) && isset($_POST['comment'])){
    
    $content = $_POST['comment'];
    $dateNow = getDateTime();

    if($update){
        $commentId = htmlspecialchars($_GET['commentId']);
        $commentManager->updateComment($content, $dateNow, $commentId);
        backToArticle($commentToUpdate->getIdArticle());
    }else{
        $idArticle = htmlspecialchars($_GET['id']);
        $idUser = htmlspecialchars($_SESSION['id']);
        $commentManager->addComment($content, $idUser, $idArticle, $dateNow);
        backToArticle($idArticle);
    }
    
}


?>

<form class="p-4 rounded-4" method="post">
    <p class="lead"><b>Une réaction ? Un avis ? Saissez le ici !</b></p>
    <textarea id="comment" name="comment"><?php echo $update ? $commentToUpdate->getContent() : null?></textarea>

    <div class=" mt-4">
        <button type="submit" class="btn btn-danger w-100"><b><?php echo $update ? "Modifer" : "Envoyer"?></b></button>
    </div>
</form>
