<?php
$studentName = filter_input(INPUT_POST, 'student_name', FILTER_UNSAFE_RAW);
$sessionTime = filter_input(INPUT_POST, 'session_time', FILTER_UNSAFE_RAW);
$format = filter_input(INPUT_POST, 'format', FILTER_UNSAFE_RAW);
$addons = filter_input(INPUT_POST, 'addons', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$instructorQuestion = filter_input(INPUT_POST, 'instructor_question', FILTER_UNSAFE_RAW);

if ($studentName === null || $studentName === false) {
    $studentName = '';
}
if ($sessionTime === null || $sessionTime === false) {
    $sessionTime = '';
}
if ($format === null || $format === false || $format === '') {
    $format = 'No format selected';
}
if (!is_array($addons)) {
    $addons = [];
}
if ($instructorQuestion === null || $instructorQuestion === false) {
    $instructorQuestion = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Confirmation</title>
</head>
<body>
    <main>
        <h1>Signup Confirmation</h1>
        <p>Thank you, <?= htmlspecialchars($studentName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>.</p>
        <p>Session time: <?= htmlspecialchars($sessionTime, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
        <p>Preferred format: <?= htmlspecialchars($format, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>

        <h2>Optional add-ons</h2>
        <?php if (count($addons) > 0): ?>
            <ul>
                <?php foreach ($addons as $addon): ?>
                    <li><?= htmlspecialchars((string) $addon, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No add-ons selected.</p>
        <?php endif; ?>

        <h2>Question for the instructor</h2>
        <p><?= nl2br(htmlspecialchars($instructorQuestion, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')) ?></p>
    </main>
</body>
</html>
