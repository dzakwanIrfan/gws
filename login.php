<?php
    include "connection.php";
    session_start();

    if(isset($_SESSION['username']) || isset($_SESSION['email'])){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $passwordError = false;

        $queryselect="SELECT * FROM pengguna where email='$email'";
        $result=mysqli_query($conn,$queryselect);

        if(mysqli_num_rows($result) > 0){
            $row=mysqli_fetch_array($result);
            if(password_verify($password, $row['password'])){
                if($row['role'] == 'admin'){
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['role']='admin';
                    $_SESSION['foto_pengguna'] = $row['foto_pengguna'];
                    header("Location: admin/index.php");
                    exit;
                } else if($row['level'] == 'pemilik'){
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['role']='pemilik';
                    $_SESSION['foto_pengguna'] = $row['foto_pengguna'];
                    header("Location: pemilik/index.php");
                    exit;
                } else if($row['level'] == 'penyurvei'){
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['role']='penyurvei';
                    $_SESSION['foto_pengguna'] = $row['foto_pengguna'];
                    header("Location: penyurvei/index.php");
                    exit;
                } else if($row['level'] == 'responden'){
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['role']='responden';
                    $_SESSION['foto_pengguna'] = $row['foto_pengguna'];
                    header("Location: responden/index.php");
                    exit;
                }
            }else{
                $passwordError = true;
                header("Location: login.php?message=failed");
            }
        }else{
            header("Location: login.php?message=failed");
        }
    }
?>

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
                    echo "<div class='eror-popup'><span>Username atau Password Anda salah!</span></div>";
                }
            ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukan email Anda..">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan password Anda..">
                </div>
                <input type="submit" value="Masuk" class="submit" name="login">
            </form>
            <p class="atau">- ATAU -</p>
            <small>Belum memiliki akun? <a href="register.php"><b>Daftar Sekarang</b></a></small>
        </div>
    </div>
</body>
</html>