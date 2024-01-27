<?php

require_once('ArticleManager.php');

class Article extends ArticleManager{

    // Attribu
    private $_id;
    private $_title;
    private $_summary;
    private $_content;
    private $_author;
    private $_date;
    private $_frontPage;
    private $_imageLink;
    private $_imageAlt;


    //Constructor
    public function __construct($id,$title,$summary,$content,$author,$date,$frontPage,$imageLink,$imageAlt){
        $this->setId($id);
        $this->setTitle($title);
        $this->setSummary($summary);
        $this->setContent($content);
        $this->setAuthor($author);
        $this->setDate($date);
        $this->setFrontPage($frontPage);
        $this->setImageLink($imageLink);
        $this->setImageAlt($imageAlt);
    }


    //Getters
    public function getId(){
        return $this->_id;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getSummary(){
        return $this->_summary;
    }

    public function getContent(){
        return $this->_content;
    }

    public function getAuthor(){
        return $this->_author;
    }

    public function getDate(){
        return $this->_date;
    }

    public function getFrontPage(){
        return $this->_frontPage;
    }

    public function getImageLink(){
        return $this->_imageLink;
    }

    public function getImageAlt(){
        return $this->_imageAlt;
    }

    //Setters
    private function setId($newId){
        $this->_id = $newId;
    }

    public function setTitle($newTitle){
        $this->_title = $newTitle;
    }

    public function setSummary($newSummary){
        $this->_summary = $newSummary;
    }

    public function setContent($newContent){
        $this->_content = $newContent;
    }

    public function setAuthor($newAuthor){
        $this->_author = $newAuthor;
    }

    private function setDate($newDate){
        $this->_date = $newDate;
    }

    public function setFrontPage($newFrontPage){
        $this->_frontPage = $newFrontPage;
    }

    public function setImageLink($newImageLink){
        $this->_imageLink = $newImageLink;
    }

    public function setImageAlt($newImageAlt){
        $this->_imageAlt = $newImageAlt;
    }

}