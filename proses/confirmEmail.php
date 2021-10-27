<?php
    include('../db.php');

    if(isset($_GET['hash'])){
        $hash = $_GET['hash'];
        $sql = "SELECT * FROM register where hash = '$hash'";
        $query = mysqli_query($con,$sql);
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            $id = $user['id_user'];
            $sql =  "UPDATE register set active='1' where id_user=$id";
            $query = mysqli_query($con,$sql);
            if($query){
                echo "<script>
                    alert('Verifikasi Berhasil');
                    window.location = '../Page/loginPage.php';
                </script>";
            }else{
                echo "VERIFIKASI GAGAL ERROR : ".$query;
            }
        }else {
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else {
        echo "code ga nih";
    }

?>