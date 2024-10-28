<?php
// Start a session to store messages
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="URL Shortener - Easily shorten your long URLs with our user-friendly service.">
    <title>TinyMe - URL Shortener</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* CSS Styles as in your original HTML */
        body { background-color: #f9f9f9; font-family: 'Poppins', sans-serif; }
        .navbar { background-color: #2c87c5; }
        .navbar h1 { font-weight: bolder; font-size: x-large; }
        .navbar .navbar-brand, .navbar .nav-link { color: #ffffff; }
        .navbar .nav-link:hover { color: #f9f9f9; }
        .feature-icon { font-size: 3em; color: #2c87c5; }
        .form-container { background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto; }
        .custom-button { width: 150px; background-color: #2c87c5; border-color: #2c87c5; color: #ffffff; }
        .custom-button:hover { background-color: #1f6d9b; border-color: #1f6d9b; color: #ffffff; }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .brand-part1 {
            color: #ffffff;
        }
        .brand-part2 {
            color: #000000;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-between">
        <h1 class="navbar-brand mb-0">
        <span class="brand-part1">Tiny</span><span class="brand-part2">Me</span>
        </h1>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="form-container">
            <h3 class="text-center mb-3">Shorten Your Links</h3>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="urlForm" action="shorten.php" method="POST">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control mb-3" name="urlInput" placeholder="Paste the URL to shrink" required>
                        </div>
                        <div class="form-group text-center mb-2">
                            <button type="submit" class="btn custom-button" aria-label="Shrink the URL">Shrink it</button>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['shortUrl'])): ?>
                        <div id="shortenedUrl" class="mt-3 text-center" style="font-weight: bolder;">
                            Shortened URL: <a href="<?= $_SESSION['shortUrl'] ?>" target="_blank"><?= $_SESSION['shortUrl'] ?></a>
                        </div>
                        <?php unset($_SESSION['shortUrl']); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4 class="text-center">Simple and fast URL shortener!</h4>
            <p class="text-justify" style="padding: 10px;">TinyMe allows you to shorten long links from <a href="https://www.instagram.com/" target="_blank">Instagram</a>, <a href="https://www.facebook.com/" target="_blank">Facebook</a>, <a href="https://www.youtube.com/" target="_blank">YouTube</a>, <a href="https://www.twitter.com/" target="_blank">Twitter</a>, <a href="https://www.linkedin.com/" target="_blank">LinkedIn</a>, <a href="https://web.whatsapp.com/" target="_blank">WhatsApp</a>, and many more. Just paste the long URL and click the Shrink it button. On the next page, copy the shortened URL and share it on sites, chat, and emails and enjoy.</p>
        </div>

        <div class="mt-5">
            <h4 class="text-center">Shorten, share and track</h4>
            <p class="text-justify" style="padding: 10px;">Your shortened URLs can be used in publications, documents, blogs, advertisements, forums, instant messages, and other locations. Track statistics for your business and projects by monitoring the number of hits from your URL with our click counter.</p>
        </div>

        <div class="row mt-5 text-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <i class="fas fa-thumbs-up feature-icon mb-3"></i>
                <h4>Easy to Use</h4>
                <p class="feature-description">Our user-friendly interface allows anyone to shorten links in just a few clicks, making it accessible for everyone.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <i class="fas fa-link feature-icon mb-3"></i>
                <h4>Shortened Links</h4>
                <p class="feature-description">Transform long, cumbersome URLs into sleek, short links that are easy to share and remember.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <i class="fas fa-shield-alt feature-icon mb-3"></i>
                <h4>Secure</h4>
                <p class="feature-description">Your privacy is our priority. We ensure that your shortened links are secure and protected from unauthorized access.</p>
            </div>
        </div>
        <div class="row mt-4 text-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <i class="fas fa-check-circle feature-icon mb-3"></i>
                <h4>Reliable Service</h4>
                <p class="feature-description">With our 99.9% uptime guarantee, you can count on us to provide a reliable link-shortening service whenever you need it.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <i class="fas fa-desktop feature-icon mb-3"></i>
                <h4>Device Compatibility</h4>
                <p class="feature-description">Our service works seamlessly across all devices, ensuring a smooth experience whether you’re on a phone, tablet, or computer.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <i class="fas fa-lock feature-icon mb-3"></i>
                <h4>Analytics</h4>
                <p class="feature-description">Get valuable insights into your link performance with our built-in analytics, allowing you to track clicks and engagement.</p>
            </div>
        </div>
        
    </main>

    <footer style="background-color: #505050; color: white;" class="text-center text-lg-start mt-5">
        <div class="text-center p-3">
            <span>© 2024 URL Shortener</span><br>
            <span>Developed by <a href="https://www.albintech.42web.io" style="color: #7db0d2;">Albin Shaji</a></span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
