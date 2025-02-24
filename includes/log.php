<?php
$host = 'localhost';  // Имя хоста
$dbname = 'lidertrade_db';  // Название базы данных
$username = 'root';  // Имя пользователя MySQL
$password = '';  // Пароль пользователя MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>
