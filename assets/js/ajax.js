// AJAX.js file for handling asynchronous requests in the What2Eat application

document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch menu items
    function fetchMenuItems() {
        fetch('backend/user/fetch_menu.php')
            .then(response => response.json())
            .then(data => {
                const menuContainer = document.getElementById('menu-items');
                menuContainer.innerHTML = ''; // Clear existing items

                data.forEach(item => {
                    const menuItem = document.createElement('div');
                    menuItem.classList.add('menu-item');
                    menuItem.innerHTML = `
                        <h3>${item.name}</h3>
                        <p>${item.description}</p>
                        <p>Price: $${item.price}</p>
                        <button onclick="placeOrder(${item.id})">Order Now</button>
                    `;
                    menuContainer.appendChild(menuItem);
                });
            })
            .catch(error => console.error('Error fetching menu items:', error));
    }

    // Function to place an order
    window.placeOrder = function(itemId) {
        const orderData = new FormData();
        orderData.append('item_id', itemId);

        fetch('backend/user/place_order.php', {
            method: 'POST',
            body: orderData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order placed successfully!');
            } else {
                alert('Error placing order: ' + data.message);
            }
        })
        .catch(error => console.error('Error placing order:', error));
    };

    // Initial fetch of menu items
    fetchMenuItems();
});