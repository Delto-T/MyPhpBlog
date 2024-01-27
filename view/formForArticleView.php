<?php
require('model/Article.php');
$update = false;

if(isset($requeteGetArticle)){
    while($article = $requeteGetArticle->fetch()) {
        $articleToUpdate = new Article($article['id'],$article['title'],$article['summary'],$article['content'],$article['author'],$article['date'],$article['frontPage'],$article['imageLink'],$article['imageAlt']);
    }
    $update = true;
}

?>
    <form class="mt-5 bg-light p-4 w-75 rounded-4" method="post" <?php echo $update ? "action='index.php?page=updateArticle&id=".$_GET['id']."&update=true'" : null ?>>
            <p >
                <label for="title" class="form-label" ><b>Titre*</b></label><br>
                <input type="text" name="title" id="title" class="form-control-ms w-100" value="<?php echo $update ? $articleToUpdate->getTitle() : null ?>" required>
            </p>
            <p>
                <label for="summary" class="form-label"><b>Résumé / Acrroche de l'article</b></label><br>
                <textarea cols="50" rows="3" name="summary" id="summary" class="form-control-ms w-100"><?php echo $update ? $articleToUpdate->getSummary() : null ?></textarea>
            </p>
            <p>
                <label for="content" class="form-label"><b>Contenue de l'article*</b></label><br>
                <textarea  cols="50" rows="6" name="content" id="content" class="form-control-ms w-100" required><?php echo $update ? $articleToUpdate->getContent() : null ?></textarea>
            </p>
            <p >
                <label for="author" class="form-label" ><b>Auteur</b></label><br>
                <input type="text" name="author" id="author" class="form-control-ms w-100" value="<?php echo $update ? $articleToUpdate->getAuthor() : null ?>">
            </p>
            <p >
                <label for="imageLink" class="form-label" ><b>Lien de l'image*</b></label><br>
                <input type="url" name="imageLink" id="imageLink" class="form-control-ms w-100" value="<?php echo $update ? $articleToUpdate->getImageLink() : null ?>" required>
            </p>
            <p >
                <label for="imageAlt" class="form-label" ><b>Description de l'image</b></label><br>
                <input type="text" name="imageAlt" id="imageAlt" class="form-control-ms w-100" value="<?php echo $update ? $articleToUpdate->getImageAlt() : null ?>">
            </p>
            <div  class="bg-secondary rounded p-2 w-100 ">
                <p class="form-check form-switch ">
                    <input type="checkbox" name="frontPage" id="frontPage" class="form-check-input" <?php echo ($update && ($articleToUpdate->getFrontPage() == 0)) ? "checked" : null ?>>
                    <label for="frontPage" class="form-check-label text-light"><b>Article à la une</b></label>
                </p>   
            </div>

            <div class="w-100 mt-3">
                <button type="submit" class="btn btn-danger w-100"><b>Envoyer</b></button>
            </div>

    </form>