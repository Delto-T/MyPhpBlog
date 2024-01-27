<?php
    function checkEmailFormat($email,$check){
        if($_SESSION['email'] != $email){
            if ($check->duplicateEmail($email) &&  $check->syntaxeEmail($email)){
                return true;
            }else{
                return false;
            }
        }else{
                return true;
        }
    }

    require_once('model/Security.php');
    require_once('model/Check.php');
    require_once("model/UserManager.php");

  
    if(isset($_POST['firstName']) && isset($_POST['name']) && isset($_POST['email']) ){
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $id = $_SESSION['id'];
        $admin = $_SESSION['admin'];
        $check = new Check();  
        $newUser = new UserManager();

        if(!empty($_POST['pwd']) && !empty($_POST['pwdTwo'])){
            $pwd = htmlspecialchars($_POST['pwd']);
            $pwdTwo = htmlspecialchars($_POST['pwdTwo']);
            $encryptPwd = Security::encryptPassword($pwd);
            $encryptPwdTwo = Security::encryptPassword($pwdTwo);

            if(checkEmailFormat($email,$check) && Security::checkPassword($encryptPwd,$encryptPwdTwo)){
                $newUser->updateUser($firstName,$lastName,$email,$encryptPwd,$id);
                $newUser->deconnexionUser();
            }else{
                header('location:index.php?page=userDisplay&error=true&message=Impossible d\'utiliser cette adresse mail');
                exit();
            }

        }else{
            $newUser->updateInformationsUser($firstName,$lastName,$email,$id);
            $newUser->deconnexionUser();
        }
    }else{
        if (!empty($_GET['update'])){
            header('location:index.php?page=userDisplay&error=true&message=Veuillez remplir l\'ensemble des champs');
            exit();
        }
    }


    $title = "Informations";
    ob_start();
?>

<section class="container h-100 d-flex flex-column justify-content-start align-items-center">
        
    <div class="w-50 text-center mb-4">
        <img src="public/assets/image/maneki-neko-connection.png" alt="" class="w-25">
    </div>

    <?php if(isset($_GET['message']) && isset($_GET['error']) ){ 
        if($_GET['error'] == true){?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?=$_GET['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span class="visually-hidden">Fermer</span></button>
            </div>
    <?php 
        }
    } ?>


    <?php require_once('formForUserView.php') ?>


    

</section>

<?php
    $content = ob_get_clean();

    require('base.php');
?>