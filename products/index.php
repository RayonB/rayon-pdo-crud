<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            background-image: url('background_image.jpg'); /* Replace 'background_image.jpg' with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif; /* Use a standard font family */
            color: #333; /* Text color */
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for navbar */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background for cards */
            margin-bottom: 20px;
        }

        .card-title {
            color: #333; /* Card title color */
        }

        /* Add more custom styles as needed */
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
</nav>
<body>

    <div id="productsDisplay" class="card-grid"></div>
    <!-- Cart Display Area -->
    <div id="cartContainer"></div>

    <script>
        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const booksContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                    

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${product.img}">
                            <div class="card-body">
                                <h5 class="card-name">${product.name}</h5><br>Price: ₱${product.rrp}<br>
                                <p class="card-text">${product.description}.</p>
                                <p class="card-text"<br>Quantity: ${product.quantity}</p>
                                 <button class="btn btn-success" onclick="addToCart(${product.id})">
                                    <i class="fas fa-cart-plus"></i> <!-- Add to Cart icon -->
                                Add to Cart
                            </button>
                            </div>
                    </div>

                    `;
                    booksContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        // Function to add a product to the cart
        function addToCart(productId) {
            // Here, you can implement your logic to add the product with the given ID to the cart
            console.log(`Product with ID ${productId} added to cart`);
            // For example, you can send an AJAX request to your server to update the cart
        }

        // Function to display the cart with the items added and deduct the values from the quantity data field
        function displayCart() {
            // Here, you can implement the logic to display the cart with the items added and update the quantity data field
        }

        // Initialize cart object
    let cart = {};

    // Function to add a product to the cart
    function addToCart(productId) {
        // Add the product to the cart
        if (cart[productId]) {
            cart[productId]++;
        } else {
            cart[productId] = 1;
        }
        // Display the updated cart
        displayCart();
    }

    // Function to display the cart with the items added and deduct the values from the quantity data field
    function displayCart() {
        const cartContainer = document.getElementById('cartContainer');
            let cartHTML = '<h3>Cart</h3>';
            // Iterate over the cart items and display them
            for (const [productId, quantity] of Object.entries(cart)) {
                cartHTML += `<p>Product ID: ${productId}, Quantity: ${quantity}</p>`;
                // Here, you can update the quantity data field for the corresponding product
            }
            // Update the cart display
            cartContainer.innerHTML = cartHTML;
    }

    </script>
</body>
</html>
