<?php 
    include 'conection.php';
    session_start();

    if(isset($_POST['submit'])){
        $judul=$_POST['judul'];
        $desk=$_POST['desk'];
        $id=$_SESSION['id'];

        $img = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        if ($img != '') {
            $path = "image_survei/".$img;
            $tipe_allowed = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            if ($tipe_allowed != 'jpg' && $tipe_allowed != 'png' && $tipe_allowed != 'jpeg') {
                echo "<script>alert('Gambar hanya dapat menerima file JPG, PNG, dan JPEG!');</script>";
            } else {
                move_uploaded_file($tmp, $path);
                $query="INSERT INTO survei(judul_survei, deskripsi_survei, gambar_survei, id_pengguna) VALUES('$judul','$desk','$path','$id')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>alert('Survei Berhasil Ditambah!'); document.location = 'index.php';</script>";
                }else{
                    echo "<script>alert('Gagal menambah Survei!'); document.location = 'create-survey.php';</script>";
                }

            }
        }else{
            $query="INSERT INTO survei(judul_survei, deskripsi_survei, id_pengguna) VALUES('$judul','$desk','$id')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Survei Berhasil Ditambah!'); document.location = 'index.php';</script>";
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
        <div class="judul">Kelola Survei</div>
        <form action="#">
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
                    <img src="assets/images/gambar-survey.png" alt="survei">
                    <input type="file" name="gambar" id="gambar" class="file">
                </div>
            </div>
            <input type="submit" name="submit" value="Buat Survei">
        </form>
    </div>
</body>
</html>