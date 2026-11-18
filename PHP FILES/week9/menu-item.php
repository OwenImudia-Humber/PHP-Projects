<?php

$item_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($item_id !== false && $item_id !== null && $item_id > 0) {

    setcookie(
        'recent_item',
        $item_id,
        time() + (30 * 24 * 60 * 60),
        '/'
    );

    echo "You are viewing menu item #" . htmlspecialchars((string)$item_id);

} else {
    echo "Invalid menu item ID.";
}
?>