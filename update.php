<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = date('Y-m-d H:i:s');
    $no_hp = $_POST['no_hp'];
    

    $update = $koneksi->query("UPDATE instruktur SET nama_instruktur='$nama', mata_kuliah='$mata_kuliah', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', no_hp='$no_hp' WHERE id='$id'");

    if ($update) {
        header('location:instruktur.php?success-update');
    }
}