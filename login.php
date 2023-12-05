<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <small>Belum memiliki akun? <a href="register.php"><b>Daftar Sekarang</b></a></small>
        </div>
    </div>
</body>
</html>