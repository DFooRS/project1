<?php

include(__DIR__ . "/../database/db.php");

$errMsg = "";
$id = "";
$name = '';
$desc = '';
$topics = selectAll('topic');

#Код для создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['topic-create']))
{   
    $name = trim($_POST["name"]);
    $desc = trim($_POST["description"]);

    if($name === '' || $desc === ''){
        $errMsg = "Не все поля заполнены";
    }elseif(mb_strlen($desc, 'UTF8') > 255){
        $errMsg = "Описание категории не должно быть длинее 255 символов";
    }elseif(mb_strlen($name, 'UTF8') > 80){
        $errMsg = "Название категории не должно быть длинее 80 символов";
    }elseif(mb_strlen($name, 'UTF8') < 5){
        $errMsg = "Название категории не должно быть короче 5 символов";
    }

    else{
        $existName = selectOne('topic', ['name' => $name]);
        if($existName){
            $errMsg = "Категория уже существует";
        }else{
            $topic = [
                'name' => $name,
                'description' => $desc,
            ];
            $id = insert('topic', $topic);
            $topic = selectOne('topic', ['id'=> $id]);
            header('location: ' .  BASE_URL . 'admin/topics/index.php');
        }
    }
}else{
    $name = '';
    $desc = '';
} 

#Редактирование категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['id']))
{
    $id = $_GET['id'];
    $topic = selectOne('topic', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $desc = $topic['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['topic-edit']))
{   
    $name = trim($_POST["name"]);
    $desc = trim($_POST["description"]);

    if($name === '' || $desc === ''){
        $errMsg = "Не все поля заполнены";
    }elseif(mb_strlen($desc, 'UTF8') > 255){
        $errMsg = "Описание категории не должно быть длинее 255 символов";
    }elseif(mb_strlen($name, 'UTF8') > 80){
        $errMsg = "Название категории не должно быть длинее 80 символов";
    }elseif(mb_strlen($name, 'UTF8') < 5){
        $errMsg = "Название категории не должно быть короче 5 символов";
    }

    else{
        $topic = [
            'name' => $name,
            'description' => $desc,
        ];
        $id = $_POST['id'];
        $topic_id = updateOne('topic', $id, $topic);
        header('location: ' .  BASE_URL . 'admin/topics/index.php');
    }
}


#Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    deleteOne('topic', $id);
    header('location: ' .  BASE_URL . 'admin/topics/index.php');
}

?>