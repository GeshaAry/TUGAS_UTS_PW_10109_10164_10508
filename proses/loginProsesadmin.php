    <?php

    if(isset($_POST['loginadmin'])){

         include('../db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $cek = mysqli_query($con, "SELECT * FROM admin WHERE username ='".$username."' AND password = '".MD5($password)."'");
        
        if(mysqli_num_rows($cek)>0){
              session_start();
              $d= mysqli_fetch_object($cek);
              $_SESSION['status_login'] = true;
              $_SESSION['a_global'] = $d;
              $_SESSION['id'] = $d->id_admin;
              echo
                    '<script>
                    alert("Login Success"); window.location = "../Page/dashboardAdmin.php"
                    </script>';
        }
        else{
             echo
                    '<script>
                    alert("Username or Password Invalid");
                    window.location = "../Page/loginPage.php"
                    </script>';
        }
    }


?>