<?php
    include("conection.php");
    session_start();
    if($_GET['id'] != ''){
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
                <?php
                if ($row['foto_pengguna'] == ''){
                    echo "<img src='assets/images/profile-picture.png' alt='Foto Pengguna'>";
                } else {
                    $fotoku = $row['foto_pengguna'];
                    echo "<img src='$fotoku' alt='Foto Pengguna'>";
                }
                ?>
                <div class="nama"><?= $row['nama_pengguna'] ?></div>
                <div class="username"><?= $row['namaUser_pengguna'] ?></div>
            </div>
            <div class="biodata">
                <div class="isi-biodata"><?= $row['email_pengguna'] ?></div>
                <div class="isi-biodata"><?= $row['jenisKelamin_pengguna'] ?></div>
            </div>
            <?php if ($_SESSION['role_pengguna'] == 'admin' || $_SESSION['role_pengguna'] == 'pemilik' || $_SESSION['id_pengguna'] == $row['id_pengguna']) { ?>
                <div class="ubah-bio"><a href="update-profile.php?id=<?= $row['id_pengguna'] ?>">Ubah</a></div>
            <?php } else { ?>
                <!-- tidak ada -->
            <?php } ?>
        </div>
        <div class="container-riwayat">
            <div class="riwayat-judul">Riwayat Pembuatan Survey</div>
            <div class="riwayat">
                <?php while($row_s = mysqli_fetch_assoc($query_s)){ ?>
                    <?php if ($_SESSION['id_pengguna'] == $_GET['id']) { ?>
                        <a href="survey-laporan.php?id=<?= $row_s['id_survei'] ?>" class="riwayat-group">
                            <div class="judul-riwayat"><?= $row_s['judul_survei'] ?></div>
                            <div class="waktu-riwayat"><small><?= date('d F Y', strtotime($row_s['waktu_survei'])) ?></small></div>
                        </a>
                    <?php } else { ?>
                        <a href="survey.php?id=<?= $row_s['id_survei'] ?>" class="riwayat-group">
                            <div class="judul-riwayat"><?= $row_s['judul_survei'] ?></div>
                            <div class="waktu-riwayat"><small><?= date('d F Y', strtotime($row_s['waktu_survei'])) ?></small></div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>