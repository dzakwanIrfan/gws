<?php 
    date_default_timezone_set('Asia/Jakarta');
    include 'conection.php';
    session_start();

    if(!$_SESSION['username']){
        header('Location:login.php');
    }

    if(isset($_POST['submit'])){
        $judul=$_POST['judul'];
        $desk=$_POST['desk'];
        $currentTime = date("Y-m-d H:i:s");
        $id=$_SESSION['id_pengguna'];

        $img = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        if ($img != '') {
            $path = "image_survei/".$img;
            $tipe_allowed = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            if ($tipe_allowed != 'jpg' && $tipe_allowed != 'png' && $tipe_allowed != 'jpeg') {
                echo "<script>alert('Gambar hanya dapat menerima file JPG, PNG, dan JPEG!');</script>";
            } else {
                move_uploaded_file($tmp, $path);
                $query="INSERT INTO survei(judul_survei, deskripsi_survei, gambar_survei, id_pengguna, waktu_survei, naik_survei, turun_survei) VALUES('$judul','$desk','$path','$id','$currentTime', '0', '0')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $query="SELECT id_survei FROM survei WHERE judul_survei='$judul' && id_pengguna='$id'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_array($result);
                    $id_survei=$row['id_survei'];
                    echo "<script>alert('Survei Berhasil Ditambah!'); document.location = 'create-question.php?id=$id_survei';</script>";
                }else{
                    echo "<script>alert('Gagal menambah Survei!'); document.location = 'create-survey.php';</script>";
                }

            }
        }else{
            $query="INSERT INTO survei(judul_survei, deskripsi_survei, id_pengguna, Waktu_survei, gambar_survei, naik_survei, turun_survei) VALUES('$judul','$desk','$id','$currentTime','assets/images/gambar-survey.png', '0', '0')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $query="SELECT id_survei FROM survei WHERE judul_survei='$judul' && id_pengguna='$id'";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_array($result);
                $id_survei=$row['id_survei'];
                echo "<script>alert('Survei Berhasil Ditambah!'); document.location = 'create-question.php?id=$id_survei';</script>";
            }else{
                echo "<script>alert('Gagal menambah Survei!'); document.location = 'create-survey.php';</script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Survei - GWS</title>
    <?php include("layouts/font.php"); ?>
    <link rel="stylesheet" href="assets/css/create-survey.css">
</head>
<body>
    <?php include("layouts/sidebar.php"); ?>
    <div class="container">
        <div class="judul">Pembuatan Survei</div>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="input-container">
                <div class="input-group">
                    <label for="judul">Judul Survei</label>
                    <input type="text" name="judul" id="judul" placeholder="Masukan judul survei Anda ...">
                </div>
                <div class="input-group">
                    <label for="desk">Deskripsi Survei</label>
                    <textarea name="desk" id="desk" cols="30" rows="5" placeholder="Masukan deskripsi survei Anda ..."></textarea>
                </div>
                <div class="input-group">
                    <label for="gambar">Gambar Survei</label>
                    <img id="gambarinput" style="height: 10rem; width: 100%;">
                    <input type="file" name="gambar" id="gambar" class="file">
                </div>
            </div>
            <input type="submit" name="submit" value="Buat Survei">
        </form>
    </div>
</body>
<script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('gambarinput').src = e.target.result;
            }

            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
</html>