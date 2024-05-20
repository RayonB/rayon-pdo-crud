<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body {
            font: 14px sans-serif;
            text-align: center;
            background-image: url('https://source.unsplash.com/random/1920x1080'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 120vh; /* Adjust to full viewport height */
            margin: 0;
            padding-top: 0px; /* Adjust to center content */
        }
        .wrapper{
            width: 1300px; /* Increased width */
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.6); /* Background color with opacity */
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.9);
        }
        h1 {
            font: 50px sans-serif;
            color: #16016b ;
            background-color: rgba(255, 255, 255, 0.5);
            padding-top: 0px;
            padding: 5px;
            border-radius: 10px;
        }
        table tr td:last-child{
            width: 150px;
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
