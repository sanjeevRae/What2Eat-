<?php
session_start();
include_once '../db/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Query to fetch orders with food details
    $stmt = $pdo->prepare("
        SELECT o.id, o.food_id, o.quantity, o.status, o.order_date, f.name AS food_name, f.price AS food_price
        FROM orders o
        JOIN food_items f ON o.food_id = f.id
        WHERE o.user_id = :user_id
        ORDER BY o.order_date DESC
    ");
    $stmt->execute(['user_id' => $user_id]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format the order date
    if ($orders) {
        $orders = array_map(function($order) {
            $order['order_date'] = date('F j, Y, g:i a', strtotime($order['order_date']));
            return $order;
        }, $orders);

        echo json_encode(['status' => 'success', 'orders' => $orders]);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'No orders found for this user.']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
