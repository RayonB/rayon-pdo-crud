<?php
// Database connection

$host = 'localhost';
$dbname = 'u593341949_db_rayon';
$username = 'u593341949_dev_rayon';
$password = '20221086Rayon';


try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Start session
    session_start();

    // Check if user is logged in
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        // Retrieve user ID from session
        $user_id = $_SESSION["id"];

        // Get POST data
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal_code = $_POST['postal_code'];
        $country = $_POST['country'];

        // Prepare SQL statement to insert into database
        $sql = "INSERT INTO addresses (user_id, street, city, state, postal_code, country) VALUES (:user_id, :street, :city, :state, :postal_code, :country)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':country', $country);

        // Execute the statement
        $stmt->execute();

        // Redirect to a confirmation page or back to the product list
        header("Location: payment_form.html");
        exit(); // Terminate script execution after redirection
    } else {
        // If user is not logged in, handle accordingly
        echo "User is not logged in.";
    }
} catch(PDOException $e) {
    // Display error message
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
