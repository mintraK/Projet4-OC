<?php
 require_once('model/frontend/PostManager.php');
 require_once('model/frontend/CommentManager.php');

function listPost()
{
    $postManager = new PostManager();
    $posts = $postManager->getLastPost(); 
    require('view/frontend/listPostView.php');
}
function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getListPosts(); 
    require('view/frontend/allPostsView.php');
}
function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
   
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager(); 
    $addComment = $commentManager->postComment($postId, $author, $comment);

    if ($addComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}