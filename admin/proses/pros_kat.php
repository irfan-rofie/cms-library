<?php

include '../../config/database.php';
$aksi = $_GET['aksi'];

switch ($aksi) {
    case "tambah":
        mysql_query("INSERT INTO mst_kategori VALUES('" . $_POST['id_kategori'] . "','" . $_POST['kategori'] . "')");
        header('location:../index.php?menu=kategori');
        break;
    case "ubah":
        mysql_query("UPDATE mst_kategori SET kategori='" . $_POST['kategori'] . "' WHERE id_kategori='" . $_POST['id_kategori'] . "'");
        header('location:../index.php?menu=kategori');
        break;
    case "hapus":
        mysql_query("DELETE FROM mst_kategori WHERE id_kategori='" . $_GET['id_kategori'] . "'");
//        header('location:../../index.php');
        header('location:../index.php?menu=kategori');
        break;
}
?>
