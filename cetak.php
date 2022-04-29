<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- style CSS -->
     <link rel="stylesheet" href="style.css">


    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

     <!-- font awesome -->
     <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <title>Cetak Print</title>
  </head>
  <body onload="window.print();">

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
                    <td class="text-center"><?= $row['nama_instruktur']; ?></td>
                    <td class="text-center"><?= $row['mata_kuliah']; ?></td>
                    <td class="text-center"><?= $row['tanggal_lahir']; ?></td>
                    <td class="text-center"><?= $row['jenis_kelamin']; ?></td>
                    <td class="text-center"><?= $row['no_hp']; ?></td>
                    <td class="text-center"><?= $row['alamat']; ?></td>
                    <td class="text-center">

                    </td>
                  </tr>
                  <!-- modal hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <p class="fs-4 fw-bold text-center mt-3">HAPUS DATA</p>
                        <hr>
                        <p class="fs-6 text-center mt-1">Data Ini Akan Di Hapus ?</p>
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
                  <!-- end modal hapus  -->

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
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Istruktur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="nama_instuktur">Nama Instruktur</label>
                              <input type="text" class="form-control" name="nama_instuktur" id="nama_instuktur" value="<?= $result['nama_instruktur']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="alamat">Alamat</label>
                              <textarea name="alamat" id="alamat" rows="5" class="form-control" required><?= $result['alamat']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $result['tanggal_lahir']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $result['jenis_kelamin']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="mata_kuliah">Mata Kuliah</label>
                              <input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" value="<?= $result['mata_kuliah']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group mb-3">
                              <label for="no_hp">No Hp</label>
                              <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?= $result['no_hp']; ?>" required>
                            </div>

                        </form>
                        <!-- akhir form -->

                      </div>
                    </div>
                  </div>
                  <!-- end modal edit  -->

                <?php } ?>
              </tbody>
            </table>

         

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>              