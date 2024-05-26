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
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
            background-image: url('background-image.jpg'); /* Replace 'background-image.jpg' with your actual image file */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            background-color: #f8f9fa !important;
        }

        .navbar-brand {
            color: #007bff !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #007bff !important;
            font-weight: bold;
        }

        .wrapper {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
            padding: 20px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-success {
            margin-bottom: 20px;
        }

        .fa {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="dashboard.php">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>
      <li class="nav-item">
        <a href="../public/user/logout.php" class="btn btn-danger ml-3">Sign Out</a>
      </li>
    </ul>
  </div>
</nav>

<div class="wrapper">
    <div class="container">
        <h2 class="mb-3">Product Details</h2>
        <a href="./inventory/create.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New Product</a>

        <?php
        // Include config file
        require_once "../db/config.php";
        
        // Attempt select query execution
        $sql = "SELECT * FROM products";
        if($result = $pdo->query($sql)){
            if($result->rowCount() > 0){
                echo '<table>';
                echo '<tr><th colspan="8">Showing ' . $result->rowCount() . ' Records</th></tr>';
                echo '<tr><th>Record Number</th><th>Product Name</th><th>Product Description</th><th>Price</th><th>Recommended Retail Price</th><th>Quantity</th><th>Image</th><th>Date Added</th><th>Updated Date</th></tr>';
                while ($row = $result->fetch()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['rrp'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['img'] . '</td>';
                    echo '<td>' . $row['date_added'] . '</td>';
                    echo '<td>' . $row['updated_date'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                // Free result set
                unset($result);
            } else{
                echo '<p class="text-danger">No records were found.</p>';
            }
        } else{
            echo '<p class="text-danger">Oops! Something went wrong. Please try again later.</p>';
        }
        
        // Close connection
        unset($pdo);
        ?>
    </div>
</div>
</body>
</html>
