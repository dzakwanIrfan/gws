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
    <style>
        .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
      }

      .popup {
        position: relative;
        max-height: 80%;
        background-color: #d6cc99;
        padding: 20px;
        max-width: 40%;
        margin: 20px auto;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        overflow-y: scroll;
      }

      .close-btn {
        cursor: pointer;
        color: #333;
        float: right;
        font-size: 20px;
      }

      #submitButton:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
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
            <form action="" method="post" onsubmit="return validateForm()">
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
                <label for="termsCheckbox" style="display: flex; align-items: center; font-size: 16px; justify-content: center;">
                    <a href="#" onclick="showPopup()" style="color: #445D48; margin-right: 10px; font-weight: 600;">agree to the terms and conditions</a>
                    <input type="checkbox" id="termsCheckbox" onchange="enableSubmit()" style="width: 20px; height: 20px;" />
                </label>

                </label>

                <input type="submit" name="register" value="Daftar" id="submitButton" class="submit" disabled>
            </form>
            <p class="atau">- ATAU -</p>
            <small>Sudah memiliki akun? <a href="login.php"><b>Masuk</b></a></small>
        </div>
        <div class="kiri">
            <img src="assets/images/mobile-register-bro.png" alt="Register">
            <p>Glorious Web Survey</p>
        </div>
    </div>

    <div id="overlay" class="overlay">
      <div class="popup">
        <div class="sticky">
            <span class="close-btn" onclick="hidePopup()">&times;</span>
            <h2 style="color: #445D48;">Terms and Conditions</h2>
        </div>
        <p>
            Selamat datang di GWS! Mohon diperhatikan bahwa dengan mengakses dan menggunakan GWS, Anda dianggap menyetujui syarat dan ketentuan penggunaan berikut. Jika Anda tidak setuju dengan syarat dan ketentuan ini, harap untuk tidak menggunakan situs ini. <br>
            1. penggunaan Materi <br>
            Semua materi, informasi, dan konten lainnya yang terdapat di GWS dimiliki atau dikendalikan oleh Pemilik. Pengguna tidak diperbolehkan mengunduh, menggandakan, memodifikasi, atau mendistribusikan materi tersebut tanpa izin tertulis dari Pemilik. <br>
            <br>
            2. Akun Pengguna <br>
            Jika Anda membuat akun di GWS, Anda bertanggung jawab untuk menjaga keamanan informasi akun Anda dan memberikan informasi yang benar dan akurat. Anda juga bertanggung jawab atas semua kegiatan yang terjadi di bawah akun Anda. <br>
            <br>
            3. Batasan Tangung Jawab <br>
            Pemilik tidak bertanggung jawab atas kerugian atau kerusakan yang timbul akibat penggunaan atau akses terhadap GWS. Kami tidak memberikan jaminan atas keakuratan atau kelengkapan materi di situs ini. <br>
            <br>
            4. Hak Cipta <br>
            Semua hak cipta dan hak kekayaan intelektual lainnya terkait dengan GWS dan kontennya adalah milik Pemilik. Pengguna tidak diperbolehkan menggunakan, mengubah, atau mendistribusikan konten tanpa izin tertulis. <br>
            <br>
            5. Perubahan pada Syarat dan Ketentuan <br>
            Pemilik berhak untuk mengubah syarat dan ketentuan ini setiap saat tanpa pemberitahuan sebelumnya. Perubahan akan berlaku sejak saat diumumkan di situs ini. <br>
            <br>
            6. Hukum yang Berlaku <br>
            Syarat dan ketentuan ini diatur oleh hukum yang berlaku di Purbalingga dan setiap sengketa yang timbul akan diselesaikan di pengadilan yang berwenang di Purbalingga. <br>
            <br>
            7. Konten yang Diunggah Pengguna <br>
            a. Pengguna dapat mengunggah survei dan jawaban survei ke GWS, dan dengan melakukan itu, mereka setuju bahwa mereka bertanggung jawab sepenuhnya atas survei dan jawaban atas survei  yang diunggah. Pemilik tidak bertanggung jawab atas keakuratan, legalitas, atau kepatutan konten yang diunggah oleh pengguna. <br>
            b. Pemilik berhak, tanpa pemberitahuan sebelumnya, untuk menghapus atau mengubah konten yang dianggap mengandung unsur rasisme, seksual, kepentingan politik, ujaran kebencian, kegiatan ilegal, kriminalitas atau melanggar hukum yang berlaku. <br>
            <br>
            8. Lisensi Penggunaan Konten <br>
            a. Dengan mengunggah survei dan jawaban survei ke GWS, pengguna memberikan Pemilik lisensi non-eksklusif, bebas royalti, dapat dipindahtangankan, dan dapat dilisensikan untuk menggunakan, mereproduksi, mengadaptasi, mendistribusikan, dan menampilkan konten tersebut di bawah kerangka hukum yang berlaku. <br>
            b. Pengguna memahami dan setuju bahwa survei dan jawaban survei yang diunggah dapat diakses oleh pengguna lain dan dapat digunakan oleh GWS untuk tujuan promosi dan pemasaran. <br>
            <br>
            9. Tanggung Jawab Hukum Pengguna <br>
            Pengguna bertanggung jawab penuh atas konten yang diunggah dan setuju untuk melepaskan Pemilik dari segala tuntutan atau kerugian yang timbul akibat konten yang diunggah. <br>
            <br>
            Terima kasih atas kunjungan Anda di GWS!
        </p>
      </div>
    </div>
    <script>
      function showPopup() {
        document.getElementById("overlay").style.display = "flex";
      }

      function hidePopup() {
        document.getElementById("overlay").style.display = "none";
      }

      function enableSubmit() {
        document.getElementById("submitButton").disabled =
          !document.getElementById("termsCheckbox").checked;
      }

      function validateForm() {
        if (!document.getElementById("termsCheckbox").checked) {
          alert("Please agree to the terms and conditions before submitting.");
          return false;
        }
        return true;
      }
    </script>
</body>
</html>