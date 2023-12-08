<?php
session_start();
$pageTitle = 'Update Entry | GitSocial';
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
// Define variables and initialize with empty values
$username = $email = $password = "";
$username_err = $email_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Fetch the current username
    $current_username = "";
    $sql = "SELECT username FROM gitsocialusers WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_bind_result($stmt, $current_username);
            mysqli_stmt_fetch($stmt);
        }
        mysqli_stmt_close($stmt);
    }

    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } elseif(!preg_match("/^[a-zA-Z0-9]{3,20}$/", $input_username)){
        $username_err = "Username must be between 3-20 characters and contain only letters and numbers.";
    } else{
        $username = $input_username;
    }

    // Check if username already exists, but only if it's different from the current username
    if($username != $current_username) {
        $sql = "SELECT id FROM gitsocialusers WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            $param_username = $username;
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    // Fetch the current email
    $current_email = "";
    $sql = "SELECT email FROM gitsocialusers WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_bind_result($stmt, $current_email);
            mysqli_stmt_fetch($stmt);
        }
        mysqli_stmt_close($stmt);
    }

    // Validate email address
    $input_email = trim($_POST["email"]);
    // ... (your existing email validation code) ...

    // Check if email already exists, but only if it's different from the current email
    if($email != $current_email) {
        $sql = "SELECT id FROM gitsocialusers WHERE email = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            $param_email = $email;
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Validate email address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    } else{
        $email = $input_email;
    }

    // Fetch the current email
    $current_email = "";
    $sql = "SELECT email FROM gitsocialusers WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_bind_result($stmt, $current_email);
            mysqli_stmt_fetch($stmt);
        }
        mysqli_stmt_close($stmt);
    }

    // Validate email address
    $input_email = trim($_POST["email"]);
    // ... (your existing email validation code) ...

    // Check if email already exists, but only if it's different from the current email
    if($email != $current_email) {
        $sql = "SELECT id FROM gitsocialusers WHERE email = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            $param_email = $email;
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter a password.";     
    } elseif(strlen($input_password) < 6 || strlen($input_password) > 20){
        $password_err = "Password must be between 6-20 characters.";
    } else{
        $password = hash('sha512', $input_password); // Hash the password
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err)){
        // Prepare an update statement
        $sql = "UPDATE gitsocialusers SET username=?, email=?, password=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_username, $param_email, $param_password, $param_id);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = $password;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM gitsocialusers WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $username = $row["username"];
                    $email = $row["email"];
                    $password = $row["password"];
                } else{
                    // URL doesn't contain valid id. Redirect to home page
                    header("location: index.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: index.php");
        exit();
    }
}
require ('./inc/header.php'); ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <textarea name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"><?php echo $email; ?></textarea>
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="mb-3 btn btn-info" value="Submit">
                        <a href="index.php" class="mb-3 btn btn-info ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
<?php 
require ('./inc/team-sec.php');
require ('./inc/footer.php'); 
?>