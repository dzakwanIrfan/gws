<?php 
    if(isset($_POST['submit'])){

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