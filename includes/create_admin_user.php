<?php
include 'db.php';  // Подключаем базу данных

// Хешируем пароль
$password = password_hash('Gxzw!D!6K^KU!k!j#', PASSWORD_DEFAULT);

// Вставляем данные пользователя
$query = "INSERT INTO users (username, password) VALUES ('adm', :password)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':password', $password);
$stmt->execute();

echo "Пользователь добавлен!";
?>
