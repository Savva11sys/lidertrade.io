<?php
session_start();
include 'db.php';  // Подключаем базу данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка пользователя
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверка пароля
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];  // Устанавливаем сессию для пользователя
        header('Location: admin_panel.php');  // Перенаправляем в админ панель
        exit();
    } else {
        $error = "Неверный логин или пароль!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти в админ панель</title>
</head>
<body>
    <h2>Вход в админ панель</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Логин:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Войти</button>
    </form>
</body>
</html>
