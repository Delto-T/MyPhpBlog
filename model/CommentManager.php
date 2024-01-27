<?php

require_once('Manager.php');

class CommentManager extends Manager{

    // Methodes

    public function getComment($idComment){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT *
            FROM comments
            WHERE id = ?
            ');
        $requete->execute([$idComment]);

        return $requete;
    }

    public function getComments($idArticle){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT u.firstName, u.lastName, u.id AS userId,c.id AS commentId, c.content, c.date
            FROM comments c
            INNER JOIN users u
            ON c.idUser = u.id
            WHERE c.idArticle = ?
            ');
        $requete->execute([$idArticle]);

        return $requete;
    }


    public function addComment($content, $idUser, $idArticle,$date){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'INSERT INTO comments (content, idUser, idArticle, date)
             VALUES (?,?,?, ?)
            ');
        $requete->execute([$content, $idUser, $idArticle, $date]);
    }

    public function updateComment($content,$date,$commentId){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'UPDATE comments
             SET  content = ?, date = ?
             WHERE id = ?
            ');
        $requete->execute([$content,$date,$commentId]);
    }

    public function deleteComment($commentId){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'DELETE FROM comments
            WHERE id = ?');
        $requete->execute([$commentId]);
    }


}