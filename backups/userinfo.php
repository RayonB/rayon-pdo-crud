<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get POST data
    $user_id = 1; // Assuming you have the user ID from session or other method
    $firt_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
   
    

    // Prepare SQL statement to insert into database
    $sql = "INSERT INTO user_info (user_id, first_name, last_name, phone_number, age) VALUES (:user_id, :first_name, :last_name, :phone_number, :age)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':first_name', $firt_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':age', $age);

    // Execute the statement
    $stmt->execute();

    // Redirect to a confirmation page or back to the product list
    header("Location: address.php");
    exit(); // Terminate script execution after redirection
} catch(PDOException $e) {
    // Display error message
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
