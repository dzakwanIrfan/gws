<?php 
    include 'conection.php';

    session_start();

    if(!$_SESSION['username']){
         header('Location:login.php');
    }
    
    $id=$_SESSION['id_pengguna'];

    $query="SELECT survei.*, pengguna.* FROM survei JOIN pengguna ON survei.id_pengguna=pengguna.id_pengguna WHERE survei.id_pengguna='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);

    if($row['foto_pengguna']!=''){
        $image=$row['foto_pengguna'];
    }else{
        $image='assets/images/profile-picture.png';
    }
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
                <img src="<?php echo $image ?>" alt="">
                <div class="nama"><?php echo $row['nama_pengguna']?></div>
                <div class="username"><?php echo $row['namaUser_pengguna']?></div>
            </div>
            <div class="biodata">
                <div class="isi-biodata"><?php echo $row['email_pengguna']?></div>
                <div class="isi-biodata">
                    <?php 
                        if($row['jenisKelamin_pengguna']==''){
                            echo 'belom mengisi jenis kelamin';
                        }else{
                            echo $row['jenisKelamin_pengguna'];
                        }
                    ?>
                </div>
            </div>
            <div class="ubah-bio"><a href="update-profile.php">Ubah</a></div>
        </div>
        <div class="container-riwayat">
            <div class="riwayat-judul">Riwayat Pembuatan Survey</div>
            <div class="riwayat">
                <?php 
                    while($row=mysqli_fetch_array($result)){
                        ?>
                        <a href="survey.php?id=<?php echo $row['id_survei'] ?>" class="riwayat-group">
                            <div class="judul-riwayat"><?php echo $row['judul_survei'] ?></div>
                            <div class="waktu-riwayat"><?php echo $row['waktu_survei']?></div>
                        </a>
                        <?php
                    } 
                ?>
            </div>
        </div>
    </div>
</body>
</html>