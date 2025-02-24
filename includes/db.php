<?php
$host = 'localhost';
$dbname = 'lidertrade_db';
$username = 'root';  // Используйте ваше имя пользователя
$password = '';      // Используйте ваш пароль

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    die();
}
?>
