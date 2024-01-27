<?php
require('model/User.php');
$update = false;

if(isset($requeteGetUser)){
    while($user = $requeteGetUser->fetch()) {
        $informationsUser = new User($user['id'],$user['firstName'],$user['lastName'],$user['email'],$user['pwd'],$user['admin']);
    }
    $update = true;
}

?>

<form class="mt-5 bg-light p-4 w-50 rounded-4 d-flex flex-column justify-content-start align-items-center" method="post" <?php echo $update ? "action='index.php?page=userDisplay&update=true'" : null ?>>
            <h3 class="h3 mb-4"><?php echo $update ? "Modifier " : "Inscription" ?></h3>

            <p class="w-75 d-flex flex-column justify-content-start align-items-center">
                <label for="firstName" class="form-label" ><b>Prénom</b></label><br>
                <input type="text" name="firstName" id="firstName" class="form-control-ms w-100 " value="<?php echo $update ? $informationsUser->getFirstName() : null ?>" required>
            </p>

            <p class="w-75 d-flex flex-column justify-content-start align-items-center">
                <label for="name" class="form-label" ><b>Nom</b></label><br>
                <input type="text" name="name" id="name" class="form-control-ms w-100 " value="<?php echo $update ? $informationsUser->getLastName() : null ?>" required>
            </p>

            <p class="w-75 d-flex flex-column justify-content-start align-items-center">
                <label for="email" class="form-label" ><b>Email</b></label><br>
                <input type="email" name="email" id="email" class="form-control-ms w-100 " value="<?php echo $update ? $informationsUser->getEmail() : null ?>" required>
            </p>
            <p class="w-75 d-flex flex-column justify-content-start align-items-center">
                <label for="pwd" class="form-label"><b><?php echo $update ? "Nouveau " : null ?>Password</b></label><br>
                <input type="password" name="pwd" id="pwd" class="form-control-ms w-100" <?php echo $update ? null : "required"?>>
            </p>

            <p class="w-75 d-flex flex-column justify-content-start align-items-center">
                <label for="pwdTwo" class="form-label"><b><?php echo $update ? "Nouveau " : null ?>Password confirmation</b></label><br>
                <input type="password" name="pwdTwo" id="pwdTwo" class="form-control-ms w-100" <?php echo $update ? null : "required"?>>
            </p>

            <div class=" mt-4">
                <button type="submit" class="btn btn-danger w-100"><b><?php echo $update ? "Modifier" : "Inscription"?></b></button>
            </div>

    </form>