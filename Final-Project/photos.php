<?php
session_start();
include './inc/database.php';
$pageTitle = 'Photos Library | GitSocial';

if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header('Location: sign.php');
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: sign.php');
    exit;
}

$statusMsg = '';
$targetDir = 'uploads/';

if (isset($_POST["submit"])) {
    if (is_writable($targetDir)) {
        $statusMsg = 'The directory is writable';
    } else {
        $statusMsg = 'The directory is not writable';
    }

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                // Securely insert image file name into database using prepared statement
                $stmt = $conn->prepare("INSERT INTO gsimages (file_name, uploaded_on) VALUES (?, NOW())");
                $stmt->bind_param("s", $fileName);

                if ($stmt->execute()) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    $statusMsg = "Upload failed with error code: " . $_FILES["file"]["error"];
                }

                $stmt->close();
                $conn->close();
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}


require('./inc/header.php');
require('./inc/banner-sec.php');
?>

<div class="u-container">
    <div class="up-form">
        <?php if (!empty($statusMsg)) { ?>
            <p class="text-danger alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></p>
        <?php } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Select Image File to Upload:</label>
                <input class="form-control-file mt-3" type="file" name="file" id="file">
            </div>
            <button class="btn btn-info mt-3" type="submit" name="submit">Upload</button>
        </form>
    </div>
    <div class="gallery shadow mt-20">
        <div class="gcon">
            <h2>Photos Library</h2>
            <div class="row">
                <?php
                $query = $conn->query("SELECT * FROM gsimages ORDER BY uploaded_on DESC");

                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $imageURL = 'uploads/' . $row["file_name"];
                        ?>
                        <div class="col-md-4">
                            <img src="<?php echo $imageURL; ?>" alt="" class="img-fluid">
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <p class="col-12">No image(s) found...</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
require ('./inc/team-sec.php');
require('./inc/footer.php');
?>
