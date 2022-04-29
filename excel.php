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

    <title>Cetak Excel</title>
  </head>
  <!-- code untuk export ke excel -->
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=datainstruktur.xls");
?>
<!-- batas code untuk export ke excel -->

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