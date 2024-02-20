<?php 

$comments_for_adm = selectCommentWithUsername();

if(isset($_GET['post'])){
    $post = $_GET['post'];
}

$content = '';
$err_msg = [];
$comments = [];

#Комментарий под записями
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-send']))
{ 
    $content = trim($_POST["content"]);

    if(empty($_SESSION['id'])){
        array_push($err_msg, "Оставлять комментарии могут только авторизованные пользователи");
    }elseif($content == ''){
        array_push($err_msg, "Нельзя оставить пустой комментарий");
    }elseif(mb_strlen($content, 'UTF8') > 1000){
        array_push($err_msg, "Комментарий не может быть длиннее 1000 символов");
    }else{
        $comment = [
            'user_id' => trim($_SESSION['id']),
            'post_id' => $post,
            'content' => $content
        ];
        insert('comment', $comment);
        $comments = selectCommentWithUsername(['c.post_id' => $post]);
    }
}else if (isset($post)){
    $content = '';
    $comments = selectCommentWithUsername(['c.post_id' => $post]);
}

#Админское редактирование комментария НЕ РАБОТАЕТ НЕ ЗНАЮ ПОЧЕМУ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id']))
{
    $id = $_GET['edit_id'];
    $comment = selectOne('comment', ['id' => $id]);
    $content = $comment['content'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment-edit']))
{ 
    $content = trim($_POST["content"]);
    $id = $_POST['id'];
    
    if($content == ''){
        array_push($err_msg, "Нельзя оставить пустой комментарий");
    }elseif(mb_strlen($content, 'UTF8') > 1000){
        array_push($err_msg, "Комментарий не может быть длиннее 1000 символов");
    }else{
        $comment = [
            'content' => $content
        ];
        updateOne('comment', $id, $comment);
        $comments = selectCommentWithUsername(['c.post_id' => $id]);
    }
}

#Удаление комментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    deleteOne('comment', $id);
    header('location: ' .  BASE_URL . 'admin/comments/index.php');
}

?>