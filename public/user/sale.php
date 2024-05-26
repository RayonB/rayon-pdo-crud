<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
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
        body{ font: 14px sans-serif; text-align: center; }
        .wrapper{
            width: 1100px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 150px;
        }
        body {
            background-color: black; /* Updated background color to black */
            color: orange; /* Set text color to orange */
        }

        .container {
            border: 2px solid #ffc107; /* Yellow border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 40px;
            margin-top: 50px; /* Add some space from the top */
        }

        .form-group {
            margin-bottom: 20px; /* Add space between form elements */
        }

        label {
            color: orange; /* Set label text color to orange */
        }

        .btn-primary, .btn-danger {
            padding: 10px 20px; /* Padding for buttons */
            font-size: 16px; /* Font size for buttons */
            border-radius: 5px; /* Rounded corners for buttons */
        }

        .btn-primary {
            background-color: #007bff; /* Blue button */
            border-color: #007bff; /* Blue button border */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Darker blue border on hover */
        }

        .btn-danger {
            background-color: #dc3545; /* Red button */
            border-color: #dc3545; /* Red button border */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130; /* Darker red border on hover */
        }
        .container {
            border: 2px solid #ffc107; /* Yellow border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 40px;
            margin-top: 50px; /* Add some space from the top */
        }

        .form-group {
            margin-bottom: 20px; /* Add space between form elements */
        }

        label {
            color: orange; /* Set label text color to orange */
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
    font-size: 18px; /* Increased font size */
    transition: color 0.3s ease, box-shadow 0.3s ease; /* Added box-shadow transition */
    box-shadow: 20px 10px 30px rgba(255, 165, 0, 0); /* Initial box-shadow */
    border-radius: 15px;
}

.nav-links li a:hover {
    color: #ffcc00;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5); /* Box-shadow on hover */
}
nav {
    flex: 6;
    background-color: black;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 2px 5px orange(0, 0, 0, 0.1);
     border: 6px solid orange; 
    border-radius: 10px;
}

        .btn {
            padding: 10px 20px; /* Padding for buttons */
            font-size: 16px; /* Font size for buttons */
            border-radius: 5px; /* Rounded corners for buttons */
            color: orange; /* Set button text color to orange */
            border: 2px solid orange; /* Set button border color to orange */
            background-color: black; /* Set button background color to black */
        }

        .btn:hover {
            background-color: orange; /* Set button background color to orange on hover */
            color: black; /* Set button text color to black on hover */
        } .error {
            color: red; /* Error message color */
            font-size: 14px; /* Error message font size */
        }
        body, h1, h2, h3, h4, h5, h6, p, a, th, td, label {
    color: orange; /* Set text color to orange for various elements */
}

/* Additional styles for navigation links */
.nav-links li a {
    color: #fff; /* Set navigation link text color to white */
}

.nav-links li a:hover {
    color: #ffcc00; /* Set navigation link text color to yellow on hover */
}

    </style>
</head>
<body>
<nav>
        <div class="logo-container">
            <img src="../../media/logoone.jpg" alt="Logo" style="max-width: 150px; margin-top: -10px;">
        </div>
                <ul class="nav-links">
                    <li><a href="../../backups/logistic.php">logistics</a></li>
                    <li><a href="report.html">Report</a></li>
                </ul>
        <div style="text-align: center;">
            <a href="../../public/user/reset.php" class="btn btn-warning" style="border-color: black;">Reset Password</a>
            <a href="../../public/user/logout.php" class="btn btn-danger mr-3" style="border-color: black;">Log-out</a>
            <a href="../../products/despay.php" class="btn btn-primary">Back to Products</a>
        </div>
</nav>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site that you can sale products you want.</h1>
    
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Product Details</h2>
                        <a href="../inventory/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../../db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM sales";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            // Define the table template
                            $tableTemplate = '
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Retail Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{rows}}
                                    </tbody>
                                </table>
                            ';
                    
                            // Define the row template
                            $rowTemplate = '
                                <tr>
                                    <td>{{sale_id}}</td>
                                    <td>{{sale_name}}</td>
                                    <td>{{sale_details}}</td>
                                    <td>{{sale_retail_price}}</td>
                                    <td>
                                        <a href="../inventory/read.php?sale_id={{sale_id}}" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                        <a href="../inventory/update.php?sale_id={{sale_id}}" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                        <a href="../inventory/delete.php?sale_id={{sale_id}}" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            ';
                    
                            // Populate the rows using the row template
                            $rows = '';
                            while ($row = $result->fetch()) {
                                $rowHtml = str_replace(
                                    array('{{sale_id}}', '{{sale_name}}', '{{sale_details}}', '{{sale_retail_price}}'),
                                    array($row['sale_id'], $row['sale_name'], $row['sale_details'], $row['sale_retail_price']),
                                    $rowTemplate
                                );
                                $rows .= $rowHtml;
                            }
                    
                            // Replace the rows placeholder in the table template with the actual rows
                            echo str_replace('{{rows}}', $rows, $tableTemplate);
                            
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