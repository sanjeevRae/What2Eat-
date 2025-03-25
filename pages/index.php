<?php
session_start();
include('../backend/db/connection.php');

$query = "SELECT * FROM food_items WHERE featured = 1 LIMIT 5";
$stmt = $pdo->prepare($query);
$stmt->execute();
$featuredItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What2Eat</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<?php include('../includes/navbar.php'); ?>
<?php include('../includes/header.php'); ?>

<div class="hero-panel">
    <div class="container">
        <h1>Welcome to What2Eat</h1>
        <p>Your favorite college canteen at your fingertips!</p>
        <a href="menu.php" class="btn btn-primary">View Menu</a>
    </div>
</div>

<div class="featured-items">
    <div class="container">
        <h2>Featured Food Items</h2>
        <div class="row">
            <?php foreach ($featuredItems as $item): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../assets/images/<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['name']; ?></h5>
                            <p class="card-text">Price: $<?php echo $item['price']; ?></p>
                            <a href="menu.php" class="btn btn-secondary">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>