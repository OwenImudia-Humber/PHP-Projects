<?php

session_start();

if (empty($_SESSION['order'])) {

    echo "Your order is currently empty.";

} else {

    echo "<h2>Your Current Order</h2>";

    foreach ($_SESSION['order'] as $item_id => $quantity) {

        echo "Item #" . htmlspecialchars((string)$item_id);
        echo " - Quantity: " . htmlspecialchars((string)$quantity);
        echo "<br>";

    }

}

?>
