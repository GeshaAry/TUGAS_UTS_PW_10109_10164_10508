<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
      use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;

    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

      
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/OAuth.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/POP3.php';
        require '../PHPMailer/src/SMTP.php';

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $noTelp = $_POST['noTelp'];
        $hash = md5($email.date('Y-m-d'));

        // Melakukan insert ke databse dengan query dibawah ini
        $sql = "SELECT * FROM register where email='$email'";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            echo '<script>alert("Email sudah terdaftar");</script>';
        }
        else{
             $query = mysqli_query($con,
            "INSERT INTO register(username, password, email, alamat, noTelp, hash, active)
            VALUES
            ('$username', '$password', '$email', '$alamat', '$noTelp', '$hash', '0')")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query){
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = 'tokoelektornik@gmail.com';
            $mail->Password = 'tokoelektronik123';
            $mail->setFrom('no-reply@yourwebsite.com', 'Your website service');
            $mail->addAddress($email, $username);
            $mail->Subject = 'Verification Account - Toko Elektronik';
            $body = "Hi, ".$username."<br>Please verif your email before access our website : <br> http://localhost:8080/TubesPaw/proses/confirmEmail.php?hash=".$hash;
            $mail->Body = $body;
            $mail->AltBody = 'Verification Account';
            
            $mail->send();
        

                echo
                    '<script>
                    alert("Register Success"); window.location = "../Page/registerPage.php"
                    </script>';
        }else{
            echo
                '<script>
                alert("Register Failed");
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