
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RayonEva_Shop</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid rgb(214, 36, 36);
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #65ee9a;
        }
        .add-to-cart-btn {
            background-color: #1363cc;
            color: rgb(255, 255, 255);
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .product-img {
            max-width: 100px;
            max-height: 100px;
        }
        .top-right-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .top-left-buttons {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .payment-options {
            display: none;
        }
        #totalPrice {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .button-group {
            margin-top: 20px;
        }
        .button-group button {
            margin-right: 10px;
        }
        .chat-box {
            display: none;
            position: fixed;
            bottom: 0;
            right: 30px;
            width: 300px;
            height: 400px;
            background-color: #882929;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
        }
        .chat-box-header {
            background-color: #df9f9f;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .chat-box-header h3 {
            margin: 0;
            font-size: 16px;
        }
        .chat-box-body {
            padding: 10px;
            height: 320px;
            overflow-y: scroll;
        }
        .chat-box-body p {
            margin: 5px 0;
        }
        .chat-box-footer {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .chat-box-footer input[type="text"] {
            width: 70%;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin-right: 5px;
        }
        .chat-box-footer button {
            padding: 5px 10px;
            border-radius: 3px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <hr><center>
        <h1 style="color: rgb(74, 22, 158); text-decoration-style: solid;">Rayon Store</h1>
    <hr></center>
    <div class="top-left-buttons"></div>
    <button onclick="togglePaymentOptions()">Payment & Accounting</button>
<div class="payment-options">
        <button onclick="processPaymentAndAccounting('GCash')">GCash</button>
        <button onclick="processPaymentAndAccounting('Cash On Delivery')">Cash On Delivery</button>
</div>
<div class="top-left-buttons"></div>
            <button onclick="toggleLogisticsOptions()">Logistics</button>
        <div class="logistics-options">    
                <button onclick="processLogistics('Tracking Items')">Tracking Items</button>
        </div>
            <button onclick="openCustomerService()">Customer Service</button>
            <button onclick="openReport()">Report</button>
        </div>
</head>
<body>
    <div class="top-right-buttons"></div>
    <h2>Products</h2>
    <div class="product-container">
        <div class="product-item">
            <img src="https://imgs.search.brave.com/UYzUrhuChhP4NHv-_vL17BZeRhGkDtt0y0mKgYntaXE/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9jOG4u/dHJhZGVsaW5nLmNv/bS9pbWcvcGxhaW4v/cGltL3JzOmF1dG86/ODAwOjowL2Y6d2Vi/cC9xOjk1L3VwLzVl/ZTg3NGMxOGUwZDUz/MDAxYmZmNjA5NS8x/NjU5NjRiMzM0NmQ2/YmIwNWEwYTNjN2E3/ZGQ1N2RiNy5qcGc" alt="Product 1" class="product-img">
            <div>Birch Tree 300g</div>
            <div>"100% pure cow's milk with no added sugar, no added preservatives."</div>
            <div>216.00</div>
            <div>Exp: "2027-02-14"</div>
            <button class="add-to-cart-btn" onclick="addToCart('Birch Tree 300g', 216)">Add to Cart</button>
        </div>
    <div class="product-item">
            <img src="https://imgs.search.brave.com/xcIFo3Nh6BNLzlhTYEU4SsOztNLESwkxIZWP5pejn9U/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NDFIajgzQm9yMkwu/anBn" alt="Product 2" class="product-img">
            <div>Nescafe Classic</div>
            <div>"Beverage brewed from roasted coffee beans."</div>
            <div>138.00</div>
            <div>Exp: "2027-02-14"</div>
            <button class="add-to-cart-btn" onclick="addToCart('Nescafe Classic', 138)">Add to Cart</button>
        </div>
    <div class="product-item">
            <img src="https://imgs.search.brave.com/B9ewEiffTOoTiX_oNI5ulotG5PRtxv1HpnvpPpmm5N0/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9jaGVm/c2FuZGJha2Vyc3Bo/LmNvbS9jZG4vc2hv/cC9wcm9kdWN0cy9C/Uk9XTlNVR0FSMUtH/LmpwZz92PTE1OTc2/NjI0MzM" alt="Product 3" class="product-img">
            <div>Brown Sugar 1kg</div>
            <div>"All sweet carbohydrates."</div>
            <div>100</div>
            <div>Exp: "2027-02-14"</div>
            <button class="add-to-cart-btn" onclick="addToCart('Brown Sugar 1kg', 100)">Add to Cart</button>
        </div>
    <div class="product-item">
            <img src="https://imgs.search.brave.com/21zkxb__HldMe0EFla4Md1MCFhY538qLW_PGYVdW96M/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/bGFkeXNjaG9pY2Uu/Y29tLnBoL3NrLWV1/L2NvbnRlbnQvZGFt/L2JyYW5kcy9sYWR5/X3NfY2hvaWNlL3Bo/aWxpcHBpbmVzLzE1/MTU1ODMtbGMtaGFt/LTQ3MG1sLWphci5w/bmcucmVuZGl0aW9u/LjM4MC4zODAucG5n" alt="Product 4" class="product-img">
            <div>Choice Ham Sandwich Spread (220ml Pouch)</div>
            <div>"A spread and salad dressing condiment brand owned by Unilever."</div>
            <div>127</div>
            <div>Exp: "2027-02-14"</div>
            <button class="add-to-cart-btn" onclick="addToCart('Choice Ham Sandwich Spread (220ml Pouch)', 127)">Add to Cart</button>
        </div>
    <div class="product-item">
            <img src="https://imgs.search.brave.com/JonF02D9tLwvoAG2mqrPyZpBbqZyiI8yWs0_yB0Lujk/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMtbmEuc3NsLWlt/YWdlcy1hbWF6b24u/Y29tL2ltYWdlcy9J/LzcxV0RocDIrR1VM/LmpwZw" alt="Product 5" class="product-img">
            <div>Nutella</div>
            <div>"Nutella is a creamy and sweet dessert spread made from hazelnuts and cocoa."</div>
            <div>243</div>
            <div>Exp: "2029-02-14"</div>
            <button class="add-to-cart-btn" onclick="addToCart('Nutella', 243)">Add to Cart</button>
        </div>
    <div class="product-item">
        <img src="https://imgs.search.brave.com/iR8yrWh0DQzxjq5JsGVrDIiO2yXnkpPF0AEyz_IlQwE/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90YXN0/ZXNiZXR0ZXJmcm9t/c2NyYXRjaC5jb20v/d3AtY29udGVudC91/cGxvYWRzLzIwMjAv/MDMvQnJlYWQtUmVj/aXBlLTUtMi5qcGc" alt="Product 6" class="product-img">
        <div>Loaf Bread </div>
        <div>"Made of flour or meal that moistened, kneaded, and sometimes fermented."</div>
        <div>118</div>
        <div>Exp: "2026-10-09"</div>
        <button class="add-to-cart-btn" onclick="addToCart('Loaf Bread', 118)">Add to Cart</button>
    </div>
        <!-- Add more product items here -->
        
    <h2>Cart</h2>
    <table id="cartTable">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="cartBody">
            <!-- Cart items will be added here dynamically -->
        </tbody>
    </table>
    <div id="totalPrice"></div>

    <div class="button-group">
        <button onclick="buyItems()">Buy</button>
        <button onclick="cancelPurchase()">Cancel</button>
    </div>
    
    <div class="chat-box" id="chatBox">
        <div class="chat-box-header" onclick="toggleChatBox()">
            <h3>Customer Service Chat</h3>
            <button onclick="contactSeller()">Contact Seller</button>
        </div>
        <div class="chat-box-body" id="chatBody">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="chat-box-footer">
            <input type="text" id="chatInput" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
            <button onclick="cancelChat()">Cancel</button>
        </div>
    </div>

    <script>
        var totalPrice = 0;
        function addToCart(name, price) {
            var cartBody = document.getElementById("cartBody");
            var newRow = document.createElement("tr");
            var nameCell = document.createElement("td");
            nameCell.textContent = name;
            newRow.appendChild(nameCell);

            var quantityCell = document.createElement("td");
            quantityCell.textContent = 1;
            newRow.appendChild(quantityCell);

            var priceCell = document.createElement("td");
            priceCell.textContent = "$" + price.toFixed(2);
            newRow.appendChild(priceCell);

            cartBody.appendChild(newRow);

            // Update total price
            totalPrice += price;
            updateTotalPrice();
        }

        function updateTotalPrice() {
            document.getElementById("totalPrice").textContent = "Total Price: $" + totalPrice.toFixed(2);
        }

        function togglePaymentOptions() {
            var paymentOptions = document.querySelector('.payment-options');
            if (paymentOptions.style.display === "none") {
                paymentOptions.style.display = "block";
            } else {
                paymentOptions.style.display = "none";
            }
        }
        function processPaymentAndAccounting(paymentMethod) {
            // Implement payment functionality
            alert("Processing Payment...");
            // Add track my order functionality
            var paymentoforder = prompt("Enter the number of account:");
            if (paymentoforder) {
                alert("Payment your order at: " + paymentoforder);
            }
        }

        function toggleLogisticsOptions() {
            var logisticsOptions = document.querySelector('.logistics-options');
            if (logisticsOptions.style.display === "none") {
                logisticsOptions.style.display = "block";
            } else {
                logisticsOptions.style.display = "none";
            }
        }

        function processLogistics(logisticsMethod) {
            // Implement logistic functionality
            alert("Processing Logistic...");
            // Add track my order functionality
            var orderTrackingLink = prompt("Enter the order tracking link:");
            if (orderTrackingLink) {
                alert("Tracking your order at: " + orderTrackingLink);
            }
        }

        function openCustomerService() {
            var chatBox = document.getElementById("chatBox");
            if (chatBox.style.display === "none") {
                chatBox.style.display = "block";
            } else {
                chatBox.style.display = "none";
            }
        }

        function openReport() {
            // Implement report functionality
            alert("Opening Report...");
        }

        function buyItems() {
            // Implement buy items functionality
            alert("Buying Items...");

            // Clear the cart and reset total price
            var cartBody = document.getElementById("cartBody");
            while (cartBody.firstChild) {
                cartBody.removeChild(cartBody.firstChild);
            }
            totalPrice = 0;
            updateTotalPrice();
        }

        function toggleChatBox() {
              var chatBox = document.getElementById("chatBox");
                 if (chatBox.style.display === "none") {
                     chatBox.style.display = "block";
                 } else {
                     chatBox.style.display = "none";
        }
    }

        function sendMessage() {
             var message = document.getElementById("chatInput").value.trim();
               if (message !== "") {
             var chatBody = document.getElementById("chatBody");
             var messageElement = document.createElement("p");
                 messageElement.textContent = "You: " + message;
                      chatBody.appendChild(messageElement);
                      document.getElementById("chatInput").value = "";
        }
   }
        function cancelChat() {
            var chatBox = document.getElementById("chatBox");
            chatBox.style.display = "none";
   }

        function contactSeller() {
            // Add your logic to contact the seller here
            alert("Contacting Seller...");
    }
    
    </script>
</body>
</html> 
