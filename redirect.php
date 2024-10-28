<?php
// Database configuration
$host = 'localhost';
$dbname = 'url_shortener';
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $stmt = $pdo->prepare("SELECT original_url FROM urls WHERE short_code = ?");
    $stmt->execute([$code]);
    $originalUrl = $stmt->fetchColumn();
    
    if ($originalUrl) {
        header("Location: $originalUrl");
        exit();
    } else {
        echo "URL not found.";
    }
} else {
    echo "No code provided.";
}
?>
