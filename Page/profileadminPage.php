<?php
    session_start();
    if(!isset($_SESSION['status_login'])){
         echo '<script>
            alert("Harus Login Terlebih Dahulu!"); window.location = "../Page/loginPage.php"
            </script>';
    }

    include '../db.php';

    $query = mysqli_query($con, "SELECT * FROM admin WHERE id_admin = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../styledashboardadmin.css">
</head>

<body>
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
        <div class="container min-vh-100 d-flex align-items-center justify-content-center">
            <div class="row ">
                <p class="text-center textprofile">DATA PROFILE ADMIN</p>
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Admin</label>
                                <input type="text" class="form-control" id="nama_admin" name="nama_admin"
                                    aria-describedby="emailHelp" value="<?php echo $d->nama_admin?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?php echo $d->username?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nomor Telepon Admin</label>
                                <input type="text" class="form-control" id="noTelp_admin" name="noTelp_admin"
                                    value="<?php echo $d->noTelp_admin?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email Admin</label>
                                <input type="text" class="form-control" id="email_admin" name="email_admin"
                                    value="<?php echo $d->email_admin?>">
                            </div>
                            <center><button type="submit" class="btn btn-primary btnsubmit" name="updateadmin">Update
                                    Profile</button></center>
                        </form>
                    </div>
                </div>

                <?php
                    if(isset($_POST['updateadmin'])){
                        include('../db.php');

                        $nama = $_POST['nama_admin'];
                        $username = $_POST['username'];
                        $notelp = $_POST['noTelp_admin'];
                        $email = $_POST['email_admin'];
                        
                        $update = mysqli_query($con, "UPDATE admin SET nama_admin = '".$nama."', 
                        username = '".$username."', noTelp_admin = '".$notelp."', email_admin = '".$email."' WHERE id_admin = '".$d->id_admin."'");
                        
                        if($update){
                            echo '
                                <script>
                                    alert("Update Data Berhasil"); window.location="profileadminPage.php"
                                </script>
                            ';
                        }
                        else{
                            echo 'gagal udpdate'.mysqli_error($con);
                        }

                    }
                ?>
            </div>
        </div>
    </div>
</body>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

</html>