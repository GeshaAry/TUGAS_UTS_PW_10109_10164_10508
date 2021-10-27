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
  <title>Login Page</title>
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
  <div class="container login min-vh-100 d-flex align-items-center justify-content-between">
    <img src="../assets/5272.svg" alt="" class="gambar">
    <div class="card kotak-card">
      <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item text-center tabnav"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill"
              href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">User</a> </li>
          <li class="nav-item text-center tabnav"> <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill"
              href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Admin</a> </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="form px-4">
              <p class="text-center"> Login as User</p>
              <form action="../proses/loginProses.php" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Masukkan Email</label>
                  <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Email" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Masukkan Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <center><button type="submit" class="btn btn-primary btnsubmit" name="login">Login</button></center>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="form px-4">
              <p class="text-center"> Login as Admin</p>
              <form action="../proses/loginProsesadmin.php" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Masukkan Username</label>
                  <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Masukkan Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <center><button type="submit" class="btn btn-primary btnsubmit" name="loginadmin">Login</button></center>
              </form>
            </div>
          </div>
          <p class="text-center tulisanbawah">Sudah mempunyai Akun?? <a href="registerPage.php" > Register disini!</a></p>
        </div>
      </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<script>
  $(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>

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

</html>