<?php
include './inc/logout.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP Final Project - CRUD">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo $pageTitle; ?></title>
    <!-- Adding Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/dc7a4e750d.js" crossorigin="anonymous"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./img/git-social-favicon-96x96.png">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark">
            <video autoplay muted loop>
                <source src="./video/after-effects-wavy-neon-background.mp4" type="video/mp4">
            </video>
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./img/gitsocial-header-logo.png" alt="header logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="sign.php">Log In</a></li>
                        <li class="nav-item"><a class="nav-link" href="sign.php?register=true">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="photos.php">Photos Library</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>