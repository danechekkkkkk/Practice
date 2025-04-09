<?php
require_once "connect.php";


$category_filter = isset($_POST['category_filter']) ? $_POST['category_filter'] : '';
$date_filter = isset($_POST['date_filter']) ? $_POST['date_filter'] : '';


$query = "SELECT * FROM expenses WHERE 1=1"; 

$params = array(); 
$paramIndex = 1;


if (!empty($category_filter)) {
    $query .= " AND category_expense = $" . $paramIndex++;
    $params[] = $category_filter; 
}


if (!empty($date_filter)) {
    $query .= " AND date_expense = $" . $paramIndex++ . "::DATE";
    $params[] = $date_filter; 
}


$result = pg_query_params($connect, $query, $params);


if (!$result) {
    echo "Ошибка выполнения запроса: " . pg_last_error($connect);
    exit();
}   
    
$categories_result = pg_query($connect, "SELECT DISTINCT category_expense FROM expenses");
if (!$categories_result) {
    echo "Ошибка получения категорий: " . pg_last_error($connect);
    exit();
}
$categories = pg_fetch_all_columns($categories_result, 0);

$count_query = "SELECT COUNT(*) FROM expenses";
$count_result = pg_query($connect, $count_query);
$count_row = pg_fetch_row($count_result);
$count_expenses = $count_row[0];

$sum_query = "SELECT SUM(sum_expense) FROM expenses";
$sum_result = pg_query($connect, $sum_query);
$sum_row = pg_fetch_row($sum_result);
$total_sum_expenses = $sum_row[0] ? (float)$sum_row[0] : 0;
?>