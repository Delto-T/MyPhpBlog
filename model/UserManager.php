<?php

require_once('Manager.php');

class UserManager extends Manager{

    // Methodes

    public function getUser($email){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT *
            FROM users
            WHERE email = ?
            ');
        $requete->execute([$email]);

        return $requete;
    }

    public function getUserId($email){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT id
            FROM users
            WHERE email = ?
            ');
        $requete->execute([$email]);

        return $requete;
    }

    public function addUser($firstName,$lastName,$email,$pwd,$admin){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'INSERT INTO users (firstName, lastName, email, pwd, admin)
             VALUES (?,?,?,?,?)
            ');
        $requete->execute([$firstName,$lastName,$email,$pwd,$admin]);
    }

    public function updateUser($firstName,$lastName,$email,$pwd,$id){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'UPDATE users
             SET  firstName = ?, lastName = ?, email = ?, pwd = ?
             WHERE id = ?
            ');
        $requete->execute([$firstName,$lastName,$email,$pwd,$id]);
    }

    public function updateInformationsUser($firstName,$lastName,$email,$id){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'UPDATE users
             SET  firstName = ?, lastName = ?, email = ?
             WHERE id = ?
            ');
        $requete->execute([$firstName,$lastName,$email,$id]);
    }

    public function createUserSession($id,$email,$firstName,$admin){
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['connect'] = true;
        $_SESSION['admin'] = $admin;
        header('location: index.php?page=accueil&success=true&message=Bienvenue '.$firstName);
        exit();
    }

    public function deconnexionUser(){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php?page=accueil&success=true&message=Déconnecté');
        exit();
    }


}