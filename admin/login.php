<?php
session_start();
require 'setting.php';

if(isset($_POST['login'])){

    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' and password='$password'");

if(mysqli_num_rows($query) === 1) {
    header('location: index.php');

    $data = mysqli_fetch_object($query);

    $_SESSION ['login'] = true;
    $_SESSION['Nama']=$data->Nama;
    $_SESSION['Hak_Akses']=$data->Hak_Akses;
}
echo $error = 'Username atau Password Salah';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="https://parsleyjs.org/dist/i18n/id.js"></script>
    <link rel="stylesheet" type="text/css" href="https://parsleyjs.org/src/parsley.css">    
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <div class="card card-body">
                    <h3>Login Form</h3>
                    <form action="" method="POST" data-parsley-validate>
                        <input type="text" name="txtusername"
                        class="form-control mb-3" placeholder="Masukan Username" required data-parsley-trigger="keyup" >

                        <input type="password" name="txtpassword"
                        class="form-control mb-3" placeholder="Masukan Password" required data-parsley-trigger="keyup" >

                        <input type="submit" value="login" name="login"
                        class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>