<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body style="background-color: orange ;">
  <a href="logout.php">Logout</a>
  <center>
    <h3>Daftar Mahasiswa</h3>
    <img src="img/poltek.png" width="300px">
    <br>
    <br>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="POST">
      <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian...." autocomplete="off" autofocus class="keyword">
      <button type="submit" name="cari" class="tombol-cari">Cari!</button>
    </form>
    <br>


    <div class="container">
      <table border="1" cellpadding="10" cellspacing="0">
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>

        <?php if (empty($mahasiswa)) : ?>
          <tr>
            <td colspan="4">
              <p style="color: red; font-style:italic;">data mahasiswa tidak ditemukan</p>
            </td>
          </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($mahasiswa as $m) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $m['gambar']; ?>" width="50"></td>
            <td><?= $m['nama']; ?></td>
            <td>
              <a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </center>

  <script src="js/script.js"></script>

</body>

</html>