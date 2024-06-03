<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body {
            background-image: url('https://source.unsplash.com/1600x900/?nature,abstract');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .error {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-4">sale</h2>
        <form action="conformation.php" method="POST" onsubmit="return validateForm()">
           
            <div class="form-group">
                <input type="text" class="form-control" id="product" name="product" placeholder="product " required>
                <span class="error" id="product_error"></span> <!-- Error message for first name -->
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="description" name="description" placeholder="description of the product" required>
                <span class="error" id="description_error"></span> <!-- Error message for last name -->
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="price" name="price" placeholder="producta price" required>
                <span class="error" id="price_error"></span> <!-- Error message for phone number -->
            </div>
            <div class="form-group">
                <input  class="form-control" id="img" name="img" placeholder="img" required>
                
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity" required>
                <span class="error" id="quantity_error"></span> <!-- Error message for age -->
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="../products/desplay.php" class="btn btn-danger ml-2">Cancel</a>
        </form>
    </div>

   
</body>
</html>