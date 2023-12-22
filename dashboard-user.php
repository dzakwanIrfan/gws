<?php 
    include ("conection.php");
    session_start();
    
    if($_SESSION['role_pengguna'] != 'pemilik' && $_SESSION['role_pengguna'] != 'admin'){
        echo "<script>alert('Dilarang memasuki halaman ini!'); document.location = 'index.php';</script>";
    }

    $sql = "SELECT * FROM pengguna;";
    $query = mysqli_query($conn, $sql);

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $sql = "DELETE FROM pengguna WHERE id_pengguna = $id;";
        $query_del = mysqli_query($conn, $sql);
        header('Location: dashboard-user.php');
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
                <th>Foto Pengguna</th>
                <th>Nama User Pengguna</th>
                <th>Nama Pengguna</th>
                <th>Email Pengguna</th>
                <th>Jenis kelamin</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td>
                    <img class="user" src="<?php 
                        if($row['foto_pengguna']!=''){
                            echo $row['foto_pengguna'];
                        }else{
                            echo "assets/images/profile-picture.png";                     
                        }
                    ?>" alt="profile">
                </td>
                <td><?= $row['namaUser_pengguna'] ?></td>
                <td><?= $row['nama_pengguna'] ?></td>
                <td><?= $row['email_pengguna'] ?></td>
                <td><?= $row['jenisKelamin_pengguna'] ?></td>
                <td class="action">
                    <a href="profile.php?id=<?= $row['id_pengguna'] ?>"><ion-icon class="icon" name="eye-outline" style="color: white; background-color: #4E639A; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <a href="update-profile.php?id=<?= $row['id_pengguna'] ?>"><ion-icon class="icon" name="create-outline" style="background-color: #D6DA15; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <a href="#" onclick="confirmDelete(<?= $row['id_pengguna'] ?>)"><ion-icon class="icon" name="trash-outline" style="color: white; background-color: #9F2727; padding: 4px; border-radius:4px"></ion-icon></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
<script>
    function confirmDelete(id) {
        if (confirm('Anda yakin untuk delete pengguna ini?')) {
            window.location.href = 'dashboard-user.php?del=' + id;
        }
    }
</script>
</body>
</html>