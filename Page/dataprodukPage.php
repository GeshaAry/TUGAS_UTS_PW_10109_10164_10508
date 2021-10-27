<?php
    session_start();
    if(!isset($_SESSION['status_login'])){
         echo '<script>
            alert("Harus Login Terlebih Dahulu!"); window.location = "../Page/loginPage.php"
            </script>';
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Data Produk</title>
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
         <p class="fw-bold text-center textadmin">Selamat Datang Admin
                <?php echo $_SESSION['a_global']->nama_admin ?></p>
        <div class="container" style="background-color: #FFFFFF; border-top:5px solid #17337A; box-shadow:0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
           
            <p class="tambahkategori"><a href="tambahproduk.php" style="text-decoration:none; color:white;">Tambah Produk</a></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('../db.php');
                        $no = 1;
                        $produk = mysqli_query($con, "SELECT * FROM produk p JOIN kategori_produk k ON (p.id_kategoriproduk = k.id_kategoriproduk) ORDER BY id_produk DESC");
                        if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                    ?>

                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['kategori'] ?></td>
                        <td><?php echo $row['nama_produk'] ?></td>
                        <td>Rp. <?php echo number_format($row['harga_produk'])?></td>
                        <td><?php echo $row['deskripsi_produk'] ?></td>
                        <td><a href="../assets/<?php echo $row['gambar_produk']?>" target="_blank"><img src="../assets/<?php echo $row['gambar_produk']?>" alt="" width="100px" height="50px"></a> </td>
                        <td><?php echo ($row['status_produk'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                        <td>
                            <a href="editProduk.php?id=<?php echo $row['id_produk'] ?>"><i style="color: green" class="fa fa-edit"></i></a>
                            <a href="../proses/hapusProduk.php?id=<?php echo $row['id_produk'] ?>" onClick="return confirm (\'Yakin?\')"><i style="color: red" class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }}else{ ?>
                        <tr>
                            <td colspan="8">Tidak ada data</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>