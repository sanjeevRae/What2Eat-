<?php
require_once '../db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from POST request
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $servings = $_POST['servings'];
    $ingredients = $_POST['ingredients'];
    $serving_time = $_POST['serving_time'];

    // Prepare the SQL statement to update the food item
    $stmt = $pdo->prepare("UPDATE food_items SET name = ?, price = ?, servings = ?, ingredients = ?, serving_time = ? WHERE id = ?");
    $stmt->execute([$food_name, $price, $servings, $ingredients, $serving_time, $food_id]);

    // Redirect to admin dashboard with a success message
    header("Location: ../pages/admin_dashboard.php?message=Food item updated successfully");
    exit();
}

if (isset($_GET['id'])) {
    // Fetch the food item based on the provided ID in the URL
    $food_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM food_items WHERE id = ?");
    $stmt->execute([$food_id]);
    $food_item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // If no food ID is provided, redirect with an error message
    header("Location: ../pages/admin_dashboard.php?error=No food item selected");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Linking Bootstrap and Custom Stylesheets -->
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <title>Edit Food Item</title>
</head>
<body>
    <!-- Include the Navbar -->
    <?php include '../../includes/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Edit Food Item</h2>
        
        <!-- Form to update the food item -->
        <form action="edit_food.php" method="POST">
            <!-- Hidden field to store the food ID for updating the specific item -->
            <input type="hidden" name="food_id" value="<?php echo $food_item['id']; ?>">

            <div class="form-group">
                <label for="food_name">Food Name</label>
                <input type="text" class="form-control" id="food_name" name="food_name" value="<?php echo $food_item['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $food_item['price']; ?>" required>
            </div>

            <div class="form-group">
                <label for="servings">Servings Available</label>
                <input type="number" class="form-control" id="servings" name="servings" value="<?php echo $food_item['servings']; ?>" required>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control" id="ingredients" name="ingredients" required><?php echo $food_item['ingredients']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="serving_time">Serving Time</label>
                <input type="text" class="form-control" id="serving_time" name="serving_time" value="<?php echo $food_item['serving_time']; ?>" required>
            </div>

            <!-- Submit button for the form -->
            <button type="submit" class="btn btn-primary">Update Food Item</button>
        </form>
    </div>

    <!-- Include the Footer -->
    <?php include '../../includes/footer.php'; ?>
</body>
</html>
