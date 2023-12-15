<?php 
    include 'conection.php';
    session_start();
    if(isset($_SESSION['username']) || isset($_SESSION['email'])){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['register'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];

        $queryselectusername="SELECT * FROM pengguna where namaUser_pengguna='$username'";
        $resultusername=mysqli_query($conn,$queryselectusername);

        $queryselectemail="SELECT * FROM pengguna where email_pengguna='$email'";
        $resultemail=mysqli_query($conn,$queryselectemail);

        if(mysqli_num_rows($resultusername) > 0 && mysqli_num_rows($resultemail)>0){
            header("Location:register.php?message=same");
        }elseif(mysqli_num_rows($resultusername) > 0){
            header("Location:register.php?message=username");
        }elseif(mysqli_num_rows($resultemail)>0){
            header("Location:register.php?message=email");
        }else {
            if ($password == $confirm) {
                $password = md5($password);
                $queryinsert="INSERT INTO pengguna (nama_pengguna, namaUser_pengguna, email_pengguna, kataSandi_pengguna, role_pengguna) VALUES ('$name', '$username', '$email', '$password','penyurvei')";
                $result=mysqli_query($conn,$queryinsert);
                if($result){
                    header("Location: login.php?message=success");
                } else {
                    header("Location: register.php?message=failed");
                }
            } else {
                header("Location: register.php?message=unsync");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/loginRegister.css">
    <?php include('layouts/font.php') ?>
</head>
<body>
    <div class="container" id="register">
        <div class="kanan">
            <h1>Daftar Sekarang</h1>
            <?php 
                if($_GET['message']=="same"){
                    echo "<div class='eror-popup'><span>Username and Email sudah digunakan!</span></div>";
                }elseif($_GET['message']=="username"){
                    echo "<div class='eror-popup'><span>Username sudah digunakan!</span></div>";
                }elseif($_GET['message']=="email"){
                    echo "<div class='eror-popup'><span>Email sudah digunakan!</span></div>";
                }elseif($_GET['message']=="unsync"){
                    echo "<div class='eror-popup'><span>Password dan Konfirmasi Password tidak sesuai!</span></div>";
                }elseif($_GET['message']=="failed"){
                    echo "<div class='eror-popup'><span>Gagal terdaftar mohon isi kembali!</span></div>";
                }
            ?>
            <form action="" method="post">
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