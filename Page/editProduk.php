<?php
    session_start();
    if(!isset($_SESSION['status_login'])){
         echo '<script>
            alert("Harus Login Terlebih Dahulu!"); window.location = "../Page/loginPage.php"
            </script>';
    }

    include '../db.php';

    $produk = mysqli_query($con, "SELECT * FROM produk WHERE id_produk = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);


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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <title>Edit Produk</title>
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
        <div class="container ">
            <div class="">
                <p style="text-center tulisanprofileadmin">Edit Produk</p>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori">
                            <option value="">Pilih Kategori</option>
                            <?php
                                $kategori = mysqli_query($con, "SELECT * FROM kategori_produk ORDER BY id_kategoriproduk DESC");
                                while($r = mysqli_fetch_array($kategori)){

                            ?>
                            <option value="<?php echo $r['id_kategoriproduk']?>"
                                <?php echo ($r['id_kategoriproduk'] == $p->id_kategoriproduk )?'selected':''; ?>>
                                <?php echo $r['kategori']?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            value="<?php echo $p->nama_produk?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="foto" name="foto"
                            value="<?php echo $p->gambar_produk?>">
                    </div>
                    <img src="../assets/<?php echo $p->gambar_produk?>" alt="" width="200px" height="100px">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" id="harga_produk" name="harga_produk"
                            value="<?php echo $p->harga_produk?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Deskripsi Produk</label>
                        <textarea type="text" class="form-control" id="deskripsi_produk"
                            name="deskripsi_produk"><?php echo $p->deskripsi_produk?> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status Produk</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="">Pilih Status</option>
                            <option value="1" <?php echo ($p->status_produk == 1)?'selected':''; ?>>Aktif</option>
                            <option value="0" <?php echo ($p->status_produk == 0)?'selected':''; ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <center><button type="submit" class="btn btn-primary btnsubmit" name="editdataproduk" value="editdataproduk"> Update Data
                            Produk</button></center>
                </form>
                <?php
                    if(isset($_POST['editdataproduk'])){
                        
                        //data inputan dari form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama_produk'];
                        $harga = $_POST['harga_produk'];
                        $deskripsi = $_POST['deskripsi_produk'];
                        $status = $_POST['status'];
                        $foto = $_POST['foto'];
                        
                        //tampung data gambar
                        $filename = $_FILES['gambar_produk']['name'];
                        $tmp_name = $_FILES['gambar_produk']['tmp_name'];
                        

                        if($filename != ''){
                            $type1 = explode('.', $filename);
                            $type2 = $type1[1];

                            $newname = 'produk'.time().'.'.$type2;
                            $typegambar = array('jpg', 'jpeg', 'png', 'gif');
                            if(!in_array($type2, $typegambar)){
                                echo '<script> alert("Format file tidak diizinkan")</script>';
                            }else{
                                unlink('../assets/'.$foto);
                                move_uploaded_file($tmp_name, '../assets/'.$newname);
                                $namagambar = $newname;
                            }
                        }else{
                            //admin tidak ganti gambar
                            $namagambar = $foto;
                        }

                        $update = mysqli_query($con,"UPDATE produk set id_kategoriproduk = '".$kategori."', nama_produk = '".$nama."', harga_produk = '".$harga."', deskripsi_produk = '".$deskripsi."', status_produk = '".$status."', gambar_produk = '".$namagambar."', status_produk = '".$status."' WHERE id_produk = '".$p->id_produk."' " );
                         if($update){
                               echo "<script>window.location='dataprodukPage.php'</script>";
                        }
                        else{
                            echo 'gagal'.mysqli_error($con);
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
<script>
    CKEDITOR.replace('deskripsi_produk');
</script>

</html>