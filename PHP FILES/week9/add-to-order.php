<?php

session_start();

$item_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_GET, 'quantity', FILTER_VALIDATE_INT);

if (
    $item_id === false || $item_id === null || $item_id <= 0 ||
    $quantity === false || $quantity === null || $quantity <= 0
) {
    exit("Invalid item ID or quantity.");
}

if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = [];
}

if (isset($_SESSION['order'][$item_id])) {

    $_SESSION['order'][$item_id] += $quantity;

} else {

    $_SESSION['order'][$item_id] = $quantity;

}

echo "Item #" . $item_id . " added to your order. Quantity: " . $_SESSION['order'][$item_id];

?>