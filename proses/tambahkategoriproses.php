<?php
    if(isset($_POST['tambahdatakategori'])){

        include('../db.php');

        $namakategori = $_POST['kategori'];
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
        "INSERT INTO kategori_produk VALUES ('', '$namakategori')")
        or die(mysqli_error($con)); 
        if($query){
            echo
                '<script>
                alert("Tambah Data Success"); window.location = "../Page/datakategoriPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Register Failed");
                </script>';
        }

    }else{
        echo
            '<script>
             window.history.back()
            </script>';
 }
?>