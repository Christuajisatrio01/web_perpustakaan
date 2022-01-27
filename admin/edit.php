
<?php
session_start();
if (!isset($_SESSION['login'])){
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
        <h2>Ubah Data Buku</h2>
<?php
require 'setting.php';
if (isset($_POST['simpan'])){
    $id =$_GET['id'];
    $judul_buku = $_POST['judul_buku'];
    $Kategori = $_POST['Kategori'];
    $Penulis = $_POST['Penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sql = "UPDATE tbl_buku SET judul_buku='$judul_buku',Kategori='$Kategori',Penulis='$Penulis',tahun_terbit='$tahun_terbit' WHERE id_buku = $id";
    
    $query = mysqli_query ($koneksi,$sql);
    if ($query){
        header ('location: index.php');

}else {
    echo 'Query Error : ' . mysqli_error($koneksi);
    }
}else{
    $id=$_GET['id'];
    $query="SELECT * FROM tbl_buku WHERE id_buku=$id";
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_object($sql);

}
?>
<form action="#" method="post">
<div class = "mb-3">
    <label> Judul Buku</label>
    <input type="text" name="judul_buku" class= "form-control" value="<?= $data->judul_buku; ?>"/>

</div>
<div class = "mb-3">
    <label> Kategori</label>
    <input type="text" name="Kategori" class= "form-control" value="<?= $data->Kategori; ?>"/>
    
</div>
<div class = "mb-3">
    <label> Penulis</label>
   <input type="text" name="Penulis" class="form-control"value="<?= $data->Penulis; ?>"/>
    
</div>
<div class = "mb-3">
    <label> Tahun Terbit</label>
    <input type="date" name="tahun_terbit" class= "form-control" value="<?$data->tahun_terbit;?>"/>
    
</div>
<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
<a href="index.php" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</body>
</html>