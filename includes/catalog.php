<?php
include 'includes/header.php';
include 'includes/db.php';

// Получаем товары из базы данных
$query = "SELECT * FROM products";
$stmt = $pdo->query($query);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <section class="catalog" id="catalog">
        <?php foreach ($products as $product): ?>
            <div class="catalog-item">
                <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="overlay"><?php echo $product['name']; ?></div>
                <a href="product_detail.php?id=<?php echo $product['id']; ?>">Подробнее</a>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
