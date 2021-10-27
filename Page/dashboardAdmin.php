<?php
    session_start();
    if(!isset($_SESSION['status_login'])){
         echo '<script>
            alert("Harus Login Terlebih Dahulu!"); window.location = "../Page/loginPage.php"
            </script>';
    }
    include '../db.php';
    $datakategori = mysqli_query($con, "SELECT * FROM kategori_produk");
    $dataproduk = mysqli_query($con, "SELECT * FROM produk");
    $dataregister = mysqli_query($con, "SELECT * FROM register");
    $dataadmin = mysqli_query($con, "SELECT * FROM admin");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../assets/logo.png">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../styledashboardadmin.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light stylenavbar">
        <div class="container-fluid">
            <img src="../assets/logo te.png" alt="" class="gambarlogo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse textkanan" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link colortextnav" aria-current="page" href="dashboardAdmin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link colortextnav" href="profileadminPage.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link colortextnav" href="datakategoriPage.php">Data Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link colortextnav" href="dataprodukPage.php">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link colortextnav" href="../proses/logoutProses.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="section">
        <div class="container">
            <p class="fw-bold text-center textadmin ">Selamat Datang Admin <?php echo $_SESSION['a_global']->nama_admin ?></p>
        </div>
    </div>

    <div class="section-data">
        <div class="container">
            <div class="pembungkusdata d-flex justify-content-center">
              <div class="row">
                <div style="flex-flow : column;" class="col-md-4 kotakdata d-flex justify-content-center align-items-center  ">
                    <p class="textnumberdata"><?php echo mysqli_num_rows($datakategori) ?></p>
                    <p class="textdata">Data Kategori</p>
                </div>
                
                <div style="flex-flow : column;" class="col-md-4 kotakdata d-flex justify-content-center align-items-center  ">
                    <p class="textnumberdata"><?php echo mysqli_num_rows($dataproduk) ?></p>
                    <p class="textdata">Data Produk</p>
                </div>
                
             <div style="flex-flow : column;" class="col-md-4 kotakdata d-flex justify-content-center align-items-center  ">
                    <p class="textnumberdata"><?php echo mysqli_num_rows($dataadmin) ?></p>
                    <p class="textdata">Data Admin</p>
                </div>
                
                <div style="flex-flow : column;" class="col-md-4 kotakdata d-flex justify-content-center align-items-center  ">
                    <p class="textnumberdata"><?php echo mysqli_num_rows($dataregister) ?></p>
                    <p class="textdata">Data Register</p>
                </div>
            </div>
            </div>
        </div>
    </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>