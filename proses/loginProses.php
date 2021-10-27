<?php
    if(isset($_POST['login'])){

        include('../db.php'); 
    
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "SELECT * FROM register WHERE email = '$email' AND active='1' ") or die(mysqli_error($con));
    
        
        if(mysqli_num_rows($query) == 0){
             echo
                '<script>
                alert("Verifikasi Email Terlebih Dahulu"); window.location = "../Page/loginPage.php"
                </script>';
        }else{
            $user = mysqli_fetch_assoc($query);
            if(password_verify($password, $user['password'])){
            session_start();
            
            $_SESSION['isLogin'] = $email;
                echo
                    '<script>
                    alert("Login Success"); window.location = "../Page/homePage.php"
                    </script>';
            }else {
                echo
                    '<script>
                    alert("Username or Password Invalid");
                    window.location = "../Page/loginPage.php"
                    </script>';
            }
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>