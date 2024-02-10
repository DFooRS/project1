<?php

session_start();
require('connect.php');

//DEBUG-function
function print_func($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
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
    $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
//INSERT
function insert($table, $params)
{
    global $pdo;

    $col = implode(', ', array_keys($params));
    $mask = implode(', ', array_map(function ($item) {return "'" . "$item" . "'";}, array_values($params)));
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
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

?>