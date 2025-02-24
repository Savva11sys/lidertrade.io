<?php
include 'includes/db.php';  // Подключаемся к базе данных

// Запрос на добавление нового товара
$query = "INSERT INTO products (name, description, price, image) 
          VALUES (:name, :description, :price, :image)";
$stmt = $pdo->prepare($query);  // Подготовка запроса

// Привязываем параметры (данные товара)
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':image', $image);

// Устанавливаем значения для товара
$name = 'Софит';
$description = 'Описание софита, материал для отделки.';
$price = 1500.00;  // Цена в рублях
$image = 'sofit.jpg';  // Имя изображения (файл должен быть в папке assets/images)

// Выполняем запрос
$stmt->execute();

// Выводим сообщение о том, что товар был добавлен
echo "Товар добавлен!";
?>
