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
                <img src="assets/images/ganteng.png" alt="">
                <input type="file" style="display: none" name="foto">
                <div class="input-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" placeholder="Masukan nama pengguna Anda..">
                </div>
                <div class="input-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" placeholder="Masukan nama Anda..">
                </div>
                <div class="input-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="number" id="telepon" placeholder="Masukan nomor telepon Anda..">
                </div>
                <div class="input-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" placeholder="Masukan alamat Anda..">
                </div>
                <div class="dropdown-group">
                    <div class="input-group">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="kota">Kota</label>
                        <select name="kota" id="kota">
                            <option value="">Pilih Kota</option>
                        </select>
                    </div>
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