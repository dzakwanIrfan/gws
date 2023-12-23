<?php
    date_default_timezone_set('Asia/Jakarta');
    include("conection.php");
    session_start();

    if($_SESSION['id_pengguna']==''){
        header("Location:login.php");
    }

    $idsaya = $_SESSION['id_pengguna'];
    if($_SESSION['dashboard']){
        $page='dashboard-survey.php';
    }else{
        $page='index.php';
    }
    
    if($_GET['id']){
        $idget = $_GET['id'];
    
        //survei
        $sql = "SELECT * FROM survei WHERE id_survei = $idget;";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
    
        //user
        $id_user = $result['id_pengguna'];
        $sql_user = "SELECT * FROM pengguna WHERE id_pengguna = $id_user";
        $query_user = mysqli_query($conn, $sql_user);
        $result_user = mysqli_fetch_assoc($query_user);
    
        //pertanyaan
        $sql_q = "SELECT * FROM pertanyaan WHERE id_survei = $idget;";
        $query_q = mysqli_query($conn, $sql_q);
    }
    
    //input
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kirim'])) {
        foreach ($_POST as $pertanyaan_id => $jawaban_id) {
            if (!empty($jawaban_id) && is_numeric($jawaban_id) && is_numeric($pertanyaan_id)) {
                $pertanyaan_id = mysqli_real_escape_string($conn, $pertanyaan_id);
                $jawaban_id = mysqli_real_escape_string($conn, $jawaban_id);
    
                $id_pengguna = $_SESSION['id_pengguna']; 
    
                $sql_insert_jawaban = "INSERT INTO jawaban (jawaban, id_pengguna, id_pertanyaan) VALUES ('$jawaban_id', '$id_pengguna', '$pertanyaan_id')";
                
                $result_insert_jawaban = mysqli_query($conn, $sql_insert_jawaban);
    
                if (!$result_insert_jawaban) {
                    echo "Error in inserting answer: " . mysqli_error($conn);
                    exit;
                }
            }
        }
        echo "<script>alert('Berhasil menambahkan jawaban!'); document.location = '$page';</script>";
    }else{
        $idget = $_GET['id'];
        $sql_s = "SELECT id_pertanyaan FROM `pertanyaan` WHERE id_survei = $idget;";
        $query_s = mysqli_query($conn, $sql_s);
        $id_pengguna_s = $_SESSION['id_pengguna'];
        while($row_s = mysqli_fetch_assoc($query_s)){
            $id_pertanyaan_s = $row_s['id_pertanyaan'];
            $sql_secure = "SELECT * FROM jawaban WHERE id_pertanyaan = '$id_pertanyaan_s' AND id_pengguna = '$id_pengguna_s';";
            $query_secure = mysqli_query($conn, $sql_secure);
            if(mysqli_fetch_assoc($query_secure)){
                echo "<script>alert('Anda sudah menjawab survei ini!'); document.location = '$page';</script>";
            }
        }
    }

    $id=$_SESSION['id_pengguna'];
   
    //voting
    if(isset($_GET['voteup'])){
        $vote=$_GET['voteup'];
        $querymemilih="SELECT * FROM memilih where id_pengguna='$id' && id_survei='$vote'";
        $resultmemilih=mysqli_query($conn,$querymemilih);
        $rowmemilih=mysqli_fetch_array($resultmemilih);

        if($rowmemilih==''){
            $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
            $resultvote=mysqli_query($conn,$queryselect);
            $rowvote=mysqli_fetch_array($resultvote);
            $naik=$rowvote['naik_survei']+1;
            $turun=$rowvote['turun_survei']-1;
            $queryupdate="UPDATE survei SET naik_survei='$naik',turun_survei='$turun' where id_survei='$vote'";
            $resulupdate=mysqli_query($conn,$queryupdate);
            $queryinsert="INSERT INTO memilih(id_pengguna, id_survei, naik, turun) VALUES($id,$vote,'1', '0')";
            $resultinsert=mysqli_query($conn,$queryinsert);
            echo "<script> document.location = 'survey.php?id=$idget' </script>";
        }else{
            if($rowmemilih['turun']==1){
                $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['naik_survei']+2;
                $turun=$rowvote['turun_survei']-2;
                $queryupdate="UPDATE survei SET naik_survei='$naik',turun_survei='$turun' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);    
                $queryinsert="UPDATE memilih SET naik='1',turun='0' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
                echo "<script> document.location = 'survey.php?id=$idget' </script>";

            }elseif($rowmemilih['naik']==1){
                $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['naik_survei']-1;
                $turun=$rowvote['turun_survei']+1;
                $queryupdate="UPDATE survei SET naik_survei='$naik',turun_survei='$turun' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);    
                $queryinsert="UPDATE memilih SET naik='0' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
                echo "<script> document.location = 'survey.php?id=$idget' </script>";

            }else{
                $queryselect="SELECT naik_survei FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['naik_survei']+1;
                $turun=$rowvote['turun_survei']-1;
                $queryupdate="UPDATE survei SET naik_survei='$naik',turun_survei='$turun' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);
                $queryinsert="UPDATE memilih SET naik='1',turun='0' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
                echo "<script> document.location = 'survey.php?id=$idget' </script>";

            }
        }
    }

    if(isset($_GET['votedown'])){
        $vote=$_GET['votedown'];
        $querymemilih="SELECT * FROM memilih where id_pengguna='$id' && id_survei='$vote'";
        $resultmemilih=mysqli_query($conn,$querymemilih);
        $rowmemilih=mysqli_fetch_array($resultmemilih);

        if(!$rowmemilih){
            $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
            $resultvote=mysqli_query($conn,$queryselect);
            $rowvote=mysqli_fetch_array($resultvote);
            $naik=$rowvote['turun_survei']+1;
            $turun=$rowvote['naik_survei']-1;
            $queryupdate="UPDATE survei SET turun_survei='$naik', naik_survei='$turun' where id_survei='$vote'";
            $resulupdate=mysqli_query($conn,$queryupdate);
            $queryinsert="INSERT INTO memilih(id_pengguna, id_survei, naik, turun) VALUES($id,$vote,'0', '1')";
            $resultinsert=mysqli_query($conn,$queryinsert);
            echo "<script> document.location = 'survey.php?id=$idget' </script>";

        }else{
            if($rowmemilih['naik']==1){
                $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['naik_survei']-2;
                $turun=$rowvote['turun_survei']+2;
                $queryupdate="UPDATE survei SET turun_survei='$turun', naik_survei='$naik' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);    
                $queryinsert="UPDATE memilih SET naik='0', turun='1' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
                echo "<script> document.location = 'survey.php?id=$idget' </script>";

            }elseif($rowmemilih['turun']==1){
                $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['turun_survei']-1;
                $turun=$rowvote['naik_survei']+1;
                $queryupdate="UPDATE survei SET turun_survei='$naik',naik_survei='$turun' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);    
                $queryinsert="UPDATE memilih SET turun='0'  WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
                echo "<script> document.location = 'survey.php?id=$idget' </script>";

            }else{
                $queryselect="SELECT * FROM survei WHERE id_survei='$vote'";
                $resultvote=mysqli_query($conn,$queryselect);
                $rowvote=mysqli_fetch_array($resultvote);
                $naik=$rowvote['turun_survei']+1;
                $turun=$rowvote['naik_survei']-1;
                $queryupdate="UPDATE survei SET turun_survei='$naik', naik_survei='$turun' where id_survei='$vote'";
                $resulupdate=mysqli_query($conn,$queryupdate);
                $queryinsert="UPDATE memilih SET turun='1', naik='0' WHERE id_survei='$vote' && id_pengguna='$id'";
                $resultinsert=mysqli_query($conn,$queryinsert);
                echo "<script> document.location = 'survey.php?id=$idget' </script>";

            }
        }
    }
    //end of voting
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei - GWS</title>
    <?php include("layouts/font.php"); ?>
    <link rel="stylesheet" href="assets/css/survey.css">
