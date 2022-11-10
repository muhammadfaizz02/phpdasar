<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
}

require 'functions.php';

$id = $_GET['id'];

$m = query("SELECT * FROM mahasiswa WHERE id = $id");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body style="background-color:orange ;">

  <h3>Detail Mahasiswa</h3>
  <img src="img/poltek.png" width="300px">
  <ul>
    <li><img src="img/<?= $m['gambar'] ?>" width="100"></li>
    <li>NPM : <?= $m['npm'] ?></li>
    <li>Nama : <?= $m['nama'] ?></li>
    <li>Email : <?= $m['email'] ?></li>
    <li>Jurusan : <?= $m['jurusan'] ?></li>
    <li><a href="ubah.php?id=<?= $m['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');">hapus</a> </li>
    <li><a href="index.php">Kembali ke daftar mahasiswa</a></li>
  </ul>

</body>

</html>