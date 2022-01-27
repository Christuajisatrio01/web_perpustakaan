<?php 
if (isset($_SESSION['login'])){
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

    <title>Tambah Data Buku</title>
  </head>
  <body>
<?php include'navbar.php' ?>   
<div class="container">
        <h2>Tambah Buku</h2>
<?php
require 'setting.php';
if (isset($_POST['simpan'])){
    $judul_buku = $_POST['judul_buku'];
    $Kategori = $_POST['kategori'];
    $Penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sql = "INSERT INTO tbl_buku VALUES (NULL, '$judul_buku', '$Kategori',
                                        '$Penulis','$tahun_terbit')";
    $query = mysqli_query ($koneksi,$sql);
    if ($query){
        header ('location: index.php');

}else {
    echo 'Query Error : ' . mysqli_error($koneksi);
    }
}
?>

<form action="#" method="post">
<div class = "mb-3">
    <label> Judul Buku</label>
    <input type="text" name="judul_buku" class= "form-control">

</div>
<div class = "mb-3">
    <label> Kategori</label>
    <input type="text" name="kategori" class= "form-control">
    
</div>
<div class = "mb-3">
    <label> Penulis</label>
   <input type="text" name="penulis" class="form-control">
    
</div>
<div class = "mb-3">
    <label> Tahun Terbit</label>
    <input type="date" name="tahun_terbit" class= "form-control">
    
</div>
<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
<a href="index.php" class="btn btn-secondary">Kembali</a>

        </form>
    </div>

<?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>