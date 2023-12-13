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
        background-color: #FDE5D4;
        width: 20%;
        text-align: center;
        position: fixed;
        align-items: center;
        box-shadow: 4px 0 8px 1px rgba(0, 0, 0, 0.5);
    }

    nav{
        margin-top: 3rem;
        align-items: center;
        display: flex;
        flex-direction: column;
    }

    nav a, .sidebar > a {
        display: inline;
        color: #ffffff;
        margin-bottom: 1rem;
        background-color: transparent;
        display: inline-block;
        padding: 0.5rem;
        transition: background-color 0.3s ease;
        text-decoration: none;
        padding: 0.25rem 0;
        width: 15rem;
        border-radius: 0.5rem;
    }

    nav a{
        background-color: #232323;
    }

    nav a:hover{
        background-color: #4C4C4C;
    }

    .sidebar > a{
        position: absolute;
        bottom: 3rem;
        background-color: #9F2727;
    }

    .sidebar > a:hover{
        background-color: rgba(159, 39, 39, 0.8);
    }

    .sidebar > img{
        margin-top: 3rem;
        height: 20%;
        object-fit: cover;
        mix-blend-mode: multiply;
    }
</style>

<div class="sidebar">
    <img src="assets/images/GWS.png" alt="gws">
    <nav>
        <a href="dashboard-user.php">Daftar Pengguna</a>
        <a href="dashboard-survey.php">Daftar Survei</a>
    </nav>
    <a href="">Logout</a>
</div>

