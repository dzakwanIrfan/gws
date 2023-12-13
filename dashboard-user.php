<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Survey - GWS</title>
    <?php include("layouts/font.php") ?>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <?php include("layouts/sidebar-admin.php") ?>
    <div class="container">
        <table>
            <tr>
                <th>Foto</th>
                <th>Nama Pengguna</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis kelamin</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td class="user"><img src="assets/images/profile-picture.png" alt="profile"></td>
                <td>dzakonee</td>
                <td>Dzakwan Irfan Ramdhani</td>
                <td>dzakone07@gmail.com</td>
                <td>Laki-laki</td>
                <td class="action">
                    <a href="profile.php"><ion-icon name="eye-outline" style="background-color: blue; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <a href=""><ion-icon name="create-outline" style="background-color: yellow; padding: 4px; border-radius:4px"></ion-icon></a><br><br>
                    <a href=""><ion-icon name="trash-outline" style="background-color: red; padding: 4px; border-radius:4px"></ion-icon></a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>