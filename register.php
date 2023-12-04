<?php 
    include 'conection.php';

    if(isset($_POST['register'])){
        $name=$_POST['name']? $_POST['name'] : 0;
        $username=$_POST['username']? $_POST['username'] : 0;
        $email=$_POST['email']? $_POST['email'] : 0;
        $password=$_POST['password']? $_POST['username'] : 0;
        $confirm=$_POST['confirm']? $_POST['confirm'] : 0;

        $pop="none";

        $queryselect="SELECT * FROM user ORDER BY id ASC";
        $result=mysqli_query($conn,$queryselect);
        //gatau masih blom masuk database
        while($row=mysqli_fetch_array($result)){
            
        }

        if($email===$row['email']){
            $pop="flex";
        }elseif($username===$row['username']){
            $pop="flex";
        }elseif($password==$confirm){
            $query=="INSERT INTO user(name, username,password,email) VALUES('$name','$username','$password','$email')";
            $result=mysqli_query($conn,$query);
        }
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
    <div class="container" id="register">
        <div class="kanan">
            <h1>Daftar Sekarang</h1>
            <form action="" method="post">
                <div class="eror-popup" id="eror-popup" style="display: <?php echo $pop ?>;">
                    <span id="eror-text"></span>
                </div>
                <div class="input-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Masukan nama Anda.." required>
                </div>
                <div class="input-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" name="username" id="username" placeholder="Masukan nama pengguna Anda.." required>
                </div>
                <div class="input-group">
                    <label for="emailku">Email</label>
                    <input type="email" name="email" id="emailku" placeholder="Masukan email Anda.." required>
                </div>
                <div class="input-group">
                    <label for="passwordku">Kata Sandi</label>
                    <input type="password" name="password" id="passwordku" placeholder="Masukan kata sandi Anda.." required>
                </div>
                <div class="input-group">
                    <label for="passwordku">Konfirmasi Kata Sandi</label>
                    <input type="password" name="confirm" id="konfirmasiku" placeholder="Masukan password Anda.." required>
                </div>
                <input type="submit" name="register" value="Daftar" class="submit" required>
            </form>
            <p class="atau">- ATAU -</p>
            <small>Sudah memiliki akun? <a href="login.php"><b>Masuk</b></a></small>
        </div>
        <div class="kiri">
            <img src="assets/images/mobile-register-bro.png" alt="Register">
            <p>Glorious Web Survey</p>
        </div>
    </div>
</body>
</html>
