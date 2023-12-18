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
            <form action="">
            <img id="previewImage" src="assets/images/ganteng.png" alt="" style="cursor: pointer;">
            <input type="file" style="display: none" name="foto" id="fileInput" onchange="previewFile()">
                <div class="input-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" placeholder="Masukan nama pengguna Anda..">
                </div>
                <div class="input-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" placeholder="Masukan nama Anda..">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="Masukan Email Anda..">
                </div>
                <div class="input-group">
                    <label for="jenis-kelamin">Jenis-kelamin</label>
                    <select name="kelamin" id="jenis-kelamin" style="color: rgba(0, 0, 0, 0.5);">
                        <option disabled selected >Masukan Kelamin Anda..</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="erempuan">Perempuan</option>
                    </select>
                </div>
                <div class="submit-group">
                    <a href="profile.php" class="batal">Batal</a>
                    <input type="submit" value="Ubah" class="submit">
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