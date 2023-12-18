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
            <a href="profile.php"><img src="assets/images/profile-picture.png" alt="profile"></a>
            <div class="profile-desk">
                <a href="profile.php"><div class="name">Nama Pengguna</div></a>
                <a href="profile.php"><div class="date"><small>1 December 2023</small></div></a>
            </div>
        </div>
        <div class="title">Judul Survei</div>
        <div class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel consectetur cumque dicta labore, blanditiis, tenetur quaerat maiores porro, minima voluptatem repellendus molestiae laboriosam. Est, at? ...</div>
        <img src="assets/images//gambar-survey.png" alt="survei">
        <form action="">
            <div class="question-container">
                <div class="question-group">
                    <div class="question">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sequi soluta fuga mollitia architecto odio dolorem eum doloremque ipsum corrupti?</div>
                    <div class="option-group">
                        <div class="option"><input type="radio" id="1" name="1"><label for="1">Option 1</label></div>
                        <div class="option"><input type="radio" id="2" name="1"><label for="2">Option 2</label></div>
                        <div class="option"><input type="radio" id="3" name="1"><label for="3">Option 3</label></div>
                        <div class="option"><input type="radio" id="4" name="1"><label for="4">Option 4</label></div>
                        <div class="option"><input type="radio" id="5" name="1"><label for="5">Option 5</label></div>
                    </div>
                </div>
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