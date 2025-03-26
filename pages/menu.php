<?php
session_start();
include '../backend/db/connection.php';

$query = "SELECT * FROM menu_items";
$stmt = $pdo->prepare($query);
$stmt->execute();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - What2Eat</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <header class="bg-dark text-white py-5">
        <div class="container text-center">
            <h1 class="display-4">Our Menu</h1>
            <p class="lead">Explore our delicious offerings!</p>
        </div>
    </header>
    <div class="container mt-5">
        <h2 class="text-center display-4 mb-4">Menu</h2>
        <div class="row">
            <?php foreach ($menuItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="../assets/images/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="card-text"><strong>Price:</strong> Rs <?php echo htmlspecialchars($item['price']); ?></p>
                            <p class="card-text"><strong>Servings Available:</strong> <?php echo htmlspecialchars($item['servings']); ?></p>
                            <p class="card-text"><strong>Serving Time:</strong> <?php echo htmlspecialchars($item['serving_time']); ?></p>
                            <p class="card-text"><strong>Ingredients:</strong> <?php echo htmlspecialchars($item['ingredients']); ?></p>
                            <a href="#" class="btn btn-success">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>