<?php
require_once '../db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food_name = $_POST['food_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $servings = $_POST['servings'];
    $serving_time = $_POST['serving_time'];
    $image = $_FILES['image']['name'];
    $target_dir = "../../assets/images/";
    $target_file = $target_dir . basename($image);

    // Prepare and bind
    $stmt = $pdo->prepare("INSERT INTO food_items (name, description, price, servings, serving_time, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $food_name);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $price);
    $stmt->bindParam(4, $servings);
    $stmt->bindParam(5, $serving_time);
    $stmt->bindParam(6, $image);

    // Execute the statement
    if ($stmt->execute()) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        echo "New food item added successfully!";
    } else {
        echo "Error: Could not add food item.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <title>Add Food Item</title>
</head>
<body>
    <div class="container">
        <h2>Add New Food Item</h2>
        <form action="add_food.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="food_name">Food Name:</label>
                <input type="text" class="form-control" id="food_name" name="food_name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="servings">Number of Servings:</label>
                <input type="number" class="form-control" id="servings" name="servings" required>
            </div>
            <div class="form-group">
                <label for="serving_time">Serving Time:</label>
                <input type="text" class="form-control" id="serving_time" name="serving_time" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Food Item</button>
        </form>
    </div>
</body>
</html>