        <?php
        // Initialize the session
        session_start();
        
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: ../../index.php");
            exit;
        }
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Welcome</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="../../supports/css/dashboard.css">
            <link rel="stylesheet" href="../../supports/css/products.css">
            <link rel="stylesheet" href="../../supports/css/model.css">
        </head>
        <body>
        <nav>
        <div class="logo-container">
            <img src="../../media/logoone.jpg" alt="Logo" style="max-width: 150px; margin-top: -10px;">
        </div>


                <ul class="nav-links">
                    <li><a href="index.html">Product Inventory</a></li>
                    <li><a href="payment.html">Payment</a></li>
                    <li><a href="logistics.html">logistics</a></li>
                    <li><a href="Customer Service.html">Customer Service</a></li>
                    <li><a href="report.html">Report</a></li>
                </ul>
                <div style="text-align: center;">
            <a href="./reset.php" class="btn btn-warning" style="border-color: black;">Reset Password</a>
            <a href="./logout.php" class="btn btn-danger mr-3" style="border-color: black;">Log-out</a>
            <a href="./details.php" class="btn">View Purchases</a>
        </div>

            </nav>
            <hr>
            <div class="slideshow-container">
        <img class="slides fade" src="../../media/luffy-ace-sabo.webp" alt="Image 1">
        <img class="slides fade" src="../../media/luffy.jpg" alt="Image 2">
        <img class="slides fade" src="../../media/nami-roben.webp" alt="Image 3">
        <img class="slides fade" src="../../media/pirate.jpg" alt="Image 4">
        <img class="slides fade" src="../../media/roben.jpg" alt="Image 5">
        <div class="navigation">
            <button onclick="prevSlide()">Prev</button>
            <button onclick="nextSlide()">Next</button>
        </div>
        </div>





        <?php
// Include config file
require_once "../../db/config.php";
 
