<?php

    if(!empty($_POST['firstName']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdTwo'])){
        
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['pwd']);
        $pwdTwo = htmlspecialchars($_POST['pwdTwo']);

        require_once('model/Security.php');
        require_once('model/Check.php');
        $check = new Check();    

        if ($check->duplicateEmail($email) &&  $check->syntaxeEmail($email) ){

            //VERIFIER QUE LES DEUX MDP SAISIE SONT LES MEME !!

            $encryptPwd = Security::encryptPassword($pwd);
            $encryptPwdTwo = Security::encryptPassword($pwdTwo);
            $admin = 0;

            if(Security::checkPassword($encryptPwd,$encryptPwdTwo)){
                require_once("model/UserManager.php");
    
                $newUser = new UserManager();
                $newUser->addUser($firstName,$lastName,$email,$encryptPwd,$admin);
                $id = $newUser->getUserId($email)->fetch();
                $newUser->createUserSession($id,$firstName,$lastName,$email,$admin );
                header('index.php?page=accueil&succes=1&message=Vous êtes connecté');
                exit();
            }


    
        }else{
            throw new Exception("Impossible de vous inscrire. Veuillez réessayer");
            exit();
        }

    }


    $title = "Inscription";
    ob_start();
?>

<section class="container h-100 d-flex flex-column justify-content-start align-items-center">
        
    <div class="w-50 text-center mb-4">
        <img src="public/assets/image/maneki-neko-connection.png" alt="" class="w-25">
    </div>

    <?php require_once('formForUserView.php') ?>
   

</section>

<?php
    $content = ob_get_clean();

    require('base.php');
?>