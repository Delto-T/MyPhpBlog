<?php

require_once('model/ArticleManager.php');
require_once("model/UserManager.php");
require_once('model/Security.php');
require_once('model/Check.php');
require_once('model/CommentManager.php');

function isSessionExiste($clef){
    if(isset($_SESSION["$clef"])){
        return true;
    }else{
        return false;
    }
}

function home(){
    $articleManager = new ArticleManager();
    $requeteFrontPageArticles = $articleManager->getFrontPageArticles();
    $requeteNumberOfFrontPageArticles = $articleManager->getNumberOfFrontPageArticles();
    $requeteGetThreeLastestArticles = $articleManager->getThreeLastestArticles();
    require('view/homeView.php');
}


function allArticles(){
    $articleManager = new ArticleManager();
    $requeteGetArticles = $articleManager->getArticles();
    require('view/articlesView.php');
}

function displayArticle($id){

    $userID = isSessionExiste($id) ?  $_SESSION['id'] : $userID = null;
    $articleManager = new ArticleManager();
    $requeteGetArticle = $articleManager->getArticle($id);
    $commentManager = new CommentManager();
    $requeteGetComments = $commentManager->getComments($id, $userID);
    require('view/displayArticleView.php');
}

function newArticle(){
    require('view/newArticleView.php');
}

function updateArticle($id){
    $articleManager = new ArticleManager();
    $requeteGetArticle = $articleManager->getArticle($id);
    require('view/updateArticleView.php');
}

function deleteArticle($id){
    $articleManager = new ArticleManager();
    $articleManager->deleteArticle($id);
    header('location:index.php?page=articles');
    exit();
}

function connection(){
    $check = new Check();    
    $userManager = new UserManager();
    require('view/connectionView.php');
}


function signUp(){
    require('view/signUpView.php');
}

function deconnection(){
    $newUser = new UserManager();
    $newUser->deconnexionUser();
}

function userDisplay(){
    $userID = isSessionExiste('email') ?  $_SESSION['email'] : $userID = null;
    $newUser = new UserManager();
    $requeteGetUser = $newUser->getUser($userID);
    require('view/userDisplayView.php');
}

function updateComment($id){
    $commentManager = new CommentManager();
    $requeteGetComment = $commentManager->getComment($id);
    require('view/updateComment.php');
}

function deleteComment($commentId, $articleId){
    $commentManager = new CommentManager();
    $commentManager->deleteComment($commentId);
    header('location:index.php?page=article&id='.$articleId);
    exit();
}