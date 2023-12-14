<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question - GWS</title>
    <?php include("layouts/font.php"); ?>
    <link rel="stylesheet" href="assets/css/create-question.css">
</head>
<body>
    <?php include("layouts/sidebar.php"); ?>
    <div class="container">
        <div class="title">Judul Survei</div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit veritatis consequuntur laborum tempora sunt incidunt laudantium, vel, eum voluptatibus itaque porro cumque quia, inventore dolorem doloribus ipsa quidem! Amet, excepturi et laboriosam commodi fuga ullam repellat expedita repellendus itaque quisquam minima, fugit autem maiores voluptatum, magnam ipsa quos in. Repudiandae?</p>
        <form action="">
            <div class="question-container">
                <ion-icon name="close-circle-outline" class="delete-question"></ion-icon>
                <div class="question">
                    <label for="1">Pertanyaan <span>1</span></label><br>
                    <textarea name="1" id="1" placeholder="Pertanyaan 1 ..."></textarea>
                    <div class="option-container">
                        <div class="option-wrap">
                            <ion-icon name="close-circle-outline" class="delete-option" onclick="deleteOption(1)"></ion-icon>
                            <div class="option"><input type="text" placeholder="Opsi 1 ..."></div>
                        </div>
                        <div class="option-wrap">
                            <ion-icon name="close-circle-outline" class="delete-option" onclick="deleteOption(2)"></ion-icon>
                            <div class="option"><input type="text" placeholder="Opsi 2 ..."></div>
                        </div>
                        <div class="option-add"  onclick="addOption()">
                            <ion-icon name="add-circle-outline" class="add-option"></ion-icon>
                            <div class="add">Tambah opsi</div> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <ion-icon name="add-circle" class="add-question"></ion-icon>
    </div>
</body>
</html>

<script>
    function addOption() {
        var optionContainer = document.querySelector('.option-container');
        var optionWraps = document.querySelectorAll('.option-wrap');

        var optionCount = optionWraps.length + 1;

        var newOptionWrap = document.createElement('div');
        newOptionWrap.className = 'option-wrap';

        var deleteIcon = document.createElement('ion-icon');
        deleteIcon.setAttribute('name', 'close-circle-outline');
        deleteIcon.className = 'delete-option';
        deleteIcon.onclick = function () {
            deleteOption(optionCount);
        };
        newOptionWrap.appendChild(deleteIcon);

        var newOptionInput = document.createElement('div');
        newOptionInput.className = 'option';
        newOptionInput.innerHTML = '<input type="text" placeholder="Opsi ' + optionCount + ' ...">';
        newOptionWrap.appendChild(newOptionInput);

        optionContainer.insertBefore(newOptionWrap, document.querySelector('.option-add'));

        updateOptionNumbers();
    }

    function deleteOption(optionNumber) {
        var optionWrapToDelete = document.querySelector('.option-wrap:nth-child(' + optionNumber + ')');
        if (optionWrapToDelete) {
            optionWrapToDelete.remove();

            updateOptionNumbers();
        }
    }

    function updateOptionNumbers() {
        var optionWraps = document.querySelectorAll('.option-wrap');

        optionWraps.forEach(function (optionWrap, index) {
            var optionNumber = index + 1;
            optionWrap.querySelector('input').setAttribute('placeholder', 'Opsi ' + optionNumber + ' ...');
        });
    }
</script>

