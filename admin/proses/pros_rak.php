<?php

include '../../config/database.php';
$aksi = $_GET['aksi'];

switch ($aksi) {
    case "tambah":
        mysql_query("INSERT INTO mst_rak VALUES('" . $_POST['id_rak'] . "','" . $_POST['nama_rak'] . "')");
        header('location:../index.php?menu=rak');
        break;
    case "ubah":
        mysql_query("UPDATE mst_rak SET nama_rak='" . $_POST['nama_rak'] . "' WHERE id_rak='" . $_POST['id_rak'] . "'");
        header('location:../index.php?menu=rak');
        break;
    case "hapus":
        mysql_query("DELETE FROM mst_rak WHERE id_rak='" . $_GET['id_rak'] . "'");
        header('location:../index.php?menu=rak');
        break;
}
?>
