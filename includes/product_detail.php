<?php
include 'includes/db.php';

// Получаем ID товара
$product_id = $_GET['id'] ?? null;

if ($product_id) {
    // Получаем информацию о товаре по ID
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Товар не найден!";
        exit;
    }
} else {
    echo "Некорректный запрос.";
    exit;
}

include 'includes/header.php';
?>

<main>
    <section class="product-detail">
        <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <h2><?php echo $product['name']; ?></h2>
        <p><?php echo $product['description']; ?></p>
        <p><strong>Цена: </strong><?php echo $product['price']; ?> руб.</p>
        <a href="#">Добавить в корзину</a>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
