<?php
    include "conection.php";
    session_start();

    if(isset($_SESSION['username']) || isset($_SESSION['email'])){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $passwordError = false;
        echo "ada";

        $queryselect="SELECT * FROM pengguna where email_pengguna='$email'";
        $result=mysqli_query($conn,$queryselect);

        if(mysqli_num_rows($result) > 0){
            $row=mysqli_fetch_array($result);
            if(md5($password) == $row['kataSandi_pengguna']){
                if($row['role_pengguna'] == 'admin'){
                    $_SESSION['username']=$row['namaUser_pengguna'];
                    $_SESSION['id_pengguna']=$row['id_pengguna'];
                    $_SESSION['role_pengguna']=$row['role_pengguna'];
                    header("Location: dashboard-user.php");
                    exit;
                } else if($row['role_pengguna'] == 'pemilik'){
                    $_SESSION['username']=$row['namaUser_pengguna'];
                    $_SESSION['id_pengguna']=$row['id_pengguna'];
                    $_SESSION['role_pengguna']=$row['role_pengguna'];
                    header("Location: index.php");
                    exit;
                } else if($row['role_pengguna'] == 'penyurvei'){
                    $_SESSION['username']=$row['namaUser_pengguna'];
                    $_SESSION['id_pengguna']=$row['id_pengguna'];
                    $_SESSION['role_pengguna']=$row['role_pengguna'];
                    header("Location: index.php");
                    exit;
                } else if($row['role_pengguna'] == 'responden'){
                    $_SESSION['username']=$row['namaUser_pengguna'];
                    $_SESSION['id_pengguna']=$row['id_pengguna'];
                    $_SESSION['role_pengguna']=$row['role_pengguna'];
                    header("Location: index.php");
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
                    echo "<div class='eror-popup'><span>Email atau Password Anda salah!</span></div>";
                }else if($_GET['message']=="logout"){
                    echo "<div class='eror-popup'><span>Anda telah logout!</span></div>";
                }else if($_GET['message']=="success"){
                    echo "<div class='eror-popup success'><span>Anda telah terdaftar!</span></div>";
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
                <small><p style="text-align: right; margin-right: 100px;"><a href="https://api.whatsapp.com/send/?phone=%2B6282313737136&text&type=phone_number&app_absent=0"><b>Lupa Kata Sandi ?</b></a></p></small>
                <input type="submit" value="Masuk" class="submit" name="login">
            </form>
            <p class="atau">- ATAU -</p>
            <small>Belum memiliki akun? <a href="register.php"><b>Daftar Sekarang</b></a></small>
        </div>
    </div>
</body>
</html>