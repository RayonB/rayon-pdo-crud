<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-image: linear-gradient(to bottom, white 590px);
    color: #000000;
    padding: 20px;
}
.btn {
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}


.container {
    margin-top: 20px; /* Adjust the margin as needed */
}

/* Navbar Styles */
.navbar {
    background-color: white;
}
.cart:hover {
    background-color: #e6b800;
}
.cart {
    background-color: white;
    color: #333;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.slideshow-container {
    border: 3px black; 
    
    max-width: 1300px;
    width: 100%;
    height: 200px;
    position: relative;
    margin: auto;
    overflow: hidden;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5);
  }

  .slideshow-container img {
    width: 100%; /* Set images to fill container width */
    height: 100%; /* Set images to fill container height */
    display: block;
    object-fit: cover; /* Ensure images cover entire container */
  }
.navbar-brand, .navbar-nav .nav-link {
    color: black;
}

.navbar-brand img {
    margin-right: 5px;
}

/* Products Display Styles */
#productsDisplay {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 10px;
    padding: 20px;
}

.card {
    border: 7px black;
    border-radius: 5px;
    padding: 5px;
    width: 300px; /* Adjusted width to fit two cards per row */
    background-color: white;
    box-shadow: 0 0 20px black;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s, box-shadow 0.3s;
    margin-bottom: 10px; /* Increased margin-bottom to create space between rows */
}


@media screen and (max-width: 600px) {
    .card {
        width: calc(50% - 20px); /* On smaller screens, make each card occupy full width */
    }
}


.card:hover {
    transform: scale(1.1); 
    box-shadow: 0 0 20px black;
}
.card-img-top {
    border-top-left-radius: 0px;
    border-top-right-radius: 50px;
    height: 250px;
    object-fit: cover;
    border: 10px solid black; /* Add border style */
    text-align: center;
}

.card-body {
    padding: 100px;
}

.card-title {
    margin-bottom: 0px;
    margin-top: 0px;
    color: black;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 30px;
   
    width: 100%; /* Adjust the width as needed */
}

.card-img {
    width: 100%;
    max-width: 300px; /* Set maximum width for the image */
    height: auto;
    border-radius: 5px;
  }
.card-text {
    margin-top: 10px;
    color: black;
    text-align: center;
}


/* Cart Container Styles */
#cartContainer {
    position: fixed;
    top: 4em;
    right: 80px;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 999;
    border-radius: 5px;
    max-width: 300px;
}
.pull-left {
    float: left !important;
}
.pull-right {
    float: right !important;
}

