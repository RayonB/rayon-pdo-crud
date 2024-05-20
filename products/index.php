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
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
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
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div id="productsDisplay" class="card-grid"></div>
    </div>
    
    <!-- Cart Display Area -->
    <div id="cartContainer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
            View Cart
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cartModalBody">
                    <!-- Cart items will be displayed here -->
                </div>
                <div class="modal-footer">
                    <p class="mr-auto" id="totalPrice"></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="buyButton">Buy</button>
                </div>
            </div>
        </div>
    </div>

 <script>
        fetch('./products/products-api.php')
    .then(response => response.json())
    .then(data => {
        const productsContainer = document.getElementById('productsDisplay');
        data.forEach(product => {
            const cardHTML = `
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top" src="${product.img}" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text">${product.description}</p>
                            <p class="card-text">Price: ₱${product.rrp}</p>
                            <p class="card-text">Quantity: ${product.quantity}</p>
                            <p class="card-text">Date Added: ${product.date_added}</p>
                            <p class="card-text">Updated Date: ${product.updated_date}</p>
                            <button class="btn btn-success" onclick="addToCart(${product.id})">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>

            `;
            productsContainer.innerHTML += cardHTML;
        });
        
        })
        .catch(error => console.error('Error:', error));
</body>

    // Initialize cart object
    let cart = {};

    // Function to add a product to the cart
    function addToCart(productId, productName, productDescription, productPrice) {
        // Add the product to the cart
        if (cart[productId]) {
            cart[productId].quality++;
        } else {
            cart[productId] = { name: productName, description: productDescriptionquantity: 1, price: productPrice };
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

    function removeFromCart(productId) {
            if (cart[productId]) {
                cart[productId].quantity--;
                if (cart[productId].quantity <= 0) {
                    delete cart[productId];
                }
            }
            displayCart();
        }

        function deleteFromCart(productId) {
            delete cart[productId];
            displayCart();
        }

        function displayCart() {
            const cartModalBody = document.getElementById('cartModalBody');
            const totalPriceElement = document.getElementById('totalPrice');
            let cartHTML = '';
            let totalPrice = 0;

            for (const [productId, product] of Object.entries(cart)) {
                const productTotal = product.quantity * product.price;
                totalPrice += productTotal;
                cartHTML += `
                    <div>
                        <p>Product Name: ${product.name}, Quantity: ${product.quantity}, Total: ₱${productTotal}</p>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${productId})">-</button>
                        <button class="btn btn-secondary btn-sm" onclick="deleteFromCart(${productId})">Remove</button>
                    </div>
                `;
            }

            cartModalBody.innerHTML = cartHTML;
            totalPriceElement.innerHTML = `Total Price: ₱${totalPrice}`;
        }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
