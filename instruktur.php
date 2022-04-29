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
   
    <title>Data Instruktur</title>
  </head>
  <body>
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
<div class="col-md-10 p-5 pt-4 mt-4">
<h4><i class="fa-solid fa-chalkboard-user"></i> DATA ISTRUKTUR</a><hr class="bg-secondary"></h4>

 <!-- bagian pesan -->
 <?php if (isset($_GET['berhasil_hapus'])) { ?>
 <div class="alert alert-success">Data berhasil dihapus!</div>
 <?php } ?>
<!-- batas bagian pesan -->
<table class="table table-striped table-bordered">
  <thead>
    <tr class="bg-info text-light">
      <th class="text-center">No</th>
      <th class="text-center">Nama Instruktur</th>
      <th class="text-center">Mata Kuliah</th>      
      <th class="text-center">Tanggal Lahir</th>
      <th class="text-center">Jenis Kelamin</th>
      <th class="text-center">No Hp</th>
      <th class="text-center">Alamat</th>
      <th class="text-center" style="width: 12rem;">Aksi</th>
    </tr>
  </thead>
  <tbody>
</div>
</div>

                <?php
                require 'koneksi.php';
                $jumlahPerpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM instruktur");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                $query = $koneksi->query("SELECT * FROM instruktur LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle" style="height: 60px;">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class=""><?= $row['nama_instruktur']; ?></td>
                    <td class="text-center"><?= $row['mata_kuliah']; ?></td>
                    <td class="text-center"><?= $row['tanggal_lahir']; ?></td>
                    <td class="text-center"><?= $row['jenis_kelamin']; ?></td>
                    <td class="text-center"><?= $row['no_hp']; ?></td>
                    <td class="text-center"><?= $row['alamat']; ?></td>
                    <td class="text-center">
                    
                      <button type="button" class="btn btn-sm btn-success text-white" data-bs-toggle="modal" data-bs-target="#modaledit<?= $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                      <!-- triggel modal hapus -->
                      <button type="button" class="btn btn-sm btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id']; ?>"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                    </td>
                  </tr>
                  <!-- modal hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <p class="fs-4 fw-bold text-center mt-3">HAPUS DATA</p>
                        <hr>
                        <p class="fs-6 text-center mt-1">Data ini aka dihapus ?</p>
                        <form action="delete.php" method="POST">
                          <input type="hidden" name="id" value="<?= $row['id']; ?>">
                          <div class="row">
                            <div class="col-sm-12 mt-1 mb-3 text-center">
                              <button type="submit" name="submit" class="btn btn-sm btn-success">Ya</button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Tidak</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal hapus -->

                   <!-- modal edit -->
                   <div class="modal fade" id="modaledit<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                       <!-- form untuk edit -->
                       <form action="update.php" method="POST">
                          <?php
                          $id = $row['id'];
                          $query = $koneksi->query("SELECT * FROM instruktur WHERE id='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id" value="<?= $result['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-user-pen"></i> Edit Istruktur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="nama">Nama Instruktur</label>
                              <input type="text" class="form-control" name="nama" id="nama" value="<?= $result['nama_instruktur']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="alamat">Alamat</label>
                              <textarea name="alamat" id="alamat" rows="5" class="form-control" required><?= $result['alamat']; ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                              <label for="mata_kuliah">Mata Kuliah</label>
                              <input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" value="<?= $result['mata_kuliah']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="no_hp">No Hp</label>
                              <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?= $result['no_hp']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $result['tanggal_lahir']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $result['jenis_kelamin']; ?>" required>
                              <option></option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                             </select>

                            </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-sm btn-warning">Update</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
                        <!-- akhir form -->
                        </div>
                    </div>
                  </div>
                  </form>
                  <!-- end modal edit -->
                <?php } ?>
              </tbody>
            </table>

            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                  <a href="instruktur.php?page=<?= $page - 1 ?>" class="page-link">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) :
                  if ($i != $page) {
                ?>
                    <li class="page-item">
                      <a href="instruktur.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                  <?php } else { ?>
                    <li class="page-item">
                      <a href="instruktur.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php
                  }
                endfor
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a href="instruktur.php?page=<?= $page + 1 ?>" class="page-link">Next</a>
                </li>
              </ul>
            </nav>

           <!-- Tombol cetak Excel Dan Print -->
          <div class="">
          <a href="excel.php" class="btn btn-sm btn-success text-white"><i class="fa-solid fa-file-excel"></i>    Ekspor to Excel</a> 
          <a href="cetak.php" class="btn btn-sm btn-warning text-white"><i class="fa-solid fa-print"></i>    Print</a> 
          </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->

  <!-- Javascript -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>