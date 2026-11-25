<?php
require_once('database.php');

// Retrieve and validate submitted values
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

$asset_tag = trim(filter_input(INPUT_POST, 'asset_tag', FILTER_UNSAFE_RAW) ?? '');

$model_name = trim(filter_input(INPUT_POST, 'model_name', FILTER_UNSAFE_RAW) ?? '');

$daily_fee = filter_input(INPUT_POST, 'daily_fee', FILTER_VALIDATE_FLOAT);

// Validate category ID
if ($category_id === false || $category_id === null || $category_id <= 0) {
    exit('Invalid category ID.');
}

// Validate asset tag
if ($asset_tag === '' || strlen($asset_tag) > 10) {
    exit('Asset tag cannot be empty or longer than 10 characters.');
}

// Validate model name
if ($model_name === '' || strlen($model_name) > 255) {
    exit('Model name cannot be empty or longer than 255 characters.');
}

// Validate daily fee
if ($daily_fee === false || $daily_fee === null || $daily_fee < 0) {
    exit('Daily fee must be a valid non-negative number.');
}

try {
    // Insert new inventory item
    $query = 'INSERT INTO inventory
              (category_id, asset_tag, model_name, daily_fee)
              VALUES
              (:category_id, :asset_tag, :model_name, :daily_fee)';

    $statement = $db->prepare($query);

    $statement->execute([
        'category_id' => $category_id,
        'asset_tag' => $asset_tag,
        'model_name' => $model_name,
        'daily_fee' => $daily_fee
    ]);

    // Return to catalog for the selected category
    header("Location: catalog.php?category_id=$category_id");
    exit;

} catch (PDOException $e) {
    echo 'Database error: ' . htmlspecialchars($e->getMessage());
}
?>
