<?php

include '../../config/database.php';
$aksi = $_GET['aksi'];

switch ($aksi) {
    case "tambah":
        $fileName = $_FILES['cover']['name'];
        mysql_query("INSERT INTO mst_buku VALUES('" . $_POST['id_buku'] . "','" . $_POST['judul'] . "','" . $_POST['pengarang'] . "','" . $_POST['penerbit'] . "','" . $_POST['tahun_terbit'] . "','" . $_POST['resensi'] . "','" . $_POST['id_kategori'] . "','" . $_POST['id_rak'] . "','" . $_POST['waktu_entry'] . "','" . $_POST['jumlah'] . "','$fileName')");
        move_uploaded_file($_FILES['cover']['tmp_name'], "C:/xampp/htdocs/cms-library/admin/cover/" . $_FILES['cover']['name']);
        header('location:../index.php?menu=buku');
        break;
    case "ubah":
        mysql_query("UPDATE mst_rak SET nama_rak='" . $_POST['nama_rak'] . "' WHERE id_rak='" . $_POST['id_rak'] . "'");
        header('location:../index.php?menu=rak');
        break;
    case "hapus":
        mysql_query("DELETE FROM mst_buku WHERE id_buku='" . $_GET['id_buku'] . "'");
        header('location:../index.php?menu=buku');
        break;
}
?>
