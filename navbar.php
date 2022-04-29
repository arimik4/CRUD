<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- style CSS -->
     <link rel="stylesheet" href="style.css">


    <!-- Bootstrap CSS -->
>   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

     <!-- font awesome -->
     <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <title>Data Instruktur</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white" href="#">SELAMAT DATANG ADMIN | <b>ARI</b></a>
      <div class="icon ml-4">
        <h5>
           <i class="fa-solid fa-envelope" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Surat Masuk"></i>
           <i class="fa-solid fa-bell"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifikasi"></i>
           <i class="fa-solid fa-right-from-bracket"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout"></i>
        </h5>
      </div>
    </div>
</nav>
<div class="row no-gutters mt-3">
  <div class="col md-2 bg-dark mt-2 pr-3 pt-4">
<ul class="nav flex-column ml-3 mb-5">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" href="navbar.php"><i class="fa-solid fa-gauge"></i>      Dashboard</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="Instruktur.php"><i class="fa-solid fa-chalkboard-user"></i> Data Instruktur</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="form_tambah_data.php"><i class="fa-solid fa-user-plus"></i> Tambah Instruktur</a><hr class="bg-secondary">
  </li>
  <li class="nav-item text-center">
    <a class="nav-link text-white" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>  <b>Logout</b></a><hr class="bg-secondary">
  </li>
</ul>
</div>
<div class="col-md-10 p-5 pt-4">
<h4><i class="fa-solid fa-gauge"></i> DASHBOARD</a><hr class="bg-secondary"></h4>
<div class="row text-white">
<div class="card bg-info" style="width: 18rem; height: 12rem;">
  <div class="card-body">
    <div class="card-body-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
    <h5 class="card-title">DATA INSTRUKTUR</h5>
    <?php
        require 'koneksi.php';
        $query = $koneksi->query("SELECT * FROM instruktur");
        echo $jumlah_data = mysqli_num_rows($query);
        ?> <b >Orang</b>                                                                                     
    <div class="display-4">
  </div>
</div>
</div>
</div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>