/* Modal Styles */
.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.modal-header {
    background-color: #343a40;
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.modal-title {
    color: #fff;
}

.modal-body, .modal-footer {
    padding: 20px;
}
.logo-container {
    flex: 1;
}

.logo img {
    max-width: 100px; /* Set a maximum width */
    height: auto; /* To maintain aspect ratio */
}

.nav-links {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

.nav-links li a {
    text-decoration: none;
    color: white; /* Change link text color to black */
    font-weight: bold;
    font-size: 18px;
    transition: color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 20px 10px 30px rgba(255, 165, 0, 0); /* Initial box-shadow */
    border-radius: 15px;
}

.nav-links li a:hover {
    color: #ffcc00; /* Change link text color to yellow on hover */
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5); /* Box-shadow on hover */
}

nav {
    flex: 6;
    background-color: black;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 2px 5px black(0, 0, 0, 0.1);
     border: 6px solid black; 
    border-radius: 10px;
}
.modal-footer {
    border-top: none;
    background-color: #f8f9fa;
}
.mt-5 {
    margin-top: 50px !important;
}
.mb-3 {
    margin-bottom: 30px !important;
}
h1 {
    color: black;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 30px;
    text-align: center; /* Center-align the text */
}
.slideshow-container {
    border: 3px solid black; 
    border-radius: 10px;
    max-width: 1300px;
    width: 100%;
    height: 200px;
    position: relative;
    margin: auto;
    overflow: hidden;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5);
  }

  .slideshow-container img {
    width: 100%; /* Set images to fill container width */
    height: 100%; /* Set images to fill container height */
    display: white;
    object-fit: cover; /* Ensure images cover entire container */
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @keyframes fade {
    0% {opacity: 1}
    50% {opacity: 0.4}
    100% {opacity: 1}
  }
  
  .slides {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1.5s ease; /* Fade transition duration */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow border */
  }

  .slides.active {
    opacity: 1;
  }

  .slides.next {
    opacity: 1;
  }
  .navigation {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 20px;
    box-sizing: border-box;
  }
  
  .navigation button {
    background-color: transparent; /* Transparent background */
    border: 5px solid #black; /* 5px border with color orange */
    border-radius: 20px; /* Rounded corners */
    padding: 10px 20px;
    cursor: pointer;
    transition: box-shadow 0.3s ease; /* Smooth transition for box-shadow */
    font-weight: bold; /* Bold text */
    color: black; /* Change button text color to black */
}

.navigation button:hover {
    box-shadow: 0 0 10px rgba(255, 165, 0, 0.7); /* Shadow effect on hover */
    color: #ffa500; /* Change button text color to orange on hover */
}

  
.btn-group {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.btn {
    padding: 5px 10px;
    width: 120px; 
    border: 2px solid black; 
    border-radius: 5px;
    cursor: pointer;
    margin: 0 5px;
    background-color: white;
    color: black;
    transition: background-color 0.3s, color 0.3s;
    margin-top: 3%;
}

.btn:hover {
    background-color: black;
    color: white; /* Change text color on hover */
    box-shadow: 0 0 10px black;
}
.wrapper {
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

    </style>
</head>
<body>
<nav>
        <div class="logo-container">
            <img src="../media/logoone.jpg" alt="Logo" style="max-width: 150px; margin-top: -10px;">
        </div>
                <ul class="nav-links">
                    <li><a href="../backups/logistic.php">logistics</a></li>
                    <li><a href="report.html">Report</a></li>
                </ul>
        <div style="text-align: center;">
            <a href="../public/user/reset.php" class="btn btn-warning" style="border-color: black;">Reset Password</a>
            <a href="../public/user/logout.php" class="btn btn-danger mr-3" style="border-color: black;">Log-out</a>
            <a href="../products/despay.php" class="btn btn-primary">Back to Products</a>
        </div>
</nav>
<div class="container mt-5">
    <h2>Thank You!</h2>
    <p>Your purchase was successful, and your address has been recorded.</p>
    
</div>
<div class="container">
    <div class="cool-background">
        <h2>Track Your Order</h2>
        <form id="trackingForm">
            <div class="form-group">
                <label for="orderCode">Order Code:</label>
                <input type="text" class="form-control" id="orderCode" required>
                <span class="error" id="orderCodeError"></span>
            </div>
            <button type="submit" class="btn btn-primary">Track</button>
            <button type="button" class="btn btn-danger" onclick="cancelTracking()">Cancel</button>
        </form>
        <div id="trackingInfo" style="display: none;">
            <h3>Delivery Information</h3>
            <p id="deliveryStatus"></p>
            <p id="estimatedDelivery"></p>
        </div>
    </div>
</div>


<div class="container">
    <div class="cool-background">
        <h2>Delivery Timeline</h2>
        <ul class="timeline">
            <!-- Your existing timeline content -->
            <!-- Example Delivery Event -->
            <li class="event">
                <div class="left-arrow"></div>
                <h3>Package Shipped</h3>
                <span class="time">May 25, 2024</span>
                <p>Your package has been shipped and is on its way.</p>
            </li>
        </ul>
    </div>
</div>

<script>
    function validateLogisticsForm() {
        var trackingNumber = document.getElementById('trackingNumber').value;
        var deliveryDate = document.getElementById('deliveryDate').value;

        var trackingNumberError = document.getElementById('trackingNumberError');
        var deliveryDateError = document.getElementById('deliveryDateError');

        var isValid = true;

        // Validation for Tracking Number
        if (trackingNumber.trim() === '') {
            trackingNumberError.textContent = 'Please enter the tracking number';
            isValid = false;
        } else {
            trackingNumberError.textContent = '';
        }

        // Validation for Delivery Date
        if (deliveryDate.trim() === '') {
            deliveryDateError.textContent = 'Please select the estimated delivery date';
            isValid = false;
        } else {
            deliveryDateError.textContent = '';
        }

        return isValid;
    }

    function cancelLogistics() {
        // Redirect to the previous page or perform any other cancel action
        window.history.back();
    }

    document.getElementById('logisticsForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        if (validateLogisticsForm()) {
            // If form is valid, you can perform further actions here, such as submitting data via AJAX
            alert('Logistics information submitted successfully!');
        }
    });
    function trackOrder() {
    var orderCode = document.getElementById('orderCode').value;
    var trackingInfo = document.getElementById('trackingInfo');
    var deliveryStatus = document.getElementById('deliveryStatus');
    var estimatedDelivery = document.getElementById('estimatedDelivery');

    // Predefined delivery information based on order code
    var deliveryData = {
        'ABC123': {
            status: 'Out for delivery',
            estimatedDelivery: 'May 28, 2024'
        },
        'XYZ456': {
            status: 'Delivered',
            estimatedDelivery: 'May 25, 2024'
        },
        // Add more order codes and delivery information as needed
    };

    if (deliveryData.hasOwnProperty(orderCode)) {
        var delivery = deliveryData[orderCode];
        trackingInfo.style.display = 'block';
        deliveryStatus.textContent = 'Delivery Status: ' + delivery.status;
        estimatedDelivery.textContent = 'Estimated Delivery Date: ' + delivery.estimatedDelivery;
    } else {
        // If order code is not found, display a message or handle it as per your requirement
        trackingInfo.style.display = 'none'; // Hide tracking info if order code is not found
        alert('Order not found. Please check your order code.');
    }
}


</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
