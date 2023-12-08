<div class="view darken-3">
  <div class="mask">
    <div class="container h-100 pt-5">
      <div class="row align-items-center h-100">
        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
          <h1 style="font-family: 'Roboto', sans-serif;" class="text-light mb-4 pt-3">Meet With Fellow Developers & Collab</h1>
          <p style="font-family: 'YaltaSans', sans-serif;" class="mb-4 pb-2 white-text">GitSocial allows developers to contact and collab with each other, our slogan is, for programmers, by programmers.</p>
          <button type="button" class="btn btn-outline-light btn-md ml-md-0" <?php if(!isset($_SESSION['username'])) echo 'onclick="location.href=\'sign.php?register=true\'"'; ?>>Get started</button>
          <button type="button" class="btn btn-info btn-md">Collab</button>
        </div>
        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.2s">
          <img src="./img/website-cards.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
