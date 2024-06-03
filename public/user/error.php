<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://www.publicdomainpictures.net/pictures/270000/velka/coffee-beans-background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .wrapper {
            width: 600px;
            margin: 50px auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            color: #ffdd57;
        }
        .alert {
            background-color: rgba(255, 0, 0, 0.8);
            border: none;
        }
        .alert-link {
            color: #ffdd57;
            text-decoration: underline;
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
