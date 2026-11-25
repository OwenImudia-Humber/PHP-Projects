<?php
  require_once('database.php');

// Retrieve all categories
$query = 'SELECT * FROM categories';
$statement = $db->prepare($query);
$statement->execute();

$categories = $statement->fetchAll();

// Get selected category ID
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

// Default to the first category if none is selected
if (!$category_id && !empty($categories)) {
    $category_id = $categories[0]['category_id'];
}

// Retrieve items for the selected category
$query = 'SELECT * FROM inventory WHERE category_id = :category_id';
$statement = $db->prepare($query);
$statement->execute(['category_id' => $category_id]);

$items = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Catalog</title>
</head>
<body>

<h1>Inventory Catalog</h1>

<h2>Select Category</h2>

<?php foreach ($categories as $category) : ?>
    <a href="?category_id=<?php echo $category['category_id']; ?>">
        <?php echo htmlspecialchars($category['category_name']); ?>
    </a>
    &nbsp;
<?php endforeach; ?>

<h2>Items</h2>

<a href="add-item.php?category_id=<?php echo $category_id; ?>">
    Add New Item
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Asset Tag</th>
        <th>Model Name</th>
        <th>Daily Fee</th>
        <th>Action</th>
    </tr>

    <?php foreach ($items as $item) : ?>
    <tr>
        <td><?php echo htmlspecialchars($item['asset_tag']); ?></td>

        <td><?php echo htmlspecialchars($item['model_name']); ?></td>

        <td><?php echo htmlspecialchars($item['daily_fee']); ?></td>

        <td>
            <form action="delete-item.php" method="post">

                <input type="hidden" name="item_id"
                       value="<?php echo $item['item_id']; ?>">

                <input type="hidden" name="category_id"
                       value="<?php echo $item['category_id']; ?>">

                <button type="submit">Delete</button>

            </form>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>