<?php
if (isset($_POST['simpan'])) {
  // include koneksi
  require 'koneksi.php';
  // menangkap data yang dikirimkan dari form
  $nama_istruktur = $_POST['nama_instruktur'];
  $mata_kuliah = $_POST['mata_kuliah'];
  $tanggal_lahir = date('Y-m-d H:i:s');
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  
  

  // proses simpan ke database
  $query = $koneksi->query("INSERT INTO instruktur (nama_instruktur, mata_kuliah, tanggal_lahir, jenis_kelamin, alamat, no_hp) VALUES ('$nama_istruktur', '$mata_kuliah', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_hp')");
  // proses pengecekan berhasil atau tidaknya simpan data ke database
  if ($query) {
    header('location:instruktur.php?berhasil');
  } else {
    echo "Gagal Tambah Data";
  }
}