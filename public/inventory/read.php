<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once $_SERVER['DOCUMENT_ROOT'] . "/qtest/db/config.php";

    
 // Prepare a select statement
 $sql = "SELECT * FROM products WHERE id = :id";
    
 if($stmt = $pdo->prepare($sql)){
     // Bind variables to the prepared statement as parameters
     $stmt->bindParam(":id", $param_id);
     
     // Set parameters
     $param_id = trim($_GET["id"]);
     
     // Attempt to execute the prepared statement
     if($stmt->execute()){
         if($stmt->rowCount() == 1){
             // Fetch result row as an associative array
             $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field values
                $product_name = $row["name"];
                $product_details = $row["description"];
                $product_price = $row["price"];
                $product_rrp = $row["rrp"];
                $product_quantity = $row["quantity"];
                $product_img = $row["img"];
                $date_added = $row["date_added"];
                $product_updated_date = $row["updated_date"];
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
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://source.unsplash.com/random/1920x1080'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 80vh; /* Adjust to full viewport height */
            margin: 0;
            padding-top: 50px; /* Adjust to center content */
        }
        .wrapper{
            width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Background color with opacity */
            padding: 0px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        p {
            margin-bottom: 20px;
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
                        <label>Product Name</label>
                        <p><b><?php echo htmlspecialchars($product_name); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Product Details</label>
                        <p><b><?php echo htmlspecialchars($product_details); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p><b><?php echo htmlspecialchars($product_price); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>RRP</label>
                        <p><b><?php echo htmlspecialchars($product_rrp); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <p><b><?php echo htmlspecialchars($product_quantity); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <p><b><?php echo htmlspecialchars($product_img); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date Added</label>
                        <p><b><?php echo htmlspecialchars($date_added); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Updated Date</label>
                        <p><b><?php echo htmlspecialchars($updated_date); ?></b></p>
                    </div>
                    <p><a href="../products.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
