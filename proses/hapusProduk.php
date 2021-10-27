<?php
    if(isset($_GET['id'])){
        include('../db.php');
        
        $id = $_GET['id'];
        $produk = mysqli_query($con, "SELECT gambar_produk FROM produk WHERE id_produk='$id'");

        $queryDelete = mysqli_query($con, "DELETE FROM produk WHERE id_produk='$id'") or die(mysqli_error($con));
        $p = mysqli_fetch_object($produk);
        unlink('../assets/'.$p->gambar_produk);
        if($queryDelete){
            echo
                '
                    <script>
                        alert("Delete Success"); window.location = "../Page/dataprodukPage.php"
                    </script>
                ';
        }else{
            echo
                '
                    <script>
                        alert("Delete Failed"); window.location = "../Page/dataprodukPage.php"
                    </script>
                ';
        }
    }else{
        echo 
            '
                <script>
                    window.history.back()
                </script>
            ';
    }
?>