<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}

// Include config file
require_once "../../db/config.php";
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
        body{ font: 14px sans-serif; text-align: center; }
        .wrapper{
            width: 1100px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 150px;
        }
        body {
            background-color: black;
            color: orange;
        }

        .container {
            border: 2px solid #ffc107;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: orange;
        }

        .btn-primary, .btn-danger {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 20px 10px 30px rgba(255, 165, 0, 0);
            border-radius: 15px;
        }
      
        .nav-links li a:hover {
            color: #ffcc00;
            box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5);
        }
      
        nav {
            flex: 6;
            background-color: black;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            border: 6px solid orange;
            border-radius: 10px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            color: orange;
            border: 2px solid orange;
            background-color: black;
        }

        .btn:hover {
            background-color: orange;
            color: black;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        body, h1, h2, h3, h4, h5, h6, p, a, th, td, label {
            color: orange;
        }

</style>
</head>
<body>
<nav>
    <div class="logo-container">
        <img src="../../media/logoone.jpg" alt="Logo" style="max-width: 150px; margin-top: -10px;">
    </div>
    <ul class="nav-links">
        <li><a href="../../backups/logistic.php">Logistics</a></li>
        <li><a href="report.html">Report</a></li>
    </ul>
    <div style="text-align: center;">
        <a href="../../public/user/reset.php" class="btn btn-warning" style="border-color: black;">Reset Password</a>
        <a href="../../public/user/logout.php" class="btn btn-danger mr-3" style="border-color: black;">Log-out</a>
        <a href="../../products/despay.php" class="btn btn-primary">Back to Products</a>
    </div>
</nav>
<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site where you can sell products you want.</h1>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Product Details</h2>
                    <a href="../inventory/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
                </div>
                <?php


     // Attempt select query execution
                $sql = "SELECT * FROM sales";
                if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>#</th>';
                        echo '<th>Product Name</th>';
                        echo '<th>Product Description</th>';
                        echo '<th>Retail Price</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while($row = $result->fetch()){
                            echo '<tr>';
                            echo '<td>' . $row['sale_id'] . '</td>';
                            echo '<td>' . $row['sale_name'] . '</td>';
                            echo '<td>' . $row['sale_details'] . '</td>';
                            echo '<td>' . $row['sale_retail_price'] . '</td>';
                            echo '<td>';
                            echo '<a href="../inventory/read.php?sale_id=' . $row['sale_id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo '<a href="../inventory/update.php?sale_id=' . $row['sale_id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="../inventory/delete.php?sale_id=' . $row['sale_id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        // Free result set
                        unset($result);
                    } else{
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close connection
                unset($pdo);
                ?>
            </div>
        </div>        
    </div>
</div>
</body>
</html>
