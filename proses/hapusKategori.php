<?php
    if(isset($_GET['id'])){
        include('../db.php');
        
        $id = $_GET['id'];
        
        $queryDelete = mysqli_query($con, "DELETE FROM kategori_produk WHERE id_kategoriproduk='$id'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '
                    <script>
                        alert("Delete Success"); window.location = "../Page/datakategoriPage.php"
                    </script>
                ';
        }else{
            echo
                '
                    <script>
                        alert("Delete Failed"); window.location = "../Page/dataKategoriPage.php"
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