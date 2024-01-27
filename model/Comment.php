<?php

require_once('CommentManager.php');

class Comment extends CommentManager{

    // Attribu
    private $_id;
    private $_content;
    private $_idUser;
    private $_idArticle;
    private $_date;
 


    //Constructor
    public function __construct($id,$content,$idUser,$idArticle,$date){
        $this->setId($id);
        $this->setContent($content);
        $this->setIdUser($idUser);
        $this->setIdArticle($idArticle);
        $this->setDate($date);
    }


    //Getters
    public function getId(){
        return $this->_id;
    }

    public function getContent(){
        return $this->_content;
    }

    public function getIdUser(){
        return $this->_idUser;
    }

    public function getIdArticle(){
        return $this->_idArticle;
    }

    public function getDate(){
        return $this->_date;
    }

    //Setters

    private function setId($newId){
        $this->_id = $newId;
    }

    public function setContent($newContent){
        $this->_content = $newContent;
    }

    public function setIdUser($newIdUser){
        $this->_idUser = $newIdUser;
    }

    public function setIdArticle($newIdArticle){
        $this->_idArticle = $newIdArticle;
    }

    public function setDate($newDate){
        $this->_date = $newDate;
    }

}