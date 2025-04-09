<?php
$connect = pg_connect("host=localhost port=5432 dbname=postgres_practice user=postgres password=root");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_expense = $_POST['name_expense'];
    $category_expense = $_POST['category_expense'];
    $sum_expense = $_POST['sum_expense'];
    $date_expense = $_POST['date_expense'];

    $query = "INSERT INTO expenses (name_expense, category_expense, sum_expense, date_expense) VALUES (\$1, \$2, \$3, \$4)";
    pg_query_params($connect, $query, array($name_expense, $category_expense, $sum_expense, $date_expense));

    header("Location: main.php");
    exit();
}
