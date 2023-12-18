<?php 
    include 'conection.php';
    session_start();

    $id=$_GET['id'];

    //query select survei
    $query="SELECT * FROM survei WHERE id_survei='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
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
                                            ?>
                                                <div class="grup-opsi">
                                                    <div class="label-opsi">
                                                        <div class="opsi"><?php echo $rowoption['opsi']?></div>
                                                        <div class="opsi-jumlah"><span><?php echo $countopsi ?></span> suara</div>
                                                    </div>
                                                    <div class="persen-opsi">
                                                        <div class="batang" style="width: 15%;" ></div>
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