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
                                <div class="grup-opsi">
                                    <?php 
                                        $queryoption="SELECT * FROM pertanyaan WHERE id_pertanyaan=''";
                                    ?>
                                    <div class="label-opsi">
                                        <div class="opsi">Lorem, ipsum.</div>
                                        <div class="opsi-jumlah"><span>85</span> suara</div>
                                    </div>
                                    <div class="persen-opsi">
                                        <div class="batang" style="width: 85%;" ></div>
                                    </div>
                                </div>
                                <div class="grup-opsi">
                                    <div class="label-opsi">
                                        <div class="opsi">Lorem, ipsum.</div>
                                        <div class="opsi-jumlah"><span>15</span> suara</div>
                                    </div>
                                    <div class="persen-opsi">
                                        <div class="batang" style="width: 15%;" ></div>
                                    </div>
                                </div>
                                <div class="grup-opsi">
                                    <div class="label-opsi">
                                        <div class="opsi">Lorem, ipsum.</div>
                                        <div class="opsi-jumlah"><span>24</span> suara</div>
                                    </div>
                                    <div class="persen-opsi">
                                        <div class="batang" style="width: 24%;" ></div>
                                    </div>
                                </div>
                                <div class="grup-opsi">
                                    <div class="label-opsi">
                                        <div class="opsi">Lorem, ipsum.</div>
                                        <div class="opsi-jumlah"><span>65</span> suara</div>
                                    </div>
                                    <div class="persen-opsi">
                                        <div class="batang" style="width: 65%;" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }

            ?>
            <div class="laporan">
                <div class="laporan-pertanyaan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae facilis, a corporis expedita sapiente sit. Laboriosam illum perspiciatis aperiam, quis fugiat veniam. Nemo fugiat repellat consectetur veritatis molestias id, sequi minima ipsum, illum earum rerum saepe quod, sunt voluptates quaerat?</div>
                <div class="laporan-opsi">
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>85</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 85%;" ></div>
                        </div>
                    </div>
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>15</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 15%;" ></div>
                        </div>
                    </div>
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>24</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 24%;" ></div>
                        </div>
                    </div>
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>65</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 65%;" ></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="laporan">
                <div class="laporan-pertanyaan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae facilis, a corporis expedita sapiente sit. Laboriosam illum perspiciatis aperiam, quis fugiat veniam. Nemo fugiat repellat consectetur veritatis molestias id, sequi minima ipsum, illum earum rerum saepe quod, sunt voluptates quaerat?</div>
                <div class="laporan-opsi">
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>85</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 85%;" ></div>
                        </div>
                    </div>
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>15</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 15%;" ></div>
                        </div>
                    </div>
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>24</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 24%;" ></div>
                        </div>
                    </div>
                    <div class="grup-opsi">
                        <div class="label-opsi">
                            <div class="opsi">Lorem, ipsum.</div>
                            <div class="opsi-jumlah"><span>65</span> suara</div>
                        </div>
                        <div class="persen-opsi">
                            <div class="batang" style="width: 65%;" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>