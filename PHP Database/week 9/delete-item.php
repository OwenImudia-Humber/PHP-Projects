<?php
require_once('database.php');

// Retrieve and validate submitted values
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Validate item ID
if ($item_id === false || $item_id === null || $item_id <= 0) {
    exit('Invalid item ID.');
}

// Validate category ID
if ($category_id === false || $category_id === null || $category_id <= 0) {
    exit('Invalid category ID.');
}

try {
    // Delete selected inventory item
    $query = 'DELETE FROM inventory
              WHERE item_id = :item_id
              AND category_id = :category_id';

    $statement = $db->prepare($query);

    $statement->execute([
        'item_id' => $item_id,
        'category_id' => $category_id
    ]);

    // Return to catalog for the same category
    header("Location: catalog.php?category_id=$category_id");
    exit;

} catch (PDOException $e) {
    echo 'Database error: ' . htmlspecialchars($e->getMessage());
}
?>
