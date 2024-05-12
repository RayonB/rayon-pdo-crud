<?php
// Process delete operation after confirmation
if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
    // Include config file
    require_once "../../db/config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM products WHERE product_id = :product_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":product_id", $param_product_id);
        
        // Set parameters
        $param_product_id = trim($_POST["product_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: ../user/dashboard.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter
    if(empty(trim($_POST["product_id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../user/error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://source.unsplash.com/random/1920x1080'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Adjust to full viewport height */
            margin: 0;
            padding-top: 40px; /* Adjust to center content */
            color: #fff; /* Text color */
        }
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .alert {
            background-color: rgba(255, 255, 255, 0.2); /* Alert background color with opacity */
            color: #fff; /* Text color */
            border-color: #dc3545; /* Alert border color */
        }
        .btn-danger {
            background-color: #dc3545; /* Danger button background color */
            border-color: #dc3545; /* Danger button border color */
        }
        .btn-danger:hover {
            background-color: #c82333; /* Danger button background color on hover */
            border-color: #bd2130; /* Danger button border color on hover */
        }
        .btn-secondary {
            background-color: #6c757d; /* Secondary button background color */
            border-color: #6c757d; /* Secondary button border color */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Secondary button background color on hover */
            border-color: #545b62; /* Secondary button border color on hover */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="product_id" value="<?php echo trim($_POST["product_id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../user/dashboard.php" class="btn btn-secondary ml-2">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
