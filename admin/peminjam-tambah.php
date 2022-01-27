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

    <title>Tambah Data Peminjam</title>
  </head>
  <body>
<?php include'navbar.php' ?>   
<div class="container">
        <h2>Tambah Data Peminjam</h2>
<?php
require 'setting.php';
if (isset($_POST['simpan'])){
    $nama_peminjam = $_POST['nama_peminjam'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $txtjudul_buku = $_POST['txtjudul_buku'];
    
	
    $sql2 = "INSERT INTO tbl_peminjam VALUES (NULL, '$nama_peminjam', '$jenis_kelamin','$txtjudul_buku')";
    $query2 = mysqli_query($koneksi, $sql2);

    if ($query2){
        header ('location: peminjam.php');

}else {
    echo 'Query Error : ' . mysqli_error($koneksi);
    }
}
?>

<form action="#" method="post">
<div class = "mb-3">
    <label> Nama Peminjam</label>
    <input type="text" name="nama_peminjam" class= "form-control">

</div>
<div class = "mb-3">
    <label> Jenis Kelamin</label>
    <select id="" name="jenis_kelamin" class= "form-control">
        <option value="L">laki-laki</option>
        <option value="P">perempuan</option>
    </select>
   

</div>
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

<?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>