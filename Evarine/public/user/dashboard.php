<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font: 14px sans-serif;
            background-image: url('your-background-image.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; /* Text color */
            padding-top: 50px; /* Adjust top padding to center content vertically */
        }
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
        .table {
            color: #fff; /* Table text color */
        }
        .navbar {
            background-color: #f8f9fa !important; /* Navbar background color */
        }
        .navbar-brand {
            color: #000 !important; /* Navbar brand color */
        }
        .navbar-toggler-icon {
            color: #000 !important; /* Navbar toggle icon color */
        }
        .nav-item {
            margin-right: 10px; /* Adjust margin between nav items */
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background color for input fields */
            color: #000; /* Text color for input fields */
        }
        .card {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background color for cards */
            border: none; /* Remove card border */
        }
        .card-header {
            background-color: #17a2b8 !important; /* Card header background color */
            color: #fff !important; /* Card header text color */
        }
        .card-text {
            color: #fff; /* Card text color */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand"  href="dashboard.php">Admin</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <!--<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>-->
            <a href="../public/user/logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </form>
    </div>
</nav>

<div class="container-fluid mt-5">
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Products Recorded</div>
        <div class="card-body">
            <?php
            // Include config file
            require_once "../db/config.php";
            
            // Attempt select query execution
            $sql = "SELECT COUNT(*) AS total_products FROM products";
            if($stmt = $pdo->prepare($sql)){
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Bind result variables
                    $stmt->bindColumn('total_products', $total_products);
                    
                    // Fetch result
                    if($stmt->fetch()){
                        echo '<h1 class="text-center">' . $total_products . '</h1><br>';
                    } else{
                        echo '<p>No products found.</p>';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // Close statement
            unset($stmt);
            ?>
            <p class="card-text">Date and Time: <?php echo date("Y-m-d H:i:s"); ?></p>
        </div>
    </div>
</div>
</body>
</html>