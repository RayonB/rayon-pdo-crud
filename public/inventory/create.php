<?php
// Include config file
require_once "../../db/config.php";
 
// Define variables and initialize with empty values
$sale_name = $sale_details = $sale_retail_price = "";
$sale_name_err = $sale_details_err = $sale_retail_price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["sale_name"]);
    if(empty($input_name)){
        $sale_name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $sale_name_err = "Please enter a valid name.";
    } else{
        $sale_name = $input_name;
    }
    
    // Validate address
    $input_sale_details = trim($_POST["sale_details"]);
    if(empty($input_sale_details)){
        $sale_details_err = "Please enter product details.";     
    } else{
        $sale_details = $input_sale_details;
    }
    
    // Validate salary
    $input_sale_retail_price = trim($_POST["sale_retail_price"]);
    if(empty($input_sale_retail_price)){
        $sale_retail_price_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_sale_retail_price)){
        $sale_retail_price_err = "Please enter a positive integer value.";
    } else{
        $sale_retail_price = $input_sale_retail_price;
    }
    
    // Check input errors before inserting in database
    if(empty($sale_name_err) && empty($sale_details_err) && empty($sale_retail_price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sales (sale_name, sale_details, sale_retail_price) VALUES (:sale_name, :sale_details, :sale_retail_price)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":sale_name", $param_sale_name);
            $stmt->bindParam(":sale_details", $param_sale_details);
            $stmt->bindParam(":sale_retail_price", $param_sale_retail_price);
            
            // Set parameters
            $param_sale_name = $sale_name;
            $param_sale_details = $sale_details;
            $param_sale_retail_price = $sale_retail_price;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../user/sale.php");
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
        .wrapper{
            width: 600px;
            margin: 0 auto;
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
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>sale product Name</label>
                            <input type="text" name="sale_name" class="form-control <?php echo (!empty($sale_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sale_name; ?>">
                            <span class="invalid-feedback"><?php echo $sale_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>sale product Details</label>
                            <textarea name="sale_details" class="form-control <?php echo (!empty($sale_details_err)) ? 'is-invalid' : ''; ?>"><?php echo $sale_details; ?></textarea>
                            <span class="invalid-feedback"><?php echo $sale_details_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Retail Price</label>
                            <input type="text" name="sale_retail_price" class="form-control <?php echo (!empty($sale_retail_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sale_retail_price; ?>">
                            <span class="invalid-feedback"><?php echo $sale_retail_price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../user/sale.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>