<?php
    $title = "Erreur";

    ob_start();
?>

<section class="container h-100">
        
    <h1 class="mt-5">OUPS !</h1>
    <p class="mb-5 h3"><?= $error ?></p>
    <img src="../public/assets/image/ninja.png" alt="a running ninja" class="w-50 mt-5 text-center">

</section>

<?php
    $content = ob_get_clean();

    require('base.php');
?>