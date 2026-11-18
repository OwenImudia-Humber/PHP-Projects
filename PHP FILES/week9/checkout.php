<?php

session_start();

session_regenerate_id(true);

if (!empty($_SESSION['order'])) {

    echo "Your order has been finalized successfully.";

    unset($_SESSION['order']);

} else {

    echo "Your order is empty. Nothing to checkout.";

}

?>
