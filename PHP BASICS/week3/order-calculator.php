<?php
echo "<h1>Order calculator</h1>";

$product_name ="Banana";
$unit_price = 3;
$quantity= 50;
$customer_type = "A";
$subtotal = $unit_price * $quantity;

echo "<p>Product: " . $product_name . "</p>";
echo "<p>Unit Price: $" . $unit_price . "</p>";
echo "<p>Quantity: " . $quantity . "</p>";
echo "<p>Subtotal: $" . $subtotal . "</p>";

if ($subtotal >= 200){
    $discount = $subtotal * 0.15;
    $final_total = $subtotal - $discount;
    echo "<p>After discount: $" . $final_total . "</p>";
}
elseif($subtotal>=100){
    $discount = $subtotal * 0.10;
    $final_total = $subtotal - $discount;
    echo "<p>After discount: $" . $final_total . "</p>";
}
else{
    echo $final_total;
}
switch ($customer_type) {
    case "A":
        $customer_message = "Regular Customer";
        break;
    case "B":
        $customer_message = "Premium Customer";
        break;
    case "C":
        $customer_message = "Business Customer";
        break;
    default:
        $customer_message = "Unknown Customer";
}
echo "Customer Type: " . $customer_message . "<br><br>";

echo "Table of 5:<br>";
for ($i = 1; $i <= 10; $i++) {
    echo "5 x " . $i . " = " . (5 * $i) . "<br>";
}
?>