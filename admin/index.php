<?php
//session_start();
//if (!isset($_SESSION['login'])) {
//    header('location:../index.php');
//}
include 'proses/pros_login.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <?php include './include/headtag.php'; ?>
    </head>
    <body class="page-header-fixed">
        <?php
        include './include/header.php';
        include './include/menu.php';
        include './include/content.php';
        include './include/footer.php';
        ?>
    </body>
</html>