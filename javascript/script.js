var slideIndex = 0;
  showSlides();

  function showSlides() {
    var slides = document.getElementsByClassName("slides");
    for (var i = 0; i < slides.length; i++) {
      slides[i].classList.remove("active");
    }
    slideIndex++;
    if (slideIndex >= slides.length) {slideIndex = 0}
    slides[slideIndex].classList.add("active");

    setTimeout(showSlides, 5000); // Change image every 5 seconds
  }

  function prevSlide() {
    var slides = document.getElementsByClassName("slides");
    slideIndex--;
    if (slideIndex < 0) {slideIndex = slides.length - 1}
    for (var i = 0; i < slides.length; i++) {
      slides[i].classList.remove("active");
    }
    slides[slideIndex].classList.add("active");
  }

  function nextSlide() {
    var slides = document.getElementsByClassName("slides");
    slideIndex++;
    if (slideIndex >= slides.length) {slideIndex = 0}
    for (var i = 0; i < slides.length; i++) {
      slides[i].classList.remove("active");
    }
    slides[slideIndex].classList.add("active");
  }
  function openModal(title, description, price, imgUrl) {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    // Populate modal content with product details
    document.getElementById("modal-title").innerText = title;
    document.getElementById("modal-description").innerText = description;
    document.getElementById("modal-price").innerText = "Price: " + price;
    document.getElementById("modal-img").src = imgUrl;

    // Reset quantity input to 1
    document.getElementById("quantity").value = 1;

    // Calculate total price with default quantity
    calculateTotal();
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}




  let totalPrice = 0; // Global variable to store the total price

  function openModal(title, description, price, imgUrl) {
    // Update modal content with product details
    document.getElementById("modal-title").textContent = title;
    document.getElementById("modal-description").textContent = description;
    document.getElementById("modal-price").textContent = price;
    document.getElementById("modal-img").src = imgUrl;

    // Show the modal
    document.getElementById("myModal").style.display = "block";

    // Calculate and display total price
    calculateTotalPrice();
  }

  function closeModal() {
    // Close the modal
    document.getElementById("myModal").style.display = "none";
  }

  function calculateTotalPrice() {
    let quantity = parseInt(document.getElementById("quantity").value);
    let price = parseFloat(document.getElementById("modal-price").textContent.replace(/[^\d.]/g, '')); // Remove non-numeric characters
    totalPrice = quantity * price;
    document.getElementById("total-price").textContent = "Total Amount: ₱" + totalPrice.toFixed(2); // Display total price
  }

  // Attach event listener to the quantity input field
  document.getElementById("quantity").addEventListener("change", calculateTotalPrice);





    var originalData = {};

    function openPurchaseModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";

        var purchaseModal = document.getElementById("purchaseModal");
        purchaseModal.style.display = "block";
    }

    function closePurchaseModal() {
        var purchaseModal = document.getElementById("purchaseModal");
        purchaseModal.style.display = "none";

        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    function openClarificationModal() {
        var purchaseModal = document.getElementById("purchaseModal");
        purchaseModal.style.display = "none";
        var clarificationModal = document.getElementById("clarificationModal");
        clarificationModal.style.display = "block";

        // Populate clarification modal with data from myModal and purchaseModal
        document.getElementById("clarification-title").innerText = document.getElementById("modal-title").innerText;
        document.getElementById("clarification-description").innerText = document.getElementById("modal-description").innerText;
        document.getElementById("clarification-price").innerText = document.getElementById("modal-price").innerText;
        document.getElementById("clarification-name").innerText = document.getElementById("name").value;
        document.getElementById("clarification-address").innerText = document.getElementById("address").value;
        document.getElementById("clarification-contact").innerText = document.getElementById("contact").value;

        // Store original data
        originalData.title = document.getElementById("clarification-title").innerText;
        originalData.description = document.getElementById("clarification-description").innerText;
        originalData.price = document.getElementById("clarification-price").innerText;
        originalData.name = document.getElementById("clarification-name").innerText;
        originalData.address = document.getElementById("clarification-address").innerText;
        originalData.contact = document.getElementById("clarification-contact").innerText;
    }

    function editData() {
        // Enable editing of input fields
        document.getElementById("clarification-title").contentEditable = true;
        document.getElementById("clarification-description").contentEditable = true;
        document.getElementById("clarification-price").contentEditable = true;
        document.getElementById("clarification-name").contentEditable = true;
        document.getElementById("clarification-address").contentEditable = true;
        document.getElementById("clarification-contact").contentEditable = true;
    }

    function confirmPurchase() {
        // Disable editing of input fields
        document.getElementById("clarification-title").contentEditable = false;
        document.getElementById("clarification-description").contentEditable = false;
        document.getElementById("clarification-price").contentEditable = false;
        document.getElementById("clarification-name").contentEditable = false;
        document.getElementById("clarification-address").contentEditable = false;
        document.getElementById("clarification-contact").contentEditable = false;
    }

    function closeClarificationModal() {
        var clarificationModal = document.getElementById("clarificationModal");
        clarificationModal.style.display = "none";
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function openThankYouModal(deliveryDays) {
        document.getElementById('deliveryDays').innerText = deliveryDays;
        document.getElementById('thankYouModal').style.display = 'block';
    }

    function closeThankYouModal() {
        document.getElementById('thankYouModal').style.display = 'none';
    }

    function confirmPurchaseData() {
        // Assuming you have the deliveryDays variable available with the estimated days for delivery
        var deliveryDays = 5; // Example value, replace this with your actual delivery days

        // Close the clarification modal
        closeClarificationModal();

        // Open the "Thank You" modal
        openThankYouModal(deliveryDays);
    }

    function openEditModal() {
        var editModal = document.getElementById("editModal");
        editModal.style.display = "block";
    
        // Populate edit modal with previous data
        document.getElementById("edit-title").value = originalData.title;
        document.getElementById("edit-description").value = originalData.description;
        document.getElementById("edit-price").value = originalData.price;
        document.getElementById("edit-name").value = originalData.name;
        document.getElementById("edit-address").value = originalData.address;
        document.getElementById("edit-contact").value = originalData.contact;
    }
    
    function closeEditModal() {
        var editModal = document.getElementById("editModal");
        editModal.style.display = "none";
    }

    function editData() {
    // Hide the clarification modal
    var clarificationModal = document.getElementById("clarificationModal");
    clarificationModal.style.display = "none";

    // Show the edit modal
    var editModal = document.getElementById("editModal");
    editModal.style.display = "block";

    // Populate edit modal with current data from clarification modal
    document.getElementById("edit-title").value = document.getElementById("clarification-title").innerText;
    document.getElementById("edit-description").value = document.getElementById("clarification-description").innerText;
    document.getElementById("edit-price").value = document.getElementById("clarification-price").innerText;
    document.getElementById("edit-name").value = document.getElementById("clarification-name").innerText;
    document.getElementById("edit-address").value = document.getElementById("clarification-address").innerText;
    document.getElementById("edit-contact").value = document.getElementById("clarification-contact").innerText;
}

function confirmEdit() {
    // Update the content of the clarification modal with the edited data
    document.getElementById("clarification-title").innerText = document.getElementById("edit-title").value;
    document.getElementById("clarification-description").innerText = document.getElementById("edit-description").value;
    document.getElementById("clarification-price").innerText = document.getElementById("edit-price").value;
    document.getElementById("clarification-name").innerText = document.getElementById("edit-name").value;
    document.getElementById("clarification-address").innerText = document.getElementById("edit-address").value;
    document.getElementById("clarification-contact").innerText = document.getElementById("edit-contact").value;

    // Hide the edit modal
    var editModal = document.getElementById("editModal");
    editModal.style.display = "none";

    // Show the clarification modal
    var clarificationModal = document.getElementById("clarificationModal");
    clarificationModal.style.display = "block";
}
function openClarificationModal() {
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var contact = document.getElementById("contact").value;

    // Check if any of the fields are empty
    if (name.trim() === '' || address.trim() === '' || contact.trim() === '') {
        alert("Please fill in all the fields.");
        return;
    }

    // Check if contact number contains only numeric characters
    if (!/^\d+$/.test(contact)) {
        alert("Contact number should contain only numbers.");
        return;
    }

    // Proceed to open clarification modal if all input is valid
    openClarificationModalWithData();
}

function openClarificationModalWithData() {
    var purchaseModal = document.getElementById("purchaseModal");
    purchaseModal.style.display = "none";
    var clarificationModal = document.getElementById("clarificationModal");
    clarificationModal.style.display = "block";

    // Populate clarification modal with data from purchaseModal
    document.getElementById("clarification-title").innerText = document.getElementById("modal-title").innerText;
    document.getElementById("clarification-description").innerText = document.getElementById("modal-description").innerText;
    document.getElementById("clarification-price").innerText = document.getElementById("modal-price").innerText;
    document.getElementById("clarification-name").innerText = document.getElementById("name").value;
    document.getElementById("clarification-address").innerText = document.getElementById("address").value;
    document.getElementById("clarification-contact").innerText = document.getElementById("contact").value;
}

function openModal(title, description, price, imgUrl) {
  // Update modal content with product details
  document.getElementById("modal-title").textContent = title;
  document.getElementById("modal-description").textContent = description;
  document.getElementById("modal-price").textContent = price;
  document.getElementById("modal-img").src = imgUrl;

  // Set hidden input values for purchase form
  document.getElementById("productName").value = title;
  document.getElementById("description").value = description;
  document.getElementById("price").value = price;
  
  // Show the modal
  document.getElementById("myModal").style.display = "block";

  // Calculate and display total price
  calculateTotalPrice();
}

function closeModal() {
  // Close the modal
  document.getElementById("myModal").style.display = "none";
}

function calculateTotalPrice() {
  let quantity = parseInt(document.getElementById("quantity").value);
  let price = parseFloat(document.getElementById("modal-price").textContent.replace(/[^\d.]/g, '')); // Remove non-numeric characters
  let totalPrice = quantity * price;
  document.getElementById("total-price").textContent = "Total Amount: ₱" + totalPrice.toFixed(2); // Display total price
}


// script for payment
function validateForm() {
  var cardNumber = document.getElementById('card_number').value;
  var expiryDate = document.getElementById('expiry_date').value;
  var cvv = document.getElementById('cvv').value;
  var amount = document.getElementById('amount').value;

  var cardError = document.getElementById('card_error');
  var expiryError = document.getElementById('expiry_error');
  var cvvError = document.getElementById('cvv_error');
  var amountError = document.getElementById('amount_error');

  var isValid = true;

  if (!cardNumber.match(/^\d{16}$/)) {
      cardError.textContent = 'Invalid card number (must be 16 digits)';
      isValid = false;
  } else {
      cardError.textContent = '';
  }

  if (!expiryDate.match(/(0[1-9]|1[0-2])\/\d{4}/)) {
      expiryError.textContent = 'Invalid expiry date (format: MM/YYYY)';
      isValid = false;
  } else {
      expiryError.textContent = '';
  }

  if (!cvv.match(/^\d{3}$/)) {
      cvvError.textContent = 'Invalid CVV (must be 3 digits)';
      isValid = false;
  } else {
      cvvError.textContent = '';
  }

  if (!amount.match(/^\d+(\.\d{2})?$/)) {
      amountError.textContent = 'Invalid amount';
      isValid = false;
  } else {
      amountError.textContent = '';
  }

  return isValid;
}

   



