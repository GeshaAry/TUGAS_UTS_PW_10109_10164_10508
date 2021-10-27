<?php
    if(isset($_POST['updatedatakategori'])){

        include('../db.php');

        $id = $_POST['id'];
        $namakategori = $_POST['kategori'];
        $update = mysqli_query($con, "UPDATE kategori_produk SET kategori = '".$namakategori."' WHERE id_kategoriproduk ='".$id."' ") or die(mysqli_error($con)); 
        if($update){
            echo
                '<script>
                alert("Update Data Success"); window.location = "../Page/editKategori.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Update Data Failed");
                </script>';
        }

    }else{
        echo
            '<script>
             window.history.back()
            </script>';
 }
?>