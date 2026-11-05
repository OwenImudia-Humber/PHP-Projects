<?php

require_once 'Insurable.php';
require_once 'Vehicle.php';
require_once 'Car.php';
require_once 'Motorcycle.php';

$car = new Car('Toyota', 'Camry', 65, 5);
$motorcycle = new Motorcycle('Harley-Davidson', 'Street 750', 85, true);

$vehicles = [$car, $motorcycle];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental System</title>
</head>
<body>
    <h1>Vehicle Rental System</h1>

    <?php foreach ($vehicles as $vehicle): ?>
        <section>
            <p>Make: <?= htmlspecialchars($vehicle->getMake(), ENT_QUOTES, 'UTF-8') ?></p>
            <p>Model: <?= htmlspecialchars($vehicle->getModel(), ENT_QUOTES, 'UTF-8') ?></p>
            <p>Category: <?= htmlspecialchars($vehicle->getCategory(), ENT_QUOTES, 'UTF-8') ?></p>
            <p>Daily Rate: $<?= htmlspecialchars((string) $vehicle->getDailyRentalRate(), ENT_QUOTES, 'UTF-8') ?></p>
            <p>Insurance Cost: $<?= htmlspecialchars((string) $vehicle->getInsuranceCost(), ENT_QUOTES, 'UTF-8') ?></p>

            <?php if ($vehicle instanceof Car): ?>
                <p>Seats: <?= htmlspecialchars((string) $vehicle->getSeats(), ENT_QUOTES, 'UTF-8') ?></p>
            <?php elseif ($vehicle instanceof Motorcycle): ?>
                <p>Special License Required: <?= $vehicle->getSpecialLicenseRequired() ? 'Yes' : 'No' ?></p>
            <?php endif; ?>
        </section>
        <hr>
    <?php endforeach; ?>
</body>
</html>