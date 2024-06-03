<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body {
            background-color: white; /* Updated background color to black */
            color: black; /* Set text color to orange */
        }

        .container {
            border: 2px solid black; /* Yellow border */
             /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 60px;
            margin-top: 30px; /* Add some space from the top */
        }

        .form-group {
            margin-bottom: 20px; /* Add space between form elements */
        }

        label {
            color: black; /* Set label text color to orange */
        }

        .btn-primary, .btn-danger {
            padding: 10px 20px; /* Padding for buttons */
            font-size: 16px; /* Font size for buttons */
          /* Rounded corners for buttons */
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
            border: 2px solid black; /* Yellow border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 40px;
            margin-top: 50px; /* Add some space from the top */
        }

        .form-group {
            margin-bottom: 20px; /* Add space between form elements */
        }

        label {
            color: black; /* Set label text color to orange */
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-4">Enter Your Address</h2>
        <form action="userinfo.php" method="POST" onsubmit="return validateForm()">
            <!-- Add a hidden input field for user ID -->
            <input type="hidden" name="user_id" value="1"> <!-- Assuming logged in user has ID 1. Modify this based on your login system. -->
            <div class="form-group">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                <span class="error" id="first_name_error"></span> <!-- Error message for first name -->
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                <span class="error" id="last_name_error"></span> <!-- Error message for last name -->
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                <span class="error" id="phone_number_error"></span> <!-- Error message for phone number -->
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
                <span class="error" id="age_error"></span> <!-- Error message for age -->
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="../products/despay.php" class="btn btn-danger ml-2">Cancel</a>
        </form>
    </div>

    <script>
        function validateForm() {
            var firstName = document.getElementById('first_name').value;
            var lastName = document.getElementById('last_name').value;
            var phoneNumber = document.getElementById('phone_number').value;
            var age = document.getElementById('age').value;

            var firstNameError = document.getElementById('first_name_error');
            var lastNameError = document.getElementById('last_name_error');
            var phoneNumberError = document.getElementById('phone_number_error');
            var ageError = document.getElementById('age_error');

            var isValid = true;

            // Validation for First Name
            if (firstName.trim() === '') {
                firstNameError.textContent = 'Please enter your first name';
                isValid = false;
            } else {
                firstNameError.textContent = '';
            }

            // Validation for Last Name
            if (lastName.trim() === '') {
                lastNameError.textContent = 'Please enter your last name';
                isValid = false;
            } else {
                lastNameError.textContent = '';
            }

            // Validation for Phone Number
            if (!phoneNumber.match(/^\d{11}$/)) {
                phoneNumberError.textContent = 'Please enter a valid phone number';
                isValid = false;
            } else {
                phoneNumberError.textContent = '';
            }

            // Validation for Age
            if (isNaN(age) || age < 0 || age > 150) {
                ageError.textContent = 'Please enter a valid age';
                isValid = false;
            } else {
                ageError.textContent = '';
            }

            return isValid;
        }
    </script>
</body>
</html>