// assets/js/script.js

document.addEventListener("DOMContentLoaded", function() {
    // Initialize the hero panel with featured food items
    loadFeaturedItems();

    // Event listener for login form submission
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            event.preventDefault();
            loginUser();
        });
    }

    // Event listener for order placement
    const orderButtons = document.querySelectorAll(".order-button");
    orderButtons.forEach(button => {
        button.addEventListener("click", function() {
            const foodId = this.dataset.foodId;
            placeOrder(foodId);
        });
    });
});

// Function to load featured food items
function loadFeaturedItems() {
    fetch('backend/user/get_featured_items.php')
        .then(response => response.json())
        .then(data => {
            const heroPanel = document.getElementById("heroPanel");
            heroPanel.innerHTML = '';
            data.forEach(item => {
                heroPanel.innerHTML += `
                    <div class="featured-item">
                        <img src="${item.image}" alt="${item.name}">
                        <h3>${item.name}</h3>
                        <p>${item.description}</p>
                        <button class="order-button" data-food-id="${item.id}">Order Now</button>
                    </div>
                `;
            });
        })
        .catch(error => console.error('Error loading featured items:', error));
}

// Function to log in the user
function loginUser() {
    const formData = new FormData(document.getElementById("loginForm"));
    fetch('backend/auth/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'pages/user_dashboard.php';
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error logging in:', error));
}

// Function to place an order
function placeOrder(foodId) {
    fetch('backend/user/place_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ foodId: foodId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order placed successfully!');
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error placing order:', error));
}