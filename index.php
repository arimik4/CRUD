<?php
session_start();

if ($_SESSION['username'] == "") {
  header('Location: login.php?msg=login');
}
?>
<!-- di atas adalah perintah untuk mengembalikan ke halaman login jika belum ada aktifitas login -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

   <!-- Dependencies sweet alert -->
    <script src="sweetalert2/sweetalert2.all.min.js"></script>


  </head>

<body>
  <!-- memasukkan elemen file navbar.php -->
  <?php require_once 'navbar.php'; ?>
  <div class="card-body">
                <div class="alert alert-success">
                  <h5 class="display-6">Hallo, Admin <strong><?php echo $_SESSION['name']; ?> !</strong></h5>
                  <p class="card-text">Selamat datang di Halaman Admin! </p>
                  <p class="card-text">Anda dapat mengelola data di halaman ini. </p>
                </div>




<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

<!-- alert jika login sukses -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'login') : ?>
  <script>
    swal.fire({
      title: "Good Job!",
      text: "Login Berhasil!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif; ?>
<!-- akhir alert login sukses -->
</html>