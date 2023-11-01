<?php

session_start();
include "../config/database.php";
if (($_SESSION['nama'] == '')) {
    header('location:../index.php');
}
$username = $_POST['username'];
$password = md5($_POST['password']);
$result = mysql_query("SELECT * FROM mst_user WHERE username='$username' AND password='$password'");
$check = mysql_num_rows($result);
if ($check > 0) {
    $rows = mysql_fetch_array($result);
    $nik = $rows['nim_nik'];
    $sql = mysql_query("SELECT * FROM mst_pegawai WHERE nik='$nik'");
    $data = mysql_fetch_array($sql);
//     if ($data['id_status'] == 1) {
    $_SESSION['nama'] = "admin";
//         // $_SESSION['nik'] = $data['nik'];
//     } else {
// //        header('location:../index.php?err=1');
//     }
//    header('location:../index.php');
} else {
//    header('location:../../index.php');
}
