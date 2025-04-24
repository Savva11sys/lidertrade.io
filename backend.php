<?php
header('Content-Type: application/json');

$dayProductFile = 'day_product.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['type']) && $input['type'] === 'saveDayProduct' && isset($input['product'])) {
        file_put_contents($dayProductFile, json_encode($input['product'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        echo json_encode(["success" => "Товар дня успешно сохранён."]);
        exit;
    }

    echo json_encode(["error" => "Неверный запрос."]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['type']) && $_GET['type'] === 'getDayProduct') {
        if (file_exists($dayProductFile)) {
            echo file_get_contents($dayProductFile);
        } else {
            echo json_encode(null);
        }
        exit;
    }

    echo json_encode(["error" => "Неизвестный GET-запрос."]);
    exit;
}
?>
