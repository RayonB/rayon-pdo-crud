<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once $_SERVER['DOCUMENT_ROOT'] . "/qtest/db/config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM products WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: ../products.php");
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
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../public/error.php");
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
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../index.php" class="btn btn-secondary ml-2">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
