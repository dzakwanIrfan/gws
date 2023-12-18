<?php 
    include ("conection.php");

    $sql = "SELECT * FROM pengguna;";
    $query = mysqli_query($conn, $sql);

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $sql = "DELETE FROM pengguna WHERE id_pengguna = $id;";
        $query_del = mysqli_query($conn, $sql);
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
                <th>Foto</th>
                <th>Nama Pengguna</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis kelamin</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td class="user"><img src="<?= $row['foto_pengguna'] ?>" alt="profile"></td>
                <td><?= $row['namaUser_pengguna'] ?></td>
                <td><?= $row['nama_pengguna'] ?></td>
                <td><?= $row['email_pengguna'] ?></td>
                <td><?= $row['jenisKelamin_pengguna'] ?></td>
                <td class="action">
                    <a href="profile.php?id=<?= $row['id_pengguna'] ?>"><ion-icon class="icon" name="eye-outline" style="color: white; background-color: #4E639A; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <a href="update-profile.php?id=<?= $row['id_pengguna'] ?>"><ion-icon class="icon" name="create-outline" style="background-color: #D6DA15; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <a href="dashboard-user.php?del=<?= $row['id_pengguna'] ?>"><ion-icon class="icon" name="trash-outline" style="color: white; background-color: #9F2727; padding: 4px; border-radius:4px"></ion-icon></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>