<?php 
    include 'conection.php';
    session_start();

    if(!$_SESSION['username']){
         header('Location:login.php');
    }
    
    $id=$_SESSION['id_pengguna'];
   
    //voting
    if(isset($_GET['voteup'])){
        $vote=$_GET['voteup'];
        $querymemilih="SELECT * FROM memilih where id_pengguna='$id' && id_survei='$vote'";
        $resultmemilih=mysqli_query($conn,$querymemilih);
        $rowmemilih=mysqli_fetch_array($resultmemilih);

        if(!$rowmemilih){
            $queryselect="SELECT naik_survei FROM survei WHERE id_survei='$vote'";
            $resultvote=mysqli_query($conn,$queryselect);
            $rowvote=mysqli_fetch_array($resultvote);
            $naik=$rowvote['naik_survei']+1;
            $queryupdate="UPDATE survei SET naik_survei='$naik' where id_survei='$vote'";
            $resulupdate=mysqli_query($conn,$queryupdate);
            $queryinsert="INSERT INTO memilih(id_pengguna, id_survei, naik, turun) VALUES($id,$vote,'1', '0')";
            $resultinsert=mysqli_query($conn,$queryinsert);
        }else{
            if($rowmemilih['naik']==1){
                $queryselect="SELECT naik_survei FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['naik_survei']-1;
                $queryupdate="UPDATE survei SET naik_survei='$naik' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);    
                $queryinsert="UPDATE memilih SET naik='0' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
            }else{
                $queryselect="SELECT naik_survei FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['naik_survei']+1;
                $queryupdate="UPDATE survei SET naik_survei='$naik' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);
                $queryinsert="UPDATE memilih SET naik='1' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
            }
        }
    }

    if(isset($_GET['votedown'])){
        $vote=$_GET['votedown'];
        $querymemilih="SELECT * FROM memilih where id_pengguna='$id' && id_survei='$vote'";
        $resultmemilih=mysqli_query($conn,$querymemilih);
        $rowmemilih=mysqli_fetch_array($resultmemilih);

        if(!$rowmemilih){
            $queryselect="SELECT turun_survei FROM survei WHERE id_survei='$vote'";
            $resultvote=mysqli_query($conn,$queryselect);
            $rowvote=mysqli_fetch_array($resultvote);
            $naik=$rowvote['turun_survei']+1;
            $queryupdate="UPDATE survei SET turun_survei='$naik' where id_survei='$vote'";
            $resulupdate=mysqli_query($conn,$queryupdate);
            $queryinsert="INSERT INTO memilih(id_pengguna, id_survei, naik, turun) VALUES($id,$vote,'0', '1')";
            $resultinsert=mysqli_query($conn,$queryinsert);
        }else{
            if($rowmemilih['turun']==1){
                $queryselect="SELECT turun_survei FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['turun_survei']-1;
                $queryupdate="UPDATE survei SET turun_survei='$naik' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);    
                $queryinsert="UPDATE memilih SET turun='0' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
            }else{
                $queryselect="SELECT turun_survei FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['turun_survei']+1;
                $queryupdate="UPDATE survei SET turun_survei='$naik' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);
                $queryinsert="UPDATE memilih SET turun='1' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
            }
        }
    }
    //end of voting

    //--PAGENATION--//
    $jumlahDataPerHalaman = 3;
    $query = "SELECT COUNT(*) as total FROM survei";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $jumlahData = $data['total'];
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    $query="SELECT survei.*, pengguna.* FROM survei JOIN pengguna ON survei.id_pengguna=pengguna.id_pengguna ORDER BY id_survei ASC LIMIT $awalData, $jumlahDataPerHalaman";
    $result=mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glorious Web Survey</title>
    <?php include("layouts/font.php"); ?>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <?php include("layouts/sidebar.php"); ?>
    <div class="container">
        <div class="heading">
            <div class="search">
                <form action="">
                    <table>
                        <tr>
                            <form action="" method="post">
                                <td><input type="text" name="telusuri" placeholder="Telusuri"></td>
                                <td><button type="submit" name="search"><ion-icon name="search-outline"></ion-icon></button></td>
                            </form>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="sort">
                <div class="sort-select" onclick="toggleDropdown()">
                    <span class="sort-span">Urutkan berdasarkan</span> <ion-icon name="chevron-down-outline"></ion-icon>
                    <div class="dropdown-content">
                        <a href="#">Waktu buat</a>
                        <a href="#">Pendukung naik</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            while($row=mysqli_fetch_array($result)){
                ?>
                    <div class="content">
                        <div class="sub-content">
                            <div class="profile">
                                <a href="profile.php"><img src="<?php 
                                                                    if($row['foto_pengguna']!=''){
                                                                        echo $row['foto_pengguna'];
                                                                    }else{
                                                                        echo "assets/images/profile-picture.png";                     
                                                                    }
                                                                ?>" alt="profile"></a>
                                <div class="profile-desk">
                                    <a href="profile.php"><div class="name"><?php echo $row['namaUser_pengguna']?></div></a>
                                    <a href="profile.php"><div class="date"><small><?php echo $row['waktu_survei']?></small></div></a>
                                </div>
                            </div>
                            <a href="survei.php?id=<?php echo $row['id_survei']?>">
                                <div class="title"><?php echo $row['judul_survei']?></div>
                                <div class="desk"><?php echo $row['deskripsi_survei']?></div>
                                <img src="<?php echo $row['gambar_survei']?>" class="banner" style="height: 10rem; width: 100%;">
                            </a>
                            <div class="action">
                                <div class="votes">
                                    <a href="?voteup=<?php echo $row['id_survei'] ?>" class="up center" onclick="toggleVote(this)">
                                        <ion-icon name="arrow-up-circle-outline" class="icon"></ion-icon> 
                                        <span>Dukung naik</span>
                                    </a>
                                    <a href="?votedown=<?php echo $row['id_survei'] ?>" class="down center" onclick="toggleVote(this)">
                                        <ion-icon name="arrow-down-circle-outline" class="icon"></ion-icon> 
                                        <span>Dukung turun</span>
                                    </a>
                                </div>
                                <button class="share center" onclick="toggleShare(this)"><ion-icon name="share-social-outline" class="icon"></ion-icon><span>Bagikan</span></button>
                            </div>
                        </div>
                    </div>      
                <?php
            }
        ?>
        <div class="pages">
            <!-- Pagination -->
            <?php if ($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1 ?>" class="page-left">&lt;</a> <!-- &laquo; left arrow -->
            <?php endif; ?>

            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i; ?>" class="page" style="background-color:#7a957e !important;"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i; ?>" class="page"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <a href="?halaman=<?= $halamanAktif + 1 ?>" class="page-right">&gt;</a> <!-- &raquo; right arrow -->
        <?php endif; ?>
        </div>
    </div>

<script>
    function toggleDropdown() {
    var dropdown = document.querySelector(".dropdown-content");
    dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
}
</script>
<script>
    function toggleVote(element) {
        element.classList.toggle('active');

        const otherVoteElement = element.classList.contains('up') ? document.querySelector('.down') : document.querySelector('.up');
        otherVoteElement.classList.remove('active');

        return false;
    }

    function toggleShare(element) {
        element.classList.toggle('active');

        return false;
    }
</script>

</body>
</html>