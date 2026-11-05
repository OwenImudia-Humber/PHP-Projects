<?php

$productName = "Notebook";
$quantity = 3;
$unitPrice = 12.50;
$isAvailable = true;
const TAX_RATE = 0.08;

$subtotal = $quantity * $unitPrice;
$tax = $subtotal * TAX_RATE;
$finalTotal = $subtotal + $tax;

$changedQuantity = 5;
$changedSubtotal = $changedQuantity * $unitPrice;
$changedTax = $changedSubtotal * TAX_RATE;
$changedFinalTotal = $changedSubtotal + $changedTax;

// Debugging record: I removed the semicolon after the $finalTotal assignment.
// PHP lint reported an unexpected "return" token, so I restored the semicolon.
// The two regular test cases below make the calculation easy to check.
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product Summary</title>
</head>
<body>
	<h1>Product Summary</h1>
	<p><strong>Product:</strong> <?= $productName ?></p>
	<p><strong>Quantity:</strong> <?= $quantity ?></p>
	<p><strong>Unit price:</strong> $<?= $unitPrice ?></p>
	<p><strong>Availability:</strong> <?= $isAvailable ? "Available" : "Unavailable" ?></p>
	<p><strong>Subtotal:</strong> $<?= $subtotal ?></p>
	<p><strong>Tax (<?= TAX_RATE * 100 ?>%):</strong> $<?= $tax ?></p>
	<p><strong>Final total:</strong> $<?= $finalTotal ?></p>

	<h2>Calculation tests</h2>
	<p>Typical value (quantity <?= $quantity ?>): expected $40.5, actual $<?= $finalTotal ?></p>
	<p>Changed quantity (quantity <?= $changedQuantity ?>): expected $67.5, actual $<?= $changedFinalTotal ?></p>
</body>
</html>

