<?php
    date_default_timezone_set('Asia/Jakarta');
    include("conection.php");
    $id = $_GET['id'];

    //survei
    $sql = "SELECT * FROM survei WHERE id_survei = $id;";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    //user
    $id_user = $result['id_pengguna'];
    $sql_user = "SELECT * FROM pengguna WHERE id_pengguna = $id_user";
    $query_user = mysqli_query($conn, $sql_user);
    $result_user = mysqli_fetch_assoc($query_user);

    //pertanyaan
    $sql_q = "SELECT * FROM pertanyaan WHERE id_survei = $id;";
    $query_q = mysqli_query($conn, $sql_q);

    //opsi
    
    
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
    <?php include("layouts/sidebar.php"); ?>
    <div class="container">
        <div class="profile">
            <a href="profile.php?id=<?= $result_user['id_pengguna'] ?>"><img src="<?= $result_user['foto_pengguna'] ?>" alt="profile"></a>
            <div class="profile-desk">
                <a href="profile.php?id=<?= $result_user['id_pengguna'] ?>"><div class="name"><?= $result_user['nama_pengguna'] ?></div></a>
                <a href="profile.php?id=<?= $result_user['id_pengguna'] ?>"><div class="date"><small><?= $result['waktu_survei'] ?></small></div></a>
            </div>
        </div>
        <div class="title"><?= $result['judul_survei'] ?></div>
        <div class="desc"><?= $result['deskripsi_survei'] ?></div>
        <img src="<?= $result['gambar_survei'] ?>" alt="survei">
        <form action="">
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
                <input type="submit" value="Kirim Jawaban">
            </div>
        </form>
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