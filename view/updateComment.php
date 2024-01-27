<?php 
$title = "Modifier votre commentaire";


 ob_start();
 ?>


<section class="d-flex flex-column justify-content-start align-items-center w-100"> 
    
    <h1 class="h1">Modification</h1>
    <p class="lead">Veuilliez modifier votre commentaire</p> 

    <?php
        require('formComment.php')
    ?>

</section>


<?php
    $content = ob_get_clean();

    require('base.php');
?>