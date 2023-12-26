<?php 
    include 'conection.php';
    session_start();

    if(!$_SESSION['username']){
        header('Location:login.php');
    }

    $id=$_GET['id'];

    //query select survei
    $query="SELECT * FROM survei WHERE id_survei='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);

    //query memilih survei
    $querymemnaik = "SELECT * FROM memilih WHERE id_survei = $id AND naik = 1;";
    $resultmemnaik = mysqli_query($conn, $querymemnaik);
    $naik = mysqli_num_rows($resultmemnaik);

    $querymemturun = "SELECT * FROM memilih WHERE id_survei = $id AND turun = 1;";
    $resultmemturun = mysqli_query($conn, $querymemturun);
    $turun = mysqli_num_rows($resultmemturun);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Survey</title>
    <?php include("layouts/font.php") ?>
    <link rel="stylesheet" href="assets/css/survey-laporan.css">
</head>
<body>
    <?php include("layouts/sidebar.php") ?>
    <div class="container">
        <div class="header">
            <div class="judul"><?php echo $row['judul_survei'] ?></div>
            <div class="deskripsi"><?php echo $row['deskripsi_survei'] ?></div>
            <div class="votes">
                <div class="up active center">
                    <ion-icon name="arrow-up-circle-outline" class="icon"></ion-icon> 
                    <span>Dukung naik: <?= $naik ?></span>
                </div>
                <div class="down active center">
                    <ion-icon name="arrow-down-circle-outline" class="icon"></ion-icon> 
                    <span>Dukung turun: <?= $turun ?></span>
                </div>
            </div>
        </div>

        <div class="laporan-container">
            <?php 

                $queryquest="SELECT * FROM pertanyaan WHERE id_survei='$id' ORDER BY id_pertanyaan ASC";
                $resultquest=mysqli_query($conn,$queryquest);
                while($rowquest=mysqli_fetch_array($resultquest)){
                    $id_pertanyaan=$rowquest['id_pertanyaan'];
                    ?>
                        <div class="laporan">
                            <div class="laporan-pertanyaan"><?php echo $rowquest['pertanyaan']?></div>
                            <div class="laporan-opsi">
                                    <?php 
                                        $queryoption="SELECT * FROM opsi WHERE id_pertanyaan='$id_pertanyaan'";
                                        $resultoption=mysqli_query($conn,$queryoption);
                                        while($rowoption=mysqli_fetch_array($resultoption)){
                                            $id_opsi=$rowoption['id_opsi'];
                                            $queryjawaban="SELECT * FROM jawaban WHERE jawaban='$id_opsi'";
                                            $resultjawaban=mysqli_query($conn,$queryjawaban);
                                            $countopsi=mysqli_num_rows($resultjawaban);

                                            $querypert = "SELECT * FROM jawaban WHERE id_pertanyaan = $id_pertanyaan;";
                                            $resultpert = mysqli_query($conn, $querypert);
                                            $countpert = mysqli_num_rows($resultpert);
                                            ?>
                                                <div class="grup-opsi">
                                                    <div class="label-opsi">
                                                        <div class="opsi"><?php echo $rowoption['opsi']?></div>
                                                        <div class="opsi-jumlah"><span><?php echo $countopsi ?></span> suara</div>
                                                    </div>
                                                    <div class="persen-opsi">
                                                        <div class="batang" style="width: <?= $countpert > 0 ? ($countopsi/$countpert) * 100 : 0 ?>%;" ></div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>     
                            </div>
                            </div>           
                    <?php
                }

            ?>
        </div>    
</body>
</html>