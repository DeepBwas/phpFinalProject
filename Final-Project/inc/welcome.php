<?php
session_start();
include './inc/database.php';
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header('Location: sign.php');
    exit;
}
?>
<div class="view darken-3">
  <div class="mask">
    <div class="container h-100 pt-5">
      <div class="row align-items-center h-100">
        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.2s">
          <img src="./img/welcome-banner.png" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
            <h1 style="font-family: 'Roboto', sans-serif;" class="text-light mb-4 pt-3">
            Welcome back, <?php echo $_SESSION['username']; ?>!
            </h1>
            <p style="font-family: 'YaltaSans', sans-serif;" class="mb-4 pb-2 white-text">GitSocial allows developers to contact and collab with each other, our slogan is, for programmers, by programmers.</p>
            <a type="button" class="btn btn-outline-light btn-md ml-md-0" href="photos.php">Photos Library</a>
            <a type="button" class="btn btn-info btn-md" href="sign.php?logout=true">Log Out</a>
        </div>
      </div>
    </div>
  </div>
</div>
