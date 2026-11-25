
<?php

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=tech_rental_db;charset=utf8mb4';

$username = 'tech_manager';
$password = 'password';

$options = [
    PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {

    $db = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {

    error_log($e->getMessage());

    include('error.php');
    exit();

}
?>
