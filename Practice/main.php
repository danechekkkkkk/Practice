<?php
    require_once "vendor/connect.php";
    require_once "vendor/logic.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Трекер расходов</title>
</head>
<body>
    <div class="container">
        <div class="main-content">
            <h1>Трекер расходов</h1>
            
            <form action="add_expense.php" method="post">
                <input type="text" name="name_expense" placeholder="Название расхода" required>
                <input type="text" name="category_expense" placeholder="Категория" required>
                <input type="number" name="sum_expense" placeholder="Сумма" required>
                <input type="date" name="date_expense" required>
                <button type="submit" class = "extra_btn">Добавить расход</button>
            </form>

            <h2>Статистика расходов</h2>
            <?php if ($count_expenses > 0): ?>
            <table>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name_expense']); ?></td>
                        <td><?php echo htmlspecialchars($row['category_expense']); ?></td>  
                        <td><?php echo htmlspecialchars($row['sum_expense']); ?> ₽</td>
                        <td><?php echo htmlspecialchars($row['date_expense']); ?></td>
                        <td>
                        <button class="edit-btn" data-id="<?php echo htmlspecialchars($row['id']); ?>" 
                        data-name="<?php echo htmlspecialchars($row['name_expense']); ?>" 
                        data-category="<?php echo htmlspecialchars($row['category_expense']); ?>" 
                        data-sum="<?php echo htmlspecialchars($row['sum_expense']); ?>" 
                        data-date="<?php echo htmlspecialchars($row['date_expense']); ?>">Редактировать</button>
                    </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
               
                <span class="total_sum">Сегодня у вас не было трат.</span>
            <?php endif; ?>
            </table>
            
            <?php if($count_expenses > 0): ?>
            <div class="clear-sum-container">
                <form action="clear_expenses.php" method="post" class="clear_button">
                    <button type="submit">Очистить таблицу</button>
                </form>
                <h3 class="total_sum">Общая сумма расходов: <?php echo number_format($total_sum_expenses, 2, ',', ' '); ?> ₽</h3>
            </div>
            <?php endif; ?>
        </div>

        <div class="filter-form">
            <h2>Фильтрация расходов</h2>
            <form method="post">
                <select name="category_filter">
                    <option value="">Все категории</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="date" name="date_filter" placeholder="Дата">
                <button type="submit" class = "extra_btn">Фильтровать</button>
            </form>
            <div class="logout">
            <form action="vendor/logout.php" method = "post" class = "logout_form">
                <button class = "logout_btn" type = "submit">Выйти</button>
            </form>
        </div>
        </div>
    </div>

    <div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Редактировать расход</h2>
        <form id="editForm" method="post" action="update_expense.php">
            <input type="hidden" name="id" id="expenseId">
            <input type="text" name="name_expense" id="expenseName" required>
            <input type="text" name="category_expense" id="expenseCategory" required>
            <input type="number" name="sum_expense" id="expenseSum" required>
            <input type="date" name="date_expense" id="expenseDate" required>
            <button type="submit" class = "update_btn">Обновить расход</button>
        </form>
    </div>
</div>
<script src="index.js"></script>
</body>
</html>