<?php 
    include 'conection.php';

    if(isset($_POST['register'])){
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/loginRegister.css">
    <?php include('layouts/font.php') ?>
</head>
<body>
    <div class="container" id="login">
        <div class="kiri">
            <img src="assets/images/mobile-login-bro.png" alt="Login">
            <p>Glorious Web Survey</p>
        </div>
        <div class="kanan">
            <h1>Masuk Sekarang</h1>
            <form action="" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Masukan email Anda..">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Masukan password Anda..">
                </div>
                <input type="submit" value="Masuk" class="submit">
            </form>
            <p class="atau">- ATAU -</p>
            <small>Belum memiliki akun? <b onclick="showContainer('register')">Daftar Sekarang</b></small>
        </div>
    </div>

    <div class="container" id="register" style="display: none">
        <div class="kanan">
            <h1>Daftar Sekarang</h1>
            <form action="">
                <div class="input-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Masukan nama Anda..">
                </div>
                <div class="input-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" name="username" id="username" placeholder="Masukan nama pengguna Anda..">
                </div>
                <div class="input-group">
                    <label for="emailku">Email</label>
                    <input type="email" name="email" id="emailku" placeholder="Masukan email Anda..">
                </div>
                <div class="input-group">
                    <label for="passwordku">Kata Sandi</label>
                    <input type="password" id="passwordku" placeholder="Masukan kata sandi Anda..">
                </div>
                <div class="input-group">
                    <label for="passwordku">Konfirmasi Kata Sandi</label>
                    <input type="password" id="passwordku" placeholder="Masukan kata sandi Anda..">
                    <label for="passwordku">Password</label>
                    <input type="password" name="password" id="passwordku" placeholder="Masukan password Anda..">
                </div>
                <input type="submit" name="register" value="Daftar" class="submit">
            </form>
            <p class="atau">- ATAU -</p>
            <small>Sudah memiliki akun? <b onclick="showContainer('login')">Masuk</b></small>
        </div>
        <div class="kiri">
            <img src="assets/images/mobile-register-bro.png" alt="Register">
            <p>Glorious Web Survey</p>
        </div>
    </div>
</body>
</html>

<script>
    function showContainer(containerId) {
        var loginContainer = document.getElementById('login');
        var registerContainer = document.getElementById('register');

        if (containerId === 'register') {
            loginContainer.style.animation = 'fadeOut 0.5s';
            registerContainer.style.animation = 'fadeIn 0.5s';
            loginContainer.style.display = 'none';
            registerContainer.style.display = 'flex';
        } else {
            registerContainer.style.animation = 'fadeOut 0.5s';
            loginContainer.style.animation = 'fadeIn 0.5s';
            registerContainer.style.display = 'none';
            loginContainer.style.display = 'flex';
        }
    }
</script>
