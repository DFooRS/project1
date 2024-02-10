<?php

if (!$_SESSION)
{
    header('location: ' .  BASE_URL . 'auth.php');
}

function CheckExistanceTopics($topics)
{
    $status = 0;
    foreach($topics as $topic)
    {
        $sel_topic = selectOne('topic', ['name'=> $topic]);
        if(empty($sel_topic)){
            $status = 1;
            break;
        }
         unset($sel_topic);
    }
    return $status;
}

$err_msg = [];
$id = "";
$title = '';
$content = '';
$img = '';
$topics = [];
$author = '';
$no_topic = 0;

$posts = selectAll('post');

#Код для создания записи 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['add_post']))
{ 
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $topics = explode(', ', $_POST["topics"]);
    $author = trim($_POST["author"]);

    if($title === '' || $content === '' || $author === ''){
        array_push($err_msg, "Не все поля заполнены. ");
    }elseif(mb_strlen($content, 'UTF8') < 200){
        array_push($err_msg, "Содержимое записи не может быть короче 200 символов. ");
    }elseif(mb_strlen($title, 'UTF8') > 200){
        array_push($err_msg, "Название статьи не должно быть длинее 200 символов. ");
    }elseif(mb_strlen($title, 'UTF8') < 10){
        array_push($err_msg, "Название статьи не должно быть короче 10 символов. ");
    }elseif(in_array('Новость', $topics) === false && in_array('Статья', $topics) === false){
        array_push($err_msg, 'Категории должны содержать тэги  "Новость" или "Статья". ');
    }elseif(mb_strlen($author, 'UTF8') < 8){
        array_push($err_msg, "Имя автора не может быть короче 8 символов. ");
    }else{
        
        $no_topic = CheckExistanceTopics($topics);
        if($no_topic == 1){
            array_push($err_msg, "Некоторые категории не существуют. ");
        }else{
            if($_FILES['image']['error'] === 0){
                $imgName = time() . $_FILES['image']['name'];
                $fileTmpName = $_FILES['image']['tmp_name'];
                $destination = ROOT_PATH . "/assets/img/posts/" . $imgName;
        
                if(strpos(mime_content_type($fileTmpName),'image') === false){
                    array_push($err_msg, "Файл не является изображением. ");
                }else{
                    $result = move_uploaded_file($fileTmpName, $destination);

                    if($result){
                        $_POST['img'] = $imgName;
    
                        $img = $_POST["img"];
                        $post = [
                            'user_id' => $_SESSION['id'],
                            'title' => $title,
                            'content' => $content,
                            'img' => $img,
                            'author_name' => $author
                        ];
                        insert('post', $post);
                
                        $sel_post = selectOne('post', ['title'=> $title, 'content' => $content]);
                        foreach($topics as $topic)
                        {
                            $sel_topic = selectOne('topic', ['name'=> $topic]);
                            $post_topic = [
                                'post_id' => $sel_post['id'],
                                'topic_id' => $sel_topic['id']
                            ];
                            insert('post_topic', $post_topic);
                        }
                        header('location: ' .  BASE_URL . 'admin/posts/index.php');
    
                    }else{
                        array_push($err_msg, "Ошибка загрузки изображения на сервер. ");
                    }
                }
            }else{
                array_push($err_msg, "Загрузите изображение. ");
            }
        }
    }
}else{
    $title = '';
    $content = '';
} 

#Редактирование записи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['id']))
{
    $post = selectOne('post', ['id' => $_GET['id']]);
    $topics = selectAll('post_topic', ['post_id' => $_GET['id']]);

    $all_topics = [];

    foreach($topics as $topic)
    {
        $topic_id = $topic['topic_id'];
        $sel_topic = selectOne('topic', ['id'=> $topic_id]);
        array_push($all_topics, $sel_topic['name']);
    }

    $id = $post['id'];
    $topics = implode(', ', $all_topics);
    $title = $post['title'];
    $content = $post['content'];
    //$img = $post['img'];
    $author = $post['author_name'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['post-edit']))
{  
    $id = $_POST['id'];
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    //$img = trim($_POST["image"]);
    $topics = $_POST["topics"];
    $author = trim($_POST["author"]);

    if($title === '' || $content === '' || $author === ''){
        array_push($err_msg, "Не все поля заполнены. ");
    }elseif(mb_strlen($content, 'UTF8') < 200){
        array_push($err_msg, "Содержимое записи не может быть короче 200 символов. ");
    }elseif(mb_strlen($title, 'UTF8') > 200){
        array_push($err_msg, "Название статьи не должно быть длинее 200 символов. ");
    }elseif(mb_strlen($title, 'UTF8') < 10){
        array_push($err_msg, "Название статьи не должно быть короче 10 символов. ");
    }elseif(in_array('Новость', $topics) === false && in_array('Статья', $topics) === false){
        array_push($err_msg, 'Категории должны содержать тэги  "Новость" или "Статья". ');
    }elseif(mb_strlen($author, 'UTF8') < 8){
        array_push($err_msg, "Имя автора не может быть короче 8 символов. ");
    }else{
        $topics = explode(', ', $topics);
        $no_topic = CheckExistanceTopics($topics);
        if($no_topic == 1){
            array_push($err_msg, "Некоторые категории не существуют. ");
        }else{
            $post = [
                'user_id' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                #'img' => $img,
                'author_name' => $author
            ];
    
            updateOne('post', $id, $post);
            $sel_post = selectOne('post', ['id'=> $id]);
            $old_topics = selectAll('post_topic', ['post_id' => $sel_post['id']]);
            
            foreach($old_topics as $old_topic)
            {
                if(in_array($old_topic, $topics) === false)
                {
                    $sel_topic = selectOne('topic', ['id'=> $old_topic['topic_id']]);
                    $post_topic = [
                        'post_id' => $sel_post['id'],
                        'topic_id' => $sel_topic['id']
                    ];
                    $relation = selectOne('post_topic', $post_topic);
                    deleteOne('post_topic', $relation['id']);
                }
            }
    
            foreach($topics as $topic)
            {
                $sel_topic = selectOne('topic', ['name'=> $topic]);
                $post_topic = [
                    'post_id' => $sel_post['id'],
                    'topic_id' => $sel_topic['id']
                ];
                $existance = selectOne('post_topic', $post_topic);
                if(empty($existance))
                {
                    insert('post_topic', $post_topic);
                }
            }

            header('location: ' .  BASE_URL . 'admin/posts/index.php');
        }
    }
}

#Удаление записи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    deleteOne('post', $id);
    header('location: ' .  BASE_URL . 'admin/posts/index.php');
}

?>