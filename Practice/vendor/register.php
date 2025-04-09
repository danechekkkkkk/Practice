<?php
    session_start();
    require_once 'connect.php';

    
    $login = $_POST["login"];
    $password = $_POST["password"];
    $repeat_pass = $_POST["repeat_pass"];


    if($password === $repeat_pass){
        $password = md5($password);
        $query = "INSERT INTO users (login, password) values (\$1, \$2)";
        $result = pg_query_params($connect, $query, array($login, $password));
        $_SESSION['message'] = "Регистрация прошла успешно";
        header("Location: ../authentication_page.php");
    }
    else{
        $_SESSION['message'] = 'Пароли не совпадают';
        header("Location: ../register_page.php");
    }
?>