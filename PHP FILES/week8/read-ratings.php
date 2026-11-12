<?php
$filePath = __DIR__ . '/feedback/ratings.csv';
$file = fopen($filePath, 'r');

if ($file === false) {
    http_response_code(500);
    exit('Unable to open the ratings file.');
}

$headers = fgetcsv($file, 0, ',', '"', '\\');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Ratings</title>
</head>
<body>
    <h1>Session Ratings</h1>
    <?php if ($headers !== false): ?>
        <table>
            <thead>
                <tr>
                    <?php foreach ($headers as $header): ?>
                        <th><?= htmlspecialchars($header, ENT_QUOTES, 'UTF-8') ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php while (($row = fgetcsv($file, 0, ',', '"', '\\')) !== false): ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>The ratings file is empty.</p>
    <?php endif; ?>
    <?php fclose($file); ?>
</body>
</html>
