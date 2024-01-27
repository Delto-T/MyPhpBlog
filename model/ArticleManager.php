<?php

require_once('Manager.php');

class ArticleManager extends Manager{

    // Methodes

    public function getArticle($id){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT *
            FROM articles
            WHERE id = ?
            ');
        $requete->execute([$id]);

        return $requete;
    }

    public function getArticles(){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT *
            FROM articles
            ORDER BY date
            DESC
            ');
        $requete->execute();

        return $requete;
    }

    public function getFrontPageArticles(){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT *
            FROM articles
            WHERE frontPage = 0
            ');
        $requete->execute();

        return $requete;
    }

    public function getNumberOfFrontPageArticles(){
        $bdd = $this->connection();

        $requete = $bdd->prepare(
            'SELECT COUNT(*)
            AS number
            FROM articles
            WHERE frontPage = 0
            ');
        $requete->execute();

        return $requete;
    }

    public function getThreeLastestArticles(){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'SELECT *
            FROM articles
            ORDER BY id
            DESC
            LIMIT 3
            ');
        $requete->execute();

        return $requete;
    }

    public function addArticle($title,$summary,$content,$author, $frontPage,$imageLink,$imageAlt){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'INSERT INTO articles (title, summary, content, author, frontPage, imageLink, imageAlt)
             VALUES (?,?,?,?,?,?,?)
            ');
        $requete->execute([$title,$summary,$content,$author,$frontPage,$imageLink,$imageAlt]);

        // return $requete; 
    }

    public function updateArticle($title,$summary,$content,$author,$frontPage,$imageLink,$imageAlt,$id){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'UPDATE articles
             SET  title = ?, summary = ?, content = ?, author = ?, frontPage = ?, imageLink = ?, imageAlt = ?
             WHERE id = ?
            ');
        $requete->execute([$title,$summary,$content,$author,$frontPage,$imageLink,$imageAlt,$id]);

        return $requete; 
    }

    public function deleteArticle($id){
        $bdd = $this->connection();
        $requete = $bdd->prepare(
            'DELETE FROM articles
            WHERE id = ?');
        $requete->execute([$id]);
    }

}