<?php

include(__DIR__.'/../../app/database/db.php'); 

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    if($user['admin'] > 0){
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }else{
        header('location: ' . BASE_URL);
    }
}

$errMsg = '';
$users = selectAll('users');

//Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['btn-reg']))
{    
    $login = trim($_POST["inputLogin"]);
    $email = trim($_POST["email"]);
    $password1 = trim($_POST["firstPass"]);
    $password2 = trim($_POST["secondPass"]);
    $admin = 0;

    if($login === '' || $email === '' || $password1 === '' || $password2 === ''){
        $errMsg = "Не все поля заполнены";
    }elseif(mb_strlen($login, 'UTF8') < 5){
        $errMsg = "Имя пользователя должно быть длиннее 5 символов";
    }elseif($password1 !== $password2){
        $errMsg = "Пароли не совпадают";
    }
    else{
        $existMail = selectOne('users', ['email' => $email]);
        $existUser = selectOne('users', ['username' => $login]);
        if($existMail){
            $errMsg = "Почтовый адрес уже зарегестрирован";
        }elseif($existUser){
            $errMsg = "Пользователь уже зарегестрирован";
        }else{
            $pass = password_hash($password1, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password'=> $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id'=> $id]);

            loginUser($user); //функция авторизации
        }
    }
}else{
    $login = '';
    $email = '';
} 

//Код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['btn-log']))
{
    $email= trim($_POST["email"]);
    $password = trim($_POST["inputPass"]);
    
    if($email === '' || $password === ''){
        $errMsg = "Не все поля заполнены";
    }else{
        $existMail = selectOne('users', ['email' => $email]);

        if($existMail && password_verify($password, $existMail['password'])){
            loginUser($existMail); //функция авторизации
        }else{
            $errMsg = "Неверные данные";
        }
    }
}else{
    $email = '';
}

//Код для создания пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['user-create']))
{    
    $login = trim($_POST["login"]);
    $email = trim($_POST["email"]);
    $password1 = trim($_POST["firstPass"]);
    $password2 = trim($_POST["secondPass"]);
    $admin = $_POST["admin"];

    if($login === '' || $email === '' || $password1 === '' || $password2 === ''){
        $errMsg = "Не все поля заполнены";
    }elseif(mb_strlen($login, 'UTF8') < 5){
        $errMsg = "Имя пользователя должно быть длиннее 5 символов";
    }elseif($password1 !== $password2){
        $errMsg = "Пароли не совпадают";
    }
    else{
        $existMail = selectOne('users', ['email' => $email]);
        $existUser = selectOne('users', ['username' => $login]);
        if($existMail){
            $errMsg = "Почтовый адрес уже зарегестрирован";
        }elseif($existUser){
            $errMsg = "Пользователь уже зарегестрирован";
        }else{
            $pass = password_hash($password1, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password'=> $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id'=> $id]);
        }
        header('location: ' .  BASE_URL . 'admin/users/index.php');
    }
}else{
    $login = '';
    $email = '';
} 

#Редактирование пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['edit_id']))
{
    $user = selectOne('users', ['id' => $_GET['edit_id']]);
    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['user-update']))
{   
    $login = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $admin = trim($_POST["admin"]);

    if($login === '' || $email === ''){
        $errMsg = "Не все поля заполнены";
    }elseif(mb_strlen($login, 'UTF8') < 5){
        $errMsg = "Имя пользователя должно быть длиннее 5 символов";
    }else{
        $exist = selectOne('users', ['username' => $login]);
        if($exist && $exist['id'] != $_POST['id']){
            $errMsg = "Пользователь уже зарегестрирован";
        }else{
            $user = [
                'admin' => $admin,
                'username' => $login,
            ];
            $id = $_POST['id'];
            $topic_id = updateOne('users', $id, $user);
            header('location: ' .  BASE_URL . 'admin/users/index.php');
        }
    }
}

#Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset( $_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    deleteOne('users', $id);
    header('location: ' .  BASE_URL . 'admin/users/index.php');
}

?>