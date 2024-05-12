<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://source.unsplash.com/random/1920x1080'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Adjust to full viewport height */
            margin: 0;
            padding-top: 40px; /* Adjust to center content */
            color: #fff; /* Text color */
        }
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .alert {
            background-color: rgba(255, 255, 255, 0.2); /* Alert background color with opacity */
            color: #fff; /* Text color */
            border-color: #dc3545; /* Alert border color */
        }
        .alert a {
            color: #fff; /* Link color */
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
