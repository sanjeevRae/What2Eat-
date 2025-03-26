# What2Eat: College Canteen Management System

## Overview
We've all been there—showing up at the canteen with no proper menu in sight, just hoping for some food to magically appear 🍔✨.

Well, that's how What2Eat was born! 🎉 

Inspired by the chaos of not knowing what's for lunch (or if there's even food available 🤣),  I created this College Canteen Management System to fix the mess. With a user-friendly interface, it helps students and admins keep track of food availability, prices, and orders, making sure no one ever has to play "What's for lunch?" again! 😜🍽️

## Key Features
1. **Hero Panel**: A dynamic hero panel showcasing featured food items with vibrant images and call-to-action buttons.
2. **Responsive Navbar**: A fixed navigation bar for easy access to Home, Menu, and Login pages.
3. **Dynamic Menu Page**: Displays food items fetched from the MySQL database, including details like servings, price, and ingredients.
4. **User Authentication**: Secure login system for both students and admins, with password hashing and SQL injection protection.
5. **Admin Management**: Admins can add, edit, and manage food items and view orders.
6. **Order System**: Users can browse the menu, place orders, and track their order statuses.
7. **Responsive Design**: Fully mobile-responsive design using CSS Flexbox and Bootstrap.
8. **Security**: Utilizes prepared statements in PHP to prevent SQL injection.

## Technologies Used
- **Frontend**: HTML5, CSS3, JavaScript (ES6+), Bootstrap
- **Backend**: PHP, MySQL
- **Security**: bcrypt for password hashing, prepared statements for database interactions

## Installation
1. Clone the repository:
   ```
   git clone https://github.com/sanjeevRae/What2Eat
   ```
2. Navigate to the project directory:
   ```
   cd What2Eat
   ```
3. Set up the database:
   - Import the `seed.sql` file into your MySQL database to create the necessary tables and initial data.
4. Configure the database connection:
   - Update the `config/config.php` file with your database credentials.
5. Start a local server (e.g., using XAMPP, WAMP, or built-in PHP server):
   ```
   php -S localhost:8000
   ```
6. Access the application in your web browser at `http://localhost:8000/pages/index.php`.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.

## Acknowledgments
- Special thanks to the contributors and the open-source community for their support and resources.
