<?php

include '../../config/database.php';
$aksi = $_GET['aksi'];

switch ($aksi) {
    case "tambah":
        mysql_query("INSERT INTO mst_admin VALUES('" . $_POST['id'] . "','" . $_POST['username'] . "','" . $_POST['password'] . "','','','','','','','','".$_POST['id_status']."')");
        header('location:../index.php?menu=admin');
        break;
    case "ubah":
        mysql_query("UPDATE mst_admin SET nama='" . $_POST['username'] . "',pass='" . $_POST['password'] . "' WHERE id='" . $_POST['id'] . "'");
        header('location:../index.php?menu=admin');
        break;
    case "hapus":
        mysql_query("DELETE FROM mst_admin where id='" . $_GET['id'] . "'");
//        session_start();
//        session_destroy();
        header('location:../../index.php');
        break;
}
?>
