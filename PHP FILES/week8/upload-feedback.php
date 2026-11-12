<?php
$feedbackDirectory = __DIR__ . '/feedback';

if (!isset($_FILES['feedback_file']['error'])) {
    http_response_code(400);
    exit('No feedback file was submitted.');
}

if ($_FILES['feedback_file']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    exit('The upload failed. Please choose a file and try again.');
}

$originalName = basename($_FILES['feedback_file']['name']);
$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

if (!in_array($extension, ['txt', 'csv'], true)) {
    http_response_code(400);
    exit('Only .txt and .csv feedback files are allowed.');
}

$destinationName = $originalName;
$destinationPath = $feedbackDirectory . '/' . $destinationName;
$nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
$suffix = 1;

while (file_exists($destinationPath)) {
    $destinationName = $nameWithoutExtension . '-' . $suffix . '.' . $extension;
    $destinationPath = $feedbackDirectory . '/' . $destinationName;
    $suffix++;
}

if (!move_uploaded_file($_FILES['feedback_file']['tmp_name'], $destinationPath)) {
    http_response_code(500);
    exit('Unable to save the uploaded feedback file.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Uploaded</title>
</head>
<body>
    <p>Feedback file uploaded as <?= htmlspecialchars($destinationName, ENT_QUOTES, 'UTF-8') ?>.</p>
    <p><a href="list-feedback.php">View all feedback files</a></p>
</body>
</html>
