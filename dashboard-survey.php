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
                <th>Nama Survei</th>
                <th>Deskripsi Survei</th>
                <th>Foto Survei</th>
                <th>Pembuat</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>Survei Elaktabilitas Ahok</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, consequatur ...</td>
                <td class="survey"><img src="assets/images/gambar-survey.png" alt=""></td>
                <td class="profile">
                    <a href="profile.php">Dzakwan Irfan Ramdhani</a>
                </td>
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