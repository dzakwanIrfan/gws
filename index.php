<?php 
    include 'conection.php';
    session_start();

    if($_SESSION['username']==0){
         header('Location:login.php');
    }


    $query="SELECT p.*, q.* FROM survei JOIN pengguna ON p.id_pengguna=q.id_pengguna";
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
                            <td><input type="text" placeholder="Telusuri"></td>
                            <td><button type="submit"><ion-icon name="search-outline"></ion-icon></button></td>
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
        <div class="content">
            <div class="sub-content">
                <div class="profile">
                    <a href="profile.php"><img src="assets/images/profile-picture.png" alt="profile"></a>
                    <div class="profile-desk">
                        <a href="profile.php"><div class="name">Nama Pengguna</div></a>
                        <a href="profile.php"><div class="date"><small>1 December 2023</small></div></a>
                    </div>
                </div>
                <a href="survey.php">
                    <div class="title">Judul Survey</div>
                    <div class="desk">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius sunt, commodi vitae sed unde quam ratione, illo, eaque nemo odio rerum! Eligendi a, impedit asperiores nisi modi omnis fuga consequatur alias cupiditate nobis corporis architecto commodi aut ratione eaque soluta! ...</div>
                    <img src="assets/images/gambar-survey.png" alt="survey-image" class="banner">
                </a>
                <div class="action">
                    <div class="votes">
                        <div class="up center" onclick="toggleVote(this)">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon> <span>Dukung naik</span>
                        </div>
                        <div class="down center" onclick="toggleVote(this)">
                            <ion-icon name="arrow-down-circle-outline"></ion-icon> <span>Dukung turun</span>
                        </div>
                    </div>
                    <div class="share center" onclick="toggleShare(this)"><ion-icon name="arrow-down-circle-outline"></ion-icon> <span>Bagikan</span></div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="sub-content">
                <div class="profile">
                    <a href="profile.php"><img src="assets/images/profile-picture.png" alt="profile"></a>
                    <div class="profile-desk">
                        <a href="profile.php"><div class="name">Nama Pengguna</div></a>
                        <a href="profile.php"><div class="date"><small>1 December 2023</small></div></a>
                    </div>
                </div>
                <a href="#">
                    <div class="title">Judul Survey</div>
                    <div class="desk">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius sunt, commodi vitae sed unde quam ratione, illo, eaque nemo odio rerum! Eligendi a, impedit asperiores nisi modi omnis fuga consequatur alias cupiditate nobis corporis architecto commodi aut ratione eaque soluta! ...</div>
                    <img src="assets/images/gambar-survey.png" alt="survey-image" class="banner">
                </a>
                <div class="action">
                    <div class="votes">
                        <div class="up center" onclick="toggleVote(this)">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon> <span>Dukung naik</span>
                        </div>
                        <div class="down center" onclick="toggleVote(this)">
                            <ion-icon name="arrow-down-circle-outline"></ion-icon> <span>Dukung turun</span>
                        </div>
                    </div>
                    <div class="share center" onclick="toggleShare(this)"><ion-icon name="arrow-down-circle-outline"></ion-icon> <span>Bagikan</span></div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="sub-content">
                <div class="profile">
                    <a href="profile.php"><img src="assets/images/profile-picture.png" alt="profile"></a>
                    <div class="profile-desk">
                        <a href="profile.php"><div class="name">Nama Pengguna</div></a>
                        <a href="profile.php"><div class="date"><small>1 December 2023</small></div></a>
                    </div>
                </div>
                <a href="#">
                    <div class="title">Judul Survey</div>
                    <div class="desk">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius sunt, commodi vitae sed unde quam ratione, illo, eaque nemo odio rerum! Eligendi a, impedit asperiores nisi modi omnis fuga consequatur alias cupiditate nobis corporis architecto commodi aut ratione eaque soluta! ...</div>
                    <img src="assets/images/gambar-survey.png" alt="survey-image" class="banner">
                </a>
                <div class="action">
                    <div class="votes">
                        <div class="up center" onclick="toggleVote(this)">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon> <span>Dukung naik</span>
                        </div>
                        <div class="down center" onclick="toggleVote(this)">
                            <ion-icon name="arrow-down-circle-outline"></ion-icon> <span>Dukung turun</span>
                        </div>
                    </div>
                    <div class="share center" onclick="toggleShare(this)"><ion-icon name="arrow-down-circle-outline"></ion-icon> <span>Bagikan</span></div>
                </div>
            </div>
        </div>
        <div class="pages">
            <a href="" class="page-left">&lt</a>
            <a href="" class="page">1</a>
            <a href="" class="page-right">&gt</a>
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