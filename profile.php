<?php
    include("conection.php");
    session_start();
    if($_GET['id']){
        $id = $_GET['id'];
    }else{
        $id = $_SESSION['id_pengguna'];
    }
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
                <img src="<?= $row['foto_pengguna'] ?>" alt="Foto Pengguna">
                <div class="nama"><?= $row['nama_pengguna'] ?></div>
                <div class="username"><?= $row['namaUser_pengguna'] ?></div>
            </div>
            <div class="biodata">
                <div class="isi-biodata"><?= $row['email_pengguna'] ?></div>
                <div class="isi-biodata"><?= $row['jenisKelamin_pengguna'] ?></div>
            </div>
            <div class="ubah-bio"><a href="update-profile.php?id=<?= $row['id_pengguna'] ?>">Ubah</a></div>
        </div>
        <div class="container-riwayat">
            <div class="riwayat-judul">Riwayat Pembuatan Survey</div>
            <div class="riwayat">
                <?php while($row_s = mysqli_fetch_assoc($query_s)){ ?>
                <a href="survey.php?id=<?= $row_s['id_survei'] ?>" class="riwayat-group">
                    <div class="judul-riwayat"><?= $row_s['judul_survei'] ?></div>
                    <div class="waktu-riwayat"><?= $row_s['waktu_survei'] ?></div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>