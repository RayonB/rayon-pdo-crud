<?php
// Include config file
require_once '../../db/config.php';

// Define variables and initialize with empty values
$name = $description = $price = $rrp = $quantity = $img =  $date_added = $updated_date ="";
$name_err = $description_err = $price_err = $rrp_err = $quantity_err = $img_err = $date_added_err = $updated_date_err ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $product_name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
   // Validate description
   $input_description = trim($_POST["description"]);
   if (empty($input_description)) {
       $description_err = "Please enter a description.";
   } else {
       $description = $input_description;
   }

   // Validate price
   $input_price = trim($_POST["price"]);
   if (empty($input_price)) {
       $price_err = "Please enter the price.";
   } elseif (!is_numeric($input_price)) {
       $price_err = "Please enter a valid price.";
   } else {
       $price = $input_price;
   }

   // Validate RRP
   $input_rrp = trim($_POST["rrp"]);
   if (!is_numeric($input_rrp)) {
       $rrp_err = "Please enter a valid RRP.";
   } else {
       $rrp = $input_rrp;
   }

   // Validate quantity
   $input_quantity = trim($_POST["quantity"]);
   if (empty($input_quantity)) {
       $quantity_err = "Please enter the quantity.";
   } elseif (!ctype_digit($input_quantity)) {
       $quantity_err = "Please enter a positive integer value for quantity.";
   } else {
       $quantity = $input_quantity;
   }

   // Validate image
   $input_img = trim($_POST["img"]);
   if (empty($input_img)) {
       $img_err = "Please enter the image URL.";
   } else {
       $img = $input_img;
   }

    // Validate date_added
    $input_date_added = trim($_POST["date_added"]);
    if(empty($input_date_added)){
        $date_added_err = "Please enter the date added.";     
    } elseif(!strtotime($input_date_added)){
        $date_added_err = "Please enter a valid date.";
    } else{
        $date_added = date('Y-m-d', strtotime($input_date_added));
    }

    // Validate updated_date
    $input_updated_date = trim($_POST["updated_date"]);
    if(empty($input_updated_date)){
        $updated_date_err = "Please enter the updated date.";     
    } elseif(!strtotime($input_updated_date)){
        $updated_date_err = "Please enter a valid date.";
    } else{
        $updated_date = date('Y-m-d', strtotime($input_updated_date));
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($description_err) && empty($price_err) && empty($rrp_err) && empty($quantity_err) && empty($img_err) && empty($date_added_err) && empty( $updated_date_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (name, description, price, rrp, quantity, img, date_added, updated_date) VALUES (:name, :description, :price, :rrp, :quantity, :img, :date_added, :updated_date)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":rrp", $rrp);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":img", $img);
            $stmt->bindParam(":date added", $date_added);
            $stmt->bindParam(":updated date", $updated_date);
           
            // Set parameters
            $param_name = $name;
            $param_description = $description;
            $param_price = $price;
            $param_rrp = $rrp;
            $param_quantity = $quantity;
            $param_img = $img;
            $param_date_added = $date_added;
            $param_updated_date = $updated_date;
            
                       // Attempt to execute the prepared statement
                       if ($stmt->execute()) {
                        // Records created successfully. Redirect to landing page
                        header("location: ../index.php");
                        exit();
                    } else {
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
    <title>Create Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://source.unsplash.com/random/1920x1080'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 115vh; /* Adjust to full viewport height */
            margin: 0;
            padding-top: 0px; /* Adjust to center content */
            color: #fff; /* Text color */
        }
        .wrapper{
            width: 850px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.8); /* Background color with opacity */
            border-radius: 5px;
            padding: 1px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
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
                <h2 class="mt-5">Create Product</h2>
                <p>Please fill this form and submit to add a new product to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                            <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                        <span class="invalid-feedback"><?php echo $price_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Recommended Retail Price</label>
                        <input type="text" name="rrp" class="form-control <?php echo (!empty($rrp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rrp; ?>">
                        <span class="invalid-feedback"><?php echo $rrp_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
                        <span class="invalid-feedback"><?php echo $quantity_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="text" name="img" class="form-control <?php echo (!empty($img_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $img; ?>">
                        <span class="invalid-feedback"><?php echo $img_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Date Added</label>
                        <input type="text" name="date_added" class="form-control <?php echo (!empty($date_added_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date_added; ?>">
                        <span class="invalid-feedback"><?php echo $date_added_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Updated Date</label>
                        <input type="text" name="updated_date" class="form-control <?php echo (!empty($updated_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $updated_date; ?>">
                        <span class="invalid-feedback"><?php echo $updated_date_err; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="../products.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
