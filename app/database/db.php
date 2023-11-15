<?php

require('connect.php');

function print_func($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
function selectAll($table)
{
    global $pdo;

    $sql = "SELECT * FROM $table"; 
    $query = $pdo->prepare($sql);
    $query->execute();
    $errInfo = $query->errorInfo();
    
    if($errInfo[0] !== PDO::ERR_NONE)
    {
        echo "". $errInfo[2] ."";
        exit();
    }
    return $query->fetchAll();
}
print_func(selectAll('users'));
?>