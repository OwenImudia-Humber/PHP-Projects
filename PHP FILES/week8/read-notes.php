<?php
$filePath = __DIR__ . '/feedback/session-notes.txt';
$file = fopen($filePath, 'r');

if ($file === false) {
    http_response_code(500);
    exit('Unable to open the session notes file.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Notes</title>
</head>
<body>
    <h1>Session Notes</h1>
    <ul>
        <?php
        while (($line = fgets($file)) !== false) {
            $note = trim($line);

            if ($note === '' || str_starts_with($note, '#')) {
                continue;
            }

            echo '<li>' . htmlspecialchars($note, ENT_QUOTES, 'UTF-8') . '</li>';
        }

        fclose($file);
        ?>
    </ul>
</body>
</html>
