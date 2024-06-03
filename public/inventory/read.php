<?php
// Check existence of id parameter before processing further
if(isset($_GET["sale_id"]) && !empty(trim($_GET["sale_id"]))){
    // Include config file
    require_once "../../db/config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM sales WHERE sale_id = :sale_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":sale_id", $param_sale_id);
        
        // Set parameters
        $param_sale_id = trim($_GET["sale_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
                $sale_name = $row["sale_name"];
                $sale_details = $row["sale_details"];
                $sale_retail_price = $row["sale_retail_price"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../public/error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../public/error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1 class="mt-5 mb-3">View Product Record</h1>
                    <div class="form-group">
                        <label> sale Product Name</label>
                        <p><b><?php echo $row["sale_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>sale Product Details</label>
                        <p><b><?php echo $row["sale_details"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label> sale Retail Price</label>
                        <p><b><?php echo $row["sale_retail_price"]; ?></b></p>
                    </div>
                    <p><a href="../user/sale.php" class="btn btn-primary">Back</a></p>

                </div>
            </div>        
        </div>
    </div>
</body>
</html>