// Define variables and initialize with empty values
$product_name = $product_details = $product_retail_price = "";
$product_name_err = $product_details_err = $product_retail_price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["product_name"]);
    if(empty($input_name)){
        $product_name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_name_err = "Please enter a valid name.";
    } else{
        $product_name = $input_name;
    }
    
    // Validate address
    $input_product_details = trim($_POST["product_details"]);
    if(empty($input_product_details)){
        $product_details_err = "Please enter product details.";     
    } else{
        $product_details = $input_product_details;
    }
    
    // Validate salary
    $input_product_retail_price = trim($_POST["product_retail_price"]);
    if(empty($input_product_retail_price)){
        $product_retail_price_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_product_retail_price)){
        $product_retail_price_err = "Please enter a positive integer value.";
    } else{
        $product_retail_price = $input_product_retail_price;
    }
    
    // Check input errors before inserting in database
    if(empty($product_name_err) && empty($product_details_err) && empty($product_retail_price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (product_name, product_details, product_retail_price) VALUES (:product_name, :product_details, :product_retail_price)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":product_name", $param_product_name);
            $stmt->bindParam(":product_details", $param_product_details);
            $stmt->bindParam(":product_retail_price", $param_product_retail_price);
            
            // Set parameters
            $param_product_name = $product_name;
            $param_product_details = $product_details;
            $param_product_retail_price = $product_retail_price;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../user/dashboard.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>



        
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="product-img" src="" alt="Product Image" id="modal-img">
                <div class="product-info">
                    <h2 id="modal-title"></h2>
                    <p id="modal-description"></p>
                    <p id="modal-price"></p>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" value="1" min="1">
                    <p id="total-price">Total Amount: </p>
                    <button class="btn btn-buy" id="buyBtn" onclick="openPurchaseModal()">Buy</button>
                    <button class="btn btn-cancel" onclick="closeModal()">Cancel</button>
                </div>
            </div>
        </div>


        <div id="clarificationModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeClarificationModal()">&times;</span>
                <div class="clarification-info">
                    <h2>Details</h2>
                    <p><strong>Product:</strong> <span id="clarification-title"></span></p>
                    <p><strong>Description:</strong> <span id="clarification-description"></span></p>
                    <p><strong>Price:</strong> <span id="clarification-price"></span></p>
                    <h2>Purchase Details</h2>
                    <p><strong>Name:</strong> <span id="clarification-name"></span></p>
                    <p><strong>Address:</strong> <span id="clarification-address"></span></p>
                    <p><strong>Contact Number:</strong> <span id="clarification-contact"></span></p>
                    <button class="btn btn-edit" onclick="editData()">Edit</button>

                    <button class="btn btn-confirm" onclick="confirmPurchaseData()">Confirm</button>

                    <button class="btn btn-cancel" onclick="closeClarificationModal()">Cancel</button>
                </div>
            </div>
        </div>

        <div id="editModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <div class="edit-info">
                    <h2>Edit Details</h2>
                    <label for="edit-title">Product:</label>
                    <input type="text" id="edit-title">
                    <label for="edit-description">Description:</label>
                    <textarea id="edit-description"></textarea>
                    <label for="edit-price">Price:</label>
                    <input type="text" id="edit-price">
                    <label for="edit-name">Name:</label>
                    <input type="text" id="edit-name">
                    <label for="edit-address">Address:</label>
                    <input type="text" id="edit-address">
                    <label for="edit-contact">Contact Number:</label>
                    <input type="text" id="edit-contact">
                    <hr>
                    <button class="btn btn-confirm" onclick="confirmEdit()">Confirm Edit</button>
                    <button class="btn btn-cancel" onclick="closeEditModal()">Cancel</button>
                </div>
            </div>
        </div>


        <div id="purchaseModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closePurchaseModal()">&times;</span>
                <div class="purchase-info">





                
                    <h2>Enter Your Details</h2>
                    <label for="name">Name:</label>
                   
                    <input type="text" id="name">
                    <label for="address">Address:</label>
                    <input type="text" id="address">
                    <label for="contact">Contact Number:</label>
                    <input type="text" id="contact">
                    <hr>
                    <button class="btn btn-confirm" onclick="openClarificationModal()">Confirm Purchase</button>
                    <button class="btn btn-cancel" onclick="closePurchaseModal()">Cancel</button>
                </div>
            </div>
        </div>
        <div id="thankYouModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeThankYouModal()">&times;</span>
                <div class="thank-you-info">
                    <h2>Thank You for Your Purchase!</h2>
                    <p>We are grateful that you have chosen to buy our product.</p>
                    <p>Your order will arrive within <span id="deliveryDays"></span> days.</p>
                    <button class="btn btn-ok" onclick="closeThankYouModal()">OK</button>
                </div>
            </div>
        </div>



        <h1 class="my-5" style="font-size: 30px;">Welcome!, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Discover quality products at great prices. Start shopping now!</h1>

            <h1 class="text" style="color: orange; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 60px; text-align: center;">PRODUCTS</h1>
            <hr>
            <hr style="border-top: 3px solid orange;">
        <hr>
        <div class="container-products">
        <div class="product-box">
        <img class="product-img" src="../../productsmedia/luffy.jpg" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2>Monkey D. Luffy</h2>
            <p>Normal form Action figure</p>
            <p>₱6,500.00</p>
            <button class="btn btn-buy" onclick="openModal('Monkey D. Luffy', 'Normal form Action figure', '₱6,500.00', '../../productsmedia/luffy.jpg')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/sanji.jpg" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2>Vinsmoke Sanji</h2>
            <p>flame cooker Action figure</p>
            <p>₱7,800.57</p>
            <button class="btn btn-buy" onclick="openModal('Vinsmoke Sanji', 'flame cooker Action figure', '₱7800.57', '../../productsmedia/sanji.jpg')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/shanks.webp" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2>Red Hair Shanks</h2>
            <p>the captain of the Red Hair Pirates.</p>
            <p>₱8,999.99</p>
            <button class="btn btn-buy" onclick="openModal('Red Hair Shanks', 'the captain of the Red Hair Pirates.', '₱8999.99', '../../productsmedia/shanks.webp')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/zoro.webp" alt="Product Image" style="height: 220px;">
            <div class="product-info">
                
            <h2>Roronoa Zoro </h2>
            <p>Pirate Hunter" Zoro swordsman</p>
            <p>₱97,989.9</p>
            <button class="btn btn-buy" onclick="openModal('Roronoa Zoro', 'Pirate Hunter Zoro swordsman', '₱9989.9', '../../productsmedia/zoro.webp')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/chopper.jpg" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2>TonyX2 Chopper</h2>
            <p>"Cotton Candy Lover" Chopper</p>
            <p>₱6,899.99</p>
            <button class="btn btn-buy" onclick="openModal('TonyX2 Chopper', 'Cotton Candy Lover Chopper', '₱6899.99', '../../productsmedia/chopper.jpg')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/usopp.webp" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2>Usopp</h2>
            <p>Sogeking, the King of Snipers</p>
            <p>₱5,678.00</p>
            <button class="btn btn-buy" onclick="openModal('Usopp', 'Sogeking, the King of Snipers', '₱5678.00', '../../productsmedia/usopp.webp')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/nami.jpg" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2>Nami</h2>
            <p> "Cat Burglar" Nami navigator</p>
            <p>₱10,000.00</p>
            <button class="btn btn-buy" onclick="openModal('Nami', 'Cat Burglar Nami navigator', '₱10000.00', '../../productsmedia/nami.jpg')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/robin.webp" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2 style="font-size: 31px;">Nico Robin</h2>
            <p>"Devil Child Light of the Revolution"</p>
            <p>₱8,978.99</p>
            <button class="btn btn-buy" onclick="openModal('Nico Robin', 'Devil Child Light of the Revolution', '₱8978.99', '../../productsmedia/robin.webp')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div><div class="product-box">
        <img class="product-img" src="../../productsmedia/ace.webp" alt="Product Image" style="height: 220px;">
            <div class="product-info">
            <h2 style="font-size: 27px;">Portgas D. Ace</h2>
            <p>"Fire Fist" Ace</p>
            <p>₱10,099.99</p>
            <button class="btn btn-buy" onclick="openModal('Portgas D. Ace', 'Fire Fist Ace', '₱10099.99', '../../productsmedia/ace.webp')">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div>
        
        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img class="product-img" src="" alt="Product Image" id="modal-img">
            <div class="product-info">
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
            <p id="modal-price"></p>
            <button class="btn btn-buy">Buy</button>
            <button class="btn btn-details">Details</button>
            </div>
        </div>
        </div>


            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-5 mb-3 clearfix">
                                <h2 class="pull-left">Product Details</h2>
                                <a href="../inventory/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
                            </div>
                            <?php
                            // Include config file
                            require_once "../../db/config.php";
        
                            // Attempt select query execution
                            $sql = "SELECT * FROM products";
                            if($result = $pdo->query($sql)){
                                if($result->rowCount() > 0){
                                    // Define the table template
                                    $tableTemplate = '
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Product Description</th>
                                                    <th>Retail Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{rows}}
                                            </tbody>
                                        </table>
                                    ';
                            
                                    // Define the row template
                                    $rowTemplate = '
                                        <tr>
                                            <td>{{product_id}}</td>
                                            <td>{{product_name}}</td>
                                            <td>{{product_details}}</td>
                                            <td>{{product_retail_price}}</td>
                                            <td>
                                                <a href="../inventory/read.php?product_id={{product_id}}" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                                <a href="../inventory/update.php?product_id={{product_id}}" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                                <a href="../inventory/delete.php?product_id={{product_id}}" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                    ';
                            
                                    // Populate the rows using the row template
                                    $rows = '';
                                    while ($row = $result->fetch()) {
                                        $rowHtml = str_replace(
                                            array('{{product_id}}', '{{product_name}}', '{{product_details}}', '{{product_retail_price}}'),
                                            array($row['product_id'], $row['product_name'], $row['product_details'], $row['product_retail_price']),
                                            $rowTemplate
                                        );
                                        $rows .= $rowHtml;
                                    }
                            
                                    // Replace the rows placeholder in the table template with the actual rows
                                    echo str_replace('{{rows}}', $rows, $tableTemplate);
                                    
                                    // Free result set
                                    unset($result);
                                } else{
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                            
                            // Close connection
                            unset($pdo);
                            ?>
                        </div>
                    </div>        
                </div>
            </div>
            <script src="../../javascript/script.js"></script>

        </body>
        </html>