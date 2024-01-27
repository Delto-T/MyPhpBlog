<?php

function canUpdate($authorId){
    if($_SESSION['id'] == $authorId){
        return true; 
    }else if($_SESSION['admin'] == 1){
        return true;
    }else{
        return false;
    }
}

$artilceId = htmlspecialchars($_GET['id']);

while($comments = $requeteGetComments->fetch()) { ?>
    <?php
        $idForModal = "deleteComment".$comments['commentId'];
        
    ?>

    <div class="bg-light rounded p-2 w-75 my-1 border border-2 ">
        <p class='mx-1 px-4 mb-0'><?= $comments['content']?></p>
        <p class='lead text-end mx-1 mb-1' style='font-size: 1rem'> <?=$comments['firstName']?> <?=$comments['lastName'][0]?>. <?=$comments['date']?></p>
        <?php 
        if(isset($_SESSION['connect'])){
            if(canUpdate($comments['userId'])){ ?>
                <div class="text-end border-top border-top-1 p-2">
                    <?php if($comments['userId'] == $_SESSION['id'] && $_SESSION['admin'] == 1 || $_SESSION['admin'] == 0){ ?>
                        <a href="<?= "index.php?page=updateComment&commentId=".$comments['commentId']?>" class="btn btn-outline-danger" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                            </svg>
                        </a>
                    <?php
                    } ?>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $idForModal?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </button>
                </div>
            <?php
            } 
        }?>
    </div>

    
    <!-- Modale-->
    <div class="modal fade" id="<?= $idForModal?>"  data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer ce commentaire ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <span class="visually-hidden">Fermer</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="buton" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
                    <a href="<?="index.php?page=deleteComment&commentId=".$comments['commentId']."&articleId=".$artilceId?>" type="button" class="btn btn-outline-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>
