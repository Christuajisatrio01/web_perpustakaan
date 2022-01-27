<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Depan Perpustakaan</title>
</head>

<body>

    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row mb-3 py-2">
            <div class="col-md-12" style="margin: auto;">
                <h2 style="text-align: center; color: black;">Daftar Judul Buku Yang Tersedia di Perpustakaan</h2>
                <hr>
                <div class="row">
                    <?php
                    require 'admin/setting.php';
                    $query = "SELECT * FROM tbl_buku";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_object($sql)) {
                    ?>

                        <div class="col-md-3" style="margin-bottom: 20px;">


                            <div class="card" style="width: 18rem; height: 12rem; border-radius: 10px;">
                                <h5 class="card-header" style="background-color: #18212b; color: whitesmoke;text-align: center;"><?= $data->judul_buku; ?></h5>
                                <div class="card-body">
                                    <h5 class="card-title"><b>Penulis : </b><?= $data->Penulis; ?></h5>
                                    <p class="card-text">Tahun Terbit :<?= $data->tahun_terbit; ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    <div class="row">
                                        <div class="col">
                                            <p>ID : <?= $data->id_buku; ?></p>
                                        </div>
                                        <div class="col">
                                           
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <?php include 'footer.php' ?>
</body>

</html>