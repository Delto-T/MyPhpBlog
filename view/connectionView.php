<?php
    if(!empty($_POST['email']) && !empty($_POST['pwd'])){
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['pwd']);

        //Verifier syntaxe email
        if($check->syntaxeEmail($email)){
            // Vérifier mail existe
            if($check->emailIntoBdd($email)){


                //Récupérer User
                $user = $userManager->getUser($email);

                while($userInformations = $user->fetch()){
                    // Vérifier pwd
                    $encryptIpuntPwd = Security::encryptPassword($pwd);

                    if(Security::checkPassword($userInformations['pwd'],$encryptIpuntPwd)){
                        //creer session
                        $userManager->createUserSession($userInformations['id'],$userInformations['email'],$userInformations['firstName'],$userInformations['admin']);
                    }
                }

            }
        }

        header('location: index.php?page=connection&error=true&message=Connexion impossible, il y a une erreur dans vos identifiants');
        exit();      
    }


    $title = "Connection";
    ob_start();
?>

<section class="container h-100 d-flex flex-column justify-content-start align-items-center">

    <?php if(isset($_GET['message']) && isset($_GET['error']) ){ 
        if($_GET['error'] == true){?>
        <p class="alert alert-danger"><?=$_GET['message']?></p>
    <?php 
        }
    } ?>
    
    <form class="mt-5 bg-light p-4 w-50 rounded-4 d-flex flex-column justify-content-start align-items-center" method="post">
        <h3 class="h3">Connection</h3>

        <p class="w-75 d-flex flex-column justify-content-start align-items-center">
            <label for="email" class="form-label" ><b>Email</b></label><br>
            <input type="email" name="email" id="email" class="form-control-ms w-100 " required>
        </p>
        <p class="w-75 d-flex flex-column justify-content-start align-items-center">
            <label for="pwd" class="form-label"><b>Password</b></label><br>
            <input type="password" name="pwd" id="pwd" class="form-control-ms w-100" required>
        </p>

        <div class=" mt-4">
            <button type="submit" class="btn btn-danger w-100"><b>Connexion</b></button>
        </div>

        <p class="mt-4">Vous n'avez pas de compte sur Travel Japan ? Veuillez vous inscrire <a href="index.php?page=signUp">ici</a>.</p>

    </form>

    <div class="w-50 text-center mt-4">
        <img src="public/assets/image/maneki-neko-connection.png" alt="maneki neko" class="w-50">
    </div>

</section>

<?php
    $content = ob_get_clean();

    require('base.php');
?>