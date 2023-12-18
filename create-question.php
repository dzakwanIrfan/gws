<?php 
    
?>

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
            <ion-icon name="close-circle-outline" class="delete-question" onclick="deleteQuestion(1)"></ion-icon>
            <div class="question">
                <label for="1">Pertanyaan <span>1</span></label><br>
                <textarea name="1" id="1" placeholder="Pertanyaan 1 ..."></textarea>
                <div class="option-container">
                    <div class="option-wrap">
                        <ion-icon name="close-circle-outline" class="delete-option" onclick="deleteOption(1, 1)"></ion-icon>
                        <div class="option"><input type="text" placeholder="Opsi 1 ..."></div>
                    </div>
                    <div class="option-wrap">
                        <ion-icon name="close-circle-outline" class="delete-option" onclick="deleteOption(1, 2)"></ion-icon>
                        <div class="option"><input type="text" placeholder="Opsi 2 ..."></div>
                    </div>
                    <div class="option-add" onclick="addOption(1)">
                        <ion-icon name="add-circle-outline" class="add-option"></ion-icon>
                        <div class="add">Tambah opsi</div>
                    </div>
                </div>
            </div>
        </div>
        <ion-icon name="add-circle" class="add-question" onclick="addQuestion()"></ion-icon>
        <input type="submit" value="Buat Survei" class="submit">
        </form>
    </div>
</body>
</html>

<script>
    function addOption() {
        var optionContainer = document.querySelector('.option-container');
        var optionWraps = document.querySelectorAll('.option-wrap');

        // Menghitung jumlah opsi yang sudah ada
        var optionCount = optionWraps.length + 1;

        // Membuat elemen baru untuk opsi
        var newOptionWrap = document.createElement('div');
        newOptionWrap.className = 'option-wrap';

        // Menambahkan ikon delete
        var deleteIcon = document.createElement('ion-icon');
        deleteIcon.setAttribute('name', 'close-circle-outline');
        deleteIcon.className = 'delete-option';
        deleteIcon.onclick = function () {
            deleteOption(optionCount);
        };
        newOptionWrap.appendChild(deleteIcon);

        // Menambahkan input opsi
        var newOptionInput = document.createElement('div');
        newOptionInput.className = 'option';
        newOptionInput.innerHTML = '<input type="text" placeholder="Opsi ' + optionCount + ' ...">';
        newOptionWrap.appendChild(newOptionInput);

        // Menambahkan elemen opsi baru ke dalam container
        optionContainer.insertBefore(newOptionWrap, document.querySelector('.option-add'));

        // Mengupdate nomor opsi
        updateOptionNumbers();
    }

    function deleteOption(optionNumber) {
        var optionWrapToDelete = document.querySelector('.option-wrap:nth-child(' + optionNumber + ')');
        if (optionWrapToDelete) {
            optionWrapToDelete.remove();

            // Mengupdate nomor opsi
            updateOptionNumbers();
        }
    }

    function updateOptionNumbers() {
        var optionWraps = document.querySelectorAll('.option-wrap');

        // Mengupdate nomor opsi sesuai dengan urutan
        optionWraps.forEach(function (optionWrap, index) {
            var optionNumber = index + 1;
            optionWrap.querySelector('input').setAttribute('placeholder', 'Opsi ' + optionNumber + ' ...');
        });
    }
</script>

