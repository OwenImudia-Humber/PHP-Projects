<?php
require_once('database.php');

// Retrieve categories
$query = 'SELECT * FROM categories';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();

// Get selected category
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Item</title>
</head>
<body>

<h1>Add New Inventory Item</h1>

<form action="save-item.php" method="post">

    <label>Category:</label>
    <select name="category_id" required>
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['category_id']; ?>"
                <?php if ($category_id == $category['category_id']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($category['category_name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Asset Tag:</label>
    <input type="text" name="asset_tag" maxlength="10" required>

    <br><br>

    <label>Model Name:</label>
    <input type="text" name="model_name" maxlength="255" required>

    <br><br>

    <label>Daily Fee:</label>
    <input type="number" name="daily_fee" min="0" step="0.01" required>

    <br><br>

    <button type="submit">Add Item</button>

</form>

<br>
<a href="catalog.php">Back to Catalog</a>

</body>
</html>
