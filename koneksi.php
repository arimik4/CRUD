<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_instruktur_ari";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
  die("Koneksi Gagal, Silahkan cek !!" . mysqli_connect_error());
}