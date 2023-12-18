<?php
    include("conection.php");
    $id = $_GET['id'];
    //profil pengguna
    $sql = "SELECT * FROM pengguna WHERE id_pengguna = $id;";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    //survei pengguna
    $sql_s = "SELECT * FROM survei WHERE id_pengguna = $id;";
    $query_s = mysqli_query($conn, $sql_s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php include("layouts/font.php"); ?>
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>
    <?php include("layouts/sidebar.php"); ?>
    <div class="profile-container">
        <div class="container-profile">
            <h1>Profil</h1>
            <div class="bio">
                <img src="assets/images/profile-picture.png" alt="">
                <div class="nama">Nama Pengguna</div>
                <div class="username">username</div>
            </div>
            <div class="biodata">
                <div class="isi-biodata">name@gmail.com</div>
                <div class="isi-biodata">Laki-laki</div>
            </div>
            <div class="ubah-bio"><a href="update-profile.php?id=<?= $row['id_pengguna'] ?>">Ubah</a></div>
        </div>
        <div class="container-riwayat">
            <div class="riwayat-judul">Riwayat Pembuatan Survey</div>
            <div class="riwayat">
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
                <a href="#" class="riwayat-group">
                    <div class="judul-riwayat">Judul Survei bawah</div>
                    <div class="waktu-riwayat">1 December 2023</div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>