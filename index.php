<?php
session_start();
include('../backend/db/connection.php');

// Fetch featured items
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="hero-panel text-center text-white">
    <div class="container">
        <h1 class="display-4">Welcome to What2Eat</h1>
        <p class="lead">Your favorite college canteen at your fingertips!</p>
        <a href="./pages/menu.php" class="btn btn-success btn-lg">View Menu</a>
    </div>
</div>

<div class="featured-items my-5">
    <div class="container">
        <h2 class="text-center display-4 mb-4">Featured Food Items</h2>
        <div class="row">
            <?php foreach ($featuredItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="../assets/images/<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="card-text">Price: Rs <?php echo htmlspecialchars($item['price']); ?></p>
                            <a href="./pages/menu.php" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="about" class="bg-light py-5">
    <div class="container text-center">
        <h2 class="display-4">About Us</h2>
        <p class="lead">We are passionate about bringing you the best recipes and meal ideas to make your dining experience unforgettable.</p>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

<button id="back-to-top" class="back-to-top btn btn-success rounded-circle">
    <i class="bi bi-arrow-up"></i>
</button>

<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/script.js"></script>
<script>
    const backToTopButton = document.getElementById('back-to-top');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
</body>
</html>