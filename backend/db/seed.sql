INSERT INTO users (username, password, role) VALUES
('student1', '$2y$10$e0N1Z5g5Q1F5G5g5G5g5G.5g5G5g5G5g5G5g5G5g5G5g5G5g5G5', 'student'),
('admin1', '$2y$10$e0N1Z5g5Q1F5G5g5G5g5G.5g5G5g5G5g5G5g5G5g5G5g5G5g5G5', 'admin');

INSERT INTO food_items (name, description, price, servings, serving_time, image) VALUES
('Cheese Burger', 'Juicy beef burger with cheese, lettuce, and tomato.', 199, 20, 'Lunch', 'images/cheese_burger.jpg'),
('Veggie Pizza', 'Delicious pizza topped with fresh vegetables and cheese.', 199, 15, 'Dinner', 'images/veggie_pizza.jpg'),
('Pasta Alfredo', 'Creamy Alfredo pasta with chicken and broccoli.', 299, 10, 'Lunch', 'images/pasta.jpg'),
('Caesar Salad', 'Crisp romaine lettuce with Caesar dressing and croutons.', 4.99, 25, 'Lunch', 'images/salad.jpg'),
('Chocolate Cake', 'Rich chocolate cake with a creamy frosting.', 49, 30, 'Dessert', 'images/chocolate_cake.jpg');

INSERT INTO orders (user_id, food_item_id, quantity, status) VALUES
(1, 1, 2, 'pending'),
(1, 3, 1, 'completed'),
(2, 2, 1, 'in-progress');