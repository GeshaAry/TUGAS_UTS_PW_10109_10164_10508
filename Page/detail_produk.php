<?php
    session_start();
    if(!$_SESSION['isLogin']){
         echo '<script>
            alert("Harus Login Terlebih Dahulu!"); window.location = "../Page/loginPage.php"
            </script>';
    }
    error_reporting(0);
    include '../db.php';
    $produk = mysqli_query($con, "SELECT * FROM produk p JOIN kategori_produk k ON (p.id_kategoriproduk = k.id_kategoriproduk)  WHERE id_produk = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);

    $email = $_SESSION['isLogin'];
    $query = mysqli_query($con, "SELECT * FROM register WHERE email='$email'");
    $row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="shortcut icon" href="../assets/logo.png">
    <title>HomePage</title>
    <link rel="stylesheet" href="../styledashboard.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light stylenavbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="homePage.php"><img src="../assets/logo te.png" alt="" class="gambarlogo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse textkanan" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link colortextnav" aria-current="page" href="homePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link colortextnav" aria-current="page" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link colortextnav" href="aboutusPage.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link colortextnav" href="../proses/logoutProses.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link colortextnav" href="#">Selamat Datang, <?php echo $row['username']?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="section-search">
        <div class="container">
            <form action="produk.php">
                <div class="input-group">
                        <input class="form-control me-2" type="text" name="search" placeholder="Search" value="<?php echo $_GET['search'] ?>">
                        <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>" >
                        <button class="btnsearch" type="submit" name="cariproduk">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="section-detailproduk">
           <p class="text-center text-detail">Detail Produk</p>
        <div class="container">
            <div class="row">
            <div class="col"><img src="../assets/<?php echo $p->gambar_produk?>" alt="" width="500px" height="300px"></div>
            <div class="col">
                <p>Kategori : <?php echo $p->kategori ?></p>
               <b><p class="text-namaproduk"><?php echo $p->nama_produk?></p></b>
               <p class="text-deskripsi"><?php echo $p->deskripsi_produk ?></p>
              <b><p class="text-harga">PRICE : Rp.<?php echo number_format($p->harga_produk) ?></p></b> 
            </div>
            </div>
        </div>
    </div>

    <div class="section-footer">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <p class="text-center tulisanfooter">Made with <i class="icon ion-heart"
                            style="color: #e25555;"></i> Kelompok Tubes UTS</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        AOS.init();
    </script>

</body>

</html>