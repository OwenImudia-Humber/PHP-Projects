<?php

$recent_item = filter_input(INPUT_COOKIE, 'recent_item', FILTER_VALIDATE_INT);

if ($recent_item !== false && $recent_item !== null && $recent_item > 0) {

    echo "Welcome back! Your last viewed menu item was #" . htmlspecialchars((string)$recent_item);

} else {

    echo "Welcome! Feel free to browse our menu.";

}

?>
