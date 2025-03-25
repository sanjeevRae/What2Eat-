<?php
session_start();
include_once '../db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'];
    $foodId = $_POST['food_id'];
    $quantity = $_POST['quantity'];
    $orderStatus = 'pending';

    if (empty($foodId) || empty($quantity)) {
        echo json_encode(['status' => 'error', 'message' => 'Food ID and quantity are required.']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, food_id, quantity, status) VALUES (:user_id, :food_id, :quantity, :status)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':food_id', $foodId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $orderStatus);
        $stmt->execute();

        echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to place order: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>