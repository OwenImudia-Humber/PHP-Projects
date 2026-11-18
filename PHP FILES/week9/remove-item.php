<?php

session_start();

$item_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($item_id === false || $item_id === null || $item_id <= 0) {

    exit("Invalid item ID.");

}

if (isset($_SESSION['order'][$item_id])) {

    unset($_SESSION['order'][$item_id]);

    echo "Item #" . $item_id . " has been removed from your order.";

} else {

    echo "Item not found in your order.";

}

?>
