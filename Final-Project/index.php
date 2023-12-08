<?php
$pageTitle = 'Home | GitSocial';
session_start();
include './inc/database.php';
if (isset($_GET['logout'])){
    session_destroy();
    header('Location: sign.php');
    exit;
}
require ('./inc/header.php');
if(isset($_SESSION['username'])){
    require ('./inc/welcome.php');
    require ('./inc/user-table.php');
}else{
    require ('./inc/not-welcome.php');
}
require ('./inc/banner-sec.php');
require ('./inc/team-sec.php');
require ('./inc/footer.php'); 
?>