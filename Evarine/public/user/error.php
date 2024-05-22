<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('your-background-image.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; /* Text color */
        }
        .wrapper {
            width: 600px;
            margin: 0 auto;
            padding-top: 50px; /* Adjust top padding to center content vertically */
        }
        .container-fluid {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background color */
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            color: #fff; /* Header text color */
        }
        .alert {
            color: #fff; /* Alert text color */
            background-color: #dc3545; /* Alert background color */
            border-color: #dc3545; /* Alert border color */
        }
        .alert-link {
            color: #fff; /* Alert link color */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Invalid Request</h2>
                    <div class="alert alert-danger">Sorry, you've made an invalid request. Please <a href="index.php" class="alert-link">go back</a> and try again.</div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>