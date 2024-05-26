<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "x"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any additional styling here -->
</head>
<body>
    <div class="container">
        <h1>Products</h1>
        <div class="row">
            <?php
            // Check if products exist
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row["product_image"] . '" class="card-img-top" alt="' . $row["product_name"] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["product_name"] . '</h5>';
                    echo '<p class="card-text">' . $row["product_details"] . '</p>';
                    echo '<p class="card-text">Price: ' . $row["product_retail_price"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No products found";
            }
            ?>
        </div>
    </div>
</body>
</html>