<script>
    function addQuestion() {
        var questionContainer = document.querySelector('form');
        var questionContainers = document.querySelectorAll('.question-container');

        var questionCount = questionContainers.length + 1;

        var newQuestionContainer = document.createElement('div');
        newQuestionContainer.className = 'question-container';

        var deleteIcon = document.createElement('ion-icon');
        deleteIcon.setAttribute('name', 'close-circle-outline');
        deleteIcon.className = 'delete-question';
        deleteIcon.onclick = function () {
            deleteQuestion(questionCount);
        };
        newQuestionContainer.appendChild(deleteIcon);

        var newQuestion = document.createElement('div');
        newQuestion.className = 'question';
        newQuestion.innerHTML = '<label for="' + questionCount + '">Pertanyaan <span>' + questionCount + '</span></label><br>' +
            '<textarea name="' + questionCount + '" id="' + questionCount + '" placeholder="Pertanyaan ' + questionCount + ' ..."></textarea>' +
            '<div class="option-container">' +
            '<div class="option-wrap">' +
            '<ion-icon name="close-circle-outline" class="delete-option" onclick="deleteOption(' + questionCount + ', 1)"></ion-icon>' +
            '<div class="option"><input type="text" placeholder="Opsi 1 ..."></div>' +
            '</div>' +
            '<div class="option-wrap">' +
            '<ion-icon name="close-circle-outline" class="delete-option" onclick="deleteOption(' + questionCount + ', 2)"></ion-icon>' +
            '<div class="option"><input type="text" placeholder="Opsi 2 ..."></div>' +
            '</div>' +
            '<div class="option-add" onclick="addOption(' + questionCount + ')">' +
            '<ion-icon name="add-circle-outline" class="add-option"></ion-icon>' +
            '<div class="add">Tambah opsi</div>' +
            '</div>' +
            '</div>';
        newQuestionContainer.appendChild(newQuestion);

        questionContainer.insertBefore(newQuestionContainer, document.querySelector('.add-question'));
    }

    function deleteQuestion(questionNumber) {
        var questionContainerToDelete = document.querySelector('form .question-container:nth-child(' + questionNumber + ')');
        if (questionContainerToDelete) {
            questionContainerToDelete.remove();
            updateQuestionNumbers();
        }
    }

    function addOption(questionNumber) {
        var optionContainer = document.querySelector('form .question-container:nth-child(' + questionNumber + ') .option-container');
        var optionWraps = document.querySelectorAll('.question-container:nth-child(' + questionNumber + ') .option-wrap');

        var optionCount = optionWraps.length + 1;

        var newOptionWrap = document.createElement('div');
        newOptionWrap.className = 'option-wrap';

        var deleteIcon = document.createElement('ion-icon');
        deleteIcon.setAttribute('name', 'close-circle-outline');
        deleteIcon.className = 'delete-option';
        deleteIcon.onclick = function () {
            deleteOption(questionNumber, optionCount);
        };
        newOptionWrap.appendChild(deleteIcon);

        var newOptionInput = document.createElement('div');
        newOptionInput.className = 'option';
        newOptionInput.innerHTML = '<input type="text" placeholder="Opsi ' + optionCount + ' ...">';
        newOptionWrap.appendChild(newOptionInput);

        optionContainer.insertBefore(newOptionWrap, document.querySelector('.question-container:nth-child(' + questionNumber + ') .option-add'));

        updateOptionNumbers(questionNumber);
    }

    function deleteOption(questionNumber, optionNumber) {
        var optionWrapToDelete = document.querySelector('.question-container:nth-child(' + questionNumber + ') .option-wrap:nth-child(' + optionNumber + ')');
        if (optionWrapToDelete) {
            optionWrapToDelete.remove();

            updateOptionNumbers(questionNumber);
        }
    }

    function updateOptionNumbers(questionNumber) {
        var optionWraps = document.querySelectorAll('.question-container:nth-child(' + questionNumber + ') .option-wrap');

        optionWraps.forEach(function (optionWrap, index) {
            var optionNumber = index + 1;
            optionWrap.querySelector('input').setAttribute('placeholder', 'Opsi ' + optionNumber + ' ...');
        });
    }

    function updateQuestionNumbers() {
        var questionContainers = document.querySelectorAll('form .question-container');

        questionContainers.forEach(function (questionContainer, index) {
            var questionNumber = index + 1;
            var labelSpan = questionContainer.querySelector('label span');
            var textarea = questionContainer.querySelector('textarea');

            labelSpan.innerText = questionNumber;
            questionContainer.querySelector('label').setAttribute('for', questionNumber);
            textarea.setAttribute('id', questionNumber);
            textarea.setAttribute('name', questionNumber);
            textarea.setAttribute('placeholder', 'Pertanyaan ' + questionNumber + ' ...');
        });
    }

</script>

