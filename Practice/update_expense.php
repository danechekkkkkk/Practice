<?php
$connect = pg_connect("host=localhost port=5432 dbname=postgres_practice user=postgres password=root");

if (!$connect) {
    die("Ошибка подключения к базе данных.");
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name_expense = isset($_POST['name_expense']) ? $_POST['name_expense'] : '';
$category_expense = isset($_POST['category_expense']) ? $_POST['category_expense'] : '';
$sum_expense = isset($_POST['sum_expense']) ? $_POST['sum_expense'] : '';
$date_expense = isset($_POST['date_expense']) ? $_POST['date_expense'] : '';

if ($id && $name_expense && $category_expense && $sum_expense && $date_expense) {
    $query = "UPDATE expenses SET name_expense = \$1, category_expense = \$2, sum_expense = \$3, date_expense = \$4 WHERE id = \$5";
    $result = pg_query_params($connect, $query, array($name_expense, $category_expense, $sum_expense, $date_expense, $id));

    if ($result) {
        header("Location: main.php"); 
        exit();
    } else {
        echo "Ошибка обновления записи: " . pg_last_error($connect);
    }
} else {
    echo "Ошибка: Не все данные были переданы.";
}
?>
