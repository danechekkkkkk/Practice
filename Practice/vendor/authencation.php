<?php
    require_once "connect.php";
    session_start();
  

    $login = $_POST["login"];
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM users WHERE login = \$1 AND password = \$2";
    $result = pg_query_params($connect, $query, array($login, $password));

    if($result && pg_num_rows($result) > 0){
        $user = pg_fetch_assoc($result);
        
        header("Location: ../main.php");
    }
    else{
        $_SESSION['message'] = "Неверный логин или пароль";
        header('Location: ../authentication_page.php');
    }

?>