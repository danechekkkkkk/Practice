<?php
    require_once("vendor/connect.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
    </div>
    <div class="main">
        <div class="auth_form">
            <form action="vendor/register.php"  method = "post" class = "auth_reg_form">
                <h1>Регистрация</h1>
                <input type="text" placeholder = "Введите логин" required name = "login">
                <input type="password" placeholder = "Введите пароль" required name = "password">
                <input type="password" placeholder = "Повторите пароль" required name = "repeat_pass">
                <button type = "submit">Зарегистрироваться</button>
                <p class = "message">
                    <?php
                        echo @$_SESSION['message'];
                        unset($_SESSION['message']);
                    ?>
                </p>
            </form>
        </div>
    </div>
</body>
</html>