<?php
require 'setting.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tbl_buku WHERE id_buku ='$id'";
    $result = mysqli_query($koneksi, $query);
    if ($result){ 
        echo "data berhasil dihapus";
        header('location:index.php');
    } else {
        echo "data gagal terhapus";
    }
}