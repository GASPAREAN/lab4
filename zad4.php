<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <!-- Подключаем Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Тест</h1>
    <form method="post">
        <div class="form-group">
            <label for="username">Введите ваше имя:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <h3>Вопрос 1:</h3>
            <p>Выберите один вариант ответа:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="q1a" value="a" required>
                <label class="form-check-label" for="q1a">
                    Вариант A
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="q1b" value="b">
                <label class="form-check-label" for="q1b">
                    Вариант B
                </label>
            </div>
        </div>
        <div class="form-group">
            <h3>Вопрос 2:</h3>
            <p>Выберите один или несколько вариантов ответа:</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question2" id="q2a" value="a">
                <label class="form-check-label" for="q2a">
                    Вариант A
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question2" id="q2b" value="b">
                <label class="form-check-label" for="q2b">
                    Вариант B
                </label>
            </div>
        </div>
        <div class="form-group">
            <h3>Вопрос 3:</h3>
            <p>Выберите один вариант ответа:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="q3a" value="a" required>
                <label class="form-check-label" for="q3a">
                    Вариант A
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="q3b" value="b">
                <label class="form-check-label" for="q3b">
                    Вариант B
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
<!-- Подключаем Bootstrap JS (необходим для работы некоторых компонентов) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once 'Validator.php';
$validator = new Validator();

$validator->addValidation('username', function ($value) {
    return !empty($value);
}, 'Пожалуйста, введите ваше имя.');

$validator->addValidation('question1', function ($value) {
    return !empty($value);
}, 'Пожалуйста, ответьте на вопрос 1.');

$validator->addValidation('question2', function ($value) {
    return !empty($value);
}, 'Пожалуйста, ответьте на вопрос 2.');

$validator->addValidation('question3', function ($value) {
    return !empty($value);
}, 'Пожалуйста, ответьте на вопрос 3.');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$data = [
    'username' => $_POST['username'] ?? '',
    'question1' => $_POST['question1'] ?? '',
    'question2' => $_POST['question2'] ?? '',
    'question3' => $_POST['question3'] ?? ''
];
$errors = $validator->validateForm($data);

if (empty($errors)) {
    ?>
    <h2>Результаты теста:</h2>

    <p>Имя пользователя: <?php $data['username'] ?></p>
    <p>Ответ на вопрос 1:<?php $data['question1'] ?></p>
    <p>Ответ на вопрос 2:<?php $data['question2'] ?></p>
    <p>Ответ на вопрос 3:<?php $data['question3'] ?></p>
    <?php
} else {
?>
<div class='container mt-5'>
    <div class='alert alert-danger' role='alert'>
        <ul>
            <?php
            foreach ($errors as $fieldErrors) {
                foreach ($fieldErrors as $error) {
                    echo "<li>$error</li>";
                }
            }
            ?>
        </ul>
    </div>
</div>
<?php
}
}