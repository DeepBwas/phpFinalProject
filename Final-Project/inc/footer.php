<footer class="text-center text-white" style="background-color: #070140">
        <div class="container">
            <section class="mt-5">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-6 col-md-2 mb-3">
                        <h6 class="text-uppercase font-weight-bold">
                            <a style="text-decoration: none;" href="index.php" class="text-white link-opacity-50-hover">Home</a>
                        </h6>
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <h6 class="text-uppercase font-weight-bold">
                        <?php if(isset($_SESSION['username']) || isset($_SESSION['email'])): ?>
                            <a style="text-decoration: none;" href="sign.php?logout=true" class="text-white link-opacity-50-hover">Logout</a>
                        <?php else: ?>
                            <a style="text-decoration: none;" href="sign.php" class="text-white link-opacity-50-hover">Log In</a>
                        <?php endif; ?>
                        </h6>
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <h6 class="text-uppercase font-weight-bold">
                            <a style="text-decoration: none;" href="sign.php?register=true" class="text-white link-opacity-50-hover">Sign Up</a>
                        </h6>
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <h6 class="text-uppercase font-weight-bold">
                            <a style="text-decoration: none;" href="photos.php" class="text-white link-opacity-50-hover">Library</a>
                        </h6>
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <h6 class="text-uppercase font-weight-bold">
                        <a style="text-decoration: none;" href="https://github.com/" class="text-white link-opacity-50-hover">Github</a>
                        </h6>
                    </div>
                </div>
            </section>
            <hr class="my-5" />
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p style="font-family: 'YaltaSans', sans-serif">GitSocial emerges from GitHub's community vision, breaking free from traditional development norms. It's more than a platform, it's a lively hub where coding evolves from solitary to communal.</p>
                    </div>
                </div>
            </section>
            <section class="text-center mb-5">
                <a href="#" class="link-light me-4" style="text-decoration: none;">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#" class="link-light me-4" style="text-decoration: none;">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="#" class="link-light me-4" style="text-decoration: none;">
                    <i class="fa-brands fa-google"></i>
                </a>
                <a href="#" class="link-light me-4" style="text-decoration: none;">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="link-light me-4" style="text-decoration: none;">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="#" class="link-light me-4" style="text-decoration: none;">
                    <i class="fa-brands fa-github"></i>
                </a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            <p>&#xA9; DEEP BISWAS <script>document.write( new Date().getFullYear() );</script> - ALL RIGHTS RESERVED</p>
        </div>
    </footer>
</body>
</html>
