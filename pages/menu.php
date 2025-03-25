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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">Menu</h1>
        <div class="row">
            <?php foreach ($menuItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../assets/images/<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['name']; ?></h5>
                            <p class="card-text">Price: Rs<?php echo $item['price']; ?></p>
                            <p class="card-text">Servings Available: <?php echo $item['servings']; ?></p>
                            <p class="card-text">Serving Time: <?php echo $item['serving_time']; ?></p>
                            <p class="card-text">Ingredients: <?php echo $item['ingredients']; ?></p>
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>