<?php
session_start();

// Function to remove an item from the cart based on its ID
function removeFromCart($itemId)
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cartItem) {
            if ($cartItem['id'] == $itemId) {
                // Remove the item from the cart
                unset($_SESSION['cart'][$key]);
                // Reindex the array to avoid gaps in the array keys
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break; // Exit the loop once the item is found and removed
            }
        }
    }
}

// Check confirm to remove from cart
// Check if the "OK" button is clicked and an item ID is provided
if (isset($_POST['okButton']) && isset($_POST['itemId'])) {
    // Get the item ID from the POST data
    $itemId = $_POST['itemId'];

    // Call the function to remove the item from the cart
    removeFromCart($itemId);

    // Optional: Send a response to confirm the removal (e.g., echo "Item removed successfully";)
    echo "Item removed successfully";
    exit; // Ensure that no other content is sent
} else {
    // Optional: Handle cases where the parameters are not provided
    echo "Invalid request";
    exit;
}
?>