<?php

session_start();
require('connect.php');

//DEBUG-function
function print_func($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
//Проверка ошибок в запросе к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE)
    {
        echo "". $errInfo[2] ."";
        exit();
    }
    return true;
}
//SELECT * из таблицы
function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table"; 

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i === 0){
                $sql = $sql ." WHERE $key = $value ";
            }else{
                $sql = $sql ." AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//Запрос на получение одной строки с выбранной табицы
function selectOne($table, $params = [])
{
    global $pdo; 
    $sql = "SELECT * FROM $table"; 

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i === 0){
                $sql = $sql ." WHERE $key = $value ";
            }else{
                $sql = $sql ." AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
//INSERT
function insert($table, $params) {
    global $pdo;

    $col = implode(', ', array_keys($params));
    $mask = ':' . implode(', :', array_keys($params)); // формируем маску параметров
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";

    try {
        $query = $pdo->prepare($sql);
        $query->execute($params); // передаем параметры напрямую в execute
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        // Выводим сообщение об ошибке и информацию о запросе
        echo 'Ошибка при выполнении запроса: ' . $e->getMessage();
        echo 'Запрос: ' . $sql;
        exit(); // прерываем выполнение скрипта
    }
}

//Обновление данных(строки)
function updateOne($table, $id, $params)
{
    global $pdo;
    $str = "";
    $i = 0;
    foreach($params as $key => $value){
        if($i === 0){
            $str .= $key . "='" .$value . "'";
        }else{
            $str .= ", " . $key  . "='" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
//Функция удаления
function deleteOne($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

//Функция поиска по сайту
function globalSearch($params, $table){
    $params = explode(' ', $params);
    $text = '%';
    foreach($params as $param){
        $param = trim(strip_tags(stripcslashes(htmlspecialchars($param))));
        $text .= $param . '%';
    }

    global $pdo;
    $sql = "SELECT * FROM $table
            WHERE $table.title LIKE '$text' OR
            $table.content LIKE '$text'
    ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Функция счёта всех записей
function countRows($table, $params)
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table";
    
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i === 0){
                $sql = $sql ." WHERE $key = $value ";
            }else{
                $sql = $sql ." AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}

//SELECT постов по номеру темы для пагинации
function selectPostsByTopicDateDESC($topic_id, $limit, $offset)
{
    global $pdo;
    $sql = "SELECT p.id, user_id, title, content, img, author_name, post_date, topic_id 
            FROM `post` AS p JOIN `post_topic` AS pt ON p.id = pt.post_id 
            WHERE pt.topic_id = $topic_id"; 

    $sql = $sql . " ORDER BY post_date DESC" . " LIMIT $limit" . " OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//SELECT комментариев с именем пользователя
function selectCommentWithUsername($params = [])
{
    global $pdo;
    $sql = "SELECT username, created_date, content, c.id 
            FROM `comment` AS c JOIN `user` AS u ON c.user_id = u.id";
            
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i === 0){
                $sql = $sql ." WHERE $key = $value ";
            }else{
                $sql = $sql ." AND $key = $value";
            }
            $i++;
        }
    }        
            
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//SELECT последние посты
function selectLastPosts($topic_id, $limit)
{
    global $pdo;
    
    $sql = "SELECT p.id, user_id, title, content, img, author_name, post_date, topic_id 
            FROM `post` AS p JOIN `post_topic` AS pt ON p.id = pt.post_id 
            WHERE pt.topic_id = $topic_id"; 
    $sql = $sql . " ORDER BY post_date DESC" . " LIMIT $limit";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

?>