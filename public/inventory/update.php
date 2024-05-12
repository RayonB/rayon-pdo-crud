<?php
// Include config file
require_once "../../db/config.php";
 
// Define variables and initialize with empty values
$product_name = $product_details = $product_retail_price = $product_date_added = $product_updated_date = "";
$product_name_err = $product_details_err = $product_retail_price_err = $product_date_added_err = $product_updated_date_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
    // Get hidden input value
    $product_id = $_POST["product_id"];
    
    // Validate name
    $input_product_name = trim($_POST["product_name"]);
    if(empty($input_product_name)){
        $product_name_err = "Please enter a name.";
    } elseif(!filter_var($input_product_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_name_err = "Please enter a valid name.";
    } else{
        $product_name = $input_product_name;
    }
    
    // Validate product details
    $input_product_details = trim($_POST["product_details"]);
    if(empty($input_product_details)){
        $product_details_err = "Please enter product details.";     
    } else{
        $product_details = $input_product_details;
    }
    
    // Validate product retail price
    $input_product_retail_price = trim($_POST["product_retail_price"]);
    if(empty($input_product_retail_price)){
        $product_retail_price_err = "Please enter the retail price amount.";     
    } elseif(!ctype_digit($input_product_retail_price)){
        $product_retail_price_err = "Please enter a positive integer value.";
    } else{
        $product_retail_price = $input_product_retail_price;
    }

     // Validate product date added
     $input_product_date_added = trim($_POST["product_date_added"]);
     if(empty($input_product_date_added)){
         $product_date_added_err = "Please enter the date added.";     
     } elseif(!strtotime($input_product_date_added)){
         $product_date_added_err = "Please enter a valid date.";
     } else{
         $product_date_added = date('Y-m-d', strtotime($input_product_date_added));
     }

     // Validate product updated date
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
        // Prepare an update statement
        $sql = "UPDATE products SET product_name=:product_name, product_details=:product_details, product_retail_price=:product_retail_price, product_date_added=:product_date_added, product_updated_date=:product_updated_date WHERE product_id=:product_id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":product_name", $param_product_name);
            $stmt->bindParam(":product_details", $param_product_details);
            $stmt->bindParam(":product_retail_price", $param_product_retail_price);
            $stmt->bindParam(":product_id", $param_product_id);
            $stmt->bindParam(":product_date_added", $param_product_date_added);
            $stmt->bindParam(":product_updated_date", $param_product_updated_date);
            
            // Set parameters
            $param_product_name = $product_name;
            $param_product_details = $product_details;
            $param_product_retail_price = $product_retail_price;
            $param_product_id = $product_id;
            $param_product_date_added = $product_date_added;
            $param_product_updated_date = $product_updated_date;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
        // Get URL parameter
        $product_id =  trim($_GET["product_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE product_id = :product_id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":product_id", $param_product_id);
            
            // Set parameters
            $param_product_id = $product_id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $product_name = $row["product_name"];
                    $product_details = $row["product_details"];
                    $product_retail_price = $row["product_retail_price"];
                    $product_date_added = $row["product_date_added"];
                    $product_updated_date = $row["product_updated_date"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../user/error.php");
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
    }  else{
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
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://source.unsplash.com/random/1920x1080'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Adjust to full viewport height */
            margin: 0;
            padding-top: 0px; /* Adjust to center content */
        }
        .wrapper{
            width: 700px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Background color with opacity */
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .modal-footer .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .modal-footer .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Update Record</h2>
                    <p>Please edit the input values and submit to update the product record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="product_name" class="form-control <?php echo (!empty($product_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_name; ?>">
                            <span class="invalid-feedback"><?php echo $product_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Details</label>
                            <textarea name="product_details" class="form-control <?php echo (!empty($product_details_err)) ? 'is-invalid' : ''; ?>"><?php echo $product_details; ?></textarea>
                            <span class="invalid-feedback"><?php echo $product_details_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Retail Price</label>
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
                        
                        <!-- Initialize product id -->
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveUpdateChangesModal">Save Changes</button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="saveUpdateChangesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Save changes?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="../user/dashboard.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>

    <!-- Additional Bootstrap Dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
