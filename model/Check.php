<?php

require_once('Manager.php');
    
class Check extends Manager{

    public function syntaxeEmail($email){
            // L'adresse email est-elle correcte ?
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }else{
            return true;
        }
    }

    public function duplicateEmail($email){

        // Connexion à la bdd
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT COUNT(*)
            AS nombreEmail
            FROM users
            WHERE email = ?
            ');

        $requete->execute([$email]);

        while($userEmail = $requete->fetch()){
            if ($userEmail['nombreEmail'] == 0){
                return true;
            }else{
                return false;
            }
        }
    }

    public function emailIntoBdd($email){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT COUNT(*)
            AS nombreEmail
            FROM users
            WHERE email = ?
            ');

        $requete->execute([$email]);

        while($result= $requete->fetch()){
            if ($result['nombreEmail'] == 1){
                return true;
            }else{
                return false;
            }
        }  
    }
 
}