<style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent horizontal scrollbar */
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            background-color: #FDE5D4;
            width: 20%;
            text-align: center;
            align-items: center;
            box-shadow: 4px 0 8px 1px rgba(0, 0, 0, 0.5);
        }

        nav {
            margin-top: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav a, .sidebar > a {
            color: #ffffff;
            margin-bottom: 1rem;
            background-color: transparent;
            padding: 0.5rem;
            transition: background-color 0.3s ease;
            text-decoration: none;
            width: 15rem;
            border-radius: 0.5rem;
            display: inline-block;
        }

        nav a {
            background-color: #232323;
        }

        nav a:hover {
            background-color: #4C4C4C;
        }

        .sidebar > .hover {
            margin-top: auto; /* Push to the bottom */
            background-color: #9F2727;
        }

        .sidebar > .hover:hover {
            background-color: rgba(159, 39, 39, 0.8);
        }

        .sidebar a {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar a > img {
            height: 10rem;
            object-fit: cover;
            margin-top: 3rem;
            mix-blend-mode: multiply;
        }
</style>

<div class="sidebar">
    <a href="index.php" class="foto"><img src="assets/images/GWS.png" alt="gws"></a>
    <nav>
        <a href="dashboard-user.php" class="hover">Daftar Pengguna</a>
        <a href="dashboard-survey.php" class="hover">Daftar Survei</a>
    </nav>
    <a href="logout.php" class="hover">Logout</a>
</div>

