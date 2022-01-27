<?php 
session_start();
if (!isset($_SESSION['login'])){
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Program Perpustakaan</title>
  </head>
  <body>
<?php include'navbar.php' ?>   
    <div class="container-fluid p-5">
    <a href="peminjam-tambah.php" type="button" class="btn btn-warning mb-3">Tambah Data Peminjam</a>
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Peminjam</th>
                    <th>Jenis Kelamin</th>
                    <th>Judul Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'setting.php';
                $query = "SELECT * FROM tbl_peminjam";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;    
                while ($data = mysqli_fetch_object($sql)) {
                ?>
                <tr>
                    <td> <?php echo $no++ ?> </td>
                    <td> <?php echo $data->nama_peminjam; ?> </td>
                    <td> <?php echo $data->jenis_kelamin; ?> </td>
                    <td> <?php echo $data->judul_buku; ?> </td>
                               
                    <td>
                        <a href="peminjam-edit.php?id=<?= $data->kode;?>">
                            <input type="submit" value="edit" class="btn btn-warning">
                        </a>

                        <?php
                        if($_SESSION['Hak_Akses'] == 'admin') {
                        ?>
                        <a href="peminjam-hapus.php?id=<?= $data->kode;?>">
                            <input type="submit" value="hapus" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger">
                        </a>
                        <?php
                        }
                        ?>
                    </td>      
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>