<?php
session_start();
$pageTitle = 'Delete Entry | GitSocial';
include './inc/database.php';
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header('Location: sign.php');
    exit;
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: sign.php');
    exit;
}
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include database file
    include 'database.php';
    // Prepare a delete statement
    $sql = "DELETE FROM gitsocialusers WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: index.php");
        exit();
    }
}
include './inc/header.php';
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this user record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
<?php
require ('./inc/team-sec.php');
include './inc/footer.php'; 
?>
