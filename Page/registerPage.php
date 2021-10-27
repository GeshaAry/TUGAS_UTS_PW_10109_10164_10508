<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="shortcut icon" href="../assets/logo.png">
    <title>Register Page</title>
    <link rel="stylesheet" href="../style.css">
</head>

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
          <a class="nav-link colortextnav" aria-current="page" href="homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link colortextnav" href="aboutusPage.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link colortextnav" href="loginPage.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link colortextnav" href="registerPage.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
    <div class="container login min-vh-100 d-flex align-items-center justify-content-center">
        <img src="../assets/5272.svg" alt="" class="gambar">
        <div class="card kotak-card">
            <div class="card-header fw-bold text-center">
                Register
            </div>
            <div class="card-body">
                <form action="../proses/registerProses.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Masukkan Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Email</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Nomor Telepon</label>
                        <input type="text" class="form-control" id="noTelp" name="noTelp" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                    <center><button type="submit" class="btn btn-primary btnsubmit" name="register">Register</button></center>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
  (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

</body>

</html>