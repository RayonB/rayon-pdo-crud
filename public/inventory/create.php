<?php
// Include config file
require_once "../../db/config.php";
 
// Define variables and initialize with empty values
$product_name = $product_details = $product_retail_price = $product_date_added = $product_updated_date = "";
$product_name_err = $product_details_err = $product_retail_price_err = $product_date_added_err = $product_updated_date_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["product_name"]);
    if(empty($input_name)){
        $product_name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_name_err = "Please enter a valid name.";
    } else{
        $product_name = $input_name;
    }
    
    // Validate address
    $input_product_details = trim($_POST["product_details"]);
    if(empty($input_product_details)){
        $product_details_err = "Please enter product details.";     
    } else{
        $product_details = $input_product_details;
    }
    
    // Validate salary
    $input_product_retail_price = trim($_POST["product_retail_price"]);
    if(empty($input_product_retail_price)){
        $product_retail_price_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_product_retail_price)){
        $product_retail_price_err = "Please enter a positive integer value.";
    } else{
        $product_retail_price = $input_product_retail_price;
    }
    
    // Validate product date
    $input_product_date_added = trim($_POST["product_date_added"]);
    if(empty($input_product_date_added)){
        $product_date_added_err = "Please enter the date added.";     
    } elseif(!strtotime($input_product_date_added)){
        $product_date_added_err = "Please enter a valid date.";
    } else{
        $product_date_added = date('Y-m-d', strtotime($input_product_date_added));
    }

    // Validate product updated
    $input_product_updated_date = trim($_POST["product_updated_date"]);
    if(empty($input_product_updated_date)){
        $product_updated_date_err = "Please enter the updated date.";     
    } elseif(!strtotime($input_product_updated_date)){
        $product_updated_date_err = "Please enter a valid date.";
    } else{
        $product_updated_date = date('Y-m-d', strtotime($input_product_updated_date));
    }

    // Check input errors before inserting in database
    if(empty($product_name_err) && empty($product_details_err) && empty($product_retail_price_err) && empty($product_date_added_err) && empty($product_updated_date_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (product_name, product_details, product_retail_price, product_date_added, product_updated_date) VALUES (:product_name, :product_details, :product_retail_price, :product_date_added, :product_updated_date)";
        
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":product_name", $param_product_name);
            $stmt->bindParam(":product_details", $param_product_details);
            $stmt->bindParam(":product_retail_price", $param_product_retail_price);
            $stmt->bindParam(":product_date_added", $param_product_date_added);
            $stmt->bindParam(":product_updated_date", $param_product_updated_date);
            
            // Set parameters
            $param_product_name = $product_name;
            $param_product_details = $product_details;
            $param_product_retail_price = $product_retail_price;
            $param_product_date_added = $product_date_added;
            $param_product_updated_date = $product_updated_date;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../user/dashboard.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
            background-color: rgba(0, 0, 0, 0.5); /* Background color with opacity */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .form-group label {
            color: #fff; /* Label text color */
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.2); /* Input background color with opacity */
            color: #fff; /* Input text color */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button background color */
            border-color: #007bff; /* Primary button border color */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Primary button background color on hover */
            border-color: #0056b3; /* Primary button border color on hover */
        }
        .btn-secondary {
            background-color: #6c757d; /* Secondary button background color */
            border-color: #6c757d; /* Secondary button border color */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Secondary button background color on hover */
            border-color: #5a6268; /* Secondary button border color on hover */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control <?php echo (!empty($product_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_name; ?>">
                            <span class="invalid-feedback"><?php echo $product_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Details</label>
                            <textarea name="product_details" class="form-control <?php echo (!empty($product_details_err)) ? 'is-invalid' : ''; ?>"><?php echo $product_details; ?></textarea>
                            <span class="invalid-feedback"><?php echo $product_details_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Retail Price</label>
                            <input type="text" name="product_retail_price" class="form-control <?php echo (!empty($product_retail_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_retail_price; ?>">
                            <span class="invalid-feedback"><?php echo $product_retail_price_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Date Added</label>
                            <input type="text" name="product_date_added" class="form-control <?php echo (!empty($product_date_added_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_date_added; ?>">
                            <span class="invalid-feedback"><?php echo $product_date_added_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Updated Date</label>
                            <input type="text" name="product_updated_date" class="form-control <?php echo (!empty($product_updated_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_updated_date; ?>">
                            <span class="invalid-feedback"><?php echo $product_updated_date_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../user/dashboard.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
