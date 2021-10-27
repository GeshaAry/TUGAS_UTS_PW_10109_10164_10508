<?php
    session_start();
    if(!$_SESSION['isLogin']){
         echo '<script>
            alert("Harus Login Terlebih Dahulu!"); window.location = "../Page/loginPage.php"
            </script>';
    }

    include '../db.php';

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
    <div class="section-carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../assets/gambariphone.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/gambarrog.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/gambarsamsung.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <div class="section-search">
        <div class="container">
            <form action="produk.php" method="">
                <div class="input-group">
                    <form class="d-flex">
                        <input class="form-control me-2" type="text" name="search" placeholder="Search">
                        <button class="btnsearch" type="submit" name="cariproduk">Search</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <div class="section-kategori">
        <div class="container ">
            <div class="pembungkuskategori">
                <p class="fw-bold text-center text-detail " id="ourproduct">OUR CATEGORY</p>
                <div class="row">
                    <?php
                    $kategori = mysqli_query($con, "SELECT * FROM kategori_produk ORDER BY id_kategoriproduk DESC");

                    if(mysqli_num_rows($kategori) > 0){
                        $i=0;
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                    <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-delay="<?php echo $i+=200?>">
                        <img class="card-img-top" src="../assets/gambarkategoriproduk.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $k['kategori'] ?></h5>
                            <center><a href="produk.php?kat=<?php echo $k['id_kategoriproduk']?>" class="btn btn-primary">Lihat
                                    Kategori Produk</a></center>
                        </div>
                    </div>
                    </div>
                    <?php }} else { ?>
                    <p>Kategori Produk Tidak Ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="section-newproduk">
        <div class="container">
            <p class="fw-bold text-center text-detail " id="ourproduct">NEW PRODUCT</p>
            <div class="row">
                <?php
                    $produk = mysqli_query($con, "SELECT * FROM produk WHERE status_produk = 1 ORDER BY id_produk DESC LIMIT 8");
                    if(mysqli_num_rows($produk)>0){
                        $i=0;
                    while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="col-md-4">
                <div class="card" data-aos="fade-up" data-aos-delay="<?php echo $i+=200?>">
                    <img class="card-img-top" src="../assets/<?php echo $p['gambar_produk']?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $p['nama_produk']?></h5>
                        <p class="card-text text-right">Rp. <?php echo number_format($p['harga_produk'])?></p>
                        <a href="detail_produk.php?id=<?php echo $p['id_produk'] ?>" class="btn btn-primary">Lihat
                            Detail Produk</a>
                    </div>
                </div>
                </div>
                <?php }}else{?>
                <p>Produk Tidak ada</p>
                <?php } ?>
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