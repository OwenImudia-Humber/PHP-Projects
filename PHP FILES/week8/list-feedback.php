<?php
$feedbackDirectory = __DIR__ . '/feedback';
$files = scandir($feedbackDirectory);

if ($files === false) {
    http_response_code(500);
    exit('Unable to read the feedback directory.');
}

$files = array_filter($files, static function ($fileName) use ($feedbackDirectory) {
    return $fileName !== '.' &&
        $fileName !== '..' &&
        is_file($feedbackDirectory . '/' . $fileName);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Files</title>
</head>
<body>
    <h1>Feedback Files</h1>
    <ul>
        <?php foreach ($files as $fileName): ?>
            <li><?= htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
