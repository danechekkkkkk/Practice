<?php
    require_once "vendor/connect.php";

    $query = "TRUNCATE TABLE expenses RESTART IDENTITY";
    $result = pg_query($connect, $query);

    if($result){
        header("Location: main.php");
    }
    else{
        die("Ошибка в удалении данных");
    }
?>