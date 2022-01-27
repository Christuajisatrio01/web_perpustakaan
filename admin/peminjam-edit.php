<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Halaman Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Ubah Data Peminjam</h2>
        <?php
        require 'setting.php';
        if (isset($_POST['simpan'])) {
            $id = $_GET['id'];
            $nama_peminjam = $_POST['nama_peminjam'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $txtjudul_buku = $_POST['txtjudul_buku'];
            $sql = "UPDATE tbl_peminjam SET nama_peminjam='$nama_peminjam',jenis_kelamin='$jenis_kelamin',judul_buku='$txtjudul_buku' WHERE kode = $id";

            $query = mysqli_query($koneksi, $sql);
            if ($query) {
                header('location: peminjam.php');
            } else {
                echo 'Query Error : ' . mysqli_error($koneksi);
            }
        } else {
            $id = $_GET['id'];
            $query = "SELECT * FROM tbl_peminjam WHERE kode=$id";
            $sql = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_object($sql);
        }
        ?>
        <form action="#" method="post">
            <div class="mb-3">
                <label> Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control" value="<?= $data->nama_peminjam; ?>" />

            </div>
            <div class="mb-3">
                <label> Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" value="<?= $data->jenis_kelamin; ?>" />

            </div>
            <div class="mb-3">
                <div class="mb-3">

                    <label for="judul_buku">Judul Buku:</label>

                    <select name="txtjudul_buku" id="judul_buku" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <?php
                        $sql1 = "SELECT * FROM tbl_buku";
                        $query1 = mysqli_query($koneksi, $sql1);
                        while ($data = mysqli_fetch_object($query1)) {
                        ?>
                            <option value="<?= $data->judul_buku ?>"><?= $data->judul_buku ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                <a href="peminjam.php" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</body>

</html>