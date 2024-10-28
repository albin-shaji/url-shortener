<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = $_POST['urlInput'];

    // Normalize the URL
    if (!preg_match("~^(http|https)://~", $url)) {
        // If the URL doesn't start with http or https, check if it starts with www
        if (preg_match("~^www\.~", $url)) {
            $url = 'https://' . $url; // Add https:// for URLs starting with www
        } else {
            // Add https:// for any other URL (e.g., abc.com)
            $url = 'https://www.' . $url; // Ensure it has www and use https
        }
    }

    // Generate a random short code
    $shortCode = substr(md5(uniqid()), 0, 6);

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO urls (original_url, short_code) VALUES (?, ?)");
    $stmt->execute([$url, $shortCode]);

    // Store the short URL in the session
    $_SESSION['shortUrl'] = "http://localhost/tiny/$shortCode";

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>
