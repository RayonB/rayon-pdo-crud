<?php
// Process delete operation after confirmation
if(isset($_POST["sale_id"]) && !empty($_POST["sale_id"])){
    // Include config file
    require_once "../../db/config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM sales WHERE sale_id = :sale_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":sale_id", $param_sale_id);
        
        // Set parameters
        $param_sale_id = trim($_POST["sale_id"]);
        
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
    if(empty(trim($_GET["sale_id"]))){
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
        .wrapper{
            width: 600px;
            margin: 0 auto;
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
                            <input type="hidden" name="sale_id" value="<?php echo trim($_GET["sale_id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../user/sale.php" class="btn btn-secondary ml-2">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>