<?php 
    include ("conection.php");
    session_start();

    if(!$_SESSION['username']){
        header('Location:login.php');
    }

    $_SESSION['dashboard']=true;

    if($_SESSION['role_pengguna'] != 'pemilik' && $_SESSION['role_pengguna'] != 'admin'){
        echo "<script>alert('Dilarang memasuki halaman ini!'); document.location = 'index.php';</script>";
    }

    $sql = "SELECT * FROM survei;";
    $query = mysqli_query($conn, $sql);

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $sql = "DELETE FROM survei WHERE id_survei = $id;";
        $query_del = mysqli_query($conn, $sql);
        header('Location: dashboard-survey.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Survey - GWS</title>
    <?php include("layouts/font.php") ?>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <?php include("layouts/sidebar-admin.php") ?>
    <div class="container">
        <table>
            <tr>
                <th>Judul Survei</th>
                <th>Deskripsi Survei</th>
                <th>Foto Survei</th>
                <th>Pembuat Survei</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?= $row['judul_survei'] ?></td>
                <td><?= $row['deskripsi_survei'] ?></td>
                <td class="survey"><img src="<?= $row['gambar_survei'] ?>" alt=""></td>
                <td class="profile">
                    <a href="profile.php?id=<?= $row['id_pengguna'] ?>">
                        <?php
                            $id_pengguna = $row['id_pengguna'];
                            $sql_p = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna;";
                            $query_p = mysqli_query($conn, $sql_p); 
                            while($result_p = mysqli_fetch_assoc($query_p)){ 
                            echo $result_p['nama_pengguna']; 
                            }
                        ?>
                    </a>
                </td>
                <td class="action">
                    <a href="survey.php?id=<?= $row['id_survei'] ?>"><ion-icon class="icon" name="eye-outline" style="color:white; background-color: #4E639A; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <?php if ($_SESSION['role_pengguna'] == 'pemilik') { ?>
                        <a href="survey-laporan.php?id=<?= $row['id_survei'] ?>"><ion-icon class="icon" name="document-text-outline" style="color:black; background-color: #D6DA15; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <?php } else { ?>
                        <!-- tidak ada -->
                    <?php } ?>
                    <a href="#" onclick="confirmDelete(<?= $row['id_survei'] ?>)"><ion-icon class="icon" name="trash-outline" style="color:white; background-color: #9F2727; padding: 4px; border-radius:4px"></ion-icon></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <script>
    function confirmDelete(id) {
        if (confirm('Anda yakin untuk delete survei ini?')) {
            window.location.href = 'dashboard-survey.php?del=' + id;
        }
    }
</script>
</body>
</html>