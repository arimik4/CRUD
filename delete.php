<?php
if (isset($_POST['submit'])) {
  require 'koneksi.php';

  $id = $_POST['id'];

  $query = $koneksi->query("DELETE FROM instruktur WHERE id = '$id'");

  if ($query) {
    header('Location:instruktur.php?berhasil_hapus');
  }
}