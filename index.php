<?php

    session_start();

    require('controllers/controller.php');

    try {
        if(isset($_GET['page'])) {

            if($_GET['page'] == 'accueil') {
                home();
            }
            else if($_GET['page'] == 'articles') {
                allArticles();
            }
            else if($_GET['page'] == 'article') {
                displayArticle(htmlspecialchars($_GET['id']));
            }
            else if($_GET['page'] == 'newArticle') {
                newArticle();
            }
            else if($_GET['page'] == 'updateArticle') {
                updateArticle(htmlspecialchars($_GET['id']));
            }
            else if($_GET['page'] == 'deleteArticle') {
                deleteArticle(htmlspecialchars($_GET['id']) );
            }
            else if($_GET['page'] == 'connection') {
                connection();
            }
            else if($_GET['page'] == 'signUp') {
                signUp();
            }
            else if($_GET['page'] == 'deconnection') {
                deconnection();
            }
            else if($_GET['page'] == 'userDisplay') {
                userDisplay();
            }
            else if($_GET['page'] == 'updateComment') {
                updateComment(htmlspecialchars($_GET['commentId']));
            }
            else if($_GET['page'] == 'deleteComment') {
                deleteComment(htmlspecialchars($_GET['commentId']),htmlspecialchars($_GET['articleId']));
            }
            else {
                throw new Exception("Cette page n'existe pas ou a été supprimée.");
            }

        }
        else {
            home();
        }
    }
    catch(Exception $e) {
        $error = $e->getMessage();
        require('view/errorView.php');
    }