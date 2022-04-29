<?php
session_start();

if ($_SESSION['username'] == "") {
  header('Location: login.php?msg=login');
}
?>

<!-- di atas adalah perintah untuk mengembalikan ke halaman login jika belum ada aktifitas login -->


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

     <!-- Dependencies sweet alert -->
   <script src="sweetalert2/sweetalert2.all.min.js"></script>

    <title>Tambah Data</title>
  </head>
  <body>

  <!--navbar & sidebar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white" href="#">SELAMAT DATANG ADMIN | <b>ARI</b></a>
      <div class="icon ml-4">
        <h5>
           <i class="fa-solid fa-envelope mr-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Surat Masuk"></i>
           <i class="fa-solid fa-bell mr3"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifikasi"></i>
           <i class="fa-solid fa-right-from-bracket mr-3"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout"></i>
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
    <a class="nav-link text-white" href="instruktur.php"><i class="fa-solid fa-chalkboard-user"></i> Data Instruktur</a><hr class="bg-secondary">
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

  <!-- Form Tambah Data -->
<div class="container">
  <div class="card mt-3">
  <div class="card-header fs-5 bg-secondary text-white">
    <b><i class="fa-solid fa-user-pen"></i> INPUT DATA INSTRUKTUR</b>
    <a href="instruktur.php" class="btn-close btn-outline-light float-end"></a>
  </div>
  <div class="card-body">
    <form action="proses_simpan.php" method="POST">
      <div class="form-group mb-2">
        <label>Nama Instruktur</label>
        <input type="text" name="nama_instruktur" class="form-control" placeholder="Masukan Nama Instruktur">
      </div>
      <div class="form-group mb-2">
        <label>Mata Kuliah</label>
        <input type="text" name="mata_kuliah" class="form-control" placeholder="Masukan Mata Kuliah">
      </div>
      <div class="form-group mb-2">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
      </div>
      <div class="form-group mb-2">
        <label>No Hp</label>
        <input type="number" name="no_hp" class="form-control" placeholder="Masukan No Hendphone">
      </div>
      <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" placeholder="Masukan Alamat"></textarea>
      </div>
      <div class="form-group mb-2">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin" placeholder="Masukan Jenis Kelamin">
          <option></option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <button type="submit" name="simpan" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
      <button type="reset" class="btn btn-sm btn-danger text-white"><i class="fa-solid fa-square-xmark"></i> Reset</button>
    </form>
  </div>
</div>
</div>
</body>


</html>