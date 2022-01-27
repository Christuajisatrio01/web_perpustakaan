<?php
require 'setting.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tbl_peminjam WHERE kode ='$id'";
    $result = mysqli_query($koneksi, $query);
    if ($result){ 
        echo "data berhasil dihapus";
        header('location:peminjam.php');
    } else {
        echo "data gagal terhapus";
    }
}