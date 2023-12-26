<?php 
    include ("conection.php");
    session_start();


    if(isset($_GET['id'])){
        $id_p = $_GET['id'];
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna=$id_p;"));
    
        if($_SESSION['id_pengguna'] != $id_p){
            if($_SESSION['role_pengguna'] != 'pemilik' && $_SESSION['role_pengguna'] != 'admin'){
                echo "<script>document.location = 'profile.php?id=$id_p';</script>";
            }
        }
    } else {
        echo "<script>document.location = 'index.php';</script>";
    }

    if($_SESSION['page']==true){
        if($_SESSION['role_pengguna']=='pemilik' || $_SESSION['role_pengguna']=='admin'){
            $page='dashboard-user.php';
        }else{
            $page='profile.php?id='.$id_p;
        }
    }else{
        $page='profile.php?id='.$id_p;
    }

    //edit
    if(isset($_POST['ubah'])){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $kelamin = $_POST['kelamin'];
        $role = isset($_POST['role']) ? $_POST['role'] : 'penyurvei';
        $foto = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];

        $tipe_foto = 0;

        if($kelamin==''){
            if($foto != ""){
                $path = "image_pengguna/".$foto;
                $tipe_allowed = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

                if($tipe_allowed != 'jpg' && $tipe_allowed != 'png' && $tipe_allowed != 'jpeg'){
                    $tipe_foto = 1;
                }else{
                    move_uploaded_file($tmp, $path);
                    $update = "UPDATE pengguna SET namaUser_pengguna='$username', nama_pengguna='$nama', email_pengguna='$email', foto_pengguna='$path', role_pengguna='$role' WHERE id_pengguna='$id';";
                    $query = mysqli_query($conn, $update);
                    if($_SESSION['role_pengguna']=='pemilik' || $_SESSION['role_pengguna']=='admin'){
                        header("Location:" .$page);        
                    }else{
                        header("Location:profile.php?id=" .$id);
                    }
                }
            }

            if($tipe_foto == 1){
                echo '<script>alert("Hanya menerima foto berformat png, jpg, dan jpeg!")</script>';
            }else{
                $update = "UPDATE pengguna SET namaUser_pengguna='$username', nama_pengguna='$nama', email_pengguna='$email', role_pengguna='$role' WHERE id_pengguna='$id';";
                $query = mysqli_query($conn, $update);
                if($_SESSION['role_pengguna']=='pemilik' || $_SESSION['role_pengguna']=='admin'){
                    header("Location:" .$page);        
                }else{
                    header("Location:profile.php?id=" .$id);
                }
            }
        }else{
            if($foto != ""){
                $path = "image_pengguna/".$foto;
                $tipe_allowed = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

                if($tipe_allowed != 'jpg' && $tipe_allowed != 'png' && $tipe_allowed != 'jpeg'){
                    $tipe_foto = 1;
                }else{
                    move_uploaded_file($tmp, $path);
                    $update = "UPDATE pengguna SET namaUser_pengguna='$username', nama_pengguna='$nama', email_pengguna='$email', jenisKelamin_pengguna='$kelamin', foto_pengguna='$path', role_pengguna='$role' WHERE id_pengguna='$id';";
                    $query = mysqli_query($conn, $update);
                    if($_SESSION['role_pengguna']=='pemilik' || $_SESSION['role_pengguna']=='admin'){
                        header("Location:" .$page);        
                    }else{
                        header("Location:profile.php?id=" .$id);
                    }
                }
            }

            if($tipe_foto == 1){
                echo '<script>alert("Hanya menerima foto berformat png, jpg, dan jpeg!")</script>';
            }else{
                $update = "UPDATE pengguna SET namaUser_pengguna='$username', nama_pengguna='$nama', email_pengguna='$email', jenisKelamin_pengguna='$kelamin', role_pengguna='$role' WHERE id_pengguna='$id';";
                $query = mysqli_query($conn, $update);
                if($_SESSION['role_pengguna']=='pemilik' || $_SESSION['role_pengguna']=='admin'){
                    header("Location:" .$page);        
                }else{
                    header("Location:profile.php?id=" .$id);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Profil</title>
    <link rel="stylesheet" href="assets/css/update-profil.css">
    <?php include('layouts/font.php') ?>
</head>
<body>
    <?php include('layouts/sidebar.php'); ?>
    <div class="container-update-user">
        <h1>Ubah Profil</h1>
        <div class="wrap">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <?php
                if ($row['foto_pengguna'] == ''){
                    echo "<img id='previewImage' src='assets/images/profile-picture.png' style='cursor: pointer;'>";
                } else {
                    $fotoku = $row['foto_pengguna'];
                    echo "<img id='previewImage' src='$fotoku' style='cursor: pointer;'>";
                }
                ?>
            <input type="file" style="display: none" id="fileInput" onchange="previewFile()" name="img">
            <input type="hidden" value="<?= $row['id_pengguna'] ?>" name="id">
                <div class="input-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" placeholder="Masukan nama pengguna Anda.." value="<?= $row['namaUser_pengguna'] ?>" name="username">
                </div>
                <div class="input-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" placeholder="Masukan nama Anda.." value="<?= $row['nama_pengguna'] ?>" name="nama">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="Masukan Email Anda.." value="<?= $row['email_pengguna'] ?>" name="email">
                </div>
                <?php if($row['jenisKelamin_pengguna']){ ?>
                        <select name="kelamin" id="jenis-kelamin" style="color: rgba(0, 0, 0, 0.5);" hidden>
                            <option disabled selected >Masukan Kelamin Anda..</option>
                            <option value="laki-laki" <?php if($row['jenisKelamin_pengguna'] == "laki-laki"){ echo "selected"; } ?>>Laki-laki</option>
                            <option value="perempuan" <?php if($row['jenisKelamin_pengguna'] == "perempuan"){ echo "selected"; } ?>>Perempuan</option>
                        </select>
                <?php } else { ?>
                    <div class="input-group">
                        <label for="jenis-kelamin">Jenis-kelamin</label>
                        <select name="kelamin" id="jenis-kelamin" style="color: rgba(0, 0, 0, 0.5);">
                            <option disabled selected >Masukan Kelamin Anda..</option>
                            <option value="laki-laki" <?php if($row['jenisKelamin_pengguna'] == "laki-laki"){ echo "selected"; } ?>>Laki-laki</option>
                            <option value="perempuan" <?php if($row['jenisKelamin_pengguna'] == "perempuan"){ echo "selected"; } ?>>Perempuan</option>
                        </select>
                    </div>
                <?php } 
                    if($_SESSION['role_pengguna']=='pemilik'){
                        ?>
                            <div class="input-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" style="color: rgba(0, 0, 0, 0.5);">
                                <?php 
                                    if($row['role_pengguna']=='pemilik'){
                                        ?>
                                            <option value="pemilik" selected>Pemilik</option>
                                        <?php    
                                    }else{
                                        ?>
                                            <option value="admin" <?php if($row['role_pengguna'] == "admin"){ echo "selected"; } ?>>Admin</option>
                                            <option value="penyurvei" <?php if($row['role_pengguna'] == "penyurvei"){ echo "selected"; } ?>>Penyurvei</option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </div>    
                        <?php
                    }
                ?>
                <div class="submit-group">
                    <a href="<?php 
                        if($_SESSION['role_pengguna']=='pemilik' || $_SESSION['role_pengguna']=='admin'){
                            echo $page;
                        }else{
                            echo 'profile.php?id=' .$id_p;
                        }
                    ?>" class="batal">Batal</a>
                    <input type="submit" value="Ubah" class="submit" name="ubah">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script>
        // Fungsi untuk menampilkan gambar yang dipilih
        function previewFile() {
            var fileInput = document.getElementById('fileInput');
            var previewImage = document.getElementById('previewImage');

            // Mengecek apakah pengguna telah memilih file
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                // Ketika file telah selesai dibaca
                reader.onload = function(e) {
                    // Mengganti sumber gambar dengan data URL dari file yang dipilih
                    previewImage.src = e.target.result;
                }

                // Membaca file sebagai URL data
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        // Fungsi untuk mengaktifkan input file saat gambar diklik
        document.getElementById('previewImage').onclick = function() {
            document.getElementById('fileInput').click();
        };
    </script>