<?php
session_start();
require_once '../backend/db/connection.php';
require_once '../includes/navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM food_items");
$stmt->execute();
$food_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$order_stmt = $pdo->prepare("SELECT orders.*, users.name AS user_name, food_items.name AS food_name FROM orders
                             JOIN users ON orders.user_id = users.id
                             JOIN food_items ON orders.food_id = food_items.id");
$order_stmt->execute();
$orders = $order_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center display-4 mb-4">Admin Dashboard</h1>

        <div class="card mb-5 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Manage Food Items</h2>
            </div>
            <div class="card-body">
                <a href="../backend/admin/add_food.php" class="btn btn-success mb-3">Add New Food Item</a>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Servings</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($food_items as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>Rs <?php echo htmlspecialchars($item['price']); ?></td>
                                <td><?php echo htmlspecialchars($item['servings']); ?></td>
                                <td>
                                    <a href="../backend/admin/edit_food.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../backend/admin/delete_food.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this food item?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h2 class="mb-0">Manage Orders</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>User Name</th>
                            <th>Food Item</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['food_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['status']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