</head>
<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Salin link berikut:</p>
            <input type="text" value="<?= 'localhost/gws/survey.php?id='.$idget ?>" id="shareLink" readonly>
            <button onclick="copyToClipboard()">Salin</button>
        </div>
    </div>
    <?php include("layouts/sidebar.php"); ?>
    <div class="container">
        <div class="profile">
            <?php
                $idku = $result_user['id_pengguna'];
                if ($result_user['foto_pengguna'] == ''){
                    echo "<a href='profile.php?id=$idku'><img src='assets/images/profile-picture.png' alt='profile'></a>";
                } else {
                    $fotoku = $result_user['foto_pengguna'];
                    echo "<a href='profile.php?id=$idku'><img src='$fotoku' alt='profile'></a>";
                }
            ?>
            <div class="profile-desk">
                <a href="profile.php?id=<?= $result_user['id_pengguna'] ?>"><div class="name"><?= $result_user['nama_pengguna'] ?></div></a>
                <a href="profile.php?id=<?= $result_user['id_pengguna'] ?>"><div class="date"><small><?= date('d F Y', strtotime($result['waktu_survei'])) ?></small></div></a>
            </div>
        </div>
        <div class="title"><?= $result['judul_survei'] ?></div>
        <div class="desc"><?= $result['deskripsi_survei'] ?></div>
        <img src="<?= $result['gambar_survei'] ?>" alt="survei">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="question-container">
                <?php while($result_q = mysqli_fetch_assoc($query_q)){ ?>
                <div class="question-group">
                    <div class="question"><?= $result_q['pertanyaan'] ?></div>
                    <div class="option-group">
                        <?php
                            $id_pertanyaan = $result_q['id_pertanyaan'];
                            $sql_o = "SELECT * FROM opsi WHERE id_pertanyaan = $id_pertanyaan;";
                            $query_o = mysqli_query($conn, $sql_o); 
                            while($result_o = mysqli_fetch_assoc($query_o)){ 
                        ?>
                        <div class="option"><input type="radio" id="<?= $result_o['id_opsi'] ?>" name="<?= $result_q['id_pertanyaan'] ?>" value="<?= $result_o['id_opsi'] ?>"><label for="<?= $result_o['id_opsi'] ?>"><?= $result_o['opsi'] ?></label></div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <input type="submit" value="Kirim Jawaban" name="kirim">
            </div>
        </form>
        <div class="action">
        <?php 
            $idsurvei = $result['id_survei'];
            $sqlmem = "SELECT * FROM `memilih` WHERE id_pengguna = $idsaya AND id_survei = $idsurvei;";
            $querymem = mysqli_query($conn, $sqlmem);
            $resultmem = mysqli_fetch_assoc($querymem);

            // Check if there are results
            if ($resultmem) {
        ?>
        <div class="votes">
            <a href="?voteup=<?php echo $result['id_survei']; ?>&id=<?php echo $result['id_survei']; ?>" class="up center <?php if($resultmem['naik'] == 1){ echo 'active'; } ?>" onclick="toggleVote(this)">
                <ion-icon name="arrow-up-circle-outline" class="icon"></ion-icon> 
                <span>Dukung naik</span>
            </a>
            <a href="?votedown=<?php echo $result['id_survei']; ?>&id=<?php echo $result['id_survei']; ?>" class="down center <?php if($resultmem['turun'] == 1){ echo 'active'; } ?>" onclick="toggleVote(this)">
                <ion-icon name="arrow-down-circle-outline" class="icon"></ion-icon> 
                <span>Dukung turun</span>
            </a>
        </div>
        <?php } else { ?>
        <div class="votes">
            <a href="?voteup=<?php echo $result['id_survei']; ?>&id=<?php echo $result['id_survei']; ?>" class="up center <?php if($resultmem['naik'] == 1){ echo 'active'; } ?>" onclick="toggleVote(this)">
                <ion-icon name="arrow-up-circle-outline" class="icon"></ion-icon> 
                <span>Dukung naik</span>
            </a>
            <a href="?votedown=<?php echo $result['id_survei']; ?>&id=<?php echo $result['id_survei']; ?>" class="down center <?php if($resultmem['turun'] == 1){ echo 'active'; } ?>" onclick="toggleVote(this)">
                <ion-icon name="arrow-down-circle-outline" class="icon"></ion-icon> 
                <span>Dukung turun</span>
            </a>
        </div>
        <?php } ?>
            <button class="share center" onclick="openModal()"><ion-icon name="share-social-outline" class="icon"></ion-icon><span>Bagikan</span></button>
        </div>
    </div>

<script>
    function openModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function copyToClipboard() {
        var copyText = document.getElementById("shareLink");
        copyText.select();
        document.execCommand("copy");
        alert("Link berhasil disalin!");
    }

    function toggleVote(element) {
        element.classList.toggle('active');

        const otherVoteElement = element.classList.contains('up') ? document.querySelector('.down') : document.querySelector('.up');
        otherVoteElement.classList.remove('active');

        return false;
    }
</script>
</body>
</html>