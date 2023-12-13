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

    .sidebar .logout{
        background-color: #DF1616;
        margin-top: 25rem;
    }
</style>


<div class="sidebar">
    <nav>
        <a href="index.php"><ion-icon name="home-outline"></ion-icon></a>
        <a href="create-survey.php"><ion-icon name="add-outline"></ion-icon></a>
        <a href=""><ion-icon name="person-outline"></ion-icon></a>
    </nav>
    <a href="logout.php" class="logout"><ion-icon name="log-out-outline"></ion-icon></a>
</div>