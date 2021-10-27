
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <title>About Us</title>
  <link rel="stylesheet" href="../styleaboutus.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="shortcut icon" href="../assets/logo.png">
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
  <div class="section-member">
    <div class="container">
      <p class="text-center tulisanabout"><b>ABOUT US </b></p>
      <div data-aos="fade-up" class="row">

        <div class="penampung col-md-4">
          <div class="kotakmember">
            <img class="imagegesha"
              src="https://images.unsplash.com/photo-1557862921-37829c790f19?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bWFufGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60"
              alt="">
            <p class="text-center mt-4 tulisannama"> <b>Made Gesha Ary Nugraha</b></p>
            <p class="text-center">190710109</p>
          </div>
        </div>
        <div class="penampung col-md-4 ">
          <div class="kotakmember">
            <img class="imagejessica "
              src="../assets/jessica.png"
              alt="">
            <p class="text-center mt-4 tulisannama"> <b> Jessica Sanchia </b></p>
            <p class="text-center ">190710164</p>
          </div>
        </div>
        <div class="penampung  col-md-4">
          <div class="kotakmember">
            <img class="imageparamitha "
              src="../assets/paramitha.png"
              alt="">
            <p class="text-center mt-4 tulisannama"> <b> Paramitha Kencana Kinasih </b></p>
            <p class="text-center ">190710508</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section-map">
    <div class="container">
      <p class="text-center tulisanabout"><b>Alamat Kami</b></p>
      <div class="pembungkusmap d-flex justify-content-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3114.086690812882!2d110.41192221403688!3d-7.780434579350685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59efe143b3d9%3A0x48def21d296c3765!2sUniversitas%20Atma%20Jaya%20Yogyakarta!5e1!3m2!1sid!2sid!4v1634628564980!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" width="400px" height="400px"></iframe>
      </div>
    </div>
  </div>

  <div class="section-footer">
          <div class="footer">
              <div class="container">
                  <div class="row">
                      <p class="text-center tulisanfooter">Made with <i class="icon ion-heart" style="color: #e25555;"></i> Kelompok Tubes UTS</p>
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