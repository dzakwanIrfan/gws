<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }
    
    .sidebar{
        bottom: 0;
        display: flex;
        flex-direction: column;
        height: 100vh;
        background-color: #445D48;
        width: 5rem;
        text-align: center;
        position: absolute;
        position: fixed;
        align-items: center;
        z-index: 9999;
    }

    nav{
        margin-top: 3rem;
        align-items: center;
    }

    nav a, .sidebar a {
        width: 1.5rem;
        height: 1.5rem;
        display: inline;
        color: #ffffff;
        margin-bottom: 1rem;
        background-color: transparent;
        border-radius: 50%;
        display: inline-block;
        padding: 0.5rem;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    nav a:hover {
        background-color: #8A9E8D;
    }

    .sidebar .logout {
        background-color: #9F2727;
        position: absolute;
        top: 95%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
    }

    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 135px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 9999;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 10px; 
        opacity: 0;
        transition: opacity 0.3s;
        background-color: #001524;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }

    .logout-tooltip {
        background-color: #9F2727 !important;
    }  

    ion-icon {
    font-size: 25px; 
    }
</style>
<?php
session_start();

if($_SESSION['dashboard']){
    $page='dashboard-survey.php';
}else{
    $page='dashboard-user.php';
}
?>
<div class="sidebar">
    <nav>
        <a href="index.php" class="tooltip">
            <ion-icon name="home-outline"></ion-icon>
            <span class="tooltiptext">Beranda</span>
        </a>
        <a href="create-survey.php" class="tooltip">
            <ion-icon name="add-outline"></ion-icon>
            <span class="tooltiptext">Tambah Survei</span>
        </a>
        <a href="profile.php?id=<?php echo $_SESSION['id_pengguna'] ?>" class="tooltip">
            <ion-icon name="person-outline"></ion-icon>
            <span class="tooltiptext">Profil</span>
        </a> 

        <?php if ($_SESSION['role_pengguna'] == 'admin' || $_SESSION['role_pengguna'] == 'pemilik') { ?>
                <a href="<?php echo $page ?>" class="tooltip">
                    <ion-icon name="file-tray-stacked-outline"></ion-icon>
                    <span class="tooltiptext">Kelola</span>
                </a>
        <?php } else { ?>
            <!-- tidak ada -->
        <?php } ?>

        <a href="logout.php" class="logout tooltip">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="tooltiptext logout-tooltip">Keluar</span>
        </a>
    </nav>
</div>