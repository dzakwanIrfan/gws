<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <?php include("layouts/font.php"); ?>
    <link rel="stylesheet" href="assets/css/kategori.css">
</head>
<body>
    <div class="heading">
        <img src="assets/images/GWS.png" alt="logo" class="logo">
        <div class="sub-heading">Pilih Kategori</div>
    </div>
    <form action="post">
        <table>
            <tr>
                <td class="judul">Apa minat Anda?</td>
            </tr>
            <tr>
                <td class="kategori-container">
                    <div class="kategori">
                        <label for="teknologi"><img src="assets/images/teknologi.png" alt="teknologi"></label>
                        <input type="checkbox" id="teknologi"><label for="teknologi">Teknologi</label>
                    </div>
                    <div class="kategori">
                        <label for="film"><img src="assets/images/film.png" alt="film"></label>
                        <input type="checkbox" id="film"><label for="film">Film</label>
                    </div>
                    <div class="kategori">
                        <label for="musik"><img src="assets/images/musik.png" alt="musik"></label>
                        <input type="checkbox" id="musik"><label for="musik">musik</label>
                    </div>
                    <div class="kategori">
                        <label for="sejarah"><img src="assets/images/sejarah.png" alt="sejarah"></label>
                        <input type="checkbox" id="sejarah"><label for="sejarah">sejarah</label>
                    </div>
                    <div class="kategori">
                        <label for="hiburan"><img src="assets/images/hiburan.png" alt="hiburan"></label>
                        <input type="checkbox" id="hiburan"><label for="hiburan">Hiburan</label>
                    </div>
                    <div class="kategori">
                        <label for="kesehatan"><img src="assets/images/kesehatan.png" alt="kesehatan"></label>
                        <input type="checkbox" id="kesehatan"><label for="kesehatan">Kesehatan</label>
                    </div>
                    <div class="kategori">
                        <label for="sosial"><img src="assets/images/sosial.png" alt="sosial"></label>
                        <input type="checkbox" id="sosial"><label for="sosial">Sosial</label>
                    </div>
                    <div class="kategori">
                        <label for="olahraga"><img src="assets/images/olahraga.png" alt="olahraga"></label>
                        <input type="checkbox" id="olahraga"><label for="olahraga">Olahraga</label>
                    </div>
                    <div class="kategori">
                        <label for="wisata"><img src="assets/images/wisata.png" alt="wisata"></label>
                        <input type="checkbox" id="wisata"><label for="wisata">Wisata</label>
                    </div>
                    <div class="kategori">
                        <label for="makanan"><img src="assets/images/makanan.png" alt="makanan"></label>
                        <input type="checkbox" id="makanan"><label for="makanan">Makanan</label>
                    </div>
                    <div class="kategori">
                        <label for="pendidikan"><img src="assets/images/pendidikan.png" alt="pendidikan"></label>
                        <input type="checkbox" id="pendidikan"><label for="pendidikan">Pendidikan</label>
                    </div>
                    <div class="kategori">
                        <label for="bisnis"><img src="assets/images/bisnis.png" alt="bisnis"></label>
                        <input type="checkbox" id="bisnis"><label for="bisnis">Bisnis</label>
                    </div>
                </td>
            </tr>
        </table>
        <input type="submit" value="Selanjutnya" class="input">
    </form>
</body>
</html>