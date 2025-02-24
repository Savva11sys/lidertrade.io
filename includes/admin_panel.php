<?php
session_start();
include 'db.php';  // Подключаем базу данных

// Проверка, что пользователь авторизован
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Добавление новости
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_news'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO news (title, content) VALUES (:title, :content)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();

    echo "Новость добавлена!";
}

// Добавление товара
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];  // Для простоты, пока что передаем имя изображения

    $query = "INSERT INTO products (name, description, price, image) 
              VALUES (:name, :description, :price, :image)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    echo "Товар добавлен!";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
</head>
<body>
    <h2>Добро пожаловать в админ панель</h2>
    <p>Привет, <?php echo $_SESSION['user']; ?>! <a href="logout.php">Выйти</a></p>

    <h3>Добавить новость</h3>
    <form method="POST" action="">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" required><br><br>
        <label for="content">Содержание:</label>
        <textarea name="content" required></textarea><br><br>
        <button type="submit" name="add_news">Добавить новость</button>
    </form>

    <h3>Добавить товар</h3>
    <form method="POST" action="">
        <label for="name">Название товара:</label>
        <input type="text" name="name" required><br><br>
        <label for="description">Описание товара:</label>
        <textarea name="description" required></textarea><br><br>
        <label for="price">Цена:</label>
        <input type="number" name="price" step="0.01" required><br><br>
        <label for="image">Изображение (путь к файлу):</label>
        <input type="text" name="image" required><br><br>
        <button type="submit" name="add_product">Добавить товар</button>
    </form>
</body>
</html>
